<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $termine = DB::table('termin')
            ->join('users', 'users.id', '=', 'termin.user_id')
            ->join('angebot', 'angebot.id', '=', 'termin.angebot_id')
            ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_id')
            ->orderBy('datum')
            ->select('termin.id', 'datum', 'von', 'bis', 'angebot.bezeichnung', 'users.firstname', 'users.lastname', 'angestellter.vorname', 'angestellter.nachname')
            ->get();

        $angestellte = DB::table('angestellter')
            ->orderBy('friseurkuerzel')
            ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum')
            ->get();

        return view('admin', compact('termine', 'angestellte'));
    }
}
