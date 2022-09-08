<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Moto ;
use App\Models\Commerciale ;

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


    
}
    

