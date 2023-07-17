@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form  action="{{ route('coach.class.update', ['id'=>$record->id]) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Edit class form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Class Name</label>
                                <div>
                                    <input type="hidden" name="id" class="form-control" value="{{ $record->id; }}" >  
                                    <input type="text" name="class_name" value="{{ $record->class_name }}" class="form-control">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Time</label>
                                <div>
                                    <input type="text" name="start_time" class="form-control" value="{{ $record->start_time }}">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">End Time</label>
                                <div>
                                    <input type="text" name="end_time" class="form-control" value="{{ $record->end_time }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Schedule</label>
                                <div>
                                    <input type="text" name="schedule" class="form-control" value="{{ $record->schedule }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Minimum Age</label>
                                <div>
                                <input type="text" name="min_age" class="form-control" value="{{ $record->min_age }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Age</label>
                                <div>
                                    <input type="number" name="max_age" class="form-control" value="{{ $record->max_age }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Capacity</label>
                                <div>
                                    <input type="text" name="max_capacity" class="form-control" value="{{ $record->max_capacity }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Current Capacity</label>
                                <div>
                                    <input type="number" name="current_capacity" class="form-control" value="{{ $record->current_capacity }}" />
                                    <small class="form-hint"></small>
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
@endsection
