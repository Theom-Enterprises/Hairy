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
            $table->id();
            $table->string('friseurkuerzel');
            $table->string('vorname');
            $table->string('nachname');
            $table->string('email');
            $table->string('password');
            $table->boolean('ist_admin')->nullable();
            $table->date('erstelldatum');
            $table->bigInteger('friseursalon_id')->index();

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
