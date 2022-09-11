<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commerciale;
use App\Http\Controllers\Api\BaseController;
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
        if($validate->fails()) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
        }
        try {
          $input = $request->all();
          
              $commerciale = Commerciale::create($input);
                return $this->sendResponse($commerciale, 'Commerciale créée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $commerciale = Commerciale::find($id);
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
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'numero' => 'required',
             'pseudo' => 'required',
             'logo' => 'required',
         ]);
         if($validate->fails()) {
             return $this->sendError('Veuillez remplir tous les champs', $validate->errors() , 400);
         }
         try {
                $input = $request->all();
                $commerciale = Commerciale::find($id);
                // $input['logo'] = $request->file('logo')->store('public/logo');
                $commerciale->update($input);
             return $this->sendResponse($commerciale, 'Commerciale modifiée avec succès');
         } catch (\Throwable $th) {
             return $this->sendError('Une erreur est survenue', $th->getMessage());
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $commerciale = Commerciale::find($id);
            $commerciale->delete();
            return $this->sendResponse($commerciale, 'Commerciale supprimée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
        }
    }
  
}
