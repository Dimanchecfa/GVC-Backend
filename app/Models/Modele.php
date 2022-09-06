<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom',
        'marque_nom',
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function marque()
    {
        return $this->belongsTo(Marque::class , 'marque_nom');
    }
    
}

