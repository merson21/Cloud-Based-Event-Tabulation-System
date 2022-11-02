<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed {{ Session::get('main-body') ? Session::get('main-body') : "" }}" data-panel-auto-height-mode="height">
    <div class="wrapper">

    <!-- Navbar -->
    {{-- <nav class="main-header navbar navbar-expand {{ Session::get('main-header') ? Session::get('main-header') : "bg-white navbar-light" }} border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
        </li>
        </ul>
    </nav> --}}
    <nav class="main-header navbar navbar-expand {{ Session::get('main-header') ? Session::get('main-header') : "bg-white navbar-light" }} border-bottom">
        {{-- <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom"> --}}
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        @if(count(config('panel.available_languages', [])) > 1)
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" id="btnFullScreen" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="darkmode" data-slide="true" href="#" role="button">
                    <i class="fas fa-adjust"></i>
                </a>
              </li>


              {{-- ANNOUNCMENT --}}
            <li class="nav-item dropdown notifications-menu">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bullhorn"></i>
                    @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                    @if($alertsCount > 0)
                        <span class="badge badge-warning navbar-badge" id="notifcount">
                            {{ $alertsCount }}
                        </span>
                    @endif</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ \Auth::user()->userUserAlerts()->count() }} Announcement</span>
                    <div class="dropdown-divider"></div>

                    @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(7)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                        @foreach($alerts as $key => $alert)

                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-default{{$key}}">
                                    @if($alert->pivot->read === 0) @endif
                                        <i class="fas fa-bullhorn"></i>
                                        {{ \Illuminate\Support\Str::limit($alert->alert_text, 30, '...') }}
                                        <p class="text-right" style="font-size: 0.7em;">{{ $alert->created_at->diffForHumans() }}</p>
                                        @if($alert->pivot->read === 0) @endif
                                </a>

                                <div class="dropdown-divider"></div>
                        @endforeach
                    @else
                        <div class="text-center">
                            {{ trans('global.no_alerts') }}
                        </div>
                    @endif


                    @if(\Auth::user()->userUserAlerts()->count() > 7)
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Announcement</a>
                    <!-- Button trigger modal -->
                    @endif
            </div>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                @if (!auth()->user()->image)
                    {{-- <span class="user-image img-circle elevation-2 ">
                        <i class="far fa-user-circle fa-2x"></i>
                    </span> --}}
                    <img src="{{ asset('assets/img/defaultuser.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ auth()->user()->image->getUrl('thumb') }}" class="user-image img-circle elevation-2" alt="User Image">

                @endif

                  <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- User image -->
                  <li class="user-header ">
                    @if (!auth()->user()->image)
                            {{-- <span class="img-circle elevation-2">
                            <i class="far fa-user-circle fa-5x"></i></span> --}}
                        <img src="{{ asset('assets/img/defaultuser.png') }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{ auth()->user()->image->getUrl('preview') }}" class="img-circle elevation-2" alt="User Image">

                    @endif
                    <p>
                        {{ auth()->user()->name }}
                        <small>{{ auth()->user()->email }}</small>
                         <small>Member since {{ date('M. y', strtotime(auth()->user()->created_at)) }}</small>

                    </p>
                  </li>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-divider"></div>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <a href="{{ route('admin.users.edit', auth()->user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                    {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}
                    <a href="#" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        {{ trans('global.logout') }}
                    </a>
                  </li>
                </ul>
            </li>


        </ul>

    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url("/") }}" class="brand-link">

            <img src="{{ asset('assets/img/EventsLogo.png') }}" alt="Events Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bolder">{{ trans('panel.monitor_title') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                {{-- select title --}}
                <li class="nav-item">
                    <div class="form-group">
                        <label class="text-white nav-header">Select Title</label>
                        <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id" required>
                            {{-- <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option> --}}

                            @foreach($titles as $id => $entry)
                                <option value="{{ $id }}" {{ old('title_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>

                {{-- select category --}}

                <div class="form-group">
                    <label class="text-white nav-header">Select Category</label>
                    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required disabled>

                    </select>
                    @if($errors->has('category'))
                        <span class="text-danger">{{ $errors->first('category') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.criterion.fields.category_helper') }}</span>
                </div>

                {{-- button --}}
                <li class="nav-header">
                    <a href="#" class="btn btn-block btn-info text-white" id="generateTab" data-widget="iframe-close" data-type="all">
                        Generate Tab
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Select Tab
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview" id="generatedTab">
                        {{-- <li class="nav-item">
                            <a href="Judge1.html" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                                <p>Judge 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Judge2.html" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                                <p>Judge 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Judge3.html" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                                <p>Judge 3</p>
                            </a>
                        </li>--}}

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                                <p>No tab available!</p>
                            </a>
                        </li>

                    </ul>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">

        <div class="nav navbar navbar-expand {{ Session::get('main-header') ? Session::get('main-header') : "bg-white navbar-light" }} border-bottom p-0" id="nav-frame">
        <div class="nav-item dropdown">
            <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
            <div class="dropdown-menu mt-0">
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
            </div>
        </div>
        <a class="nav-link " href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
        <a class="nav-link " href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
        <a class="nav-link " href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
        </div>
        <div class="tab-content">
        <div class="tab-empty">
            <h2 class="display-4">No tab selected!</h2>
        </div>
        <div class="tab-loading">
            <div>
            <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
            </div>
        </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            TEAM <b>RAMA</b>
        </div>
        <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    {{-- navigation --}}
    <script>

        $(document).ready(function () {


            $("#darkmode").click(function (e) {
                e.preventDefault();
                $('body').toggleClass('dark-mode')
                $('.main-header').toggleClass('bg-white navbar-light')
                $('.main-header').toggleClass('navbar-dark')

                $('#nav-frame').toggleClass('bg-white navbar-light')
                $('#nav-frame').toggleClass('navbar-dark')


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


        });


        /* Get the element you want displayed in fullscreen */
        var elem = document.documentElement;

        /* Function to open fullscreen mode */
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem = window.top.document.body; //To break out of frame in IE
                elem.msRequestFullscreen();
            }
        }

        /* Function to close fullscreen mode */
        function closeFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                window.top.document.msExitFullscreen();
            }
        }

    </script>

    <script>
        $(document).ready(function () {
            $('#title_id').change(function (e) {
                e.preventDefault();

                var $category = $('#category_id');
                $.ajax({
                    url: "{{ route('admin.combobox.category') }}",
                    data: {
                            title_id: $(this).val()
                        },
                    success: function (data) {
                        $category.html('<option value="" selected>Please select</option>');
                            $.each(data, function (id, value) {
                                $category.append('<option value="' + id + '">' + value + '</option>');
                            });

                        $('#category_id').attr('disabled', false);
                    }
                });


            });

            $('#generateTab').click(function (e) {
                e.preventDefault();

                if ($('#category_id').val()) {
                    var $generatedTab = $('#generatedTab');
                    $.ajax({
                        url: "{{ route('admin.combobox.loadtab') }}",
                        data: {
                                title_id: $('#title_id').val()
                            },
                        success: function (data) {

                                $generatedTab.html('');

                                $.each(data, function (id, value) {
                                    console.log(value);
                                    $generatedTab.append('<li class="nav-item">'
                                                                +'<a href="' + "{{ url('admin/monitors/loadData/') }}/" + id + '/' + $('#category_id').val() + '/'+ $('#title_id').val() + '" class="nav-link">'
                                                                +'<i class="nav-icon far fa-user"></i>'
                                                                    +'<p>' + value + '</p>'
                                                                +'</a></li>');

                                });

                                $generatedTab.append('<li class="nav-item">'
                                                                +'<a href="' + "{{ url('admin/monitors/loadAverage/') }}/" + $('#category_id').val() + '/'+ $('#title_id').val() + '" class="nav-link">'
                                                                +'<i class="nav-icon far fa-user"></i>'
                                                                    +'<p>Average Scores</p>'
                                                                +'</a></li>');

                        }
                    });

                }else{
                    alert('Unable to generate!');
                }

            });


        });
    </script>

    </body>
</html>
