@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('admin.city.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add City Form</h3>
                            
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">City</label>
                                <div>
                                    <input type="text" name="city_name" value="{{ old('city_name') }}" class="form-control" aria-describedby="cityNamelHelp" placeholder="Enter City Name">
                                    @if ($errors->has('title'))
                                        <span class="error" style="color:red">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Country</label>
                                <div>
                                    <input type="text" name="country" class="form-control" value="{{ old('country') }}" placeholder="Enter Country Name">
                                    @if ($errors->has('country'))
                                        <span class="error" style="color:red">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Latitude</label>
                                <div>
                                   <input type="number" name="latitude" class="form-control" value="{{ old('latitude') }}" />
                                    @if ($errors->has('latitude'))
                                        <span class="error" style="color:red">{{ $errors->first('latitude') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Longitude</label>
                                <div>
                                <input type="number" name="longitude" class="form-control" value="{{ old('longitude') }}" />
                                    @if ($errors->has('longitude'))
                                        <span class="error" style="color:red">{{ $errors->first('longitude') }}</span>
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
