<?php

namespace App\Http\Controllers;

use App\Models\Angebot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function rules($angebot_id): array
    {
        return [
            'bezeichnung' => ['required', 'string', 'max:255'],
            'beschreibung' => ['required', 'string', 'max:255'],
            'preis' => ['required', 'numeric', 'max:255'],
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $angebot = new Angebot();
        $angebot->bezeichnung = $request->input('bezeichnung');
        $angebot->beschreibung = $request->input('beschreibung');
        $angebot->preis = $request->input('preis');
        $angebot->save();

        return redirect()->back()->with([
            'angebot-erfolgreich' => 'Das Angebot ' . $angebot->bezeichnung . ' wurde erfolgreich erstellt.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Angebot $angebot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $angebot_id)
    {
        $angebot = Angebot::find($angebot_id);

        $validator = Validator::make($request->all(), $this->rules($angebot_id));
        if ($validator->fails()) {
            return back()->withInput()->withErrors(['error' => 'Eingegebene Daten konnten nicht validiert werden']);
        }

        $angebot->bezeichnung = $request->get('bezeichnung');
        $angebot->beschreibung = $request->get('beschreibung');
        $angebot->preis = $request->get('preis');
        $angebot->save();

        return back()
            ->with(['angebot-erfolgreich' => 'Das Angebot ' . $angebot->bezeichnung . ' wurde erfolgreich bearbeitet.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Angebot $angebot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($angebot_id)
    {
        $angebot = Angebot::find($angebot_id);

        if ($angebot->delete()) {
            return back()->with(['sucess', 'Das Angebot wurde gelöscht'])
                ->with(['angebot-erfolgreich' => 'Das Angebot ' . $angebot->bezeichung . ' wurde erfolgreich gelöscht.']);
        }

        return back()->withErrors(['fehlgeschlagen', 'Das Angebot konnte nicht gelöscht werden']);
    }
}
