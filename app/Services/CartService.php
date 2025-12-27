<?php

namespace App\Services;

use App\Models\User;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartService{

    /**
     * Get user's cart items with products
    */
    public function getCartItems(User $user)
    {
        return CartItem::with('product')
            ->where('user_id', $user->id)
            ->get();
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart(User $user, int $cartItemId): array
    {
        $deleted = CartItem::where('id', $cartItemId)
            ->where('user_id', $user->id)
            ->delete();

        return [
            'success' => $deleted > 0,
            'message' => $deleted > 0 ? 'Item removed from cart' : 'Item not found'
        ];
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity(User $user, int $cartItemId, int $quantity): array
    {
        $cartItem = CartItem::where('id', $cartItemId)
            ->where('user_id', $user->id)
            ->with('product')
            ->firstOrFail();

        if ($quantity < 1) {
            return $this->removeFromCart($user, $cartItemId);
        }

        $cartItem->update(['quantity' => $quantity]);

        return [
            'success' => true,
            'message' => 'Quantity updated successfully'
        ];
    }

}
