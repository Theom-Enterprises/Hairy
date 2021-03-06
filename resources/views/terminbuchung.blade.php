@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/hairy.css')}}" rel="stylesheet">
@endpush

@push('scripts')
@endpush

@section('subtitle', 'Terminbuchung')

@section('content')

    <div class="container mt-2">
        <h1>
            Terminbuchung
        </h1>

        <div id="title-div">
            @if(Session::has('erfolgreich'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('erfolgreich') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    Ein unerwarteter Fehler ist aufgetreten.
                </div>
            @endif

            <div id="terminbuchung">
                <!-- Fügt einen Termin beim Formular Submit -->
                <form action="{{ route('terminbuchung') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="datum"
                               class="form-label">Datum</label>
                        <input type="date" class="form-control"
                               id="datum" name="datum"
                               placeholder="yyyy-mm-dd"
                               min="{{ date('Y-m-d', strtotime("+1 days")) }}"
                               max="2030-12-31"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="uhrzeit"
                               class="form-label">Uhrzeit</label>
                        <input type="time" class="form-control"
                               id="uhrzeit"
                               name="uhrzeit"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="angebot"
                               class="form-label">Angebot</label>
                        <select class="form-control" id="angebot" name="angebot" required>
                            @foreach($angebote as $angebot)
                                <option value="{{ $angebot->id }}">{{ $angebot->bezeichnung }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="friseur"
                               class="form-label">Friseur</label>
                        <select class="form-control" id="friseur" name="friseur" required>
                            @foreach($angestellte as $angestellter)
                                <option
                                    value="{{ $angestellter->id }}">{{ $angestellter->vorname }} {{ $angestellter->nachname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col m-2 d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn btn-hairy-primary">Buchen</button>
                    </div>
                </form>
            </div>
        </div>
        @include('includes.footer')
@endsection
