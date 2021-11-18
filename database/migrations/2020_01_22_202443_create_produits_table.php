<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('desc');
            $table->string('image')->default('default.png');
            $table->decimal('qte',10,2);
            $table->decimal('min_qte',10,2);
            $table->decimal('prix',10,2);
            $table->smallInteger('list_de_vend')->default(0);
            $table->Integer('catagorie_id')->unsigned();
            $table->foreign('catagorie_id')->references('id')->on('catagories');
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
        //Schema::dropForeign('despatch_discrepancies_pick_detail_id_foreign');
        //Schema::dropColumn('catagorie_id');
        Schema::dropIfExists('produits');
    }
}
