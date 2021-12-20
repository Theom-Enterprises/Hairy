<?php

namespace App\Http\Controllers;

use App\Models\Angestellter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $angestellter->passwort = Hash::make($request->input('passwort'));
        $angestellter->ist_admin = $request->has('ist_admin') ? 'true' : 'false';
        $angestellter->erstelldatum = $request->input('erstelldatum');
        $angestellter->friseursalon_id = $request->input('friseursalon_id');
        $angestellter->save();

        $user = new User();
        $user->firstname = $request->input('vorname');
        $user->lastname = $request->input('nachname');
        $user->telephoneNumber = '-';
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('passwort'));
        $user->ist_admin = $request->has('ist_admin') ? 'true' : 'false';
        $user->save();

        return redirect()->back();
    }
}
