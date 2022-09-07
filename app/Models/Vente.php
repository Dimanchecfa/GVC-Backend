<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
      
        'nom_client',
        'numero_client',
        'adresse_client',
        'identifiant_client',
        'numero_serie',
        'pseudo_commerciale',
        'marque',
        'modele',
        'couleur',
        'prix_vente',
        'montant_verse',
        'montant_restant',
        'statut',
        'date_versement',
        'numero_facture',
        


    ];

    public function moto()
    {
        return $this->belongsTo(Moto::class , 'numero_serie' );
    }
    public function commerciale()
    {
        return $this->belongsTo(Commerciale::class , 'pseudo' );
    }
    public function marque()
    {
        return $this->belongsTo(Marque::class , 'marque' );
    }
    public function modele()
    {
        return $this->belongsTo(Modele::class , 'modele' );
    }
}
