<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\City;
use App\Models\User;
class ParentController extends Controller
{
    public function index(Request $request)
    {
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = User::orderBy($column, 'desc')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orwhere('age', 'LIKE', '%' . $search . '%')
                    ->orwhere('address', 'LIKE', '%' . $search . '%')
                    ->orwhere('phone', 'LIKE', '%' . $search . '%')
                    ->paginate(5);
        $count = count(User::get());
        return view('admin.parent.list', ['records'=>$records,'count'=>$count]);
    }

    public function create(Request $request)
    { 
        $cityData = City::all();
        return view('admin.parent.add', ['cityData'=>$cityData]);
    }

    public function store(Request $request)
    { 
        
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'address' =>'required',
            'phone' => 'required|numeric|digits:10',
        ]);

        $cityId = $request->input('cityid');;
        $records = new User();
        $records->city_id = $cityId;
        $records->name = $request->name;
        $records->age = $request->age;
        $records->address = $request->address;
        $records->phone = $request->phone;
        $records->save();
        return redirect()->route('admin.parents')->with('status', 'Parent Added succesfully!!');
    }

    public function edit(Request $request)
    {
        $record = User::find($request->id);
        return view('admin.parent.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = User::find($request->id);
    $records->name = $request->name;
    $records->age = $request->age;
    $records->address = $request->address;
    $records->phone = $request->phone;
    $records->save();
    return redirect()->route('admin.parents')->with('success','Record Updated Succesfully');
    }

    public function status(Request $request) 
    { 
        $record = User::find($request->id);
        if ($record->status =='1') {
            $record->status='0';
            $record->save();
            return redirect()->back()->with('danger','Status Deactivated Succesfully');
        }else{
            $record->status='1';
            $record->save();
            return redirect()->back()->with('success','Status Activated Succesfully');
        }
    
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route('admin.parents')->with('info', 'Parent Deleted Succesfully');
    }
}
