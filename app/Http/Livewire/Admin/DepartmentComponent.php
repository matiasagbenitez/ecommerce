<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    public $department, $departments;

    public $createForm = ['name' => ''];
    public $editForm = ['open' => false, 'name' => ''];
    protected $rules = ['createForm.name' => 'required|unique:departments,name'];
    protected $validationAttributes = ['createForm.name' => 'name', 'editForm.name' => 'name'];
    protected $listeners = ['delete'];

    public function mount()
    {
        $this->getDepartments();
    }

    public function getDepartments()
    {
        $this->departments = Department::all();
    }

    public function save()
    {
        $this->validate();
        Department::create($this->createForm);
        $this->reset('createForm');
        $this->getDepartments();
        $this->emit('saved');
    }

    public function edit(Department $department)
    {
        $this->resetValidation();
        $this->department = $department;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $department->name;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required|unique:departments,name,' . $this->department->id
        ]);

        $this->department->update($this->editForm);
        $this->reset('editForm');
        $this->getDepartments();
    }

    public function delete(Department $department)
    {
        $department->delete();
        $this->getDepartments();
    }

    public function render()
    {
        return view('livewire.admin.department-component')->layout('layouts.admin');
    }
}
