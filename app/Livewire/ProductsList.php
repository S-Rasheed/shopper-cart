<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


class ProductsList extends Component
{
    public $addedToCart = [];

    public function addToCart($productId)
    {
        #check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $product = Product::find($productId);

        if ($product->stock_quantity < 1) {
            $this->dispatch('cart-updated', 'Product out of stock!');
            return;
        }

        $userId = Auth::id();

        #check existing cart item for this user and product
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {

            $this->addedToCart[$productId] = true;
            $this->dispatch('cart-updated', 'Product already in cart');

        } else {

            #create new cart item
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);

            $this->addedToCart[$productId] = true;

            $this->dispatch('cart-updated', 'Product added to cart');
        }

    }

    public function render()
    {
        return view('livewire.products-list', [
            'products' => Product::where('stock_quantity', '>', 0)->get()
        ]);
    }
}
