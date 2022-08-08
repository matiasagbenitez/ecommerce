<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $colorC = "";
    public $qty = 1;
    public $quantity = 0;
    public $options = [
        'color_id' => null,
    ];


    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->options['image'] = asset('storage/' . $this->product->image->first()->url);
    }

    public function updatedColorC($value) {
        $color = $this->product->colors->find($value);
        $this->quantity = $color->pivot->quantity;
        $this->options['color'] = $color->name;
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
        return view('livewire.add-cart-item-color');
    }
}
