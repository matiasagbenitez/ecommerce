<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component
{
    public $department, $city, $cities;

    public $createForm = [
        'name' => '',
        'cost' => null
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
        'cost' => null
    ];

    protected $rules = [
        'createForm.name' => 'required|unique:cities,name',
        'createForm.cost' => 'required|numeric|min:1|max:100'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'name',
        'createForm.cost' => 'cost',
        'editForm.name' => 'name',
        'editForm.cost' => 'cost'
    ];

    protected $listeners = ['delete'];

    public function mount(Department $department)
    {
        $this->department = $department;
        $this->getCities();
    }

    public function getCities()
    {
        $this->cities = City::where('department_id', $this->department->id)->get();
    }

    public function save()
    {
        $this->validate();

        $this->department->cities()->create($this->createForm);
        $this->reset('createForm');
        $this->getCities();
        $this->emit('saved');
    }

    public function edit(City $city)
    {
        $this->resetValidation();
        $this->city = $city;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $city->name;
        $this->editForm['cost'] = $city->cost;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required|unique:cities,name,' . $this->city->id,
            'editForm.cost' => 'required'
        ]);

        $this->city->update($this->editForm);
        $this->reset('editForm');
        $this->getCities();
    }

    public function delete(City $city)
    {
        $city->delete();
        $this->getCities();
    }

    public function render()
    {
        return view('livewire.admin.show-department')->layout('layouts.admin');
    }
}
