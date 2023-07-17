<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\CoachBatch;
use App\Models\User;
use App\Models\CoachCourse;
class CoachBatchAddController extends Controller
{
    public function index(Request $request)
    {
        $coachId = Auth::user()->id;
        $column = request('sort_by', 'created_at');
        $search = $request->input('search');
        $records = CoachBatch::where('coach_id', $coachId)
            ->where(function ($query) use ($search) {
                    $query->where('batch_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('start_date', 'LIKE', '%' . $search . '%')
                    ->orwhere('end_date', 'LIKE', '%' . $search . '%')
                    ->orwhere('duration', 'LIKE', '%' . $search . '%');
                    })
            ->orderBy($column, 'desc')
            ->paginate(5);
        $count = count(CoachBatch::get());
        return view('coach.batch.list', ['records'=>$records,'count'=>$count]);
    }

    public function create(Request $request)
    { 
        $coachCourse = CoachCourse::get();
        return view('coach.batch.add', ['records'=>$coachCourse]);
    }

    public function store(Request $request)
    { 
        $request->validate([
            'batch_name'=>'required',
            'start_date' =>'required',
            'end_date' => 'required',
            'duration'=>'required',
        ]);
        $coachId = Auth::user()->id;
        $courseId = $request->input('course_name');
        $records = new CoachBatch();
        $records->coach_id = $coachId;
        $records->course_id = $courseId;
        $records->batch_name = $request->batch_name;
        $records->start_date = $request->start_date;
        $records->end_date = $request->end_date;
        $records->duration = $request->duration;
        $records->save();
        return redirect()->route('coach.batches')->with('success', 'Batch Added succesfully!!');
    }

    public function edit(Request $request)
    {
        $record = CoachBatch::find($request->id);
        return view('coach.batch.edit', ['record'=>$record]);
    }

    public function update(Request $request)
    {
    $records = CoachBatch::find($request->id);
    $records->batch_name = $request->batch_name;
    $records->start_date = $request->start_date;
    $records->end_date = $request->end_date;
    $records->duration = $request->duration;
    $records->save();
    return redirect()->route('coach.batches')->with('success','Record Updated Succesfully');
    }

    public function changeStatus(Request $request) 
    { 
        $record = CoachBatch::find($request->id);
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
        CoachBatch::destroy($request->id);
        return redirect()->route('coach.batches')->with('danger', 'Coach Deleted Succesfully');
    }
}
