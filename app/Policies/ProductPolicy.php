<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function review(User $user, Product $product)
    {
        $orders = Order::where('user_id', $user->id)->select('content')->get()->map(function ($order) {
            return json_decode($order->content, true);
        });

        $products = $orders->collapse();

        if ($products->contains('id', $product->id)) {
            return true;
        } else {
            return false;
        }
    }
}