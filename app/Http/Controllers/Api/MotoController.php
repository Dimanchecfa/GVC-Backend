<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotoController extends Controller
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
            return response()->json([
                'message' => 'Liste des motos',
                'motos' => $motos
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
            'numero_serie' => 'required',
            'couleur' => 'required',
            'modele' => 'required',
            'marque' => 'required',
        ]);
        
        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }

      try{
        $lastStock = Stock::orderBy('created_at', 'desc')->first();
        $input = $request->all();
        $input['numero_stock'] = $lastStock->numero_stock;
        $moto = Moto::create($input);
        return response()->json([
            'message' => 'Moto ajoutée avec succès',
            'moto' => $moto
        ], 200);
      }

    catch(\Exception $e) {
        return response()->json([
            'message' => 'Une erreur est survenue',
            'error' => $e->getMessage()
        ], 500);
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
            return response()->json([
                'message' => 'Moto trouvée avec succès',
                'moto' => $moto
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Moto non trouvée',
                'error' => $th->getMessage()
            ], 404);
        }
    
    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        try{
            $moto = Moto::where('numero_serie', $numero_serie)->first();
            $moto->update($request->all());
            return response()->json([
                'message' => 'Moto mise à jour avec succès',
                'moto' => $moto
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Moto non trouvée',
                'error' => $th->getMessage()
            ], 404);
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

    public function getMotoByStock($numero_stock)
    {
        try {
            $motos = Moto::where('numero_stock', $numero_stock)->get();
            return response()->json([
                'message' => 'Liste des motos du stock '.$numero_stock,
                'motos' => $motos
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function getMotoByMarque($marque)
    {
        try {
            $motos = Moto::where('marque', $marque)->get();
            return response()->json([
                'message' => 'Liste des motos '. $marque,
                'motos' => $motos
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }
     
    public function getMotoByStatut($statut)
    {
        try {
            $motos = Moto::where('statut', $statut)->get();
            return response()->json([
                'message' => 'Liste des motos '. $statut,
                'motos' => $motos
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    
}
