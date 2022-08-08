<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product;
    public $quantity;
    public $qty = 1;
    public $options = [
        'color_id' => null,
        'size_id' => null
    ];

    public function mount()
    {
        $this->quantity = $this->product->quantity;
        $this->options['image'] = asset('storage/' . $this->product->image->first()->url);
    }

    public function decrement()
    {
        $this->qty -= 1;
    }

    public function increment()
    {
        $this->qty += 1;
    }

    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => $this->options,
            'weight' => '500'
        ]);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
