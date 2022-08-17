<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $brands, $categories, $rand;
    public $createForm = [
        'name' => null,
        'slug' => null,
        'icon' => null,
        'brands' => [],
        'image' => null
    ];

    protected $listeners = ['delete'];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:categories,slug',
        'createForm.icon' => 'required',
        'createForm.brands' => 'required',
        'createForm.image' => 'required|image|max:2048',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'name',
        'createForm.slug' => 'slug',
        'createForm.icon' => 'icon',
        'createForm.brands' => 'brands',
        'createForm.image' => 'image',
    ];

    public function mount()
    {
        $this->getBrands();
        $this->getCategories();
        $this->rand = rand();
    }

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        // Validamos los campos
        $this->validate();

        // Subimos la imagen
        $image = $this->createForm['image']->store('categories');

        // Creamos la categoría
        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'icon' => $this->createForm['icon'],
            'image' => $image,
        ]);

        // Relacionamos la categoría creada con las marcas seleccionadas
        $category->brands()->attach($this->createForm['brands']);

        // Reseteamos
        $this->reset('createForm');
        $this->rand = rand();
        $this->getCategories();
        $this->emit('saved');
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
