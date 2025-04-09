<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Modules\Student\src\Models\Student;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:students', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view('Auth::clients.login', compact('pageTitle'));
    }
    public function login(Request $request) {
        $dataInput = $request->except('_token');
        $status = Auth::guard('students')->attempt($dataInput);
        if($status) {
            return redirect()->route('client.course.index');
        }
        return back()->with('msg', 'Email or password incorrect!');

    }

    public function showFormForgot() {
        $pageTitle = 'Reset password';
        return view('Auth::clients.forgot', compact('pageTitle'));
    }
    public function handleForgot(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:students,email',
        ]);
         $status = Password::broker('students')->sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT 
            ? back()->with('msg', 'Please check your email to reset your password!') 
            : back()->with('msg', 'Error!');
    }
    
    public function showFormReset($token) {
        $pageTitle = "Login";
        return view('Auth::clients.reset', compact('pageTitle', 'token'));
    }
    public function passwordUpdate(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $status = Password::broker('students')->reset(
            $request->only('email', 'password', 'confirm_password', 'token'),
            function (Student $student, string $password) {
                $student->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $student->save();

                event(new PasswordReset($student));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('client.login')->with('msg', 'Update password successfully!');
        }

        return back()->with('msg', 'Error!');
    }

    protected function logout(Request $request)
    {
        Auth::guard('students')->logout();
        session()->forget('cart');
        return redirect()->route('client.course.index');
    }
}
