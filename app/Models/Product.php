<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // --------------------------- RELATIONSHIPS ---------------------------
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
        // return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }

}
