<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function index()
    {
        return view('auth.admin.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse
     *
     */
    public function login(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:angestellter',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors(['error' => 'Anmeldedaten sind inkorrekt']);
        }

        if (Auth::guard('employee')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ])) {
            //Authentication passed...
            return redirect(route('admin.home'));
        }

        return back()->withInput()->withErrors(['error' => 'Anmeldedaten stimmen nicht mit unseren Einträgen überein']);
    }
}
