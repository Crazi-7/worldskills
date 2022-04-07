<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/events',[EventsController::class, 'showAllEvents']);
Route::get('v1/organizers/{oslug}/events/{eslug}',[EventsController::class, 'eventDetail']);

Route::post('v1/login',[LoginController::class, 'alogin']);

// Route::get('aaaaaaaaaaaa',[LoginController::class, 'whyisthishappening'])->name('fail');

Route::middleware(['auth:api'])->group(function () {
    Route::post('v1/logout',[LoginController::class, 'alogout']);
});
