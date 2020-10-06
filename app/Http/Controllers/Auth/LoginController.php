<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home creen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function redirectTo( ) {


        if (Auth::check() && Auth::user()->role == 'adminEreg') {
            return('/adminEreg/home');
        }elseif (Auth::check() && Auth::user()->role == 'adminAsrot'){
            return('/adminAsrot/home');
        }elseif (Auth::check() && Auth::user()->role == 'adminEtrack'){
            return('/adminEtrack/home');
        }elseif (Auth::check() && Auth::user()->role == 'superAdmin'){
            return('/');
        }else{
            return('/error');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');


    }


    /**
     * Show the application's login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        return view('pages.login');
    }



}