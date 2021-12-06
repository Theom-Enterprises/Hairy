@extends('layouts.app')

@section('content')
    <!-- Überprüfen ob der User angemeldet ist -->
    @guest
        Dieser Bereich steht ausschließlich Administratoren zur Verfügung.
    @else
        <!-- Überprüfen ob der angemeldete User ein Administrator ist -->
        @if(!Auth::user()->ist_admin == false) <!--TODO Entfernen des Rufzeichens für korrekte If-Bedingung-->
        Dieser Bereich steht ausschließlich Administratoren zur Verfügung.
        @else
            <div class="container">
                <h1>Willkommen zurück, {{ Auth::user()->firstname }}!</h1>

                <h2>Termine</h2>
                <table class="table table-responsive table-hover table-borderless">
                    <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-pencil-fill"></i></th>
                        <th scope="col">Datum</th>
                        <th scope="col">Von - Bis</th>
                        <th scope="col">Dienstleistung</th>
                        <th scope="col">Friseur</th>
                        <th scope="col">Kunde</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
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
                    @endphp

                    @foreach ($users as $user)
                        <tr>
                            <td><i class="bi bi-x-circle-fill" style='color: #DC3545'></i></td>
                            <td>02.12.2021</td>
                            <td>10:15 - 10:45</td>
                            <td>Haare schneiden</td>
                            <td>Max Mustermann</td>
                            <td>{{ "{$user->firstname} {$user->lastname}" }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2>Friseure</h2>
                <table class="table table-responsive table-hover table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Kürzel</th>
                        <th scope="col">Name</th>
                        <th scope="col">Anstellungsdatum</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- TODO Erstellen des SQL Tables Angestellter
                    @php
                    $angestellte = DB::table('angestellter')
                        ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum')
                        ->get()->toArray();
                    @endphp

                    @foreach ($angestellte as $angestellter)
                        <tr>
                            <td>{{ $angestellter->friseurkuerzel }}</td>
                            <td>{{ "{$angestellter->vorname} {$angestellter->nachname}" }}</td>
                            <td>{{ $angestellter->erstelldatum }}</td>
                        </tr>
                    @endforeach
                    --}}
                    </tbody>
                </table>
            </div>
        @endif
    @endguest
@endsection
