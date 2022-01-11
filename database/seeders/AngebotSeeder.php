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
            'bezeichnung' => 'Haare schneiden',
            'preis' => '20'
        ]);

        DB::table('angebot')->insert([
            'bezeichnung' => 'Haare färben',
            'preis' => '50'
        ]);
    }
}
