<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Moto;

class MotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $moto = array(
        [
            'numero_stock' => 'STOCK-1234',
            'numero_serie' => '12345678',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'en_stock',
        ],
        [
            'numero_stock' => 'STOCK-1235',
            'numero_serie' => '12345679',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'en_stock',
        ],
        [
            'numero_stock' => 'STOCK-1236',
            'numero_serie' => '12345680',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'vendue',
        ],
        [
            'numero_stock' => 'STOCK-1240',
            'numero_serie' => '12345681',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'en_stock',
        ],
        [
            'numero_stock' => 'STOCK-1237',
            'numero_serie' => '12345682',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'vendue',
        ],
        [
            'numero_stock' => 'STOCK-1237',
            'numero_serie' => '12345683',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'en_stock',
        ],
        [
            'numero_stock' => 'STOCK-1240',
            'numero_serie' => '12345684',
            'marque' => 'Honda',
            'modele' => 'CBR',
            'couleur' => 'Noir',
            'statut' => 'vendue',
        ],
       
        );
        foreach ($moto as $key => $value) {
            Moto::create($value);
        }

    }
}

