@extends('home')

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1"><b>PSBU</b> </a>
      </div>
      <div class="card-body">
        {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
  
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>   
            @error('email')
                <span class=" invalid-feedback"></span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror     
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
             name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
  
        <p class="mb-1">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        </p>
        <p class="mb-0">
          <a href="{{url('register')}}" class="btn btn-link">Register for a new user</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  
@endsection
