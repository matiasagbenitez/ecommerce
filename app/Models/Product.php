<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\ColorSize;
use App\Models\Subcategory;
use App\Models\ColorProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // ACCESORES
    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function(Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif($this->subcategory->color) {
            return ColorProduct::whereHAs('product', function(Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }

    }

    // --------------------------- RELATIONSHIPS ---------------------------
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

}
