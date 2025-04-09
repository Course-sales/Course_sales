<?php

namespace Modules\Auth\src\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::ADMIN;

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view('Auth::admin.login', compact('pageTitle'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    
    protected function loggedOut(Request $request)
    {
        return redirect($this->redirectTo);
    }
}
