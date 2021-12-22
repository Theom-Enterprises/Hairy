<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        // Beinhaltet alle Termine samt Kunden-Name, Angestellter-Name und Bezeichnung der Dienstleistung
        $termine = DB::table('termin')
            ->join('users', 'users.id', '=', 'termin.user_id')
            ->join('angebot', 'angebot.id', '=', 'termin.angebot_id')
            ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_id')
            ->orderBy('datum', 'desc')
            ->orderBy('von')
            ->orderBy('von')
            ->select('termin.id', 'datum', 'von', 'bis', 'angebot.bezeichnung', 'users.firstname', 'users.lastname', 'angestellter.vorname', 'angestellter.nachname')
            ->get();

        // Beinhaltet alle Angestellten
        $angestellte = DB::table('angestellter')
            ->orderBy('ist_admin', 'DESC')
            ->select('friseurkuerzel', 'vorname', 'nachname', 'erstelldatum', 'ist_admin')
            ->get();

        return view('admin')->with(compact('termine', 'angestellte'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin');
    }

    /**
     * Löscht einen Termin aus der Termin Tabelle und
     * leitet den Anwender wieder zurück
     *
     * @param $id 'Termin ID'
     * @return RedirectResponse
     */
    public function delete($id)
    {
        DB::table('termin')
            ->where('id', $id)
            ->delete();
        return Redirect::back();
    }

    /**
     * Bearbeitet einen Termin aus der Termin Tabelle
     *
     * @param Request $request
     * @param $id 'Termin ID'
     * @return RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        DB::table('termin')
            ->where('id', $id)
            ->update([
                'datum' => $request->input('datum'),
                'von' => $request->input('von'),
                'bis' => $request->input('bis'),
            ]);
        return Redirect::back();
    }
}
