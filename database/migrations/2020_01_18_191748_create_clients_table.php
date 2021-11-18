<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone');
            $table->decimal('sold_argent',10,2)->default(0.00);
            $table->integer('sold_point')->default(0);
            $table->string('image')->default('avatar.png');
            $table->string('cin');
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
