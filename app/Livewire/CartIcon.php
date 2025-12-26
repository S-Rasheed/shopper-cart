<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CartIcon extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->loadCount();
    }

    #[On('cart-updated')]
    public function loadCount()
    {
        if (!Auth::check()) {
            $this->count = 0;
            return;
        }

        $this->count = CartItem::where('user_id', Auth::id())
            ->sum('quantity');
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
