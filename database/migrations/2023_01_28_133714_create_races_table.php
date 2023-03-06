<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->unique();
            $table->longText('description');
            $table->float('unevenness',4,2);//desnivel
            $table->longtext('image');
            $table->integer('number_participants');
            $table->integer('km');
            $table->datetime('date');
            $table->string('promotion');//link of the promotion poster
            $table->string('start');
            $table->boolean('state');//if it's activated or not
            $table->float('price',4,2);
            $table->float('sponsor_price',4,2)->nullable();
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
        Schema::dropIfExists('races');
    }
}
