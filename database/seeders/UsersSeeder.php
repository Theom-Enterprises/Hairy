<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Alexander',
            'lastname' => 'Sarka',
            'telephoneNumber' => '+4312345678',
            'email' => '8147@htl.rennweg.at',
            'password' => Hash::make('Rennweg'),
            'ist_admin' => 'true',
        ]);

        DB::table('users')->insert([
            'firstname' => 'Alejandro',
            'lastname' => 'Lozada',
            'telephoneNumber' => '+4312345678',
            'email' => '8142@htl.rennweg.at',
            'password' => Hash::make('Rennweg'),
            'ist_admin' => 'true',
        ]);

        DB::table('users')->insert([
            'firstname' => 'Omar',
            'lastname' => 'Faid',
            'telephoneNumber' => '+4312345678',
            'email' => 'omar.faid@htl.rennweg.at',
            'password' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
        ]);

        DB::table('users')->insert([
            'firstname' => 'Max',
            'lastname' => 'Mustermann',
            'telephoneNumber' => '-',
            'email' => 'max@musterma.nn',
            'password' => Hash::make('Rennweg'),
            'ist_admin' => 'false',
        ]);
    }
}
