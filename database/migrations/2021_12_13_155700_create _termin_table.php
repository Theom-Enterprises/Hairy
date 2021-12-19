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
            $table->bigInteger('user_id')->index();
            $table->bigInteger('angestellter_id')->index();
            $table->bigInteger('angebot_id')->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('angestellter_id')->references('id')->on('angestellter')->onDelete('cascade');
            $table->foreign('angebot_id')->references('id')->on('angebot')->onDelete('cascade');


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

