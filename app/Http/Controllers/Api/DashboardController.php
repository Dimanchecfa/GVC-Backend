<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function getTodaySellPrice()
    {
        $today = date('Y-m-d');
        $todaySell= Vente::whereDate('created_at', $today)->get();
        $todaySellPrice = sum($todaySell->prix_vente);
        return response()->json($todaySellPrice);
    }

    public function getTodayMotoNumber()
    {
        $today = date('Y-m-d');
        $todaySell= Vente::whereDate('created_at', $today)->get();
        $todayMotoNumber = count($todaySell);
        return response()->json($todayMotoNumber);
    }

    public function getSellMotoByDate($date) {
        $todaySell= Vente::whereDate('created_at', $date)->get();
        $todayMotoNumber = count($todaySell);
        return response()->json($todaySell);
    }



}
