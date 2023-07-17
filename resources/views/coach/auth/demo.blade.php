<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - Skillzz - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css?1674944402') }}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          
        </div>
        <div class="card card-md">
        @include('admin.components.alert')
          <div class="card-body">
          <h4 style="text-align:center">SKILLZZ</h4>
            <h2 class="h2 text-center mb-4">Coach Login Form</h2>
            <form action="{{route('coach.login')}}" method="post" autocomplete="off" novalidate>
              @csrf
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="Enter Email address" autocomplete="on">
                @if ($errors->has('email'))
                  <span class="error" style="color:red">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    <a href="#">I forgot password</a>
                  </span>
                </label>
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
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input" name="agree" term="required"/>
                  <span class="form-check-label">Remember me on this device</span>
                </label>
                @if ($errors->has('agree'))
                  <span class="error" style="color:red">{{ $errors->first('agree') }}</span>
                @endif
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>
         <!-- <div class="text-center text-muted">
          Don't have account yet? <a href="#" tabindex="-1">Sign up</a>
        </div> -->
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