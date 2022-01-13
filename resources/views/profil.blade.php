@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/sign-in-up.css')}}" rel="stylesheet">
    <link href="{{ asset('css/profil.css')}}" rel="stylesheet">
@endpush

@push('body-js')
@endpush
@section('content')
    <div id="register-div" class="text-center my-2">
        <h1 class="h3 mb-3 fw-normal">Profil Einstellungen</h1>
        <main id="title-div" class="profil">
            @if(Session::has('erfolgreich'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('erfolgreich') }}
                </div>
            @endif

            @error('error')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            @error('fehlgeschlagen')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <form method="post" action="{{ route('profil.update', $user->id) }}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="form-floating col no-left-right-padding">
                            <input id="firstname" type="text"
                                   class="no-bottom-border form-control "
                                   name="firstname" value="{{ old('firstname') ?? $user->firstname }}"
                                   placeholder="firstname"
                                   autofocus style="border-top-right-radius: 0;">
                            <label for="firstname">{{ __('Vorname') }}</label>
                        </div>
                        <div class="form-floating col no-left-right-padding">
                            <input id="lastname" type="text"
                                   class="no-bottom-border form-control"
                                   name="lastname" value="{{ old('lastname') ?? $user->lastname}}"
                                   placeholder="Nachname"
                                   autofocus style="border-top-left-radius: 0; border-left: none;">
                            <label for="lastname">{{ __('Nachname') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating">
                    <input id="telephone-number" type="tel"
                           class="no-border form-control"
                           name="telephoneNumber"
                           value="{{ old('telephoneNumber') ?? $user->telephoneNumber }}" placeholder="Telefonnummer">
                    <label for="telephone-number">{{ __('Telefonnummer') }}</label>
                </div>

                <div class="form-floating">
                    <input id="email" type="email" class="no-border no-bottom-border form-control"
                           name="email" value="{{ old('email') ?? $user->email }}"
                           placeholder="E-Mail Adresse">
                    <label for="email">{{ __('E-Mail Adresse') }}</label>
                </div>
            <!--
            <div class="form-floating">
                <input id="password" type="password"
                       class="form-control"
                       name="password" placeholder="Passwort"
                       style="border-radius: 0 0 .25rem .25rem">
                <label for="password">{{ __('Passwort') }}</label>
            </div>-->

                @if(count($termine) !== 0)
                    <div id="termine" class="table-responsive table-profil mt-4">
                        <table id="table-profil" class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Bezeichnung</th>
                                <th scope="col">Friseur</th>
                                <th scope="col">Datum</th>
                                <th scope="col">Von - Bis</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Iteriert durch das Angebote Array -->
                            @foreach($termine as $termin)
                                <tr>
                                    <td>{{$termin->bezeichnung}}</td>
                                    <td>{{$termin->friseurkuerzel}}</td>
                                    <td>{{$termin->datum}}</td>
                                    <td>{{"$termin->von - $termin->bis"}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        Es stehen Ihnen keine Termine bevor.
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <button class="btn btn-hairy-primary mx-2" type="submit">Profil spreichern</button>
                        <button class="btn btn-hairy-danger mx-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteAccount">
                            Profil löschen
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Profil löschen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4>Achtung!</h4>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        Sie sind dabei ihr Profil bei Hairy zu löschen
                        <i class="bi bi-exclamation-triangle"></i>
                        <br>
                        Ihre Daten werden nach dem Bestätigen unwiederuflich gelöscht.
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('profil.delete', $user->id)}}">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abrechen</button>
                        <button type="submit" class="btn btn-hairy-primary">
                            Bestätigen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

