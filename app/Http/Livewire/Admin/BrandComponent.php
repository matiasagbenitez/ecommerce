<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;

class BrandComponent extends Component
{
    public $brands, $brand;

    public $createForm = [
        'name' => null
    ];

    public $editForm = [
        'open' => false,
        'name' => null
    ];

    protected $rules = ['createForm.name' => 'required'];
    protected $validationAttributes = ['createForm.name' => 'name', 'editForm.name' => 'name'];
    protected $listeners = ['delete'];

    public function mount()
    {
        $this->getBrands();
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function save()
    {
        $this->validate();
        Brand::create($this->createForm);
        $this->reset('createForm');
        $this->getBrands();
    }

    public function edit(Brand $brand)
    {
        $this->resetValidation();
        $this->brand = $brand;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $brand->name;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->brand->update($this->editForm);
        $this->reset('editForm');
        $this->getBrands();
    }

    public function delete(Brand $brand)
    {
        $brand->delete();
        $this->getBrands();
    }

    public function render()
    {
        return view('livewire.admin.brand-component')->layout('layouts.admin');
    }
}
