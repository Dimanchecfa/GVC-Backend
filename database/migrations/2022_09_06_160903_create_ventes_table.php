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
            $table->string('numero_serie');
            $table->string('pseudo');
            $table->string('marque');
            $table->string('modele');
            $table->foreign('numero_serie')->references('numero_serie')->on('motos');
            // $table->foreign('pseudo')->references('pseudo')->on('commerciales')->unique();
            $table->foreign('marque')->references('nom')->on('marques')->unique();
            $table->foreign('modele')->references('nom')->on('modeles')->unique();
            $table->string('couleur');
            $table->string('date_vente');
            $table->string('prix_vente');
            $table->string('montant_verse');
            $table->string('montant_restant');
            $table->enum('statut', ['en cours', 'payé',])->default('payé');
            $table->date('date_versement');
            $table->string('numero_facture')->unique();
           


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
