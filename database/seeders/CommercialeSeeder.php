<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commerciale;

class CommercialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commerciale = array(
            [
            'pseudo'=> 'EBIZAF',
            'nom' => 'BIKIENGA Zackaria',
            'numero' => '0022999999999',
            'logo' => 'logo.png',
            ],
            [
            'pseudo'=> 'EKIENGA',
            'nom' => 'BIKIENGA ',
            'numero' => '0022999999999',
            'logo' => 'logo.png',
            ],
            
        
        );
        foreach ($commerciale as $key => $value) {
            Commerciale::create($value);
       }


        }
    }