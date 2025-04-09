<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        if($user->status) {
            return redirect()->route('client.course.index');
        }
        $pageTitle = 'Account locked';
        return view('Auth::clients.block', compact('pageTitle'));
    }
}
