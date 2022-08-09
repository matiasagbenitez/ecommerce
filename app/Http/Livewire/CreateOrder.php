<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Department;

class CreateOrder extends Component
{
    public $shipping_type = 1;
    public $departments, $cities = [], $districts = [];
    public $department_id = '', $city_id = '', $district_id = '';
    public $adress, $reference;

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
