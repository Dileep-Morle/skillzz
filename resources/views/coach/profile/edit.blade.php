@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form  action="{{ route('coach.profile.update', ['id'=>$record->id]) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Coach Profile Edit</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Coach Name</label>
                                <div>
                                    <input type="hidden" name="id" class="form-control" value="{{ $record->id; }}" >  
                                    <input type="text" name="name" value="{{ $record->name }}" class="form-control">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Age</label>
                                <div>
                                    <input type="number" name="age" class="form-control" value="{{ $record->age }}">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Address</label>
                                <div>
                                   <textarea rows="4" cols="10" name="address" class="form-control">{{ $record->address }}</textarea>
                                   <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Phone</label>
                                <div>
                                    <input type="number" name="phone" class="form-control" value="{{ $record->phone }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Class Name</label>
                                <div>
                                    <input type="text" name="class_name" class="form-control" value="{{ $record->class_name }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">sport</label>
                                <div>
                                    <input type="text" name="sport" class="form-control" value="{{ $record->sport }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Minimum Age</label>
                                <div>
                                    <input type="number" name="min_age" class="form-control" value="{{ $record->min_age }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Age</label>
                                <div>
                                    <input type="text" name="max_age" class="form-control" value="{{ $record->max_age }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Schedule Day</label>
                                <div>
                                    <input type="text" name="schedule" class="form-control" value="{{ $record->schedule }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Time</label>
                                <div>
                                    <input type="text" name="start_time" class="form-control" value="{{ $record->start_time }}" />
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
                                <label class="form-label required">Cost</label>
                                <div>
                                    <input type="number" name="cost" class="form-control" value="{{ $record->cost }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Discount Code</label>
                                <div>
                                    <input type="text" name="discount_code" class="form-control" value="{{ $record->discount_code }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
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
