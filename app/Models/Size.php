<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // --------------------------- RELATIONSHIPS ---------------------------
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
        // return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }
}
