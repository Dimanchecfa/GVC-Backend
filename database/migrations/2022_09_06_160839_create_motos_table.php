<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->id();       
             $table->string('numero_serie')->unique();
             $table->string('marque');
            $table->string('modele');
            $table->enum ('statut', ['en stock', 'vendue', ])->default('en stock');
            $table->foreign('marque')->references('nom')->on('marques');
           $table->foreign('modele')->references('nom')->on('modeles');
            $table->string('couleur'); 

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
        Schema::dropIfExists('motos');
    }
}
