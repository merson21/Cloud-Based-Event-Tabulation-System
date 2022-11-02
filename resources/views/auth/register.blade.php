@extends('layouts.homenav')


@section('styles')

<!-- Font Awesome -->
<link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" />

@endsection

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">

        <div class="register-box py-5 my-5">
            <div class="login-logo">
                <a class="font-weight-bolder" href="{{url('/')}}">{{ trans('panel.site_title') }}</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">{{ trans('global.register') }}</p>

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @if(request()->has('team'))
                        <input type="hidden" name="team" id="team" value="{{ request()->query('team') }}">
                        @endif

                        <div class="input-group mb-3">
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus
                                placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
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
                            <input type="password" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.login_password') }}">
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
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" required
                                placeholder="{{ trans('global.login_password_confirmation') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="team_name"
                                class="form-control {{ $errors->has('team_name') ? ' is-invalid' : '' }}" required
                                autofocus placeholder="{{ trans('global.login_team_name') }}"
                                value="{{ old('team_name', null) }}">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            @if($errors->has('team_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('team_name') }}
                            </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" checked>
                                    <label for="agreeTerms">
                                        I agree to the <a href="#" data-toggle="modal" data-target="#Send_Email">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('global.btnregister') }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="Send_Email">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title"><strong>I agree to the terms.</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <p>.....&hellip;</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('global.agree') }}</button>


                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="social-auth-links text-center">
                        <hr>
                        {{-- <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            {{ trans('global.register_FB') }}
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            {{ trans('global.register_Google') }}
                        </a> --}}
                    </div>

                    <a href="{{ route('login') }}" class="text-center">{{ trans('global.registered') }}</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->

    </div>
</div>

@endsection
