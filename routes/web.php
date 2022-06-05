<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

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

Route::get('/pick-up-form', [OrdersController::class, 'pickUpForm'])->name('orders');
Route::get('/order-form', [OrdersController::class, 'orderForm'])->name('orders');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/orders', [OrdersController::class, 'index'])->middleware(['auth'])->name('orders');

require __DIR__.'/auth.php';
