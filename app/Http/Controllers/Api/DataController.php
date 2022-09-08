<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Stock;
use App\Models\Moto;

class DataController extends BaseController
{
    
    

    public function StockListPaginate ($page) {
        try {
            $stocks = Stock::paginate(10, ['*'], 'page', $page);
            if(count($stocks) > 0) {
                return $this->sendResponse($stocks, 'Liste des stocks');
            } else {
                return $this->sendError('Aucun stock');
            }
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }



public function MotoListPaginate ($page , $numero_stock) {
    try {
        $motos = Moto::where('numero_stock', $numero_stock)->paginate(10, ['*'], 'page', $page);
        if(count($motos) > 0) {
            return $this->sendResponse($motos, 'Liste des motos');
        } else {
            return $this->sendError('Aucune moto');
        }
    } catch (\Throwable $th) {
        return $this->sendError('Une erreur est survenue', $th->getMessage());
    }

}

public function TodayVenteListPaginate ($page) {
    try {
        $today = date('Y-m-d');
        $ventes = Vente::where('created_at',$today)->paginate(10, ['*'], 'page', $page);
        if(count($ventes) > 0) {
            return $this->sendResponse($ventes, 'Liste des ventes');
        } else {
            return $this->sendError('Aucune vente');
        }
    } catch (\Throwable $th) {
        return $this->sendError('Une erreur est survenue', $th->getMessage());
    }
}
}
