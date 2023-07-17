<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use session;
use App\Models\City;
use App\Models\Coach;
use Illuminate\Support\Facades\DB;
class CityController extends Controller
{
    
    public function index(Request $request)
    {
        // echo "<pre>";
        // print_r($request);die;
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = City::orderBy($column, 'desc')
                    ->where('city_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('country', 'LIKE', '%' . $search . '%')
                    ->paginate(5);
        $count = count(City::get());
        return view('admin.city.cities', ['records'=>$records,'count'=>$count]);
    }

    public function create(Request $request)
    { 
        return view('admin.city.addcity');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'city_name'=>'required|min:3|max:255',
            'country'=>'required|min:3|max:255',
            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'longitude' => ['required', 'numeric', 'min:-180', 'max:180'],
        ]);
        
        $records = new City();
        $records->city_name = $request->city_name;
        $records->country = $request->country;
        $records->latitude = $request->latitude;
        $records->longitude = $request->longitude;
        $records->save();
        return redirect()->route('admin.cities')->with('status', 'City Added succesfully!!');
    }

    public function edit(Request $request)
    {
    $record = City::find($request->id);
    return view('admin.city.editcity', ['record'=>$record]);
    }

    public function view(Request $request)
    {
        $cityId = $request->id;
        
        $record = DB::table('coaches')
            ->join('cities', 'coaches.city_id', '=', 'cities.id')
            ->select('*')
            ->where('coaches.city_id', $cityId)
            ->get();
        return view('admin.city.view', ['records'=>$record]);
    }

    public function update(Request $request)
    {
    $records = City::find($request->id);
    $records->city_name = $request->city_name;
    $records->country = $request->country;
    $records->latitude = $request->latitude;
    $records->longitude = $request->longitude;
    $records->save();
    return redirect()->route('admin.cities')->with('success','Record Updated Succesfully');
    }

    public function changeStatus(Request $request) 
    { 
        $record = City::find($request->id);
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
        City::destroy($request->id);
        return redirect()->route('admin.cities')->with('info', 'City Deleted Succesfully');
    }

}
