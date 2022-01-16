@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('body-js')

@endpush
@section('content')
    <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #f3f4f5">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../img/logo.svg" alt="" width="56" height="56"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="background" id="home">
        <div class="container pt-3">
            <div class="row align-items-center justify-content-center page-header">
                <div class="col-md-5">
                    <h2>Die Digitale Lösung für ihren Salon</h2>
                    <p>
                        In einer sich ständig weiterentwickelnden Geschäftswelt ist es sehr wichtig, auf dem Laufenden zu bleiben.
                        Je mehr Zeit vergeht, desto mehr Verbesserungen werden den Kunden von den Konkurrenten angeboten.
                        Ein Online-Buchungssystem für Friseure auf deren Website wird ihre Aufmerksamkeit erregen und sie dazu bringen,
                        Dienste erneut in Anspruch zu nehmen, da es so einfach ist, einen Termin zu buchen.
                    </p>

                    <button type="button" class="btn btn-lg"><a href="#features">Read More</a></button>

                </div>
                <div class="col-md-3">
                    <img src="../img/icon.svg" alt="Hairy Logo">
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,320L0,320Z"></path>
        </svg>
    </header>
    <section class="icons">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="icon gradient mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                    </div>
                    <h3>Terminbuchung</h3>
                    <p>
                        Kunden können Termine beim gewünschten Friseur buchen.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="icon gradient mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-shop" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                        </svg>
                    </div>
                    <h3>Übersicht</h3>
                    <p>
                        Eine graphische Benutzeroberfläche, die dem Kunden eine klare Übersicht über die Termine ermöglicht.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="icon gradient mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <h3>Admin</h3>
                    <p>
                        Administratoren können Buchungen über die Admin-Seite bearbeiten und stornieren.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="feature background" id="features" >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,0L0,0Z"></path>
        </svg>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="../img/logo.svg" alt="Hairy Logo">
                </div>

                <div class="col-md-6">
                    <h1 class="my-3">Introducing HAIRY</h1>
                    <p class="my-4">
                        Es gibt Möglichkeiten, Ihr Friseurgeschäft noch effizienter zu gestalten, und ein Online-Buchungssystem für Friseure ist definitiv eine davon.
                        Mit einem Online-Buchungssystem können Sie Ihre Kunden bei der Registrierung für die von Ihnen angebotenen Dienstleistungen bezahlen lassen.
                        Wenn Sie ein spezielles Angebot für Ihre Online-Kunden machen wollen, können Sie dies leicht auf Ihrer Website ankündigen.
                    </p>
                    <ul>
                        <li>Terminbuchung</li>
                        <li>Kalendarmanagement</li>
                        <li>Admin-Funktionen</li>
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
                        Vereinfachen Sie ihren Alltag und nutzen Sie HAIRY
                    </p>
                    <button type="button" class="btn btn-lg"><a href="register">Registrieren Sie sich</a></button>
                </div>
            </div>
        </div>
    </section>
    <section class="services gradient" id="services">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,192L1440,128L1440,0L0,0Z"></path>
        </svg>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <h1>Terminbuchung einfach gemacht!</h1>
                    <p>Mit HAIRY dem Online-Buchungssystem erfolgen Buchungen für verschiedenste Termine beim Friseur über die Website des Friseursalons.
                        Ihre Kunden können rund um die Uhr kostenlose Termine auswählen und diese über die Website buchen.
                        Mit dem HAIRY Buchungssystem können Sie alle wichtigen Informationen zu Kundenterminen jederzeit
                        verfolgen, einplanen und bearbeiten.
                    </p>
                </div>
                <div class="col-md-5"><img src="../img/Calendar_Two Color.svg" alt=""></div>
                <div class="col-md-5"><img src="../img/Chart_Two Color.svg" alt=""></div>
                <div class="col-md-5">
                    <h1>Erreichen Sie mehr Menschen</h1>
                    <p>Stärken Sie die Beziehung zu Ihren Kunden. Beschreiben Sie einfach Ihre Leistungen, zeigen Sie an, wann diese verfügbar sind und Sie werden
                        rund um die Uhr Buchungen von Stammkunden und neuen Kunden erhalten.
                    </p>
                </div>
                <div class="col-md-5">
                    <h1>Zufriedene Kunden</h1>
                    <p> Sie erhalten Terminbuchungen unabhängig von Öffnungs- und Arbeitszeiten.
                        Durch eine höhere Auslastung und weniger Leerlauf steigt somit Ihr Umsatz.
                        Sie haben dadurch mehr Zeit, um sich hauptsächlich auf Ihre Kunden zu fokussieren.
                    </p>
                </div>
                <div class="col-md-5"><img src="../img/Bank note_Two Color.svg" alt=""></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid text-center">
            <span>Made in Austria with love</span>
            <p class="mt-1 mb-3">&copy; Hairy 2021–2022</p>
        </div>
    </footer>
    </body>
@endsection
