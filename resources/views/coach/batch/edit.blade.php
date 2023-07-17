@extends('coach.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form  action="{{ route('coach.batch.update', ['id'=>$record->id]) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Edit batch form</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Batch Name</label>
                                <div>
                                    <input type="hidden" name="id" class="form-control" value="{{ $record->id; }}" >  
                                    <input type="text" name="batch_name" value="{{ $record->batch_name }}" class="form-control">
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
                                <label class="form-label required">Duration</label>
                                <div>
                                    <input type="text" name="duration" class="form-control" value="{{ $record->duration }}" />
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
