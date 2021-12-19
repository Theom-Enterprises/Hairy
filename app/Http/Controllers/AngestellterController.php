<?php

namespace App\Http\Controllers;

use App\Models\Angestellter;
use Illuminate\Http\Request;

class AngestellterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $angestellter = new Angestellter();
        $angestellter->friseurkuerzel = $request->input('friseurkuerzel');
        $angestellter->vorname = $request->input('vorname');
        $angestellter->nachname = $request->input('nachname');
        $angestellter->email = $request->input('email');
        $angestellter->passwort = $request->input('passwort');
        $angestellter->ist_admin = $request->input('ist_admin') ? 1 : 0;
        $angestellter->erstelldatum = $request->input('erstelldatum');
        $angestellter->friseursalon_id = $request->input('friseursalon_id');
        $angestellter->save();
        return redirect()->back();
    }
}
