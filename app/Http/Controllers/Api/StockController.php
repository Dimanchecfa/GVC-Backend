<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $stocks = Stock::all();
            return $this->sendResponse($stocks, 'Liste des stocks récupérés avec succès');
        }
        catch(\Throwable $th){
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
            'numero_serie' => 'required|string|max:255',

        ]); 

        if($validate->fails) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors(), 400);
        }
      try { 
        if(Stock::all()->count() < 1) {
            $stockNumber = 'STOCK-'.date('Y').'-'.date('m').'-'.date('d').'/'.'00';
        }
        $lastStock = Stock::orderBy('created_at', 'desc')->first();
        $stockNumber = 'STOCK-'.date('Y').'-'.date('m').'-'.date('d').'/'.($lastStock->id + 00);

        $input = $request->all();
        $input['numero_stock'] = $stockNumber;
        $stock = Stock::create($input);
        return $this->sendResponse($stock, 'Stock ajouté avec succès');
    }catch(\Throwable $th){
            return $this->sendError('Une erreur est survenue', $th->getMessage());
    }
        


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
            return $this->sendResponse($stock, 'Stock récupéré avec succès');
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue', $th->getMessage());
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
            'nom_fournisseur' => 'required',
            'numero_fournisseur' => 'required',
        ]);
        if($validate->fails) {
            return $this->sendError('Veuillez remplir tous les champs', $validate->errors(), 400);
        }
      try{
        $stock->update($request->all());
        return $this->sendResponse($stock, 'Stock modifié avec succès');
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
        //
    }
}
