<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CartItemsList extends Component
{
    public $cartItems;
    public $total = 0;
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

        $this->totalAfterTax = $this->total - 799;
    }


    public function render()
    {
        return view('livewire.cart-items-list');
    }
}
