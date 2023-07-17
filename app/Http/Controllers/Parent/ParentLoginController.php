<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\User;
class ParentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
        
    }
    
    public function login(Request $request)
    {
        return view('parent.auth.signin');
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
            if (Auth::user()->role == 3) {
                return redirect()->route('parent.dashboard');
            }else{
                return redirect()->route('parent.login')->with('info', 'Login details are not match you are not parent');
            }
        }else{
            return redirect()->route('parent.login')->with('danger', 'User not Found please register first');
        }
    } 

    public function dashboard(Request $request)
    {
        if(Auth::check()){
            return view('parent.dashboard');    
        }else{
            return view('parent.login');
        }
    } 

    public function logout(Request $request)
    {

        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('parent/login')->with('success', 'You are logged successfully ');
        }else{
            return redirect('parent/dashboard');
        }
    }
}
