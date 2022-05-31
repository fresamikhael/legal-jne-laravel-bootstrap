<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('nik' => $input['nik'], 'password' => $input['password']))) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'ADMIN') {
                return redirect()->route('admin-dashboard');
            } elseif (auth()->user()->role == 'LEGAL') {
                return redirect()->route('legal-home');
            } elseif (auth()->user()->role == 'LEGALLEASE') {
                return redirect()->route('legal-lease-dashboard');
            } elseif (auth()->user()->role == 'CS') {
                return to_route('cs.index');
            } elseif (auth()->user()->role == 'LITI1') {
                return to_route('legal-litigation-1.index');
            } elseif (auth()->user()->role == 'LITI2') {
                return to_route('legal-litigation-2.index');
            } elseif (auth()->user()->role == 'LITIMANAGER') {
                return to_route('legal-litigation-manager.index');
            } elseif (auth()->user()->role == 'CB') {
                return redirect()->route('cb-home');
            } elseif (auth()->user()->role == 'USER') {
                return to_route('home');
            } elseif (auth()->user()->role == 'HEADLEGAL') {
                return to_route('headlegal');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
