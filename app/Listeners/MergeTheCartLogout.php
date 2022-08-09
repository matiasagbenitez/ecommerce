<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergeTheCartLogout
{
    public function __construct()
    {
        //
    }

    public function handle(Logout $event)
    {
        // Eliminar registro previo (cuando exista)
        Cart::erase(auth()->user()->id);

        // Nuevo registro
        Cart::store(auth()->user()->id);
    }
}
