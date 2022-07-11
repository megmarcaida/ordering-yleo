<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EnrollmentController;

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

//complete and update status 
Route::get('/complete-form/{id}/{ec}', [OrdersController::class, 'completeForm'])->name('completeForm');
Route::get('/complete-pickup-form/{id}', [OrdersController::class, 'completePickupForm'])->name('completePickupForm');
Route::get('/update-status/{id}', [OrdersController::class, 'updateStatus'])->name('updateStatus');
Route::get('/update-status-pickup/{id}', [OrdersController::class, 'updateStatusPickup'])->name('updateStatusPickup');
Route::get('/complete-enrollment/{id}/{ec}', [EnrollmentController::class, 'completeEnrollment'])->name('completeEnrollment');
Route::get('/update-status-enrollment/{id}', [EnrollmentController::class, 'updateStatusEnrollment'])->name('updateStatusEnrollment');

//forms
Route::get('/order-form', [OrdersController::class, 'orderForm'])->name('orderForm');
Route::get('/pick-up-form', [OrdersController::class, 'pickUpForm'])->name('pickUpForm');
Route::post('/order-form', [OrdersController::class, 'orderForm'])->name('orderForm');
Route::post('/pick-up-form', [OrdersController::class, 'pickUpForm'])->name('pickUpForm');
Route::get('/autocomplete', [ProductsController::class, 'autoComplete'])->name('autocomplete');
Route::get('/get-product-by-name', [ProductsController::class, 'getProductByName'])->name('get-product-by-name');
Route::get('/enrollment-form', [EnrollmentController::class, 'enrollmentForm'])->name('enrollmentForm');
Route::post('/enrollment-form', [EnrollmentController::class, 'enrollmentForm'])->name('enrollmentForm');
Route::get('/get-cities', [EnrollmentController::class, 'getCities'])->name('getCities');
Route::get('/get-zipcode', [EnrollmentController::class, 'getZipcode'])->name('getZipcode');

Route::get('/autocomplete-enrollment', [EnrollmentController::class, 'autoComplete'])->name('autoComplete');


//admin
Route::get('/dashboard', [OrdersController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/orders', [OrdersController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/pickup-orders', [OrdersController::class, 'indexPickUp'])->middleware(['auth'])->name('pickup-orders');
Route::get('/products', [ProductsController::class, 'productsList'])->middleware(['auth'])->name('products');
Route::get('/product-info/{id}', [ProductsController::class, 'productInfo'])->middleware(['auth'])->name('product-info');
Route::post('/product-info/{id}', [ProductsController::class, 'productInfo'])->middleware(['auth'])->name('product-info');
Route::get('/add-product', [ProductsController::class, 'addProduct'])->middleware(['auth'])->name('add-product');
Route::post('/add-product', [ProductsController::class, 'addProduct'])->middleware(['auth'])->name('add-product');
Route::get('/delete-product', [ProductsController::class, 'deleteProduct'])->middleware(['auth'])->name('delete-product');
Route::get('/enrollments', [EnrollmentController::class, 'enrollmentsList'])->middleware(['auth'])->name('enrollments');
Route::get('/delete-enrollments', [EnrollmentController::class, 'deleteUser'])->middleware(['auth'])->name('delete-enrollments');



require __DIR__.'/auth.php';
