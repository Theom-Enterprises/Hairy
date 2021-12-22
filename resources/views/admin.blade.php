@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('subtitle', 'Administration')

@section('content')
    <!-- Überprüfen ob der User angemeldet ist -->
    @guest
        <div class="alert alert-primary text-center" role="alert">
            Dieser Bereich steht ausschließlich Friseuren und Administratoren zur Verfügung.
        </div>
    @else
        <!-- Setzt die Zeitzone auf Wien -->
        @php
            date_default_timezone_set('Europe/Vienna');
        @endphp
        <div class="container">
            <div id="title-div" class="container">
                <h1>ADMIN<span class="line-break">-</span>SEITE</h1>
                <p>
                    Auf der Admin-Seite lassen sich alle Termine und Friseure anzeigen. Die Termine sind nach Datum
                    und Uhrzeit sortiert, es scheinen die aktuellsten Aufgaben zuerst auf. Durch das Drücken auf den
                    "Bearbeiten"-Button kann ein Termin storniert oder bearbeitet werden. In der Friseur-Tabelle
                    lassen sich alle wichtigen Informationen auf einen Blick einfangen.
                </p>
                <div class="float-end">
                    <a href="#termine">
                        <button>Termine</button>
                    </a>
                    <!-- Überprüft ob der User ein Admin ist -->
                    @if(Auth::user()->ist_admin == 'true')
                        <a href="#friseure">
                            <button>Friseure</button>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Überprüft ob der Termine Array leer ist -->
            @if(!empty($termine))
                <div id="termine" class="container mt-5 mb-3">
                    <div class="row">
                        <!-- Iteriert durch den Termine Array -->
                    @foreach($termine as $termin)
                        <!-- Überprüft ob der User kein Admin ist und ob der Angestellte, welcher dem Termin zugeordnet wurde, der User ist-->
                            @if(Auth::user()->ist_admin == 'false' && $termin->nachname == Auth::user()->lastname && $termin->vorname == Auth::user()->firstname)
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
                                            <!-- Ersetzt das Datum-Badge durch ein Wort-->
                                            @if($termin->datum == date('Y-m-d'))
                                                <div class="badge"><span>Heute</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("-1 days")))
                                                <div class="badge"><span>Gestern</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("-2 days")))
                                                <div class="badge"><span>Vorgestern</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("+1 days")))
                                                <div class="badge"><span>Morgen</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("+2 days")))
                                                <div class="badge"><span>Übermorgen</span></div>
                                            @else
                                                <div class="badge"><span>{{ $termin->datum }}</span></div>
                                            @endif
                                        </div>
                                        <div class="mt-5">
                                            <h3 class="heading">{{ $termin->bezeichnung }}
                                                <br>{{ "$termin->von - $termin->bis" }}</h3>
                                            <div class="mt-5">
                                                <div class="mt-3"><span class="special-text">Zugeteilt: <span
                                                            class="special-bold-text">{{ "$termin->vorname $termin->nachname" }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif(Auth::user()->ist_admin == 'true')
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
                                            <!-- Ersetzt das Datum-Badge durch ein Wort-->
                                            @if($termin->datum == date('Y-m-d'))
                                                <div class="badge"><span>Heute</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("-1 days")))
                                                <div class="badge"><span>Gestern</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("-2 days")))
                                                <div class="badge"><span>Vorgestern</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("+1 days")))
                                                <div class="badge"><span>Morgen</span></div>
                                            @elseif($termin->datum == date('Y-m-d', strtotime("+2 days")))
                                                <div class="badge"><span>Übermorgen</span></div>
                                            @else
                                                <div class="badge"><span>{{ $termin->datum }}</span></div>
                                            @endif
                                        </div>
                                        <div class="mt-5">
                                            <h3 class="heading">{{ $termin->bezeichnung }}
                                                <br>{{ "$termin->von - $termin->bis" }}</h3>
                                            <div class="mt-5">
                                                <button type="button" class="btn-modal float-end"
                                                        data-bs-toggle="modal" data-bs-target="#termin-modal">
                                                    Bearbeiten
                                                </button>
                                                <div class="modal fade" id="termin-modal" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <!-- Bearbeitet einen Termin beim Formular Submit -->
                                                    <form action="/edit/{{ $termin->id }}" method="post">
                                                        @csrf
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="title">Termin bearbeiten
                                                                        / stornieren</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="datum"
                                                                               class="form-label">Datum</label>
                                                                        <input type="date" class="form-control"
                                                                               id="datum" name="datum"
                                                                               placeholder="yyyy-mm-dd" min="1997-01-01"
                                                                               max="2030-12-31"
                                                                               value="{{ $termin->datum }}"
                                                                               required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="von" class="form-label">Von</label>
                                                                        <input type="time" class="form-control" id="von"
                                                                               name="von" value="{{ $termin->von }}"
                                                                               required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="bis" class="form-label">Bis</label>
                                                                        <input type="time" class="form-control" id="bis"
                                                                               name="bis" value="{{ $termin->bis }}"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Schließen
                                                                    </button>
                                                                    <!-- Löscht den Termin -->
                                                                    <a href="delete/{{$termin->id}}">
                                                                        <button type="button" class="btn-remove">
                                                                            Löschen
                                                                        </button>
                                                                    </a>
                                                                    <button type="submit" class="btn-modal">Speichern
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="mt-3"><span class="special-text">Zugeteilt: <span
                                                            class="special-bold-text">{{ "$termin->vorname $termin->nachname" }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    Es konnten keine Termine gefunden werden.
                </div>
            @endif

        <!-- Überprüft ob der User ein Admin ist -->
            @if(Auth::user()->ist_admin == 'true')
            <!-- Überprüft ob der Angestellte Array nicht leer ist -->
                @if(!empty($angestellte))
                    <div id="friseure" class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Kürzel</th>
                                <th scope="col">Name</th>
                                <th class="optional" scope="col">Anstellungsdatum</th>
                                <th scope="col">Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Iteriert durch den Angestellte Array -->
                            @foreach ($angestellte as $angestellter)
                                <tr>
                                    <td>{{ $angestellter->friseurkuerzel }}</td>
                                    <td>{{ "$angestellter->vorname $angestellter->nachname" }}</td>
                                    <td class="optional">{{ $angestellter->erstelldatum }}</td>
                                    @if($angestellter->ist_admin == 'true')
                                        <td>Ja</td>
                                    @else
                                        <td>Nein</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn-modal" data-bs-toggle="modal"
                                data-bs-target="#angestellter-modal">
                            Hinzufügen
                        </button>
                        <div class="modal fade" id="angestellter-modal" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <!-- Fügt einen Angestellten beim Formular Submit der Datenbank hinzu -->
                            <form action="{{ url('add-angestellter') }}" method="post">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="title">Angestellten hinzufügen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="kuerzel" class="form-label">Friseurkürzel</label>
                                                <input class="form-control" id="kuerzel" name="friseurkuerzel"
                                                       minlength="3" maxlength="3" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vorname" class="form-label">Vorname</label>
                                                <input class="form-control" id="vorname" name="vorname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nachname" class="form-label">Nachname</label>
                                                <input class="form-control" id="nachname" name="nachname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-Mail Adresse</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwort" class="form-label">Passwort</label>
                                                <input type="password" class="form-control" id="passwort"
                                                       name="passwort" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="erstelldatum"
                                                       class="form-label">Angestellungsdatum</label>
                                                <input type="date" class="form-control" id="ertelldatum"
                                                       name="erstelldatum"
                                                       required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="friseursalon" class="form-label">Friseursalon ID</label>
                                                <input type="number" min="1" class="form-control" id="friseursalon"
                                                       name="friseursalon_id"
                                                       required>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="ist_admin"
                                                       name="ist_admin">
                                                <label class="form-check-label" for="ist_admin">Der Angestellte ist
                                                    ein Admin</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Schließen
                                            </button>
                                            <button type="submit" class="btn-modal">Hinzufügen</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        Es sind keine Friseure angestellt.
                    </div>
                @endif
            @endif
        </div>
    @endguest
@endsection
