<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Stock;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $motos = Moto::all();
            return $this->sendResponse($motos, 'Liste des motos récupérées avec succès');
        } catch (\Throwable $th) {
            return  $this->sendError('Une erreur est survenue', $th->getMessage());                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'numero_serie' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
        ]);
        
        if($validate->fails()) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }

      try{
        $lastStock = Stock::orderBy('created_at', 'desc')->first();
        $input = $request->all();
        $input['numero_stock'] = $lastStock->numero;
        $moto = Moto::create($input);
        $nombre = $lastStock->nombre_moto + 1;
        $lastStock->nombre_moto = $nombre;
        $lastStock->save();
        return $this->sendResponse($moto, 'Moto ajoutée avec succès');
      }

    catch(\Exception $e) {
        return $this->sendError('Une erreur est survenue', $e->getMessage());                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($numero_serie)
    {
        try {
            $moto = Moto::where('numero_serie', $numero_serie)->first();
            if(is_null($moto)){
                return $this->sendError('Moto non trouvée');
            }
            return $this->sendResponse($moto, 'Moto récupérée avec succès');

        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    
    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $numero_serie
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $numero_serie)
    
    {
        $validate = Validator::make( $request -> all(), [
            'numero_serie' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
        ]); 

        if($validate->fails()) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }

        try {
            $moto = Moto::where('numero_serie', $numero_serie)->first();
         if(is_null($moto)) {
             return $this->sendError('Moto non trouvée');
         }
            $moto->update($request->all());
            return $this->sendResponse($moto, 'Moto modifiée avec succès');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage()    );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $numero_serie
     * @return \Illuminate\Http\Response
     */
    public function destroy( $numero_serie)
    {
        try {
            $moto = Moto::where('numero_serie', $numero_serie)->first();
            if(is_null($moto)) {
                return $this->sendError('Moto non trouvée');
            }
            $moto->delete();
            return $this->sendResponse($moto, 'Moto supprimée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
   

    public function getMotoByStock($numero_stock)
    {
        try {
            $motos = Moto::where('numero_stock', $numero_stock)->get();
            return $this->sendResponse($motos, 'Motos trouvées avec succès');
        } catch (\Throwable $th) {
           return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    public function getMotoByMarque($marque)
    {
        try {
            $motos = Moto::where('marque', $marque)->get();
            return $this->sendResponse($motos, 'Liste des motos de la marque '.$marque);
        } catch (\Throwable $th) {
            return $this->senError('Une erreur est survenue', $th->getMessage(), 500);
        }
    }
     
    public function getMotoByStatut($statut)
    {
        try {
            $motos = Moto::where('statut', $statut)->get();
            return $this->sendResponse($motos, 'Liste des motos '.$statut);
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    
}
