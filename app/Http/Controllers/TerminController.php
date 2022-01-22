<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TerminController
{
    public function index()
    {
        // Beinhaltet alle Angebote
        $angebote = DB::table('angebot')
            ->orderBy('bezeichnung')
            ->select('id', 'bezeichnung', 'beschreibung', 'preis')
            ->get();

        // Beinhaltet alle Angestellten
        $angestellte = DB::table('angestellter')
            ->orderBy('friseurkuerzel')
            ->select('id', 'friseurkuerzel', 'vorname', 'nachname')
            ->get();

        return view('terminbuchung')->with(compact('angebote', 'angestellte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $startTime = $request->input('uhrzeit');
        $startTimeDate = date_create($startTime);

        $termin = new Termin();
        $termin->datum = $request->input('datum');
        $termin->von = $startTime;
        $termin->bis = date_format(date_add($startTimeDate, date_interval_create_from_date_string("20 minutes")), 'H:i');
        $termin->user_id = Auth::guard('web')->user()->id;
        $termin->angestellter_id = $request->input('friseur');
        $termin->angebot_id = $request->input('angebot');
        $termin->save();

        return redirect()->back()->with([
            'erfolgreich' => 'Termin erfolgreich erstellt!'
        ]);
    }
}
