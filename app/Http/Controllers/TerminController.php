<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TerminController
{
    public function index()
    {
        // Beinhaltet alle Angebote
        $angebote = DB::table('angebot')
            ->orderBy('bezeichnung')
            ->select('id', 'bezeichnung', 'beschreibung', 'preis')
            ->get();
        return view('terminbuchung')->with(compact('angebote'));
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
        $angestellte = DB::table('angestellter')
            ->orderBy('ist_admin', 'DESC')
            ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum', 'ist_admin')
            ->get();

        $termin = new Termin();
        $termin->datum = $request->input('datum');
        $termin->von = $request->input('von');
        $termin->bis = date('H:s', strtotime("+20 minutes"));
        $termin->user_id = Auth::guard('web')->user()->id;
        $termin->angestellter_id = random_int(1, count($angestellte));
        $termin->angebot_id = $request->input('angebot');
        $termin->save();

        return redirect()->back()->with([
            'erfolgreich' => 'Termin erfolgreich erstellt!'
        ]);
    }
}
