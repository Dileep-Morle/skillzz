@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('coach.batch.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add batch form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Course Name</label>
                                <div>
                                    <select id="coursename" name="course_name" value="{{ old('course_name') }}" class="form-control">
                                        <option value="{{ old('course_name') }}">Select</option>
                                        @foreach($records as $record)
                                        <option value="{{ $record->id }}" >{{ $record->course_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('course_name'))
                                    <span class="error" style="color:red">{{ $errors->first('course_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">batch Name</label>
                                <div>
                                    <input type="text" name="batch_name" value="{{ old('batch_name') }}" class="form-control" placeholder="Enter batch name">
                                    @if ($errors->has('batch_name'))
                                        <span class="error" style="color:red">{{ $errors->first('batch_name') }}</span>
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
                                <label class="form-label required">Duration</label>
                                <div>
                                    <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" placeholder="Enter duration">
                                    @if ($errors->has('duration'))
                                        <span class="error" style="color:red">{{ $errors->first('duration') }}</span>
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
