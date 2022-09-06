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
        'couleur',
        'modele',
        'marque',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class , 'numero_stock');
    }

    public function getRouteKeyName()
    {
        return 'numero_serie';
    }
}
