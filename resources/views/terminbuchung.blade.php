@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/angebot.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="/js/angebot.js"></script>
@endpush

@section('subtitle', 'Terminbuchung')

@section('content')

    <div class="container">
        <h1>
            Terminbuchung
        </h1>

        <div id="title-div">
            @if(session()->has('erfolgreich'))
                <div class="alert alert-primary" role="alert">
                    {{ session()->get('erfolgreich') }}
                </div>
            @endif

            <div id="terminbuchung">
                <!-- Bearbeitet einen Termin beim Formular Submit -->
                <form action="{{ route('termin.store') }}" method="post">
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
                    <div class="col m-2 d-flex justify-content-start align-items-center">
                        <button type="submit" id="btn-buchung" class="btn btn-primary">Buchen</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
