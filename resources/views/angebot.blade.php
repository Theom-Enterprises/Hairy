@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/angebot.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="/js/angebot.js"></script>
@endpush

@section('subtitle', 'Angebot')

@section('content')

    <div class="container">
        <h1>
            Unsere Angebote
        </h1>

        <div id="title-div">
            <div class="row">
                <div class="col m-2 d-flex justify-content-end align-items-center">
                    <div id="search-bar" class="input-group">
                        <input id="search-bar-input" onkeyup="sucheAngebot()" type="text"
                               class="form-control input-text"
                               placeholder="Nach Angebot suchen..."
                               aria-label="Nach Angebot suchen" aria-describedby="searchButton">
                        <i class="btn btn-lg bi bi-search"></i>
                    </div>
                </div>
            </div>
            <div id="angebote" class="table-responsive table-angebot">
                <table id="table-angebote" class="table table-hover table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Bezeichnung</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col">Preis</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Iteriert durch das Angebote Array -->
                    @foreach($angebote as $angebot)
                        <tr>
                            <td>{{ $angebot->bezeichnung ?? '-'}}</td>
                            <td>{{ $angebot->beschreibung ?? '-'}}</td>
                            <td>{{ $angebot->preis ?? '-'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col m-2 d-flex justify-content-start align-items-center">
                <button type="button" id="btn-buchung" class="btn btn-primary"
                        onclick="window.location.href='terminbuchung';">Termin buchen
                </button>
            </div>
        </div>
@endsection
