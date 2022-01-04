<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Order;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [UserController::class, 'registration'])->name('register');
Route::post('/register', [UserController::class, 'addUser']);

Route::get('/order/{id}', [OrdersController::class, 'show'])->middleware(['auth']);
Route::put('/order/{id}', [OrdersController::class, 'update'])->middleware(['auth']);

Route::middleware(['auth' , 'isEmployee'])->group(function () {
   
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/tax', [OrdersController::class, 'tax'])->name('taxfee');
    Route::post('/tax', [OrdersController::class, 'newTax']);    

});

Route::middleware(['auth' , 'isCustomer'])->group(function () {
   
    Route::get('/historic', [OrdersController::class, 'history'])->name('historic');
    Route::get('/place-order', [OrdersController::class, 'place_order'])->name('place.order');
    Route::post('/orders/store', [OrdersController::class, 'store'])->name('order.store');

});