<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusOrder extends Component
{
    public $order;
    public $status;

    public function mount()
    {
        $this->status = $this->order->status;
    }

    public function update()
    {
        $this->order->status = $this->status;
        $this->order->save();
    }

    public function render()
    {
        $items = json_decode($this->order->content);
        $shipping_data = json_decode($this->order->shipping_data);
        return view('livewire.status-order', compact('items', 'shipping_data'));
    }
}
