@extends('parent.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('parent.components.alert')
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
                                 Coach name:<b>{{ $record->name }}</b><br>
                                 Coach Age:<b>{{ $record->age }} years</b><br>
                                 Class name :<b>{{ $record->class_name }}</b><br>
                                 Childrens minimum age required:<b>{{ $record->min_age }} years</b><br>
                                 Childrens maximum age required:<b>{{ $record->max_age }} years</b></br>
                                 class schedule :<b>{{ $record->schedule }}</b><br>
                                 Class start time :<b>{{ $record->start_time }}</b><br>
                                 class per hour :<b>{{ $record->count_hour }}</b><br>
                                 per hour cost :<b>{{ $record->cost }}</b><br>
                                 class join discount code :<b>{{ $record->discount_code }}</b><br>
                                 Join date of coach :<b>{{ $record->created_at }}</b><br>
                                 Address :<b>{{ $record->address }}</b><br>
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