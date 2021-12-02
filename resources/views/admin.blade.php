@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Termine</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Datum</th>
                <th scope="col">Dienstleistung</th>
                <th scope="col">Friseur</th>
                <th scope="col">Kunde</th>
                <th scope="col">Löschen</th>
            </tr>
            </thead>
            <tbody>
            <?php
            use Illuminate\Support\Facades\DB;

            $users = DB::table('users')
                ->select('firstname', 'lastname')
                ->get()->toArray();

            /*
            $termine = DB::table('termin')
                ->join('users', 'users.id', '=', 'termin.user_id')
                ->join('dienstleistung', 'dienstleistung.id', '=', 'termin.dienstleistung_id')
                ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_friseurkuerzel')
                ->select('datum', 'dienstleistung.bezeichnung', 'users.vorname', 'users.nachname', 'users.firstname', 'users.lastname')
                ->get()->toArray();
            */

            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>02.12.2021</td>";
                echo "<td>Haare färben</td>";
                echo "<td>Max Mustermann</td>";
                echo "<td>{{ \"{$user->firstname} {$user->lastname}\" }}</td>";
                echo "<td><i class=\"bi bi-x-square-fill\"></i></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
@endsection
