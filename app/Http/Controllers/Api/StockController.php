<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'numero_stock' => 'required',
            'nom_fournisseur' => 'required',
            'numero_fournisseur' => 'required',
        ]);
        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        if(Stock::all()->count() < 1) {
            $stockNumber = 'STOCK-'.date('Y').'-'.date('m').'-'.date('d').'/'.'00';
        }
        $lastStock = Stock::orderBy('created_at', 'desc')->first();
        $stockNumber = 'STOCK-'.date('Y').'-'.date('m').'-'.date('d').'-'.($lastStock->id + 00);

        $input = $request->all();
        $input['numero_stock'] = $stockNumber;
        $stock = Stock::create($input);
        return response()->json([
            'message' => 'Stock enregistré avec succès',
            'stock' => $stock
        ], 200);
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        try {
            $stock = Stock::find($stock);
            return response()->json([
                'message' => 'Stock trouvé avec succès',
                'stock' => $stock
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Stock introuvable',
                'error' => $th
            ], 404);
        }
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $validate = Validator::make($request->all(), [
            'numero_stock' => 'required',
            'nom_fournisseur' => 'required',
            'numero_fournisseur' => 'required',
        ]);
        if($validate->fails) {
            return response()->json([
                'message' => 'Veuillez remplir tous les champs',
                'errors' => $validate->errors()
            ], 400);
        }
        $stock = Stock::find($stock);
        $stock->update($request->all());

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
}
