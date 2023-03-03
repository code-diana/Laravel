<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('runner_id');
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('id_insurances')->nullable();
            $table->integer('dorsal')->nullable();
            $table->text('PayPal_email');
            $table->date('finish_time')->nullable();

            //Foreign Keys
            $table->foreign('id_insurances')->references('id')->on('insurances');
            $table->foreign('runner_id')->references('id')->on('runners');
            $table->foreign('race_id')->references('id')->on('races');

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
        Schema::dropIfExists('inscriptions');
    }
}