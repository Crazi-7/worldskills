<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TicketsController;
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
Route::get('/event/{id}', [EventsController::class, 'show'])->name('showEvent');
Route::get('/event/{id}/edit', [EventsController::class, 'edit'])->name('editEvent');
Route::post('/event/{id}/edit', [EventsController::class, 'change']);
Route::get('/events/create', [EventsController::class, 'newEvent']);
Route::post('/events/create', [EventsController::class, 'create'])->name('createEvent');

Route::get('/event/{id}/report', [SessionsController::class, 'report'])->name('report');
Route::get('/event/{id}/ticket', [TicketsController::class, 'show'])->name('createTicket');
Route::post('/event/{id}/ticket', [TicketsController::class, 'create']);
Route::get('/event/{id}/session', [SessionsController::class, 'show'])->name('createSession');
Route::post('/event/{id}/session', [SessionsController::class, 'create']);
Route::get('/event/{id}/session/{eid}', [SessionsController::class, 'edit'])->name('editSession');
Route::post('/event/{id}/session/{eid}', [SessionsController::class, 'create']);
Route::get('/event/{id}/channel', [ChannelsController::class, 'show'])->name('createChannel');
Route::post('/event/{id}/channel', [ChannelsController::class, 'create']);
Route::get('/event/{id}/room', [RoomsController::class, 'show'])->name('createRoom');
Route::post('/event/{id}/room', [RoomsController::class, 'create']);






Route::resource('test', TestController::class)->only(['create']);