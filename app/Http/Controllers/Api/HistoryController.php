<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vente;
use BaseController;
use Illuminate\Http\Request;

class HistoryController extends BaseController
{
    
    public function getSellMotoByDate($date) {
        $motos = Vente::whereDate('created_at', $date)->get();
        return $this->sendResponse($motos, 'Liste des motos vendues le '.$date);
    }

    public function getSellMotoByLastWeek () {
        $today = date('Y-m-d');
        $week = date('Y-m-d', strtotime('-7 days'));
        $motos = Vente::whereBetween('created_at', [$week, $today])->get();
        return $this->sendResponse($motos, 'Liste des motos vendues la semaine dernière');
    }

    public function getSellMotoByLastMonth () {
        $today = date('Y-m-d');
        $month = date('Y-m-d', strtotime('-30 days'));
        $motos = Vente::whereBetween('created_at', [$month, $today])->get();
        return $this->sendResponse($motos, 'Liste des motos vendues le mois dernier');
    }
}
