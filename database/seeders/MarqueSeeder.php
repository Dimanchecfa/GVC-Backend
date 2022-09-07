<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marque;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marque = array(
            [
                'nom' => 'Honda',
            ],
            [
                'nom' => 'Yamaha',
            ],
            [
                'nom' => 'Suzuki',
            ],
            [
                'nom' => 'Kawasaki',
            ],
            [
                'nom' => 'BMW',
            ],
            [
                'nom' => 'Ducati',
            ],
            [
                'nom' => 'Aprilia',
            ],
        );
        foreach ($marque as $key => $value) {
            Marque::create($value);
        }
    }
}
