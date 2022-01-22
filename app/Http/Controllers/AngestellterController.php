<?php

namespace App\Http\Controllers;

use App\Models\Angestellter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function rules($user_id): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'telephoneNumber' => ['required', 'string', 'max:255,' . Rule::unique('users')->ignore($user_id)],
            'email' => ['required', 'string', 'email', 'max:255,' . Rule::unique('users')->ignore($user_id)],
        ];
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
        $angestellter->password = Hash::make($request->input('passwort'));
        $angestellter->ist_admin = $request->has('ist_admin') ? 'true' : 'false';
        $angestellter->erstelldatum = $request->input('erstelldatum');
        $angestellter->friseursalon_id = $request->input('friseursalon_id');
        $angestellter->save();

        return redirect()->back()->with([
            'angestellter-erfolgreich' => 'Der Angestellte ' . $angestellter->friseurkuerzel . ' wurde erfolgreich erstellt.'
        ]);
    }

    public function update(Request $request, $angestellter_id): RedirectResponse
    {
        $angestellter = (new Angestellter)->findOrFail($angestellter_id);

        /*$validator = Validator::make($request->all(), $this->rules($angestellter_id));
        if ($validator->fails()) {
            return back()->withInput()->withErrors(['error' => 'Eingegebene Daten konnten nicht validiert werden']);
        }*/

        $angestellter->friseurkuerzel = $request->get('friseurkuerzel');
        $angestellter->vorname = $request->get('vorname');
        $angestellter->nachname = $request->get('nachname');
        $angestellter->email = $request->get('email');
        $angestellter->ist_admin = $request->get('ist_admin') ? 'true' : 'false';
        $angestellter->erstelldatum = $request->get('erstelldatum');
        $angestellter->save();

        return back()->with(['erfolgreich' => 'Deine Daten wurden aktualisiert'])
            ->with(['angestellter-erfolgreich' => 'Der Angestellte ' . $angestellter->friseurkuerzel . ' wurde erfolgreich bearbeitet.']);
    }

    public function delete(Request $request, $angesteller_id): RedirectResponse
    {
        $angesteller = (new Angestellter())->find($angesteller_id);
        Auth::guard('employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($angesteller->delete()) {
            return back()->with(['sucess', 'Der Angestellte wurde gelöscht'])
                ->with(['angestellter-erfolgreich' => 'Der Angestellte #' . $angesteller_id . ' wurde erfolgreich gelöscht.']);
        }

        return back()->withErrors(['fehlgeschlagen', 'Das Profil konnte nicht gelöscht werden']);
    }
}
