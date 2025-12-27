<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\CartItem;
use App\Models\OrderItem;
use Livewire\Attributes\On;
use App\Services\CartService;
use App\Events\StockRunningLow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartItemsList extends Component
{
    public $cartItems;
    public $total = 0;
    public $savings = 100;
    public $store_pickup = 99;
    public $tax = 100;
    public $totalAfterTax = 0;


    protected $cartService;

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        $this->loadCart();
    }


    #[On('cart-updated')]
    public function loadCart()
    {
        if (!Auth::check()) {
            $this->cartItems = collect();
            $this->total = 0;
            return;
        }

        $this->cartItems = $this->cartService->getCartItems(Auth::user());
        $this->calculateTotal();
    }


    public function incrementQuantity($cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItem = $this->cartItems->firstWhere('id', $cartItemId);

        if (!$cartItem) {
            session()->flash('error', 'Cart item not found');
            return;
        }

        $newQuantity = $cartItem->quantity + 1;
        $result = $this->cartService->updateQuantity(Auth::user(), $cartItemId, $newQuantity);

        if ($result['success']) {
            $this->loadCart();
            $this->dispatch('cart-updated');
        } else {
            session()->flash('error', $result['message']);
        }
    }

    public function decrementQuantity($cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItem = $this->cartItems->firstWhere('id', $cartItemId);

        if (!$cartItem) {
            session()->flash('error', 'Cart item not found');
            return;
        }

        $newQuantity = $cartItem->quantity - 1;

        if ($newQuantity < 1) {

            #if quantity would be 0, remove the item
            $this->removeItem($cartItemId);
            return;
        }

        $result = $this->cartService->updateQuantity(Auth::user(), $cartItemId, $newQuantity);

        if ($result['success']) {
            $this->loadCart();
            $this->dispatch('cart-updated');
        } else {
            session()->flash('error', $result['message']);
        }
    }

    public function removeItem($cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $result = $this->cartService->removeFromCart(Auth::user(), $cartItemId);

        if ($result['success']) {

            session()->flash('success', 'Item removed from cart');
            $this->loadCart();
            $this->dispatch('cart-updated');
        } else {
            session()->flash('error', $result['message']);
        }
    }


    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });


        if($this->total < 700){

            $this->savings = 0;
            $this->store_pickup = 0;
            $this->tax = 0;
            $this->totalAfterTax = $this->total;
        } else {

            $this->savings = 100;
            $this->store_pickup = 99;
            $this->tax = 100;
        }

        $this->totalAfterTax = $this->total + ($this->savings + $this->store_pickup + $this->tax);
    }

    public function checkOutItem($cartItemId, $cartItemquantity){

        $cartItem = CartItem::with('product')->find($cartItemId);

        if (!$cartItem) {
            $this->dispatch('checkout-processed', message: "Item not found in cart.");
            return;
        }

        $product = $cartItem->product;

        if (!$product || $product->stock_quantity <= 0) {
            $this->dispatch('checkout-processed', message: "Checkout failed - item out of stock!");
            return;
        }

        if ($product->stock_quantity < $cartItemquantity) {
            $this->dispatch('checkout-processed', message: "Limited stock of $product->stock_quantity available!");
            return;
        }

        try {
            DB::beginTransaction();

            #reduce stock
            $product->decrement('stock_quantity', $cartItemquantity);

            #create an order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $product->price * $cartItemquantity,
            ]);

            #create order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $cartItemquantity,
                'price' => $product->price,
            ]);

            #remove item from cart
            $cartItem->delete();

            #check if stock is running low (5 or less)
            if ($product->stock_quantity <= 5) {
                event(new StockRunningLow($product));
            }

            DB::commit();

            $this->dispatch('checkout-processed', message: "{$product->name} checked out successfully!");
            $this->dispatch('cart-updated', message: "{$product->name} checked out successfully!");

        } catch (\Exception $e) {
            DB::rollBack();

            $this->dispatch('checkout-processed', message: "Checkout failed. Please try again");
            $this->dispatch('cart-updated', message: 'Error! Checkout failed.');

            Log::error('Checkout failed: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.cart-items-list');
    }
}
