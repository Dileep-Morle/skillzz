<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use Hash;
use App\Models\User;
use App\Models\City;
class CoachRegisterController extends Controller
{
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
            // 'phone' => 'required|numeric|digits:10',
            'password' => 'required',
            'agree' => 'required'
        ]);
        $cityId = $request->input('city_name');
        $records = new User();
        $records->city_id = $cityId;
        $records->name = $request->name;
        $records->email = $request->email;
        // $records->phone = $request->phone;
        $records->role = 2;
        $records->password = Hash::make($request->password);
        $records->save();
        return redirect()->route('coach.login')->with('success', 'You are register please login now!!');

    } 

}
