@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/sign-in-up.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div id="register-div" class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="/img/logo.svg" alt="Hairy Logo" width="70" height="70">
            <h1 class="h3 mb-3 fw-normal">Account erstellen</h1>

            @error('firstname')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            @error('lastname')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            @error('telephoneNumber')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            @error('email')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            @error('password')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="form-floating col no-left-right-padding">
                            <input id="firstname" type="text"
                                   class="no-bottom-border form-control @error('firstname') is-invalid @enderror"
                                   name="name" value="{{ old('firstname') }}"
                                   placeholder="Vorname"
                                   autofocus style="border-top-right-radius: 0;">
                            <label for="firstname">{{ __('Vorname') }}</label>
                        </div>
                        <div class="form-floating col no-left-right-padding">
                            <input id="lastname" type="text"
                                   class="no-bottom-border form-control @error('lastname') is-invalid @enderror"
                                   name="name" value="{{ old('lastname') }}"
                                   placeholder="Nachname"
                                   autofocus style="border-top-left-radius: 0; border-left: none;">
                            <label for="lastname">{{ __('Nachname') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating">
                    <input id="telephone-number" type="tel"
                           class="no-border form-control @error('telephoneNumber') is-invalid @enderror" name="email"
                           value="{{ old('telephoneNumber') }}" placeholder="Telefonnummer">
                    <label for="telephone-number">{{ __('Telefonnummer') }}</label>
                </div>

                <div class="form-floating add-margin">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}"
                           placeholder="E-Mail Adresse" style="border-radius: 0 0 .25rem .25rem">
                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                           class="no-bottom-border form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Passwort">
                    <label for="password">{{ __('Passwort') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password-confirm" type="password" class="add-margin form-control"
                           name="password_confirmation" placeholder="Passwort bestätigen">
                    <label for="password-confirm">{{ __('Passwort bestätigen') }}</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit"
                        name="register">{{ __('Registrieren') }}</button>

                <p class="mt-5 mb-3 text-muted">&copy; Hairy 2021–2022</p>
            </form>
        </main>
    </div>
@endsection
