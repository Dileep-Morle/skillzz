@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form  action="{{ route('coach.course.update', ['id'=>$record->id]) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Edit course form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">course Name</label>
                                <div>
                                    <input type="hidden" name="id" class="form-control" value="{{ $record->id; }}" >  
                                    <input type="text" name="course_name" value="{{ $record->course_name }}" class="form-control">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Department</label>
                                <div>
                                    <input type="text" name="department" class="form-control" value="{{ $record->department }}">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Date</label>
                                <div>
                                    <input type="text" name="start_date" class="form-control" value="{{ $record->start_date }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">End Date</label>
                                <div>
                                    <input type="text" name="end_date" class="form-control" value="{{ $record->end_date }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Description</label>
                                <div>
                                    <textarea rows="4" cols="10" name="description" class="form-control">{{ $record->description }}</textarea>
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cost</label>
                                <div>
                                    <input type="number" name="cost" class="form-control" value="{{ $record->cost }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Count Hour</label>
                                <div>
                                    <input type="number" name="count_hour" class="form-control" value="{{ $record->count_hour }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Location</label>
                                <div>
                                    <input type="text" name="location" class="form-control" value="{{ $record->location }}" />
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
