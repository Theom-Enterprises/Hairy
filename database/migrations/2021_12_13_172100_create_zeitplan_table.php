<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZeitplanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeitplan', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->time('start_arbeitszeit');
            $table->time('ende_arbeitszeit');
            $table->index('angestellter_friseurkuerzel');

            $table->foreign('angestellter_friseurkuerzel')->references('friseurkuerzel')->on('angestellter')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeitplan');
    }
}

