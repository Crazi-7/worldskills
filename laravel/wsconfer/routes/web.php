<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizersController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [OrganizersController::class, 'index']);
Route::post('/', [LoginController::class, 'login']);



//logged in routes

Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/event/{id}', [EventsController::class, 'show']);

Route::get('/events/create', [EventsController::class, 'newEvent']);
Route::post('/events/create', [EventsController::class, 'create'])->name('createEvent');


Route::resource('test', TestController::class)->only(['create']);