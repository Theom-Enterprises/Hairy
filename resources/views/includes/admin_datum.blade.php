<!-- Ersetzt das Datum-Badge durch ein Wort-->
@if($termin->datum === date('Y-m-d'))
    <div class="badge"><span>Heute</span></div>
@elseif($termin->datum === date('Y-m-d', strtotime("-1 days")))
    <div class="badge"><span>Gestern</span></div>
@elseif($termin->datum === date('Y-m-d', strtotime("-2 days")))
    <div class="badge"><span>Vorgestern</span></div>
@elseif($termin->datum === date('Y-m-d', strtotime("+1 days")))
    <div class="badge"><span>Morgen</span></div>
@elseif($termin->datum === date('Y-m-d', strtotime("+2 days")))
    <div class="badge"><span>Übermorgen</span></div>
@else
    {{--    Überprüft ob der Termin im aktuellen Jahr stattfindet --}}
    @if(date('Y', strtotime($termin->datum)) === date('Y'))
        <div class="badge"><span>{{ date('d.m', strtotime($termin->datum)) }}</span></div>
    @else
        <div class="badge"><span>{{ date('d.m.y', strtotime($termin->datum)) }}</span></div>
    @endif
@endif
