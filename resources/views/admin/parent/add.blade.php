@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('admin.parent.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add Parent Form</h3>
                            
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Select City</label>
                                <div>
                                    <select id="cityid" name="cityid" value="{{ old('cityid') }}" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($cityData as $record)
                                        <option value="{{ $record->id }}">{{ $record->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Parent Name</label>
                                <div>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" aria-describedby="nameHelp" placeholder="Enter Coach Name">
                                    @if ($errors->has('name'))
                                        <span class="error" style="color:red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Age</label>
                                <div>
                                    <input type="number" name="age" class="form-control" value="{{ old('age') }}" placeholder="Enter age">
                                    @if ($errors->has('age'))
                                        <span class="error" style="color:red">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Address</label>
                                <div>
                                   <textarea rows="4" cols="10" name="address" class="form-control">{{ old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="error" style="color:red">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Phone</label>
                                <div>
                                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" />
                                    @if ($errors->has('phone'))
                                        <span class="error" style="color:red">{{ $errors->first('phone') }}</span>
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
