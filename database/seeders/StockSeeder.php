<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stock = array(
            [   'numero' => 'STOCK-1237',
                'nom_fournisseur' => 'Honda',
                'numero_fournisseur' => 'CBR',
                'nombre_moto' => '10',
            ], 
            [
                'numero' => 'STOCK-1240',
                'nom_fournisseur' => 'Yamaha',
                'numero_fournisseur' => 'R1',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/03',
                'nom_fournisseur' => 'Suzuki',
                'numero_fournisseur' => 'GSX-R',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/04',
                'nom_fournisseur' => 'Kawasaki',
                'numero_fournisseur' => 'Ninja',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/05',
                'nom_fournisseur' => 'BMW',
                'numero_fournisseur' => 'S1000RR',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/06',
                'nom_fournisseur' => 'Ducati',
                'numero_fournisseur' => 'Panigale',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/07',
                'nom_fournisseur' => 'Aprilia',
                'numero_fournisseur' => 'RSV4',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/08',
                'nom_fournisseur' => 'Triumph',
                'numero_fournisseur' => 'Speed Triple',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/09',
                'nom_fournisseur' => 'KTM',
                'numero_fournisseur' => 'RC8',
                'nombre_moto' => '10',
            ],
            [
                'numero' => 'STOCK-2022-01-01/10',
                'nom_fournisseur' => 'MV Agusta',
                'numero_fournisseur' => 'F4',
                'nombre_moto' => '10',
            ]  ,
            [
                'numero' => 'STOCK-2022-01-01/11',
                'nom_fournisseur' => 'Harley-Davidson',
                'numero_fournisseur' => 'Street 750',
                'nombre_moto' => '10',
            ]  ,
           
        

       
        );
        foreach ($stock as $value) {
            Stock::create($value);
        }

    }
}
