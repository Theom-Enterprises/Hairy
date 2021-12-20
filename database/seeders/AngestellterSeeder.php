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
            'friseurkuerzel' => 'FAH',
            'vorname' => 'Heinz',
            'nachname' => 'Faßmann',
            'email' => 'heinz@fassma.nn',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
            'erstelldatum' => date('Y-m-d'),
            'friseursalon_id' => '1',
        ]);

        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'KSE',
            'vorname' => 'Sebastian',
            'nachname' => 'Kurz',
            'email' => 'sebastian@ku.rz',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
            'erstelldatum' => date('Y-m-d'),
            'friseursalon_id' => '1',
        ]);

        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'BGE',
            'vorname' => 'Gernot',
            'nachname' => 'Blümel',
            'email' => 'gernot@bluem.el',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'true',
            'erstelldatum' => date('Y-m-d'),
            'friseursalon_id' => '1',
        ]);

        DB::table('angestellter')->insert([
            'friseurkuerzel' => 'MUS',
            'vorname' => 'Max',
            'nachname' => 'Mustermann',
            'email' => 'max@musterma.nn',
            'passwort' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
            'erstelldatum' => date('Y-m-d'),
            'friseursalon_id' => '1',
        ]);
    }
}
