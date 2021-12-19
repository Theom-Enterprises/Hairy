<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriseursalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * $table->string('bezeichnung');
     * $table->string('email');
     * $table->string('telefonnummer');
     * $table->string('straße');
     * $table->string('hausnummer');
     * $table->string('stiege');
     * $table->string('tuernummer');
     * $table->string('plz');
     * $table->string('ort');
     *
     * @return void
     */
    public function run()
    {
        DB::table('friseursalon')->insert([
            'bezeichnung' => 'Friseursalon HAIRY',
            'email' => 'support@hairy.com',
            'telefonnummer' => '+4312345678',
            'straße' => 'Rennweg',
            'hausnummer' => '98B',
            'stiege' => '-',
            'tuernummer' => '-',
            'plz' => '1030',
            'ort' => 'Wien',
        ]);
    }
}
