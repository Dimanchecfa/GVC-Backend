<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class HistoryController extends BaseController
{

    public function getSellByDate($date) {
        $motos = Vente::whereDate('created_at', $date)->get();
        return $this->sendResponse($motos, 'Liste des motos vendues le '.$date);
    }
    public function getSellMotoNumberByDate($date) {
        $motos = Vente::whereDate('created_at', $date)->get();
        $motoNumber = count($motos);
        return $this->sendResponse($motoNumber, 'Nombre des motos vendues le '.$date);
            
    }


    public function getLastMonthSell () {
       $currentMonth = date('m');
       $lastMonth = $currentMonth - 1;
       $lastMonthSell = Vente::whereMonth('created_at', $lastMonth)->get();
      return $this->sendResponse($lastMonthSell, 'Liste des motos vendues le mois dernier');

    }
    public function getLastMonthSellPrice () {
        $currentMonth = date('m');
        $lastMonth = $currentMonth - 1;
        $lastMonthSell = Vente::whereMonth('created_at', $lastMonth)->get();
        $lastMonthSellPrice = 0;
        foreach($lastMonthSell as $sell) {
            $lastMonthSellPrice += $sell->montant_verse;
        }
        return $this->sendResponse($lastMonthSellPrice, 'Montant total des ventes du mois dernier');
    }

    public function getLastMonthSellMotoNumber () {
        $currentMonth = date('m');
        $lastMonth = $currentMonth - 1;
        $lastMonthSell = Vente::whereMonth('created_at', $lastMonth)->get();
        $lastMonthMotoNumber = count($lastMonthSell);
        return $this->sendResponse($lastMonthMotoNumber, 'Nombre total des motos vendues du mois dernier');
    }
   
    public function getSellPricebyDate($date) {
        $motos = Vente::whereDate('created_at', $date)->get();
        $total = 0;
        foreach($motos as $moto) {
            $total += $moto->montant_verse;
        }
        return $this->sendResponse($total, 'Montant total des ventes du '.$date);
    }

    public function getSellNumberbyDate($date) {
        $motos = Vente::whereDate('created_at', $date)->get();
        $total = count($motos);
        return $this->sendResponse($total, 'Nombre total des motos vendues du '.$date);
    }

    public function getCurrentMonthSell () {
        $currentMonth = date('m');
        $currentMonthSell = Vente::whereMonth('created_at', $currentMonth)->get();
        return $this->sendResponse($currentMonthSell, 'Liste des motos vendues ce mois-ci');
    }

    public function getCurrentMonthSellPrice () {
        $currentMonth = date('m');
        $currentMonthSell = Vente::whereMonth('created_at', $currentMonth)->get();
        $currentMonthSellPrice = 0;
        foreach($currentMonthSell as $sell) {
            $currentMonthSellPrice += $sell->montant_verse;
        }
        return $this->sendResponse($currentMonthSellPrice, 'Montant total des ventes ce mois-ci');
    }
    public function getCurrentMonthSellMotoNumber () {
        $currentMonth = date('m');
        $currentMonthSell = Vente::whereMonth('created_at', $currentMonth)->get();
        $currentMonthMotoNumber = count($currentMonthSell);
        return $this->sendResponse($currentMonthMotoNumber, 'Nombre total des motos vendues ce mois-ci');
    }
}
