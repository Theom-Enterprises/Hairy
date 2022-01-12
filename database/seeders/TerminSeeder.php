<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('termin')->insert([
            'datum' => '2021-12-20',
            'von' => '14:40',
            'bis' => '15:00',
            'user_id' => '1',
            'angestellter_id' => '3',
            'angebot_id' => '1',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-19',
            'von' => '09:15',
            'bis' => '10:15',
            'user_id' => '1',
            'angestellter_id' => '2',
            'angebot_id' => '1',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-19',
            'von' => '19:15',
            'bis' => '19:40',
            'user_id' => '3',
            'angestellter_id' => '1',
            'angebot_id' => '2',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-21',
            'von' => '09:05',
            'bis' => '09:15',
            'user_id' => '3',
            'angestellter_id' => '2',
            'angebot_id' => '2',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-21',
            'von' => '10:15',
            'bis' => '10:25',
            'user_id' => '2',
            'angestellter_id' => '3',
            'angebot_id' => '1',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-22',
            'von' => '19:15',
            'bis' => '19:40',
            'user_id' => '1',
            'angestellter_id' => '3',
            'angebot_id' => '1',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-17',
            'von' => '09:05',
            'bis' => '09:15',
            'user_id' => '2',
            'angestellter_id' => '1',
            'angebot_id' => '2',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-22',
            'von' => '10:15',
            'bis' => '10:15',
            'user_id' => '1',
            'angestellter_id' => '2',
            'angebot_id' => '1',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-21',
            'von' => '19:15',
            'bis' => '19:40',
            'user_id' => '1',
            'angestellter_id' => '3',
            'angebot_id' => '2',
        ]);

        DB::table('termin')->insert([
            'datum' => '2021-12-20',
            'von' => '09:05',
            'bis' => '09:15',
            'user_id' => '2',
            'angestellter_id' => '2',
            'angebot_id' => '1',
        ]);
    }
}
