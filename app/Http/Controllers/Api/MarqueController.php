<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marque;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarqueController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $marques = Marque::all();
            return $this -> sendResponse($marques, 'Liste des marques récupérées avec succès');
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
            
        ]);


        if($validate->fails) {
            return $this -> sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
            $marque = Marque::create($request->all());
            return $this -> sendResponse( $marque ,'Marque ajoutée avec succès',);
        } catch (\Throwable $th) {
            return $this -> sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        try {
            $marque = Marque::find($id);
            if(is_null($marque)) {
                return $this -> sendError('Marque non trouvée');
            }
            return $this -> sendResponse($marque, 'Marque récupérée avec succès');
        } catch (\Throwable $th) {
            return $this -> sendError('Une erreur est survenue', $th->getMessage());
        }
    }
   
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            
        ]);
        if($validate->fails()) {
            return $this-> sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
            $marque = Marque::find($id);
            if(is_null($marque)) {
                return $this -> sendError('Marque non trouvée');
            }
            $marque->update($request->all());


                return $this->sendResponse($marque ,'Marque modifiée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
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
        $marque = Marque::find($id);
            $marque->delete();
            return $this->sendResponse($marque, 'Marque supprimée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }



}
