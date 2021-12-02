@extends('layouts.app')

@section('content')
    @guest
        Dieser Bereich steht ausschließlich Administratoren zur Verfügung.
    @else
    <div class="container">
        <h1>Termine</h1>
        <table class="table table-responsive table-hover table-borderless">
            <thead>
            <tr>
                <th scope="col"><i class="bi bi-pencil-fill"></i></th>
                <th scope="col">Datum</th>
                <th scope="col">Dienstleistung</th>
                <th scope="col">Friseur</th>
                <th scope="col">Kunde</th>
            </tr>
            </thead>
            <tbody>
            <?php


            $users = DB::table('users')
                ->select('firstname', 'lastname')
                ->get()->toArray();

            /*
            TODO Erstellen der SQL Tables
            $termine = DB::table('termin')
                ->join('users', 'users.id', '=', 'termin.user_id')
                ->join('dienstleistung', 'dienstleistung.id', '=', 'termin.dienstleistung_id')
                ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_friseurkuerzel')
                ->orderBy('datum')
                ->select('datum', 'dienstleistung.bezeichnung', 'users.vorname', 'users.nachname', 'users.firstname', 'users.lastname')
                ->get()->toArray();
            */

            foreach ($users as $user) {
                echo "<tr>";
                echo "<td><i class=\"bi bi-x-circle-fill\" style='color: #DC3545'></i></td>";
                echo "<td>02.12.2021</td>";
                echo "<td>Haare färben</td>";
                echo "<td>Max Mustermann</td>";
                echo "<td>{{ \"{$user->firstname} {$user->lastname}\" }}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h1>Friseure</h1>
        <table class="table table-responsive table-hover table-borderless">
            <thead>
            <tr>
                <th scope="col">Kürzel</th>
                <th scope="col">Name</th>
                <th scope="col">Anstellungsdatum</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /*
             TODO Erstellen des SQL Tables Angestellter
        $angestellte = DB::table('angestellter')
            ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum')
            ->get()->toArray();

        foreach ($angestellte as $angestellter) {
            echo "<tr>";
            echo "<td>{{ $angestellter->friseurkuerzel }}</td>";
            echo "<td>{{ \"{$angestellter->vorname} {$angestellter->nachname}\" }}</td>";
            echo "<td>{{ $angestellter->erstelldatum }}</td>";
            echo "</tr>";
        }
            */
            ?>
            </tbody>
        </table>
    </div>
    @endguest
@endsection
