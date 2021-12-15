@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

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
                <div id="business-card" class="container">
                    <div class="row">
                        <p class="h3 col brand">Friseur Lorem</p>
                        <p class="h2 col text-right">
                            <!--<img id="logo" src="img/logo.svg" alt="Hairy Logo">-->
                            Hairy
                        </p>
                    </div>
                    <div class="row">
                        <p class="h1 col">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                    </div>
                    <div class="row">
                        <p class="h4 col">Rennweg 89b, 1030 Wien</p>
                    </div>
                </div>

                <div class="tables">
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
                            $termine = DB::table('termin')
                                ->join('users', 'users.id', '=', 'termin.user_id')
                                ->join('dienstleistung', 'dienstleistung.id', '=', 'termin.dienstleistung_id')
                                ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_friseurkuerzel')
                                ->orderBy('datum')
                                ->select('datum', 'von', 'bis','dienstleistung.bezeichnung', 'users.vorname', 'users.nachname', 'angestellter.firstname', 'angestellter.lastname')
                                ->get()->toArray();
*/
                        @endphp

                        @foreach ($termine as $termin)
                            <tr>

                                {{--                                <td><i class="bi bi-x-circle-fill" style='color: #DC3545'></i></td>--}}
                                {{--                                <td>{{ $termine->datum }}</td>--}}
                                {{--                                <td>{{ "{$termine->von} - {$termine->bis}" }}</td>--}}
                                {{--                                <td>{{ $termine->dienstleitung->bezeichnung }}</td>--}}
                                {{--                                <td>{{ "{$termine->angestellter->vorname} {$termine->angestellter->lastname}" }}</td>--}}
                                {{--                                <td>{{ "{$termine->users->vorname} {$termine->users->vorname}" }}</td>--}}

                                <td><i class="bi bi-x-circle-fill" style='color: #DC3545'></i></td>
                                <td>{{ $termin->datum }}</td>
                                <td>10:15 - 10:32</td>
                                <td>Haare schneiden</td>
                                <td>Omar Faid</td>
                                <td>Kunde Name</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tables">
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
                        <tr>
                            <td>SAR</td>
                            <td>Alexander Sarka</td>
                            <td>10.01.2000</td>
                        </tr>
                        <tr>
                            <td>LOZ</td>
                            <td>Alejandro Lozada</td>
                            <td>17.02.2000</td>
                        </tr>
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
            </div>
        @endif
    @endguest
@endsection
