<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        // Beinhaltet alle Termine
        $termine = Termin::join('users', 'users.id', '=', 'termin.user_id')
            ->join('angebot', 'angebot.id', '=', 'termin.angebot_id')
            ->join('angestellter', 'angestellter.id', '=', 'termin.angestellter_id')
            ->where('users.id', $user->id)
            ->orderBy('datum')
            ->select('datum', 'von', 'bis', 'angebot.bezeichnung', 'angestellter.friseurkuerzel')
            ->get();

        return view('profil')->with(compact('termine', 'user'));
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
     * Bearbeitet einen User
     *
     * @param Request $request
     * @param $user_id
     * @return RedirectResponse
     */
    public function update(Request $request, $user_id): RedirectResponse
    {
        $user = (new User)->findOrFail($user_id);

        $validator = Validator::make($request->all(), $this->rules($user_id));
        if ($validator->fails()) {
            return back()->withInput()->withErrors(['error' => 'Eingegebene Daten konnten nicht validiert werden']);
        }

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->telephoneNumber = $request->get('telephoneNumber');
        $user->email = $request->get('email');
        $user->save();

        return back()->with(['erfolgreich' => 'Deine Daten wurden aktualisiert']);
    }

    public function delete(Request $request, $user_id): RedirectResponse
    {
        $user = (new User)->find($user_id);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->delete()) {
            return Redirect::route('home')->with(['sucess', 'Ihr Profil wurde gelöscht']);
        }

        return back()->withErrors(['fehlgeschlagen', 'Ihr Profil konnte nicht gelöscht werden']);
    }
}
