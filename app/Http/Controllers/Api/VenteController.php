<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Moto;
//validator
use Illuminate\Support\Facades\Validator;

class VenteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ventes = Vente::all();
            return $this->sendResponse(
                $ventes,
                'Liste des ventes récupérées avec succès'
            );
        } catch (\Throwable $th) {
            return $this->sendError(
                'Une erreur est survenue',
                $th->getMessage()
            );
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
            'nom_client' => 'required|string|max:255',
            'numero_client' => 'required|string|max:255',
            'adresse_client' => 'required|string|max:255',
            'identifiant_client' => 'required|string|max:255',
            'pseudo_commerciale' => 'required|string|max:255',
            'numero_serie' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'prix_vente' => 'required|string|max:255',
            'montant_verse' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return $this->sendError(
                'Veuillez remplir tous les champs',
                $validate->errors(),
                400
            );
        }

        $input = $request->all();
        $numero = Moto::where('numero_serie', $input['numero_serie'])->first();
        if ($numero) {
            if ($numero->statut == 'vendue') {
                return $this->sendError(
                    'Cette moto a déjà été vendue',
                    $validate->errors(),
                    400
                );
            }
            try {
                if (Vente::all()->count() < 1) {
                    $facture = 'FAC-0001';
                } else {
                    $lastFacture = Vente::orderBy('id', 'desc')->first();
                    $facture = 'FAC-' . '000' . ($lastFacture->id + 1);
                }
                $input['numero_facture'] = $facture;

                $vente = Vente::create($input);
                $moto = Moto::where(
                    'numero_serie',
                    $request->numero_serie
                )->first();
                $moto->statut = 'vendue';
                $moto->save();
                return $this->sendResponse($vente, 'Vente ajoutée avec succès');
            } catch (\Throwable $th) {
                return $this->sendError(
                    'Une erreur est survenue',
                    $th->getMessage()
                );
            }
        } else {
            return $this->sendError(
                'Cette moto n\'existe pas',
                $validate->errors(),
                400
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vente = Vente::find($id);
            if (is_null($vente)) {
                return $this->sendError(
                    'Vente non trouvée',
                    'Vente non trouvée'
                );
            }
            return $this->sendResponse($vente, 'Vente récupérée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError(
                'Une erreur est survenue',
                $th->getMessage()
            );
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
        $validate = Validator::make($request->all(), [
            'nom_client' => 'required|string|max:255',
            'numero_client' => 'required|string|max:255',
            'adresse_client' => 'required|string|max:255',
            'identifiant_client' => 'required|string|max:255',
            'pseudo_commerciale' => 'required|string|max:255',
            'numero_serie' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'prix_vente' => 'required|string|max:255',
            'montant_verse' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);
        if ($validate->fails()) {
            return $this->sendError(
                'Veuillez remplir tous les champs',
                $validate->errors(),
                400
            );
        }
        try {
            $vente = Vente::find($id);
            if (is_null($vente)) {
                return $this->sendError(
                    'Vente non trouvée',
                    'Vente non trouvée'
                );
            }
            $vente->update($request->all());
            return $this->sendResponse($vente, 'Vente mise à jour avec succès');
        } catch (\Throwable $th) {
            return $this->sendError(
                'Une erreur est survenue',
                $th->getMessage()
            );
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
            $vente = Vente::find($id);
            if (is_null($vente)) {
                return $this->sendError(
                    'Vente non trouvée',
                    'Vente non trouvée'
                );
            }
            $moto = Moto::where('numero_serie', $vente->numero_serie)->first();
            $moto->statut = 'en_stock';
            $moto->save();
            $vente->delete();
            return $this->sendResponse($vente, 'Vente supprimée avec succès');
        } catch (\Throwable $th) {
            return $this->sendError(
                'Une erreur est survenue',
                $th->getMessage()
            );
        }
    }
}
