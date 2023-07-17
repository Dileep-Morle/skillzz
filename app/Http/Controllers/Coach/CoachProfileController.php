<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\User;
class CoachProfileController extends Controller
{

    public function profileview(Request $request)
    {
        return view('coach.profile.profileview');
    }

    public function profileEdit(Request $request)
    {
        $record = User::find($request->id);
        return view('coach.profile.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = User::find($request->id);
    $records->name = $request->name;
    $records->age = $request->age;
    $records->address = $request->address;
    $records->phone = $request->phone;
    $records->class_name = $request->class_name;
    $records->sport = $request->sport;
    $records->min_age = $request->min_age;
    $records->max_age = $request->max_age;
    $records->schedule = $request->schedule;
    $records->start_time = $request->start_time;
    $records->count_hour = $request->count_hour;
    $records->cost = $request->cost;
    $records->discount_code = $request->discount_code;
    $records->save();

    return redirect()->route('coach.profileview')->with('success','Record Updated Succesfully');
    }
}
