<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CityComponent extends Component
{
    public $city, $district, $districts;

    public $createForm = [
        'name' => '',
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
    ];

    protected $rules = [
        'createForm.name' => 'required|unique:districts,name',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'name',
        'editForm.name' => 'name',
    ];

    protected $listeners = ['delete'];

    public function mount(City $city)
    {
        $this->city = $city;
        $this->getDistricts();
    }

    public function getDistricts()
    {
        $this->districts = District::where('city_id', $this->city->id)->get();
    }

    public function save()
    {
        $this->validate();

        $this->city->districts()->create($this->createForm);
        $this->reset('createForm');
        $this->getDistricts();
        $this->emit('saved');
    }

    public function edit(District $district)
    {
        $this->resetValidation();
        $this->district = $district;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $district->name;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required|unique:districts,name,' . $this->district->id,
        ]);

        $this->district->update($this->editForm);
        $this->reset('editForm');
        $this->getDistricts();
    }

    public function delete(District $district)
    {
        $district->delete();
        $this->getDistricts();
    }

    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}
