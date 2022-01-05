<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\GroupController;
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

Route::post('login', [UserController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function() 
{
    Route::post('staff', [StaffController::class, 'create']);
    Route::get('staff', [StaffController::class, 'retrieve']);
    Route::post('staff/{id}/access', [StaffController::class, 'giveAccess']);

    Route::post('points', [PointController::class, 'create']);
    Route::get('points', [PointController::class, 'show']);

    Route::post('groups', [GroupController::class, 'create']);
    Route::get('groups', [GroupController::class, 'show']);

    Route::post('groups/{group}/points', [GroupController::class, 'addPoint']); //another method
    Route::post('groups/{id}/staff', [GroupController::class, 'addStaff']);

    Route::post('access', [AccessController::class, 'hasPerms']);
    Route::get('logs', [AccessController::class, 'logs']);
});