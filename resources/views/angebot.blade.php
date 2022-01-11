@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/angebot.css') }}" rel="stylesheet">
@endpush

@push('body-js')

@endpush

@section('subtitle', 'Angebot')

@section('content')

    <div class="container">
        <h1>
            Unsere Angebote
        </h1>

        <div class="p-2 my-4" style="border: solid #dee2e6">
            <div class="row">
                <div class="col m-2 d-flex justify-content-start align-items-center">
                    <button type="button" class="btn btn-primary">
                        <a href="#">Termin buchen</a>
                    </button>
                </div>
                <div class="col m-2 d-flex justify-content-end align-items-center">
                    <div class="input-group">
                        <input type="text" class="form-control input-text" placeholder="Nach Angebot suchen"
                               aria-label="Nach Angebot suchen" aria-describedby="searchButton">
                        <button class="btn btn-outline-warning btn-lg" type="button" id="searchButton">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="angebote" class="table-responsive table-angebot">
                <table class="table table-hover table-borderless">
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
        </div>
@endsection
