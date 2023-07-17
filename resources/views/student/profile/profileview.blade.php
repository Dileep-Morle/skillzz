@extends('student.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('student.components.alert')
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
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="row row-0">
                        <div class="col">
                            <div class="card-body" style="height:240px;">
                            <h2 style="text-align:center;">Student Profile Details</h2>
                                <p>student Age:<b>{{ Auth::user()->age }} years</b><br>
                                 Join date of student :<b>{{ Auth::user()->created_at }}</b><br>
                                 Address :<b>{{ Auth::user()->address }}</b><br>
                                 Phone: <b>{{ Auth::user()->phone }}</b><br>
                                 <h2 style="text-align:left;"><a class="btn mt-1 btn-primary" href="{{ route('student.profile.edit', Auth::user()->id ) }}">Edit profile</a></h2>
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