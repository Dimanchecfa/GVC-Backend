<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarqueController extends Controller
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
            return response()->json([
                'message' => 'Liste des marques',
                'marques' => $marques
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
        ]);
        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        try {
            $marque = Marque::create($request->all());
            return response()->json([
                'message' => 'Marque ajoutée avec succès',
                'marque' => $marque
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
     * @param  Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        try {
            return response()->json([
                'message' => 'Marque',
                'marque' => $marque
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
        $validate = $request->validate([
            'nom' => 'required',
        ]);
        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        try {
            $marque->update($request->all());
            return response()->json([
                'message' => 'Marque modifiée avec succès',
                'marque' => $marque
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
            $marque = Marque::find($id);
            $marque->delete();
            return response()->json([
                'message' => 'Marque supprimée avec succès',
                'marque' => $marque
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }



}
