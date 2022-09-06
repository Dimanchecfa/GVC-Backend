<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommercialeController extends Controller
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
            return response()->json([
                'message' => 'Liste des commerciales',
                'commerciales' => $commerciales
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
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
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        try {
            $commerciale = Commerciale::create($request->all());
            return response()->json([
                'message' => 'Commerciale ajoutée avec succès',
                'commerciale' => $commerciale
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commerciale  $commerciale
     * @return \Illuminate\Http\Response
     */
    public function show( Commercial $commerciale)
    {
        try {
            return response()->json([
                'message' => 'Commerciale',
                'commerciale' => $commerciale
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
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
             return response()->json([
                 'message' => 'Veuillez remplir tous les champs',
                 'errors' => $validate->errors()
             ], 400);
         }
         try {
             $commerciale->update($request->all());
             return response()->json([
                 'message' => 'Commerciale modifiée avec succès',
                 'commerciale' => $commerciale
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
     * @param  \App\Models\Commerciale  $commerciale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerciale $commerciale)
    {
        try {
            $commerciale->delete();
            return response()->json([
                'message' => 'Commerciale supprimée avec succès',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }
  
}
