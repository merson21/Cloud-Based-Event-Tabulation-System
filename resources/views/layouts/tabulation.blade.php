<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    {{-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


    <!-- Font Awesome -->
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" />

    @yield('styles')
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed {{ Session::get('main-body') ? Session::get('main-body') : "" }}" style="height: auto;">
    <div class="wrapper">
          <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/img/EventsLogoLoading.png') }}" alt="Events Logo" height="100" width="100">
        </div>

        <nav class="main-header navbar navbar-expand {{ Session::get('main-header') ? Session::get('main-header') : "bg-white navbar-light" }} border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <!-- right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" data-target="#navbar-search1" href="#"
                        role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block" id="navbar-search1">
                        {{-- <form class="form-inline"> --}}
                            <div class="input-group input-group-sm">
                                {{-- <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"> --}}

                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="myInput">
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button> --}}
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search" id="closeSearch">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </li>

                <!-- Maximize -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <!-- Dark Mode -->
                <li class="nav-item">
                    <a class="nav-link" id="darkmode" data-slide="true" href="#" role="button">
                        <i class="fas fa-adjust"></i>
                    </a>
                </li>

                <!-- Profile -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (!$judgeData->image)
                           <img src="{{ asset('assets/img/defaultuser.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                        @else
                            <img src="{{ $judgeData->image->getUrl('thumb') }}" class="user-image img-circle elevation-2" alt="User Image">

                        @endif
                        <span class="d-none d-md-inline">{{ $judgeData->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header ">
                            @if (!$judgeData->image)
                                <img src="{{ asset('assets/img/defaultuser.png') }}" class="img-circle elevation-2" alt="User Image">
                            @else
                                <img src="{{ $judgeData->image->getUrl('preview') }}" class="img-circle elevation-2" alt="User Image">

                            @endif

                            <p>
                                {{ $judgeData->name }}
                                <small>{{$judgeData->email}}</small>
                            </p>
                        </li>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                                <form action="{{ url('tabulation/'.$slug.'/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat float-right">
                                        Logout
                                    </button>
                                </form>

                        </li>
                    </ul>
                </li>
            </ul>

        </nav>

        @include('partials.tabulationMenu')
        <div class="content-wrapper" style="min-height: 917px;">

            {{-- @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(7)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                @foreach($alerts as $key => $alert)
                    <!-- Modal -->
                    <div class="modal fade" id="modal-default{{$key}}">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title"><strong>{{ $alert->alert_text }}</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <p>{{ $alert->alert_link }}&hellip;</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <p class="text-right sm-text">{{ $alert->created_at->diffForHumans() }}</p>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                @endforeach
            @endif --}}

      <!-- /.modal -->

            <!-- Main content -->
            <section class="content" style="padding-top: 20px">

                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if(session('success'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            {{session()->forget('success')}}
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </section>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                TEAM <b>RAMA</b>
            </div>
            <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
        </footer>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https:////cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script>

        $(document).ready(function () {


            $("#darkmode").click(function (e) {
                e.preventDefault();
                $('body').toggleClass('dark-mode')
                $('.main-header').toggleClass('bg-white navbar-light')
                $('.main-header').toggleClass('navbar-dark')
                $('table').toggleClass('table-dark')

                var base_url = window.location.origin;

                $.ajax({
                    type: "GET",
                    url: base_url + "/session/darkmode",
                    dataType: "dataType",
                    success: function (response) {
                        console.log(response)
                    }
                });

            });

            $(".notifications-menu").click(function (e) {
                e.preventDefault();
                $('#notifcount').remove();
            });


            $(".btnLogout").click(function (e) {

                $.ajax({
                    type: "POST",
                    url: "{{'/e-voting/'.session('slug') . '/logout'}}",
                    dataType: "dataType",
                    success: function (response) {
                        console.log(response)

                    }
                });

            });
        });

    </script>

    @yield('scripts')
</body>

</html>
