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

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">
                        {{ trans('global.reset_description') }}

                    </p>
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input name="token" value="{{ $token }}" type="hidden">
                        <div>
                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" readonly>
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
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @if($errors->has('password'))
                                    <span class="text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-block">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}" class="text-center">{{ trans('global.login') }}</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
