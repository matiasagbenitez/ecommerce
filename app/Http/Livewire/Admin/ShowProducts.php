<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }
}
