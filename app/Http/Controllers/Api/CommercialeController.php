<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commerciale;
use BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommercialeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $commerciales = Commerciale::all();
           return $this->sendResponse($commerciales, 'Liste des commerciales récupérées avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
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
           'nom' => 'required',
           'numero' => 'required',
            'pseudo' => 'required',
            'logo' => 'required',
        ]);
        if($validate->fails) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
            $commerciale = Commerciale::create($request->all());
                return $this->sendResponse( $commerciale ,'Commerciale ajoutée avec succès',);
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commerciale  $commerciale
     * @return \Illuminate\Http\Response
     */
    public function show( Commerciale $commerciale)
    {
        try {
            return $this->sendResponse($commerciale, 'Commerciale récupérée avec succès');
        } catch (\Throwable $th) {
           return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commerciale  $commerciale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commerciale $commerciale)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'numero' => 'required',
             'pseudo' => 'required',
             'logo' => 'required',
         ]);
         if($validate->fails) {
             return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
         }
         try {
             $commerciale->update($request->all());
             return $this->sendResponse($commerciale, 'Commerciale modifiée avec succès');
         } catch (\Throwable $th) {
             return $this->sendError('Une erreur est survenue', $th->getMessage());
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commerciale  $commerciale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerciale $commerciale)
    {
        try {
            $commerciale->delete();
            return $this->sendResponse($commerciale, 'Commerciale supprimée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
  
}
