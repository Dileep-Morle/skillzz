@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('coach.class.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add class form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Course Name</label>
                                <div>
                                    <select id="coursename" name="course_name" value="{{ old('course_name') }}" class="form-control">
                                        <option value="{{ old('course_name') }}">Select</option>
                                        @foreach($records as $record)
                                        <option value="{{ $record->id }}" >{{ $record->course_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('course_name'))
                                    <span class="error" style="color:red">{{ $errors->first('course_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Class Name</label>
                                <div>
                                    <input type="text" name="class_name" value="{{ old('class_name') }}" class="form-control" placeholder="Enter class name">
                                    @if ($errors->has('class_name'))
                                        <span class="error" style="color:red">{{ $errors->first('class_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Time</label>
                                <div>
                                    <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}" placeholder="Enter start time">
                                    @if ($errors->has('start_time'))
                                        <span class="error" style="color:red">{{ $errors->first('start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">End Time</label>
                                <div>
                                    <input type="text" name="end_time" class="form-control" value="{{ old('end_time') }}" placeholder="Enter end time">
                                    @if ($errors->has('end_time'))
                                        <span class="error" style="color:red">{{ $errors->first('end_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Schedule</label>
                                <div>
                                    <input type="text" name="schedule" class="form-control" value="{{ old('schedule') }}" placeholder="Enter schedule">
                                    @if ($errors->has('schedule'))
                                    <span class="error" style="color:red">{{ $errors->first('schedule') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Minimum Age</label>
                                <div>
                                    <input type="number" name="min_age" class="form-control" value="{{ old('min_age') }}" placeholder="Enter min_age">
                                    @if ($errors->has('min_age'))
                                        <span class="error" style="color:red">{{ $errors->first('min_age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Age</label>
                                <div>
                                    <input type="number" name="max_age" class="form-control" value="{{ old('max_age') }}" placeholder="Enter count hour">
                                    @if ($errors->has('max_age'))
                                        <span class="error" style="color:red">{{ $errors->first('max_age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Capacity</label>
                                <div>
                                    <input type="number" name="max_capacity" class="form-control" value="{{ old('max_capacity') }}" placeholder="Enter start date">
                                    @if ($errors->has('max_capacity'))
                                        <span class="error" style="color:red">{{ $errors->first('max_capacity') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Current Capacity</label>
                                <div>
                                    <input type="number" name="current_capacity" class="form-control" value="{{ old('current_capacity') }}" placeholder="Enter start date">
                                    @if ($errors->has('current_capacity'))
                                        <span class="error" style="color:red">{{ $errors->first('current_capacity') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
</script>
@endsection
