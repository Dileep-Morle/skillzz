<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\User;
class StudentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
        
    }
    
    public function login(Request $request)
    {
        return view('student.auth.signin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'agree' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 0) {
                return redirect('/student/dashboard');
            }else{
                return redirect()->route('student.login')->with('info', 'Login details are not match you are not student');
            }
        }else{
            return redirect()->route('student.login')->with('danger', 'User not Found please register first');
        }

    } 

    public function dashboard()
    {
        if (Auth::check()) {
            return view('student.dashboard');    
        }else{
            return view('student.login');    
        }
    } 

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('student/login')->with('success', 'You are logout successfully');
        }else{
            return redirect('student/dashboard');
        }
    }
}
