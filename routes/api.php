<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\MarqueController;
use App\Http\Controllers\Api\ModeleController;
use App\Http\Controllers\Api\MotoController;
use App\Http\Controllers\Api\DashboardController;

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


Route::ApiResource('stock', StockController::class);
Route::ApiResource('marque', MarqueController::class);
Route::ApiResource('model', ModeleController::class);
Route::ApiResource('Moto' , MotoController::class);



Route::get('dashboard/todaySellPrice', [DashboardController::class, 'getTodaySellPrice']);
Route::get('dashboard/todayMotoNumber', [DashboardController::class, 'getTodayMotoNumber']);















Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
