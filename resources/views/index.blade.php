@extends('layouts.app')

@push('stylesheets')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('body-js')

@endpush
@section('content')
    <header class="hero">
        <div class="container spacing" >
            <h1 class="primary-title">
                Das #1 Terminbuchungssystem auf der Welt
            </h1>
            <p>
                HAIRY ist ein cooles Terminbuchungssystem mit dem man Termine buchen kann
            </p>
            <a href="register" class="btn">Registrieren Sie sich!</a>
        </div>
    </header>

    <main>
        <section class="featured">
            <div class="container">
                <h2 class="section-title">Terminbuchung war noch nie so einfach</h2>
                <div class="split">
                    <a href="#" class="featured__item">
                        <img src="../img/logo.svg" alt="">
                        <p class="featured__details"></p>
                    </a>
                    <p class="featured__text">
                        Es gibt Möglichkeiten, Ihr Friseurgeschäft noch effizienter zu gestalten, und ein Online-Buchungssystem für Friseure ist definitiv eine davon.
                        Mit einem Online-Buchungssystem können Sie Ihre Kunden bei der Registrierung für die von Ihnen angebotenen Dienstleistungen bezahlen lassen.
                        Wenn Sie ein spezielles Angebot für Ihre Online-Kunden machen wollen, können Sie dies leicht auf Ihrer Website ankündigen.
                        Ihre Kunden können rund um die Uhr kostenlose Termine auswählen und diese über die Website buchen.
                        Mit dem HAIRY Buchungssystem können Sie alle wichtigen Informationen zu Kundenterminen jederzeit verfolgen, einplanen und bearbeiten.

                    </p>
                </div>
            </div>
        </section>

        <section class="our-products">
            <div class="container">
                <h2 class="section-title">Finde das passende Angebot für dein Salon</h2>
                <article class="product">
                    <img src="" alt="" class="product__image">
                    <h3 class="product__title"></h3>
                    <p class="product__description"></p>
                    <a href="offer" class="btn">Angebote und Preise</a>
                </article>
            </div>
        </section>
    </main>
@endsection
