@extends('coach.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('coach.components.alert')
        <div class="row row-cards">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile View</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cards">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ asset('static/avatars/000m.jpg')}}"></span>
                            <h3 class="m-0 mb-1"><a href="#">Name: {{ Auth::user()->name }}</a></h3>
                        <div class="text-muted">Email: {{ Auth::user()->email }}</div>
                        <div class="text-muted">Phone: {{ Auth::user()->phone }}</div>
                        <h2 style="text-align:center;"><a class="btn mt-1 btn-primary" href="{{ route('coach.profile.edit', Auth::user()->id ) }}">Edit profile</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="row row-0">
                        <div class="col">
                            <div class="card-body" style="height:300px;">
                            <h2 style="text-align:center;">Coach Profile Details</h2>
                                <p>Coach Age:<b>{{ Auth::user()->age }} years</b><br>
                                 Class name :<b>{{ Auth::user()->class_name }}</b><br>
                                 Childrens minimum age required:<b>{{ Auth::user()->min_age }} years</b><br>
                                 Childrens maximum age required:<b>{{ Auth::user()->max_age }} years</b></br>
                                 class schedule :<b>{{ Auth::user()->schedule }}</b><br>
                                 Class start time :<b>{{ Auth::user()->start_time }}</b><br>
                                 class per hour :<b>{{ Auth::user()->count_hour }}</b><br>
                                 per hour cost :<b>{{ Auth::user()->cost }}</b><br>
                                 class join discount code :<b>{{ Auth::user()->discount_code }}</b><br>
                                 Join date of coach :<b>{{ Auth::user()->created_at }}</b><br>
                                 Address :<b>{{ Auth::user()->address }}</b><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection