<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()) {
            $pendientes = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
            if ($pendientes) {
                $mensaje = "You have $pendientes pending orders! <a class='font-bold' href='" . route('orders.index') . "?status=1'>Go pay</a>";
                session()->flash('flash.banner', $mensaje);
            }
        }

        $categories = Category::all();

        return view('welcome', compact('categories'));
    }
}
