<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\CoachClass;
use App\Models\CoachCourse;
class CoachClasseAddController extends Controller
{
    public function index(Request $request)
    {
        $coachId = Auth::user()->id;
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = CoachClass::where('coach_id', $coachId)
            ->where(function ($query) use ($search) {
                    $query->where('class_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('start_time', 'LIKE', '%' . $search . '%')
                    ->orwhere('end_time', 'LIKE', '%' . $search . '%')
                    ->orwhere('schedule', 'LIKE', '%' . $search . '%')
                    ->orwhere('min_age', 'LIKE', '%' . $search . '%')
                    ->orwhere('max_age', 'LIKE', '%' . $search . '%')
                    ->orwhere('max_capacity', 'LIKE', '%' . $search . '%')
                    ->orwhere('current_capacity', 'LIKE', '%' . $search . '%');
                    })
            ->orderBy($column, 'desc')
            ->paginate(5);
       
        $count = count(CoachClass::where('coach_id', $coachId)->get());
        return view('coach.class.list', ['records'=>$records,'count'=>$count]);
    }

    public function create(Request $request)
    { 
        $coachCourse = CoachCourse::get();
        return view('coach.class.add', ['records'=>$coachCourse]);
    }

    public function store(Request $request)
    { 
       $request->validate([
            'class_name'=>'required',
            'start_time'=>'required',
            'end_time' =>'required',
            'schedule' => 'required',
            'min_age'=>'required',
            'max_age'=>'required',
            'max_capacity' =>'required',
            'current_capacity'=>'required',
        ]);
        $courseId = $request->input('course_name');
        $records = new CoachClass();
        $records->course_id = $courseId;
        $records->class_name = $request->class_name;
        $records->start_time = $request->start_time;
        $records->end_time = $request->end_time;
        $records->schedule = $request->schedule;
        $records->min_age = $request->min_age;
        $records->max_age = $request->max_age;
        $records->max_capacity = $request->max_capacity;
        $records->current_capacity = $request->current_capacity;
        $records->save();
        return redirect()->route('coach.classes')->with('success', 'Class Added succesfully!!');
    }

    public function edit(Request $request)
    {
        $record = CoachClass::find($request->id);
        return view('coach.class.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = CoachClass::find($request->id);
    $records->class_name = $request->class_name;
    $records->start_time = $request->start_time;
    $records->end_time = $request->end_time;
    $records->schedule = $request->schedule;
    $records->min_age = $request->min_age;
    $records->max_age = $request->max_age;
    $records->max_capacity = $request->max_capacity;
    $records->current_capacity = $request->current_capacity;
    $records->save();
    return redirect()->route('coach.classes')->with('success','Record Updated Succesfully');
    }

    public function changeStatus(Request $request) 
    { 
        $record = CoachClass::find($request->id);
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
        CoachClass::destroy($request->id);
        return redirect()->route('coach.classes')->with('danger', 'Coach Deleted Succesfully');
    }
}
