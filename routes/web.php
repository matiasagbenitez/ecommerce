<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShoppingCart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

// Categorías
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Productos
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('search', SearchController::class)->name('search.results');

// Carrito de compras
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

// Órdenes
Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');
Route::get('orders/{order}', [OrderController::class, 'show'])->middleware('auth')->name('orders.show');
Route::get('orders/{order}/payment', PaymentOrder::class)->middleware('auth')->name('orders.payment');
Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->middleware('auth')->name('orders.pay');



Route::post('webhooks', WebhooksController::class);
