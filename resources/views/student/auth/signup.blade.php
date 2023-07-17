<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign up - Skillzz - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          SKILLZZ
          <!-- <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.svg') }}" height="36" alt=""></a> -->
        </div>
        @include('student.components.alert')
        <!-- <form class="card card-md" action="{{route('student.register')}}" method="post" autocomplete="off"> -->
        <form class="card" action="{{route('student.register')}}" method="post" autocomplete="off">
           @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create student new account</h2>
            <div class="mb-3">
              <label class="form-label">Select City</label>
              <div>
                <select id="city_name" name="city_name" value="{{ old('city_name') }}" class="form-control">
                    <option value="{{ old('city_name') }}">Select</option>
                    @foreach($records as $record)
                    <option value="{{ $record->id }}" >{{ $record->city_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('city_name'))
                <span class="error" style="color:red">{{ $errors->first('city_name') }}</span>
                @endif
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name')}}">
              @if ($errors->has('name'))
                <span class="error" style="color:red">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email')}}">
              @if ($errors->has('email'))
                <span class="error" style="color:red">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <!-- <div class="mb-3">
              <label class="form-label">Mobile Number</label>
              <input type="number" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ old('phone')}}">
              @if ($errors->has('phone'))
                <span class="error" style="color:red">{{ $errors->first('phone') }}</span>
              @endif
            </div> -->
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password')}}" placeholder="Your password" autocomplete="off">
                <span class="input-group-text">
                  <input type="checkbox" id="showPassword" title="Show password" data-bs-toggle="tooltip">
                </span>
              </div>
              @if ($errors->has('password'))
                <span class="error" style="color:red">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" name="agree" class="form-check-input" term="required"/>
                <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
              </label>
              @if ($errors->has('agree'))
                <span class="error" style="color:red">{{ $errors->first('agree') }}</span>
              @endif
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="{{ route('student.login') }}" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <script>
      const passwordInput = document.getElementById("password");
      const showPasswordCheckbox = document.getElementById("showPassword");

      showPasswordCheckbox.addEventListener("change", function() {
        passwordInput.type = this.checked ? "text" : "password";
      });
    </script>
  </body>
</html>