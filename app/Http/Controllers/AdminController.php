<?php

namespace App\Http\Controllers;

use App\Mail\UpdateTerminEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Termin;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // Beinhaltet alle Termine samt Kunden-Name, Angestellter-Name und Bezeichnung des Angebots
        $termine = Termin::join('users', 'users.id', '=', 'termin.user_id')
            ->join('angebot', 'angebot.id', '=', 'termin.angebot_id')
            ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_id')
            ->select('termin.id', 'datum', 'von', 'bis', 'angebot.bezeichnung', 'users.firstname', 'users.lastname', 'angestellter.vorname', 'angestellter.nachname')
            ->sortable()->paginate(6);

        // Beinhaltet alle Angestellten
        $angestellte = DB::table('angestellter')
            ->orderBy('ist_admin', 'DESC')
            ->select('id', 'email', 'friseurkuerzel', 'vorname', 'nachname', 'erstelldatum', 'ist_admin')
            ->get();
        $employee = Auth::guard('employee')->user();

        return view('admin')->with(compact('termine', 'angestellte', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
        $Termin = Termin::findorfail($id);
        $userId = $Termin->user_id;
        $user = User::findorfail($userId);
        $user_mail = $user->email;
        $data = [
            'oldTimeVon' => $Termin->von,
            'newTimeVon' => $request->input('von'),
            'oldTimeBis' => $Termin->bis,
            'newTimeBis' => $request->input('bis'),
            'oldDate' => $Termin->datum,
            'newDate' => $request->input('datum'),
            'nachname' => $user->lastname,
        ];

        DB::table('termin')
            ->where('id', $id)
            ->update([
                'datum' => $request->input('datum'),
                'von' => $request->input('von'),
                'bis' => $request->input('bis'),
            ]);

        Mail::to($user_mail)->send(new UpdateTerminEmail($data));

        return Redirect::back();
    }
}
