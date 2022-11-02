{{-- @extends('layouts.app') --}}
@extends('layouts.homenav')


@section('styles')

<!-- Font Awesome -->
<link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" />

@endsection

@section('content')


<div class="container py-5 my-5">
    <div class="row justify-content-center">

        <div class="login-box mt-5">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="{{url('/')}}" class="h1"><b>{{ trans('panel.site_title') }}</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">{{ $elections->title }}</p>
                @if(session()->has('message'))
                    <p class="alert alert-danger">
                        {{ session()->get('message') }}
                    </p>
                @endif
                <form action="{{ url('e-voting/'.$slug.'/login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 py-3">
                        <input type="text" class="form-control" name="voterID" placeholder="Voter's ID. . ." value="{{ old('voterID', '') }}" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if($errors->has('voterID'))
                            <span class="text-danger">{{ $errors->first('voterID') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                        {{-- <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                            Remember Me
                            </label>
                        </div> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                  </a>
                </div> --}}
                <!-- /.social-auth-links -->
{{--
                <p class="mb-1">
                  <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.login-box -->


    </div>
</div>

@endsection
