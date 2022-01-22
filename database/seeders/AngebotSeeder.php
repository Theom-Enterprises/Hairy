<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngebotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('angebot')->insert([
            'bezeichnung' => 'Schneiden',
            'beschreibung' => 'inkl. Haare stylen',
            'preis' => '20'
        ]);

        DB::table('angebot')->insert([
            'bezeichnung' => 'Waschen',
            'beschreibung' => 'inkl. Haare föhnen und stylen',
            'preis' => '15'
        ]);

        DB::table('angebot')->insert([
            'bezeichnung' => 'Färben',
            'beschreibung' => 'inkl. Haare waschen, föhnen und stylen',
            'preis' => '70'
        ]);
    }
}
