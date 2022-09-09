<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Moto ;
use App\Models\Commerciale ;
use App\Models\Vente ;

class OtherFunctionController extends BaseController
{
    
    public function getMotoByStock($numero_stock)
    {
        try {
            $motos = Moto::where('numero_stock', $numero_stock)->get();
           if (count($motos) > 0) {
                return $this->sendResponse($motos, 'Motos du stock');
            } else {
                return $this->sendResponse($motos ,'Aucune moto dans ce stock');
            }
        } catch (\Throwable $th) {
           return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getMotoByMarque($marque)
    {
        try {
            $motos = Moto::where('marque', $marque)->get();
           if (count($motos) > 0) {
                return $this->sendResponse($motos, 'Motos de la marque');
            } else {
                return $this->sendError('Aucune moto de cette marque');
            }

        } catch (\Throwable $th) {
            return $this->senError('Une erreur est survenue', $th->getMessage(), 500);
        }
    }
     
    public function getMotoByStatut($statut)
    {
        try {
            $motos = Moto::where('statut', $statut)->get();

            if(count($motos) > 0) {
                return $this->sendResponse($motos, 'Motos du statut');
            } else {
                return $this->sendError('Aucune moto de ce statut');
            }
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
    public function getModeleByMarque($marque_nom) {
        try {
            $modeles = Modele::where('marque_nom', $marque_nom)->get();
            if(count($modeles) > 0) {
                return $this->sendResponse($modeles, 'Modèles de la marque');
            } else {
                return $this->sendError('Aucun modèle de cette marque');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getCommercialeByPseudo ($pseudo) {
        try {
            $commerciales = Commerciale::where('pseudo', $pseudo)->get();
            if(count($commerciales) > 0) {
                return $this->sendResponse($commerciales, 'Commerciales du pseudo');
            } else {
                return $this->sendError('Aucune commerciale de ce pseudo');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getVenteByNumeroSerie($numero_serie) {
        try{
            $vente = Vente::where('numero_serie', $numero_serie)->get();
            if(count($vente) > 0) {
                return $this->sendResponse($vente, 'Vente du numéro de série');
            } else {
                return $this->sendResponse($vente, 'Aucune vente de ce numéro de série');
            }
        }
        catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getAllSellStatutPayé () {
        try {
            $ventes = Vente::where('statut', 'payé')->get();
            if(count($ventes) > 0) {
                return $this->sendResponse($ventes, 'Ventes avec statut payé');
            } else {
                return $this->sendResponse($ventes, 'Aucune vente payée');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
    public function  getAllSellStatutNonPayé () {
        try {
            $ventes = Vente::where('statut', 'en_cours')->get();
            if(count($ventes) > 0) {
                return $this->sendResponse($ventes, 'Ventes avec statut non payé');
            } else {
                return $this->sendResponse($ventes, 'Aucune vente non payée');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getAllSellStatutPayéNumber () {
        try {
            $ventes = Vente::where('statut', 'payé')->get();
           $number = count($ventes);
            return $this->sendResponse($number, 'Nombre de ventes avec statut payé');
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
    public function  getAllSellStatutNonPayéNumber () {
        try {
            $ventes = Vente::where('statut', 'en_cours')->get();
            $number = count($ventes);
            return $this->sendResponse($number, 'Nombre de ventes avec statut non payé');
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getAllMotoEnStock () {
        try {
            $motos = Moto::where('statut', 'en_stock')->get();
            if(count($motos) > 0) {
                return $this->sendResponse($motos, 'Motos en stock');
            } else {
                return $this->sendResponse($motos, 'Aucune moto en stock');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
    public function getAllMotoVendue () {
        try {
            $motos = Moto::where('statut', 'vendue')->get();
            if(count($motos) > 0) {
                return $this->sendResponse($motos, 'Motos vendues');
            } else {
                return $this->sendResponse($motos, 'Aucune moto vendue');
            }
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
     
}
    

