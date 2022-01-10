<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:angestellter',
            'password' => 'required|string',
        ];

        $this->validate($request, $rules);
        $remember = $request->get('remember');
        if (Auth::guard('employee')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ], $remember)) {
            //Authentication passed...
            return redirect(route('admin'));
        }

        return redirect()->back()->withError('Credentials doesn\'t match.');
    }
}
