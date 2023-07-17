<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\User;
use App\Models\Coach;
use App\Models\City;
use App\Models\ParentModel;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
        
    }
    
    public function login(Request $request)
    {
        return view('admin.auth.signin');
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
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('info', 'Login details are not match you are not admin');
            }
        }else{
            return redirect()->route('admin.login')->with('danger', 'Something went wrong email and password not match');

        }

    } 

    public function dashboard()
    {
        if (Auth::check()) {

            $coachData = User::where('role', 2)->get();
            $coach = count($coachData);
            $parentData = User::where('role', 3)->get();
            $parent = count($parentData);
            $studentData = User::where('role', 0)->get();
            $student = count($studentData);
            $city = count(City::all());
            return view('admin.dashboard', ['allCoaches'=>$coach, 'allCities'=>$city, 'allParents'=>$parent, 'allStudents' =>$student]);    
        } else{
            return redirect('admin/login');
        }   
    } 

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('admin/login')->with('success', 'You are logout successfully ');
        } else{
            return redirect('admin/dashboard');
        }      
    }

}
