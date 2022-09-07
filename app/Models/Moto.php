<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_stock',
        'numero_serie',
        'modele',
        'marque',
        'statut',
        'couleur',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class , 'numero_stock');
    }
    public function modele()
    {
        return $this->belongsTo(Modele::class , 'modele');
    }
    public function marque()
    {
        return $this->belongsTo(Marque::class , 'marque');
    }

    public function getRouteKeyName()
    {
        return 'numero_serie';
    }
}
