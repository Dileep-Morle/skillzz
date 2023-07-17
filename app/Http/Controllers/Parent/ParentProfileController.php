<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\User;
class ParentProfileController extends Controller
{
    public function profileview(Request $request)
    {
        return view('parent.profile.profileview');
    }

    public function profileEdit(Request $request)
    {
        $record = User::find($request->id);
        return view('parent.profile.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = User::find($request->id);
    $records->name = $request->name;
    $records->age = $request->age;
    $records->address = $request->address;
    $records->phone = $request->phone;
    $records->save();

    return redirect()->route('parent.profileview')->with('success','Record Updated Succesfully');
    }
}
