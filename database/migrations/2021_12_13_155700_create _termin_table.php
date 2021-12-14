<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termin', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->time('von');
            $table->time('bis');
            $table->index('user_id');
            $table->index('angestellter_friseurkuerzel');
            $table->index('dienstleistung_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('angestellter_friseurkuerzel')->references('friseurkuerzel')->on('angestellter')->onDelete('cascade');
            $table->foreign('dienstleistung_id')->references('id')->on('dienstleistung')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termin');
    }
}

