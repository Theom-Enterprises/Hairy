@extends('layouts.app')

@section('content')
    <div id="main-sign-up-in-div" class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="/img/logo.svg" alt="Hairy Logo" width="70" height="70">
            <h1 class="h3 mb-3 fw-normal">Welcome Back</h1>

            @error('email')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            @error('password')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" autocomplete="tel"
                           placeholder="E-Mail Adresse">

                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                           class="login-password form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="new-password" placeholder="Passwort">
                    <label for="password">{{ __('Passwort') }}</label>
                </div>

                <div class="form-check remember-div">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button class="w-100 btn btn-lg btn-hairy" type="submit"
                        name="login">{{ __('Login') }}</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link a-hairy" href="{{ route('password.request') }}">
                        {{ __('Passwort zurücksetzen?') }}
                    </a>
                @endif

                <p class="mt-5 mb-3 text-muted">&copy; Hairy 2021–2022</p>
            </form>
        </main>
    </div>
@endsection
