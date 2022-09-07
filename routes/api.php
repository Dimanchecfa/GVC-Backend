<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\MarqueController;
use App\Http\Controllers\Api\ModeleController;
use App\Http\Controllers\Api\MotoController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\OtherFunctionController;
use App\Http\Controllers\Api\VenteController;
use App\Http\Controllers\Api\CommercialeController;

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
Route::ApiResource('moto' , MotoController::class);
Route::ApiResource('vente', VenteController::class);
Route::ApiResource('commerciale' , CommercialeController::class);

Route::get('dashboard/price', [DashboardController::class, 'getTodaySellPrice']);
Route::get('dashboard/moto', [DashboardController::class, 'getTodayMotoNumber']);

Route::get('history/{date}/sell' , [HistoryController::class, 'getSellByDate']);
Route::get('history/{date}/moto' , [HistoryController::class, 'getSellMotoNumberByDate']);
Route::get('history/lastmonth' , [HistoryController::class, 'getLastMonthSell']);
Route::get('history/lastmonth/price' , [HistoryController::class, 'getLastMonthSellPrice']);
Route::get('history/lastmonth/moto_number' , [HistoryController::class, 'getLastMonthSellMotoNumber']);
Route::get('history/{date}/price' , [HistoryController::class, 'getSellPriceByDate']);
Route::get('history/{date}/moto_number' , [HistoryController::class, 'getSellNumberByDate']);
Route::get('history/currentmonth/sell' , [HistoryController::class, 'getCurrentMonthSell']);
Route::get('history/currentmonth/price' , [HistoryController::class, 'getCurrentMonthSellPrice']);
Route::get('history/currentmonth/moto_number' , [HistoryController::class, 'getCurrentMonthSellMotoNumber']);




Route::get('moto/stock/{numero_stock}', [OtherFunctionController::class, 'getMotoByStock']);
Route::get('moto/marque/{marque}', [OtherFunctionController::class, 'getMotoByMarque']);
Route::get('moto/statut/{statut}', [OtherFunctionController::class, 'getMotoByStatut']);
Route::get('modele/marque/{marque}', [OtherFunctionController::class, 'getModeleByMarque']);
Route::get('commerciale/pseudo/{pseudo}', [OtherFunctionController::class, 'getCommercialeByPseudo']);















Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
