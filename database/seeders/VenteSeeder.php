<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vente;

class VenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vente = array(
            [
             
                    'nom_client' => 'Moussa',
                    'numero_client' => '77 777 77 77',
                    'adresse_client' => 'Dakar',
                    'identifiant_client' => 'Moussa',
                    'numero_serie' => '12345683',
                    'pseudo_commerciale' => 'EBIZAF',
                    'marque' => 'Yamaha',
                    'modele' => 'YBR',
                    'couleur' => 'Noir',
                    'prix_vente' => '500000',
                    'montant_verse' => '500000',
                    'montant_restant' => '0',
                    'statut' => 'en_cours',
                    'date_versement' => '2021-01-01',
                    'numero_facture' => 'FACTURE-001',
            ],

            [
                
                    'nom_client' => 'Moussa',
                    'numero_client' => '77 777 77 77',
                    'adresse_client' => 'Dakar',
                    'identifiant_client' => 'Moussa',
                    'numero_serie' => '12345680',
                    'pseudo_commerciale' => 'EBIZAF',
                    'marque' => 'Yamaha',
                    'modele' => 'YBR',
                    'couleur' => 'Noir',
                    'prix_vente' => '500000',
                    'montant_verse' => '500000',
                    'montant_restant' => '0',
                    'statut' => 'en_cours',
                    'date_versement' => '2021-01-01',
                    'numero_facture' => 'FACTURE-002',
            ]
               ,
               [
                
                'nom_client' => 'Moussa',
                'numero_client' => '77 777 77 77',
                'adresse_client' => 'Dakar',
                'identifiant_client' => 'Moussa',
                'numero_serie' => '12345681',
                'pseudo_commerciale' => 'EBIZAF',
                'marque' => 'Yamaha',
                'modele' => 'YBR',
                'couleur' => 'Noir',
                'prix_vente' => '500000',
                'montant_verse' => '500000',
                'montant_restant' => '0',
                'statut' => 'en_cours',
                'date_versement' => '2021-01-01',
                'numero_facture' => 'FACTURE-002',
        ]
           

            );
            foreach ($vente as $key => $value) {
                Vente::create($value);
            }
    }
}
