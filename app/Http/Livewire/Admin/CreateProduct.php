<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProduct extends Component
{
    public $categories, $category_id = '';
    public $subcategories = [], $subcategory_id = '';
    public $name, $slug;
    public $description;
    public $brands = [], $brand_id = '';
    public $price;
    public $quantity;

    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'brand_id' => 'required',
        'price' => 'required',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Propiedad computada
    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->subcategory_id);
    }

    public function save()
    {
        $rules = $this->rules;

        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->color) {
                $rules['quantity'] = 'required';
            }
        }

        $this->validate($rules);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->price = $this->price;

        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->color) {
                $product->quantity = $this->quantity;
            }
        }

        $product->save();
        session()->flash('flash.banner', 'Product created succesfully!');
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}
