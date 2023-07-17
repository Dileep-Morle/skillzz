<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use Hash;
use App\Models\User;
use App\Models\City;
use App\Models\Coach;
use App\Models\CoachCourse;
use App\Models\CoachBatch;
use App\Models\CoachClass;
class CoachLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }
    
    public function login(Request $request)
    {
        return view('coach.auth.signin');
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
            if (Auth::user()->role==2) {
                return redirect('/coach/dashboard');
            }else{
                return redirect()->route('coach.login')->with('info', 'Login details are not match you are not coach');

            }
        }else{
            return redirect()->route('coach.login')->with('danger', 'User not Found please register first');
        }

    } 

    public function register(Request $request)
    {
        $cityData = City::all();
        return view('coach.auth.signup', ['records'=>$cityData]);
    }

    public function post_register(Request $request)
    {
        $credentials = $request->validate([
            'city_name' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required',
            'agree' => 'required'
        ]);
        $cityId = $request->input('city_name');
        $records = new User();
        $records->city_id = $cityId;
        $records->name = $request->name;
        $records->email = $request->email;
        $records->phone = $request->phone;
        $records->role = 2;
        $records->password = Hash::make($request->password);
        $records->save();
        return redirect()->route('coach.login')->with('message', 'You are register please login now!!');

    } 

    public function dashboard(Request $request)
    {
        if(Auth::check()){
            $coachId =  Auth::user()->id;
            $course = count(CoachCourse::where('coach_id',$coachId)->get());
            $class = count(CoachClass::where('coach_id',$coachId)->get());
            $batch = count(CoachBatch::where('coach_id',$coachId)->get());
            return view('coach.dashboard', ['courseCount'=>$course, 'classCount'=>$class, 'batchCount'=>$batch]);   
        }else{
            return view('coach.login');
        }
    } 

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('coach/login')->with('success', 'You are logged successfully');
        }else{
            return redirect('coach/dashboard');
        }
    }
}
