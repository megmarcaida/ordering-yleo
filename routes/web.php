<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pick-up-form', [OrdersController::class, 'pickUpForm'])->name('pickUpForm');
Route::get('/order-form', [OrdersController::class, 'orderForm'])->name('orderForm');

Route::get('/complete-form/{id}', [OrdersController::class, 'completeForm'])->name('completeForm');
Route::get('/complete-pickup-form/{id}', [OrdersController::class, 'completePickupForm'])->name('completePickupForm');


Route::get('/update-status/{id}', [OrdersController::class, 'updateStatus'])->name('updateStatus');
Route::get('/update-status-pickup/{id}', [OrdersController::class, 'updateStatusPickup'])->name('updateStatusPickup');

Route::post('/order-form', [OrdersController::class, 'orderForm'])->name('orderForm');
Route::post('/pick-up-form', [OrdersController::class, 'pickUpForm'])->name('pickUpForm');

Route::get('/autocomplete', [ProductsController::class, 'autoComplete'])->name('autocomplete');
Route::get('/get-product-by-name', [ProductsController::class, 'getProductByName'])->name('get-product-by-name');

Route::get('/dashboard', [OrdersController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/orders', [OrdersController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/pickup-orders', [OrdersController::class, 'indexPickUp'])->middleware(['auth'])->name('pickup-orders');

require __DIR__.'/auth.php';
