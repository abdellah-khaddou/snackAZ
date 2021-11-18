<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrisons', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('fournisseur_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('livrisons');
    }
}
