<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LoginController;
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
Route::get('/place-order', [OrdersController::class, 'place_order'])->name('place.order');
Route::post('/orders/store', [OrdersController::class, 'store'])->name('order.store');
Route::get('/orders', [OrdersController::class, 'index'])->middleware(['auth'])->name('orders');
Route::get('/order/{id}', [OrdersController::class, 'show']);
Route::put('/order/{id}', [OrdersController::class, 'update']);
Route::get('/historic', [OrdersController::class, 'history'])->name('historic');;
Route::get('/tax', [OrdersController::class, 'tax'])->name('taxfee');;