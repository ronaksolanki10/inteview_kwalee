<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvtarController;
use App\Http\Controllers\ItemController;
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

Route::get('items', [ItemController::class, 'get']);
Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('avtar/current', [AvtarController::class, 'currentAvtar']);
    Route::post('item/buy', [AvtarController::class, 'buyItem']);
    Route::post('dressup', [AvtarController::class, 'dressUp']);
});