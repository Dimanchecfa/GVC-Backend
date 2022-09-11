<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modele;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Validator;

class ModeleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $modeles = Modele::all();
            return $this -> sendResponse($modeles, 'Liste des modèles récupérés avec succès');
        } catch (\Throwable $th) {
            return  $this -> sendError('Une erreur est survenue', $th->getMessage());
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
            'nom' => 'required|string|max:255',
            'marque_nom' => 'required|string|max:255',
        ]);

        if($validate->fails()) {
            return $this -> sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
            $modele = Modele::create($request->all());
            return $this -> sendResponse( $modele ,'Modèle ajouté avec succès',);
        } catch (\Throwable $th) {
            return $this -> sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Modele  $modele $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $modele = Modele::find($id);
            if(is_null($modele)) {
                return $this -> sendError('Modèle non trouvé');
            }
            return $this -> sendResponse($modele, 'Modèle récupéré avec succès');
        } catch (\Throwable $th) {
            return $this -> sendError('Une erreur est survenue', $th->getMessage());
        }
    }
  
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'marque_nom' => 'required|string|max:255'
        ]);

        if($validate->fails()) {
            return $this -> sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
            $modele = Modele::find($id);
            if(is_null($modele)) {
                return $this -> sendError('Modèle non trouvé');
            }
            $modele->update($request->all());
            return $this -> sendResponse($modele, 'Modèle modifié avec succès');
            return response()->json([
                'message' => 'Modèle modifié avec succès',
                'modele' => $modele
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $modele = Modele::find($id);
            if(is_null($modele)) {
                return $this -> sendError('Modèle non trouvé');
            }
            $modele->delete();
            return $this -> sendResponse($modele, 'Modèle supprimé avec succès');
        } catch (\Throwable $th) {
            return $this -> sendError('Une erreur est survenue', $th->getMessage());
        }
    }

  

 
}
