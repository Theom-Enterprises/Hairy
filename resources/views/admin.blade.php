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
        @if(Auth::user()->ist_admin == false) <!--TODO Entfernen des Rufzeichens für korrekte If-Bedingung-->
        Dieser Bereich steht ausschließlich Administratoren zur Verfügung.
        @else
            <div class="container">
                <div id="business-card" class="container gradient-bg">
                    <h1>ADMINSEITE</h1>
                    <p>
                        Auf der Admin-Seite lassen sich alle Termine und Friseure anzeigen. Die Termine sind nach Datum
                        und Uhrzeit sortiert, es scheinen die aktuellsten Aufgaben zuerst auf. Durch das Drücken auf den
                        "Stornieren"-Button kann ein Termin abgesagt / gelöscht werden. In der Friseur-Tabelle lassen
                        sich
                        alle wichtigen Informationen auf einen Blick einfangen.
                    </p>
                    <div class="float-end">
                        <a href="#termine">
                            <button>Termine</button>
                        </a>
                        <a href="#friseure">
                            <button>Friseure</button>
                        </a>
                    </div>
                </div>

                @if(!empty($termine))
                    <div id="termine" class="container mt-5 mb-3">
                        <div class="row">
                            @foreach($termine as $termin)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"><i class="bi bi-person-fill"></i></div>
                                                <div class="ms-2 c-details">
                                                    <h6 class="mb-0">{{"$termin->firstname $termin->lastname"}}</h6>
                                                    <span>#{{ $termin->id }}</span>
                                                </div>
                                            </div>
                                            <div class="badge"><span>{{ $termin->datum }}</span></div>
                                        </div>
                                        <div class="mt-5">
                                            <h3 class="heading">{{ $termin->bezeichnung }}
                                                <br>{{ "$termin->von - $termin->bis" }}</h3>
                                            <div class="mt-5">
                                                <button type="button" class="btn-remove float-end">Löschen</button>
                                                <div class="mt-3"><span class="text1">Zugeteilt: <span
                                                            class="text2">{{ "$termin->vorname $termin->nachname" }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        Es konnten keine Termine gefunden werden.
                    </div>
                @endif

                @if(!empty($angestellte))
                    <div id="friseure">
                        <table class="table table-responsive table-hover table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Kürzel</th>
                                <th scope="col">Name</th>
                                <th scope="col">Anstellungsdatum</th>
                                <th scope="col">Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($angestellte as $angestellter)
                                <tr>
                                    <td>{{ $angestellter->friseurkuerzel }}</td>
                                    <td>{{ "{$angestellter->vorname} {$angestellter->nachname}" }}</td>
                                    <td>{{ $angestellter->erstelldatum }}</td>
                                    @if($angestellter->ist_admin == 'true')
                                        <td>Ja</td>
                                    @else
                                        <td>Nein</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        Es sind keine Friseure angestellt.
                    </div>
                @endif
            </div>
        @endif
    @endguest
@endsection
