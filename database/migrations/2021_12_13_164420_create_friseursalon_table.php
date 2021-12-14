<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriseursalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friseursalon', function (Blueprint $table) {
            $table->id();
            $table->string('bezeichnung');
            $table->string('email');
            $table->string('telefonnummer');
            $table->string('straße');
            $table->string('hausnummer');
            $table->string('stiege');
            $table->string('tuernummer');
            $table->string('plz');
            $table->string('ort');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friseursalon');
    }
}

