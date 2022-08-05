<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // --------------------------- RELATIONSHIPS ---------------------------
    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function brands() {
        return $this->belongsToMany(Brand::class);
    }

    public function products() {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

}
