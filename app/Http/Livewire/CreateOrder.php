<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Department;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateOrder extends Component
{
    public $shipping_type = 1, $shipping_cost = 0;
    public $departments, $cities = [], $districts = [];
    public $department_id = '', $city_id = '', $district_id = '';
    public $adress, $references;
    public $contact, $phone;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'shipping_type' => 'required'
    ];

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function updatedShippingType($value)
    {
        if ($value == 1) {
            $this->resetValidation(['department_id', 'city_id', 'district_id', 'adress', 'references']);
        }
    }

    public function create_order()
    {
        $rules = $this->rules;

        if ($this->shipping_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['adress'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);

        // Creamos la orden
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->shipping_type = $this->shipping_type;
        $order->shipping_cost = $this->shipping_cost;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();
        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', compact('order'));
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
