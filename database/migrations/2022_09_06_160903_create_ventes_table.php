<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom_client');
            $table->string('numero_client');
            $table->string('adresse_client');
            $table->string('identifiant_client');
            $table->string('pseudo_commerciale');
            $table->string('numero_serie');    
            $table->string('marque');
            $table->string('modele');
            $table->string('couleur');
            $table->string('prix_vente');
            $table->string('montant_verse');
            $table->string('montant_restant')->nullable();
            $table->enum('statut', ['en_cours', 'payé',])->default('payé');
            $table->date('date_versement')->nullable();
            $table->string('numero_facture')->unique()->nullable();
           


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventes');
    }
}
