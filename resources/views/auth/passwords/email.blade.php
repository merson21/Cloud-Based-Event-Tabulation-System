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
                        {{ trans('global.reset_password') }}
                    </p>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                        @if($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                      </div>
                      <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">
                                {{ trans('global.send_password') }}
                            </button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}" class="text-center">{{ trans('global.login') }}</a>
                    </p>
                    <p class="mb-0">
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
