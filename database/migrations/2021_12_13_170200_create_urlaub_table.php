<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlaubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlaub', function (Blueprint $table) {
            $table->id();
            $table->date('datum_von');
            $table->date('datum_bis');
            $table->bigInteger('angestellter_id')->index();

            $table->foreign('angestellter_id')->references('id')->on('angestellter')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urlaub');
    }
}

