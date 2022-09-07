<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Stock;
use BaseController;
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
        
        if($validate->fails) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }

      try{
        $lastStock = Stock::orderBy('created_at', 'desc')->first();
        $input = $request->all();
        $input['numero_stock'] = $lastStock->numero_stock;
        $moto = Moto::create($input);
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
            return $this->sendResponse($moto, 'Moto récupérée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    
    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Moto  $moto
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Moto $moto) 
    {
        $validate = Validator::make( $request -> all(), [
            'numero_serie' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
        ]); 

        if($validate->fails) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }

        try {
            $moto->update($request->all());
            return $this->sendResponse($moto, 'Moto mise à jour avec succès');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage()    );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Moto  $moto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moto $moto)
    {
        try {
            $moto->delete();
            return $this->sendResponse('Moto supprimée avec succès', 200);  
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage(),);
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
