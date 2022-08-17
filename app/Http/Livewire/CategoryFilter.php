<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    public $category, $subcategoryC, $brandC;
    public $view = 'grid';

    use WithPagination;

    protected $queryString = ['subcategoryC', 'brandC'];

    public function cleanFilters()
    {
        $this->reset(['subcategoryC', 'brandC', 'page']);
    }

    public function updatedSubcategoryC()
    {
        $this->resetPage();
    }

    public function updatedBrandC()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $products = $this->category->products()->where('status', 2)->paginate(8);

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query) {
            $query->where('id', $this->category->id);
        });

        if ($this->subcategoryC) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query) {
                $query->where('name', $this->subcategoryC);
            });
        }

        if ($this->brandC) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query) {
                $query->where('name', $this->brandC);
            });
        }

        $products = $productsQuery->paginate(8);

        return view('livewire.category-filter', compact('products'));
    }
}
