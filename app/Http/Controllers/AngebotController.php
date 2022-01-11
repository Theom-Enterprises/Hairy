<?php

namespace App\Http\Controllers;

use App\Models\Angebot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AngebotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Beinhaltet alle Angebote
        $angebote = DB::table('angebot')
            ->orderBy('bezeichnung')
            ->select('bezeichnung', 'beschreibung', 'preis')
            ->get();
        return view('angebot')->with(compact('angebote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Angebot $angebot
     * @return \Illuminate\Http\Response
     */
    public function edit(Angebot $angebot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Angebot $angebot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angebot $angebot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Angebot $angebot
     * @return \Illuminate\Http\Response
     */
    public function delete(Angebot $angebot)
    {
        //
    }
}
