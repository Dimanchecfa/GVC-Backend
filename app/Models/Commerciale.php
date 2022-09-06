<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerciale extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'numero',
        'pseudo',
        'logo',
    ];

    public function getRouteKeyName()
    {
        return 'pseudo';
    }
}
