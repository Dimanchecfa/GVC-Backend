<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Vente;
use App\Models\Modele;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    
    public function getTodaySellPrice()
    {
        $today = date('Y-m-d');
        $todaySell= Vente::whereDate('created_at', $today)->get();
        $todaySellPrice = 0;
        foreach($todaySell as $sell) {
            $todaySellPrice += $sell->montant_verse;
        }
        
        return $this->sendResponse($todaySellPrice, 'Montant total des ventes du jour');
    }

    public function getTodayMotoNumber()
    {
        $today = date('Y-m-d');
        $todaySell= Vente::whereDate('created_at', $today)->get();
        $todayMotoNumber = count($todaySell);
        return $this->sendResponse($todayMotoNumber, 'Nombre total des motos vendues du jour');
    }

 

   



}
