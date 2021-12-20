<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AngestellterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'OTT',
            'vorname' => 'Otto',
            'nachname' => 'Normalverbraucher',
            'email' => 'otto@normalverbrauch.er',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
            'erstelldatum' => '2018-01-20',
            'friseursalon_id' => '1',
        ]);

        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'MUE',
            'vorname' => 'Erika',
            'nachname' => 'Musterfrau',
            'email' => 'erika@musterfr.au',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
            'erstelldatum' => '2014-07-07',
            'friseursalon_id' => '1',
        ]);

        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'MUS',
            'vorname' => 'Max',
            'nachname' => 'Mustermann',
            'email' => 'max@musterma.nn',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'true',
            'erstelldatum' => date('Y-m-d'),
            'friseursalon_id' => '1',
        ]);
    }
}
