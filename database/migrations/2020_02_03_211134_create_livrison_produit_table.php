<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrisonProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrison_produit', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('livrison_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->integer('quntite');
            $table->decimal('prix',8,2);
            $table->foreign('livrison_id')->references('id')->on('livrisons');
            $table->foreign('produit_id')->references('id')->on('produits');
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
        Schema::dropIfExists('livrison_produit');
    }
}
