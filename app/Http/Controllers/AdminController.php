<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $termine = DB::table('termin')
            ->join('users', 'users.id', '=', 'termin.user_id')
            ->join('angebot', 'angebot.id', '=', 'termin.angebot_id')
            ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_id')
            ->orderBy('datum', 'desc')
            ->orderBy('von')
            ->orderBy('von')
            ->select('termin.id', 'datum', 'von', 'bis', 'angebot.bezeichnung', 'users.firstname', 'users.lastname', 'angestellter.vorname', 'angestellter.nachname')
            ->get();

        $angestellte = DB::table('angestellter')
            ->orderBy('friseurkuerzel')
            ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum', 'ist_admin')
            ->get();

        return view('admin', compact('termine', 'angestellte'));
    }

    public function delete($id)
    {
        DB::table('termin')
            ->where('id', $id)
            ->delete();
        return Redirect::back();
    }
}
