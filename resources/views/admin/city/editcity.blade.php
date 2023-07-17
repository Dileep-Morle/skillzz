@extends('admin.layouts.app')
@section('style')
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet"> -->
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form  action="{{ route('admin.city.update', ['id'=>$record->id]) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Edit City Form</h3>
                        </div>
                        <div class="card-body">
                        <div class="mb-3">
                                <label class="form-label required">City</label>
                                <div>
                                    <input type="hidden" name="id" class="form-control" value="{{ $record->id; }}" >  
                                    <input type="text" name="city_name" value="{{ $record->city_name }}" class="form-control">
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Country</label>
                                <div>
                                   <input type="text" name="country" class="form-control" value="{{ $record->country; }}" > 
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Latitude</label>
                                <div>
                                <input type="number" name="latitude" class="form-control" value="{{ $record->latitude }}" />
                                    <small class="form-hint"></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Longitude</label>
                                <div>
                                <input type="number" name="longitude" class="form-control" value="{{ $record->longitude }}" />
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
