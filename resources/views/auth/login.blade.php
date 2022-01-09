@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/sign-in-up.css')}}" rel="stylesheet">
@endpush

@section('subtitle', 'Anmeldung')

@section('content')
    <div id="main-sign-up-in-div" class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="/img/icon.svg" alt="Hairy Logo" width="70" height="70">
            <h1 class="h3 mb-3 fw-normal">Willkommen zurück</h1>

            @error('email')
            <div class="alert alert-primary" role="alert">{{ $message }}</div>
            @enderror

            @error('password')
            <div class="alert alert-primary" role="alert">{{ $message }}</div>
            @enderror

            <form method="POST"
                  action="@if(Request::getHost() === 'admin.hairy.test'){{ route('admin.login') }}@else{{route('login')}}@endif">
                @csrf

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" autocomplete="tel"
                           placeholder="E-Mail Adresse">

                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                           class="add-margin form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="new-password" placeholder="Passwort">
                    <label for="password">{{ __('Passwort') }}</label>
                </div>

                <div class="form-check add-margin" style="text-align: left">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Angemeldet bleiben') }}
                    </label>
                </div>

                <button class="w-100 btn btn-lg btn-hairy" type="submit"
                        name="login">{{ __('Anmelden') }}</button>
            </form>
        </main>
    </div>
@endsection
