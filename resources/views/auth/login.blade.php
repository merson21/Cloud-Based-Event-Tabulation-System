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

        <div class="login-box">
            <div class="login-logo">
                <a class="font-weight-bolder" href="{{url('/')}}">{{ trans('panel.site_title') }}</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">

                    <p class="login-box-msg">
                        {{ trans('global.login') }}
                    </p>

                    @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                name="email" value="{{ old('email', null) }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>


                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required placeholder="{{ trans('global.login_password') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        {{ trans('global.remember_me') }}
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('global.login') }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <hr>
                        {{-- <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a> --}}
                    </div>
                    <!-- /.social-auth-links -->

                    @if(Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">
                            {{ trans('global.forgot_password') }}
                        </a>
                    </p>
                    @endif
                    <p class="mb-1">
                        <a class="text-center" href="{{ route('register') }}">
                            {{ trans('global.register') }}
                        </a>
                    </p>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->


    </div>
</div>




@endsection
