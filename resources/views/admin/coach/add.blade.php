@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="col-md-12">
                    <form action="{{ route('admin.coach.store')}}" method="post" class="card" >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add Coach Form</h3>
                            
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Select City</label>
                                <div>
                                    <select id="city_name" name="city_name" value="{{ old('city_name') }}" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($cityData as $record)
                                        <option value="{{ $record->id }}">{{ $record->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Coach Name</label>
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
                            <div class="mb-3">
                                <label class="form-label required">Class Name</label>
                                <div>
                                <input type="text" name="class_name" class="form-control" value="{{ old('class_name') }}" />
                                    @if ($errors->has('class_name'))
                                        <span class="error" style="color:red">{{ $errors->first('class_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">sport</label>
                                <div>
                                <input type="text" name="sport" class="form-control" value="{{ old('sport') }}" />
                                    @if ($errors->has('sport'))
                                        <span class="error" style="color:red">{{ $errors->first('sport') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Minimum Age</label>
                                <div>
                                <input type="number" name="min_age" class="form-control" value="{{ old('min_age') }}" />
                                    @if ($errors->has('min_age'))
                                        <span class="error" style="color:red">{{ $errors->first('min_age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Maximum Age</label>
                                <div>
                                <input type="text" name="max_age" class="form-control" value="{{ old('max_age') }}" />
                                    @if ($errors->has('max_age'))
                                        <span class="error" style="color:red">{{ $errors->first('max_age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Schedule Day</label>
                                <div>
                                <input type="text" name="schedule" class="form-control" value="{{ old('schedule') }}" />
                                    @if ($errors->has('schedule'))
                                        <span class="error" style="color:red">{{ $errors->first('schedule') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Start Time</label>
                                <div>
                                <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}" />
                                    @if ($errors->has('start_time'))
                                        <span class="error" style="color:red">{{ $errors->first('start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Count Hour</label>
                                <div>
                                <input type="number" name="count_hour" class="form-control" value="{{ old('count_hour') }}" />
                                    @if ($errors->has('count_hour'))
                                        <span class="error" style="color:red">{{ $errors->first('count_hour') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Cost</label>
                                <div>
                                <input type="number" name="cost" class="form-control" value="{{ old('cost') }}" />
                                    @if ($errors->has('cost'))
                                        <span class="error" style="color:red">{{ $errors->first('cost') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Discount Code</label>
                                <div>
                                <input type="text" name="discount_code" class="form-control" value="{{ old('discount_code') }}" />
                                    @if ($errors->has('discount_code'))
                                        <span class="error" style="color:red">{{ $errors->first('discount_code') }}</span>
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
