<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_stock',
        'nom_fournisseur',
        'numero_fournisseur',
        'nombre_moto',
    ];

    public function getRouteKeyName()
    {
        return 'numero_stock';
    }
}
