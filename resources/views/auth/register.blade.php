@extends('layouts.app')

@section('content')
    <div class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="/img/logo.svg" alt="Hairy Logo" width="70" height="70">
            <h1 class="h3 mb-3 fw-normal">Create Account</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="form-floating col no-left-right-padding">
                            <input id="firstname" type="text"
                                   class="form-control @error('firstname') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="name"
                                   placeholder="Vorname"
                                   autofocus>

                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="firstname">{{ __('Vorname') }}</label>
                        </div>
                        <div class="form-floating col no-left-right-padding">
                            <input id="lastname" type="text"
                                   class="form-control @error('lastname') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="name"
                                   placeholder="Nachname"
                                   autofocus>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="lastname">{{ __('Nachname') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating">
                    <input id="telephone-number" type="tel"
                           class="form-control @error('telephoneNumber') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" autocomplete="email" placeholder="Telefonnummer">

                    @error('telephoneNumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="telephone-number">{{ __('Telefonnummer') }}</label>
                </div>

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" autocomplete="tel"
                           placeholder="E-Mail Adresse">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="new-password" placeholder="Passwort">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="password">{{ __('Passwort') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation"
                           autocomplete="new-password" placeholder="Passwort bestätigen">
                    <label for="password-confirm">{{ __('Passwort bestätigen') }}</label>
                </div>

                <button class="w-100 btn btn-lg btn-hairy" type="submit"
                        name="register">{{ __('Register') }}</button>
            </form>
        </main>
    </div>
@endsection
