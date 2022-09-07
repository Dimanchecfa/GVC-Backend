<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modele;

class ModeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modele = array(
            [
                'nom' => 'CBR',
                'marque_nom' => 'Honda',
            ],
            [
                'nom' => 'R1',
                'marque_nom' => 'Yamaha',
            ],
            [
                'nom' => 'GSX-R',
                'marque_nom' => 'Suzuki',
            ],
            [
                'nom' => 'Ninja',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'S1000RR',
                'marque_nom' => 'BMW',
            ],
            [
                'nom' => 'Panigale',
                'marque_nom' => 'Ducati',
            ],
            [
                'nom' => 'RSV4',
                'marque_nom' => 'Aprilia',
            ],
            [
                'nom' => 'ZX-10R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-6R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-14R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-25R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-30R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-40R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-50R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-60R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-70R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-80R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-90R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-100R',
                'marque_nom' => 'Kawasaki',
            ],
            [
                'nom' => 'ZX-110R',
                'marque_nom' => 'Kawasaki'
            ]
            );
        foreach ($modele as $key => $value) {
            Modele::create($value);
        }
    }
}
