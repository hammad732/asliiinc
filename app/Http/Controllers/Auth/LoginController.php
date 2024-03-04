<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request)
    {

        $status = Auth::user()->status;

        if ($status == '1')
        {
            if (Auth::user()->hasrole('Super Admin'))
            {
                return redirect()->route('sa.dashboard')->with('status', 'You are logged-in as  Super Admin');
            }
            if (Auth::user()->hasrole('Admin'))
            {
                return redirect()->route('a.dashboard')->with('status', 'You are logged-in as Admin');
            }
            if (Auth::user()->hasrole('Distributor'))
            {
                // return redirect()->route('main');
                return redirect()->back();
            }
            if (Auth::user()->hasrole('Retailer'))
            {
                return redirect()->back();
                // return redirect()->route('main');
            }
        }
        else
        {
            // dd('0');
            Auth::logout();
            return redirect()->route('login')->with('msg', 'You are not authorized to login');
        }
    }
}
