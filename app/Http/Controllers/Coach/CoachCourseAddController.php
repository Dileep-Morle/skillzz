<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\CoachCourse;
class CoachCourseAddController extends Controller
{
    public function index(Request $request)
    {
        $coachId = Auth::user()->id;
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = CoachCourse::where('coach_id', $coachId)
            ->where(function ($query) use ($search) {
                    $query->where('course_name', 'LIKE', '%' . $search . '%')
                        ->orwhere('department', 'LIKE', '%' . $search . '%')
                        ->orwhere('start_date', 'LIKE', '%' . $search . '%')
                        ->orwhere('end_date', 'LIKE', '%' . $search . '%')
                        ->orwhere('description', 'LIKE', '%' . $search . '%')
                        ->orwhere('cost', 'LIKE', '%' . $search . '%')
                        ->orwhere('count_hour', 'LIKE', '%' . $search . '%')
                        ->orwhere('location', 'LIKE', '%' . $search . '%');
                    })
            ->orderBy($column, 'desc')
            ->paginate(5);
            // dd($records);
        $countCoachCourse = count(CoachCourse::where('coach_id', $coachId)->get());
        return view('coach.course.list', ['records'=>$records,'count'=>$countCoachCourse]);
    }

    public function create(Request $request)
    { 
        return view('coach.course.add');
    }

    public function store(Request $request)
    { 
        
        $request->validate([
            'course_name'=>'required',
            'department'=>'required',
            'start_date' =>'required',
            'end_date' => 'required',
            'description'=>'required',
            'cost'=>'required',
            'count_hour' =>'required',
            'location'=>'required',
        ]);
        $coachId = Auth::user()->id;
        $records = new CoachCourse();
        $records->coach_id = $coachId;
        $records->course_name = $request->course_name;
        $records->department = $request->department;
        $records->start_date = $request->start_date;
        $records->end_date = $request->end_date;
        $records->description = $request->description;
        $records->cost = $request->cost;
        $records->count_hour = $request->count_hour;
        $records->location = $request->location;
        $records->save();
        return redirect()->route('coach.courses')->with('success', 'Course Added succesfully!!');
    }

    public function edit(Request $request)
    {
        $record = CoachCourse::find($request->id);
        return view('coach.course.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = CoachCourse::find($request->id);
    $records->course_name = $request->course_name;
    $records->department = $request->department;
    $records->start_date = $request->start_date;
    $records->end_date = $request->end_date;
    $records->description = $request->description;
    $records->cost = $request->cost;
    $records->count_hour = $request->count_hour;
    $records->location = $request->location;
    $records->save();
    return redirect()->route('coach.courses')->with('success','Record Updated Succesfully');
    }

    public function changeStatus(Request $request) 
    { 
        $record = CoachCourse::find($request->id);
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
        CoachCourse::destroy($request->id);
        return redirect()->route('coach.courses')->with('danger', 'Coach Deleted Succesfully');
    }
}
