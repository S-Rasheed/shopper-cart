<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        return view('livewire.products-list', [
            'products' => Product::where('stock_quantity', '>', 0)->get()
        ]);
    }
}
