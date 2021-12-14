<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngestellterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angestellter', function (Blueprint $table) {
            $table->id('friseurkuerzel');
            $table->string('vorname');
            $table->string('nachname');
            $table->string('email');
            $table->string('passwort');
            $table->boolean('ist_admin');
            $table->date('erstelldatum');
            $table->index('friseursalon_id');

            $table->foreign('friseursalon_id')->references('id')->on('friseursalon')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angestellter');
    }
}
