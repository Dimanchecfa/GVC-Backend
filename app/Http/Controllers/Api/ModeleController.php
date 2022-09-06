<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modele;

class ModeleController extends Controller
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
            return response()->json([
                'message' => 'Liste des modèles',
                'modeles' => $modeles
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
        $validate = $request->validate([
            'nom' => 'required',
            'marque_nom' => 'required',
        ]);

        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        try {
            $modele = Modele::create($request->all());
            return response()->json([
                'message' => 'Modèle ajouté avec succès',
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
     * Display the specified resource.
     *
     * @param  Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        try {
            return response()->json([
                'message' => 'Détails du modèle',
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'marque_nom' => 'required',
        ]);

        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        try {
            $modele->update($request->all());
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
        //
    }

    public function getModelesByMarque($marque_nom) {
        try {
            $modeles = Modele::where('marque_nom', $marque_nom)->get();
            return response()->json([
                'message' => 'Liste des modèles',
                'modeles' => $modeles
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }

 
}
