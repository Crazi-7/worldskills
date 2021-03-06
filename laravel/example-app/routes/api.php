<?php

use Illuminate\Http\Request;
use App\Staff;
use App\Http\Controllers\StaffController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/staff', 'StaffController@store');
Route::get('/staff', 'StaffController@index');

Route::post('/staff', [StaffController::class, 'store']);
