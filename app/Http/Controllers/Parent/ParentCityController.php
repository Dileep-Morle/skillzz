<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class ParentCityController extends Controller
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
        return view('parent.city.cities', ['records'=>$records,'count'=>$count]);
    }

    public function view(Request $request)
    {
        $cityId = $request->id;
        
        $record = DB::table('users')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->select('*')
            ->where('users.city_id', $cityId)
            ->get();
        return view('parent.city.view', ['records'=>$record]);
    }
}
