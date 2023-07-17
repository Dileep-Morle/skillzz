@extends('admin.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('admin.components.alert')
        <div class="row row-cards">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View coach and course details by city</h3>
                    </div>
                    
                </div>
            </div>
        </div>
        @if(count($records)>0)
        <div class="row row-cards">
            @foreach($records as $record)
            <div class="col-6">
                <div class="card">
                    <div class="row row-0">
                        <div class="col-3">
                           <img src="{{ asset('static/photos/a-visit-to-the-bookstore.jpg') }}" class="w-100 h-100 object-cover" alt="Card side image">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h2>City name: {{ $record->city_name }}</h2>
                                <p>Coach name:<b>{{ $record->name }}</b>
                                specialist in: {{$record->class_name}} schedule of claas {{ $record->schedule }} at the time of {{ $record->start_time }}
                               apply students and other minimum and maximum age required betwen {{ $record->min_age }} to {{ $record->max_age }} 
                               rate of class per hour is INR {{ $record->cost }}/- interested persion can apply <br> <b><i>my contact number is: {{ $record->phone }}</i> </b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
            <!-- <div class="row row-cards">
                <div class="col-12">
                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Coach not available by city</h3>
                        </div>
                        
                    </div>
                </div>
            </div> -->
            
            <div class="col-12">
                    <div class="card">
                      <div class="empty">
                        <div class="empty-img"><img src="{{ asset('static/illustrations/undraw_quitting_time_dm8t.svg') }}" height="128"  alt="">
                        </div>
                        <p class="empty-title">No results found</p>
                        <p class="empty-subtitle text-muted">
                        No any coach  and course is available by city thanks
                        </p>
                        <div class="empty-action">
                          <a href="#" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                            Search again
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
            @endif
            <!-- <div class="col-6">
                <div class="card">
                    <div class="row row-0">
                        <div class="col-3">
                            <img src="{{ asset('static/photos/a-woman-works-at-a-desk-with-a-laptop-and-a-cup-of-coffee.jpg') }}" class="w-100 h-100 object-cover" alt="Card side image">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h3 class="card-title">Card with left side image</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                                neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection