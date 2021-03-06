@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b4be93d7a3.js" crossorigin="anonymous"></script>
@endpush

@section('subtitle', 'Administration')

@section('content')
    @php
        date_default_timezone_set('Europe/Vienna');
    @endphp
    <div class="container mt-2">
        <div id="title-div" class="container">
            <h1>VERWALTUNG</h1>
            <p>
                Auf der Admin-Seite lassen sich alle Termine und Friseure anzeigen. Die Termine sind nach
                Datum
                und Uhrzeit sortiert, es scheinen die aktuellsten Aufgaben zuerst auf. Durch das Drücken auf
                den
                "Bearbeiten"-Button kann ein Termin storniert oder bearbeitet werden. In der Friseur-Tabelle
                lassen sich alle wichtigen Informationen auf einen Blick einfangen.
            </p>
            <div class="float-end">
                <a href="#termine">
                    <button>Termine</button>
                </a>
                <!-- Überprüft ob der User ein Admin ist -->
                @if($employee->ist_admin === 'true')
                    <a href="#friseure">
                        <button>Friseure</button>
                    </a>
                @endif
            </div>
        </div>
        <!-- Überprüft ob der Termine Array leer ist -->
        @if(count($termine) !== 0)
            <div class="table-admin d-flex justify-content-between">
                <div id="termine" class="d-flex align-items-center">
                    @if(isset($_GET['ansicht']))
                        @if($_GET['ansicht'] === 'liste')
                            <button type="button" id="btn-view" class="btn-hairy-primary"
                                    onclick="window.location.href = '?ansicht=kachel';"><i
                                        class="bi bi-collection-fill"></i> Kachelansicht
                            </button>
                        @elseif($_GET['ansicht'] === 'kachel')
                            <button type="button" id="btn-view" class="btn-hairy-primary"
                                    onclick="window.location.href = '?ansicht=liste';"><i
                                        class="bi bi-list-ul">
                                </i> Listenansicht
                            </button>
                        @endif
                    @else
                        <button type="button" id="btn-view" class="btn-hairy-primary"
                                onclick="window.location.href = '?ansicht=liste';"><i
                                    class="bi bi-list-ul">
                            </i> Listenansicht
                        </button>
                    @endif
                </div>
                <div class="d-flex align-items-center">
                    {{ $termine->appends(request()->input())->links() }}
                </div>
            </div>
            @if(Session::has('termin-erfolgreich'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('termin-erfolgreich') }}
                </div>
            @endif
            @if(isset($_GET['ansicht']))
                @if($_GET['ansicht'] === 'liste')
                    <div class="table-responsive table-admin">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <th class="optional" scope="col">@sortablelink('id')</th>
                                <th scope="col">Bezeichnung</th>
                                <th class="optional" scope="col">Kunde</th>
                                <th class="optional" scope="col">Friseur</th>
                                <th scope="col">@sortablelink('datum' )</th>
                                <th scope="col">Von - Bis</th>
                                <th class="optional" scope="col">Bearbeiten</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Iteriert durch den Termine Array -->
                            @foreach ($termine as $termin)
                                <tr>
                                    <td class="optional align-middle">{{ $termin->id }}</td>
                                    <td class="align-middle">{{ $termin->bezeichnung }}</td>
                                    <td class="optional align-middle">{{ "$termin->firstname $termin->lastname" }}</td>
                                    <td class="optional align-middle">{{ "$termin->vorname $termin->nachname" }}</td>
                                    <td class="align-middle" style="padding-left: 0; padding-right: 0;">
                                        @include('includes.admin_datum')
                                    </td>
                                    <td class="align-middle">{{ "$termin->von - $termin->bis" }}</td>
                                    <td class="optional align-middle">
                                        @include('includes.admin_modal_termine')
                                        <button type="button" class="btn-hairy-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#termin-modal-{{ $termin->id }}">
                                            Bearbeiten
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif($_GET['ansicht'] === 'kachel')
                    @include('includes.admin_kachel')
                @endif
            @else
                @include('includes.admin_kachel')
            @endif
        @else
            <div class="alert alert-primary" role="alert">
                Es konnten keine Termine gefunden werden.
            </div>
        @endif
    <!-- Überprüft ob der User ein Admin ist -->
        @if($employee->ist_admin === 'true')
        <!-- Überprüft ob der Angestellte Array nicht leer ist -->
            @if(count($angestellte) !== 0)
                @if(Session::has('angestellter-erfolgreich'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('angestellter-erfolgreich') }}
                    </div>
                @endif
                <div id="friseure" class="table-responsive table-admin">
                    <table class="table table-hover table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Kürzel</th>
                            <th scope="col">Name</th>
                            <th class="optional" scope="col">Anstellungsdatum</th>
                            <th scope="col">Admin</th>
                            <th class="optional" scope="col">Bearbeiten</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Iteriert durch den Angestellte Array -->
                        @foreach ($angestellte as $angestellter)
                            <tr>
                                <td class="align-middle">{{ $angestellter->friseurkuerzel }}</td>
                                <td class="align-middle">{{ "$angestellter->vorname $angestellter->nachname" }}</td>
                                <td class="optional align-middle">{{ $angestellter->erstelldatum }}</td>
                                @if($angestellter->ist_admin === 'true')
                                    <td class="align-middle">Ja</td>
                                @else
                                    <td class="align-middle">Nein</td>
                                @endif
                                <td class="optional align-middle">
                                    <button type="button" class="btn-hairy-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#angestellter-modal-{{ $angestellter->id }}">
                                        Bearbeiten
                                    </button>
                                    <div class="modal fade" id="angestellter-modal-{{$angestellter->id}}"
                                         tabindex="-1"
                                         aria-hidden="true">
                                        <!-- Aktualisiert einen Angestellten -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form
                                                        action="{{ route('employee.update', ['angestellter_id' => $angestellter->id]) }}"
                                                        method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Angestellten
                                                            bearbeiten</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="kuerzel-{{$angestellter->id}}"
                                                                   class="form-label">Friseurkürzel</label>
                                                            <input class="form-control"
                                                                   id="kuerzel-{{$angestellter->id}}"
                                                                   name="friseurkuerzel"
                                                                   minlength="3" maxlength="3"
                                                                   value="{{ old('friseurkuerzel') ?? $angestellter->friseurkuerzel }}"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="vorname-{{$angestellter->id}}"
                                                                   class="form-label">Vorname</label>
                                                            <input class="form-control"
                                                                   id="vorname-{{$angestellter->id}}" name="vorname"
                                                                   value="{{ old('vorname') ?? $angestellter->vorname }}"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nachname-{{$angestellter->id}}"
                                                                   class="form-label">Nachname</label>
                                                            <input class="form-control"
                                                                   id="nachname-{{$angestellter->id}}"
                                                                   name="nachname"
                                                                   value="{{ old('nachname') ?? $angestellter->nachname }}"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email-{{$angestellter->id}}"
                                                                   class="form-label">E-Mail
                                                                Adresse</label>
                                                            <input type="email" class="form-control"
                                                                   id="email-{{$angestellter->id}}"
                                                                   name="email"
                                                                   value="{{ old('email') ?? $angestellter->email }}"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="erstelldatum-{{$angestellter->id}}"
                                                                   class="form-label">Angestellungsdatum</label>
                                                            <input type="date" class="form-control"
                                                                   id="ertelldatum-{{$angestellter->id}}"
                                                                   name="erstelldatum"
                                                                   value="{{ old('erstelldatum') ?? $angestellter->erstelldatum }}"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3 form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                   id="ist_admin-{{$angestellter->id}}"
                                                                   name="ist_admin"
                                                                   @if($angestellter->ist_admin === 'true')
                                                                   checked
                                                                    @endif
                                                            >
                                                            <label class="form-check-label"
                                                                   for="ist_admin-{{$angestellter->id}}">Der
                                                                Angestellte
                                                                ist
                                                                ein Admin</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn"
                                                                data-bs-dismiss="modal">
                                                            Schließen
                                                        </button>
                                                        <button type="submit"
                                                                formaction="{{route('employee.delete', ['angestellter_id'=> $angestellter->id])}}"
                                                                class="btn-hairy-danger">Löschen
                                                        </button>
                                                        <button type="submit" class="btn-hairy-primary">Speichern
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn-hairy-primary" data-bs-toggle="modal"
                            data-bs-target="#angestellter-modal">
                        Hinzufügen
                    </button>
                    <div class="modal fade" id="angestellter-modal" tabindex="-1"
                         aria-hidden="true">
                        <!-- Fügt einen Angestellten beim Formular Submit der Datenbank hinzu -->
                        <form action="{{ route('employee.store') }}" method="post">
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
                                            <input class="form-control" id="vorname" name="vorname"
                                                   required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nachname" class="form-label">Nachname</label>
                                            <input class="form-control" id="nachname" name="nachname"
                                                   required>
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
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="ist_admin"
                                                   name="ist_admin">
                                            <label class="form-check-label" for="ist_admin">Der Angestellte
                                                ist
                                                ein Admin</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn"
                                                data-bs-dismiss="modal">
                                            Schließen
                                        </button>
                                        <button type="submit" class="btn-hairy-primary">Hinzufügen
                                        </button>
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

        @if(Session::has('angebot-erfolgreich'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('angebot-erfolgreich') }}
            </div>
        @endif
        @if(count($angebote) !== 0)
            <div id="angebote" class="table-responsive table-admin">
                <table class="table table-hover table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Bezeichnung</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col">Preis</th>
                        @if($employee->ist_admin === 'true')
                            <th class="optional" scope="col">Bearbeiten</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Iteriert durch den Angestellte Array -->
                    @foreach ($angebote as $angebot)
                        <tr>
                            <td class="align-middle">{{ $angebot->bezeichnung }}</td>
                            <td class="align-middle">{{ $angebot->beschreibung}}</td>
                            <td class="align-middle">{{ $angebot->preis }}€</td>
                            <td class="optional align-middle">
                                <button type="button" class="btn-hairy-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#angebot-modal-{{ $angebot->id }}">
                                    Bearbeiten
                                </button>
                                <div class="modal fade" id="angebot-modal-{{$angebot->id}}"
                                     tabindex="-1"
                                     aria-hidden="true">
                                    <!-- Aktualisiert ein Angebot -->
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                    action="{{ route('angebot.update', ['angebot_id' => $angebot->id]) }}"
                                                    method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Angebot bearbeiten
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="bezeichnung-{{$angebot->id}}"
                                                               class="form-label">Bezeichnung</label>
                                                        <input class="form-control"
                                                               id="bezeichnung-{{$angebot->id}}" name="bezeichnung"
                                                               value="{{ old('bezeichnung') ?? $angebot->bezeichnung }}"
                                                               required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="beschreibung-{{$angebot->id}}"
                                                               class="form-label">Beschreibung</label>
                                                        <input class="form-control"
                                                               id="beschreibung-{{$angebot->id}}"
                                                               name="beschreibung"
                                                               value="{{ old('beschreibung') ?? $angebot->beschreibung }}"
                                                               required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="preis-{{$angebot->id}}"
                                                               class="form-label">Preis</label>
                                                        <input class="form-control"
                                                               type="number"
                                                               id="preis-{{$angebot->id}}"
                                                               name="preis"
                                                               value="{{ old('preis') ?? $angebot->preis }}"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn"
                                                            data-bs-dismiss="modal">
                                                        Schließen
                                                    </button>
                                                    <button type="submit"
                                                            formaction="{{route('angebot.delete', ['angebot_id'=> $angebot->id])}}"
                                                            class="btn-hairy-danger">Löschen
                                                    </button>
                                                    <button type="submit" class="btn-hairy-primary">Speichern
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn-hairy-primary" data-bs-toggle="modal"
                        data-bs-target="#angebot-modal">
                    Hinzufügen
                </button>
                <div class="modal fade" id="angebot-modal" tabindex="-1"
                     aria-hidden="true">
                    <!-- Fügt einen Angestellten beim Formular Submit der Datenbank hinzu -->
                    <form action="{{ route('angebot.store') }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="title">Angebot erstellen</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="bezeichnung" class="form-label">Bezeichnung</label>
                                        <input class="form-control" id="bezeichnung" name="bezeichnung"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="beschreibung" class="form-label">Beschreibung</label>
                                        <input class="form-control" id="beschreibung" name="beschreibung"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="preis" class="form-label">Preis</label>
                                        <input class="form-control" type="number" id="preis" name="preis"
                                               required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn"
                                            data-bs-dismiss="modal">
                                        Schließen
                                    </button>
                                    <button type="submit" class="btn-hairy-primary">Hinzufügen
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-primary" role="alert">
                Es stehen keine Angebote zur Verfügung.
            </div>
        @endif
    </div>
    @include('includes.footer')
@endsection
