<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $colorC = "";
    public $qty = 1;
    public $quantity = 0;

    public function mount()
    {
        $this->colors = $this->product->colors;
    }

    public function updatedColorC($value) {
        $this->quantity = $this->product->colors->find($value)->pivot->quantity;
    }

    public function decrement()
    {
        $this->qty -= 1;
    }

    public function increment()
    {
        $this->qty += 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
