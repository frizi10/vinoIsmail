<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteilles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('pays'); 
            $table->string('region'); 
            $table->string('couleur'); 
            $table->string('format'); 
            $table->decimal('prix'); 
            $table->string('srcImage'); 
            $table->string('srcsetImage'); 
            $table->string('producteur'); 
            $table->unsignedSmallInteger('millesime'); 
            $table->string('cepage'); 
            $table->string('tauxSucre'); 
            $table->string('designation'); 
            $table->string('degre'); 
            $table->string('agentPromotion'); 
            $table->string('produitQuebec'); 
            $table->string('type'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouteilles');
    }
}
