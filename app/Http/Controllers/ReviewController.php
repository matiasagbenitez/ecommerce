<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|min:20',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $product->reviews()->create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'user_id' => auth()->user()->id
        ]);

        session()->flash('flash.banner', 'Your review was published succesfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
