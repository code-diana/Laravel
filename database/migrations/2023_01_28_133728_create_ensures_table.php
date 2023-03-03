<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_insurances');
            $table->unsignedBigInteger('id_race');
            $table->integer('price');

            //Foreign keys
            $table->foreign('id_insurances')->references('id')->on('insurances');

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
        Schema::dropIfExists('ensures');
    }
}