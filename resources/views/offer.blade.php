@extends('layouts.app')

@push('stylesheets')
@endpush

@push('body-js')

@endpush
@section('content')
    <div class="container">
        <h1>
            Unsere Angebote
        </h1>

        <div class="p-2 my-4" style="border: solid #dee2e6">
            <div class="row">
                <div class="col-md-4 offset-8">
                    <div class="input-group">
                        <input type="text" class="form-control input-text mt-2" placeholder="Nach Dienstleistung suchen"
                               aria-label="Nach Dienstleistung suchen" aria-describedby="searchButton">
                        <button class="btn btn-outline-warning btn-lg" type="button" id="searchButton">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Angebot</th>
                    <th scope="col">Beschreibung</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-primary">
            <a href="#">Termin buchen</a>
        </button>
    </div>
@endsection
