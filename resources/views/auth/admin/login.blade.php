@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/sign-in-up.css')}}" rel="stylesheet">
@endpush

@section('subtitle', 'Angestelltenanmeldung')

@section('content')
    <div id="main-sign-up-in-div" class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="/img/icon.svg" alt="Hairy Logo" width="70" height="70">
            <h1 class="h3 mb-3 fw-normal">Willkommen zurück, Angestellter</h1>

            @error('error')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            <form method="POST"
                  action="{{ route('admin.login') }}">
                @csrf

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('error') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" autocomplete="tel"
                           placeholder="E-Mail Adresse">

                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                           class="add-margin form-control @error('error') is-invalid @enderror"
                           name="password" autocomplete="password" placeholder="Passwort">
                    <label for="password">{{ __('Passwort') }}</label>
                </div>

                <button class="w-100 btn-lg btn-hairy-primary" type="submit"
                        name="login">{{ __('Anmelden') }}</button>
            </form>
        </main>
    </div>
@endsection
