@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('body-js')
@endpush

@section('subtitle', 'Home')

@section('content')
    <header class="page-header d-flex flex-column">
        <div class="container h-100 d-flex align-items-center justify-content-center flex-grow-1 flex-shrink-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <h2>Hairy: Die digitale Lösung für Ihren Salon</h2>
                    <p>
                        In einer sich ständig weiterentwickelnden Geschäftswelt ist es sehr wichtig,
                        auf dem Laufenden zu bleiben. Je mehr Zeit vergeht, desto mehr kann die Konkurrenz
                        den Kunden bieten. Unser Online-Buchungssystem für Friseure wird bei Ihren Kunden
                        Aufmerksamkeit erregen und sie dazu bringen, Ihre Dienste erneut in Anspruch zu nehmen.
                    </p>

                    <a href="#features">
                        <button type="button" class="btn-hairy-primary" style="font-size: 16px">Weiterlesen</button>
                    </a>

                </div>
                <div class="col-md-3">
                    <img src="/img/icon.svg" alt="Hairy Logo">
                </div>
            </div>
        </div>
        <svg id="svg-header-ending" class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,320L0,320Z"></path>
        </svg>
    </header>

    <section class="icons">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="icon background mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="bi bi-calendar-event gradient-icon-size" viewBox="0 0 16 16">
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                    </div>
                    <h3>Terminbuchung</h3>
                    <p>
                        Kunden können Termine online und unkompliziert von zu Hause buchen.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="icon background mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="bi bi-shop gradient-icon-size" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                        </svg>
                    </div>
                    <h3>Übersicht</h3>
                    <p>
                        Eine graphische Benutzeroberfläche, die dem Kunden eine klare Übersicht über die Termine
                        ermöglicht.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="icon background mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="bi bi-person-fill gradient-icon-size" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <h3>Administration</h3>
                    <p>
                        Administratoren können Buchungen auf einer Verwaltungsseite bearbeiten und stornieren.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="feature background" id="features">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,0L0,0Z"></path>
        </svg>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/img/logo.svg" alt="Hairy Logo">
                </div>

                <div class="col-md-6">
                    <h1 class="my-3">Introducing HAIRY</h1>
                    <p class="my-4">
                        Es gibt Möglichkeiten, Ihr Friseurgeschäft noch effizienter zu gestalten. Unser
                        Online-Buchungssystem für Friseure ist definitiv eine davon.
                        <!-- TODO Text umschreiben-->
                        Wenn Sie ein spezielles Angebot für Ihre Online-Kunden machen wollen, können Sie dies leicht auf
                        Ihrer Website ankündigen.
                    </p>
                    <ul>
                        <li>Terminbuchung</li>
                        <li>Kalendermanagement</li>
                        <li>Administration</li>
                        <li>Kundenmanagement</li>
                    </ul>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,320L0,320Z"></path>
        </svg>
    </section>
    <section class="icons">
        <div class="container">
            <div class="row text-center">
                <div>
                    <h3>Auf was warten Sie?</h3>
                    <p>
                        Vereinfachen Sie Ihren Alltag und nutzen Sie HAIRY
                    </p>
                    <a href="{{route('register')}}">
                        <button type="button" class="btn-hairy-primary">Registrieren
                            Sie sich
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="services background" id="services">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,0L0,0Z"></path>
        </svg>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <h1>Terminbuchung einfach gemacht</h1>
                    <p>
                        Mit HAIRY, dem Online-Buchungssystem, erfolgen sämtliche Terminbuchungen über die Website
                        des Friseursalons. Ihre Kunden können rund um die Uhr Termine auswählen und diese über die
                        Website buchen. Mit dem HAIRY Buchungssystem können Sie alle wichtigen Informationen zu
                        Kundenterminen jederzeit verfolgen, einplanen und bearbeiten.
                    </p>
                </div>
                <div class="col-md-5"><img src="img/Calendar_Two Color.svg" alt=""></div>
                <div class="col-md-5"><img src="img/Chart_Two Color.svg" alt=""></div>
                <div class="col-md-5">
                    <h1>Erreichen Sie mehr Menschen</h1>
                    <p>
                        Stärken Sie die Beziehung zu Ihren Kunden. Hinterlegen Sie einfach Ihre Dienstleistungen und
                        Sie werden rund um die Uhr Buchungen von Stammkunden und neuen Kunden erhalten.
                    </p>
                </div>
                <div class="col-md-5">
                    <h1>Zufriedene Kunden</h1>
                    <p> Sie erhalten Terminbuchungen unabhängig von Öffnungs- und Arbeitszeiten.
                        Sie haben dadurch mehr Zeit, um sich auf Ihre Kunden zu fokussieren.
                    </p>
                </div>
                <div class="col-md-5"><img src="img/Bank note_Two Color.svg" alt=""></div>
            </div>
        </div>
    </section>
@endsection
