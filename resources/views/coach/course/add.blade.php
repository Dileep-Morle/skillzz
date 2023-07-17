@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('coach.course.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add course Form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Course Name</label>
                                <div>
                                    <input type="text" name="course_name" value="{{ old('course_name') }}" class="form-control" placeholder="Enter course name">
                                    @if ($errors->has('course_name'))
                                        <span class="error" style="color:red">{{ $errors->first('course_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Department</label>
                                <div>
                                    <input type="text" name="department" class="form-control" value="{{ old('department') }}" placeholder="Enter department">
                                    @if ($errors->has('department'))
                                        <span class="error" style="color:red">{{ $errors->first('department') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Date</label>
                                <div>
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" placeholder="Enter start date">
                                    @if ($errors->has('start_date'))
                                        <span class="error" style="color:red">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">End Date</label>
                                <div>
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" placeholder="Enter end date">
                                    @if ($errors->has('end_date'))
                                    <span class="error" style="color:red">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Description</label>
                                <div>
                                   <textarea rows="4" cols="10" name="description" class="form-control">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="error" style="color:red">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cost</label>
                                <div>
                                    <input type="number" name="cost" class="form-control" value="{{ old('cost') }}" placeholder="Enter cost">
                                    @if ($errors->has('cost'))
                                        <span class="error" style="color:red">{{ $errors->first('cost') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Count Hour</label>
                                <div>
                                    <input type="number" name="count_hour" class="form-control" value="{{ old('count_hour') }}" placeholder="Enter count hour">
                                    @if ($errors->has('count_hour'))
                                        <span class="error" style="color:red">{{ $errors->first('count_hour') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Location</label>
                                <div>
                                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="Enter start date">
                                    @if ($errors->has('start_date'))
                                        <span class="error" style="color:red">{{ $errors->first('location') }}</span>
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
