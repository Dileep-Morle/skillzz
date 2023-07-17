<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\Coach;
use App\Models\City;
class CoachController extends Controller
{
    public function index(Request $request)
    {
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = Coach::orderBy($column, 'desc')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orwhere('age', 'LIKE', '%' . $search . '%')
                    ->orwhere('address', 'LIKE', '%' . $search . '%')
                    ->orwhere('phone', 'LIKE', '%' . $search . '%')
                    ->orwhere('class_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('sport', 'LIKE', '%' . $search . '%')
                    ->orwhere('min_age', 'LIKE', '%' . $search . '%')
                    ->orwhere('max_age', 'LIKE', '%' . $search . '%')
                    ->orwhere('schedule', 'LIKE', '%' . $search . '%')
                    ->orwhere('start_time', 'LIKE', '%' . $search . '%')
                    ->orwhere('count_hour', 'LIKE', '%' . $search . '%')
                    ->orwhere('cost', 'LIKE', '%' . $search . '%')
                    ->orwhere('discount_code', 'LIKE', '%' . $search . '%')
                    ->paginate(5);
        $count = count(Coach::get());
        return view('admin.coach.list', ['records'=>$records,'count'=>$count]);
    }

    public function create(Request $request)
    { 
        $cityData = City::all();
        return view('admin.coach.add', ['cityData'=>$cityData]);
    }

    public function store(Request $request)
    { 
        
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'address' =>'required',
            'phone' => 'required|numeric|digits:10',
            'class_name'=>'required',
            'sport'=>'required',
            'min_age' =>'required',
            'max_age'=>'required',
            'schedule'=>'required',
            'start_time' =>'required',
            'count_hour'=>'required',
            'cost'=>'required',
            'discount_code' =>'required',
        ]);

        $cityId = $request->input('city_name');;
        $records = new Coach();
        $records->city_id = $cityId;
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
        return redirect()->route('admin.coaches')->with('status', 'Coach Added succesfully!!');
    }

    public function edit(Request $request)
    {
        $record = Coach::find($request->id);
        return view('admin.coach.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = Coach::find($request->id);
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
    return redirect()->route('admin.coaches')->with('success','Record Updated Succesfully');
    }

    public function changeStatus(Request $request) 
    { 
        $record = Coach::find($request->id);
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
        Coach::destroy($request->id);
        return redirect()->route('admin.coaches')->with('info', 'Coach Deleted Succesfully');
    }
}
