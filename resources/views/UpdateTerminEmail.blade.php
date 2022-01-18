@component('mail::message')
# Ihr Termin wurde bearbeitet!

## Sehr geehrter Herr/Frau {{$nachname}}!

Ihr Termin den Sie mittels dem Dienstes Hairy gebucht haben, wurde bearbeitet.
Dies ist nur eine Benachrichtigungsmail. Details sind unten abgebildet.

@component('mail::table')
| Alte Uhrzeit  | Neue Uhrzeit  | Altes Datum  | Neues Datum |
| :-------------: |:-------------:| :-----------:| :-----------:|
| {{"$oldTimeVon - $oldTimeBis"}} | {{"$newTimeVon - $newTimeBis"}} | {{$oldDate}} | {{$newDate}} |
@endcomponent

Mit freundlichen Grüßen,<br>
{{ config('app.name') }}
@endcomponent
