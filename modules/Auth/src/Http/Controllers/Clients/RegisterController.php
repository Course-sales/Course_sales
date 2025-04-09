<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Modules\Student\src\Repositories\StudentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    protected $studentRepo;
    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->middleware('guest:students');
        $this->studentRepo = $studentRepositoryInterface;
    }
    public function showRegistrationForm()
    {
        $pageTitle = "Register";
        return view('Auth::clients.register', compact('pageTitle'));

    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|min:10',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $inputData = $request->except('_token');
            $user = $this->studentRepo->create([
                'status' => 1,
                'name' => $inputData['name'],
                'phone' => $inputData['phone'],
                'email' => $inputData['email'],
                'password' => Hash::make($inputData['password']),
                'address' => $inputData['address'] ?? '',
            ]);
        event(new Registered($user));
        Auth::guard('students')->login($user);
        return redirect()->route('verification.notice')->with('msg', 'Please check your email!');

    }
   
}
