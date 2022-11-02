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

<body class="sidebar-mini layout-fixed {{ Session::get('main-body') ? Session::get('main-body') : "" }}" style="height: auto;">
    <div class="wrapper">
          <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/img/EventsLogoLoading.png') }}" alt="Events Logo" height="100" width="100">
        </div>

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


        @include('partials.menu')
        {{-- @yield('contentFrame') --}}

        <div class="content-wrapper" style="min-height: 917px;">

            @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(7)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
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
            @endif

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

    @if(Request::url() != url('admin/generate-results'))
        <script>
                $(function() {
                let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
                let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
                let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
                let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
                let printButtonTrans = '{{ trans('global.datatables.print') }}'
                let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
                let selectAllButtonTrans = '{{ trans('global.select_all') }}'
                let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

                let languages = {
                    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
                };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                style:    'multi+shift',
                selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [
                {
                    extend: 'selectAll',
                    className: 'btn-primary',
                    text: selectAllButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    },
                    action: function(e, dt) {
                    e.preventDefault()
                    dt.rows().deselect();
                    dt.rows({ search: 'applied' }).select();
                    }
                },
                {
                    extend: 'selectNone',
                    className: 'btn-primary',
                    text: selectNoneButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-default',
                    text: pdfButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
            });

        </script>

        <script>
            $(document).ready(function () {
                $(".notifications-menu").on('click', function () {
                    if (!$(this).hasClass('open')) {
                        $('.notifications-menu .label-warning').hide();
                        $.get('/admin/user-alerts/read');
                    }
                });
            });

        </script>

        <script>
            $(document).ready(function() {
                $('.searchable-field').select2({
                    minimumInputLength: 3,
                    ajax: {
                        url: '{{ route("admin.globalSearch") }}',
                        dataType: 'json',
                        type: 'GET',
                        delay: 200,
                        data: function (term) {
                            return {
                                search: term
                            };
                        },
                        results: function (data) {
                            return {
                                data
                            };
                        }
                    },
                    escapeMarkup: function (markup) { return markup; },
                    templateResult: formatItem,
                    templateSelection: formatItemSelection,
                    placeholder : '{{ trans('global.search') }}...',
                    language: {
                        inputTooShort: function(args) {
                            var remainingChars = args.minimum - args.input.length;
                            var translation = '{{ trans('global.search_input_too_short') }}';

                            return translation.replace(':count', remainingChars);
                        },
                        errorLoading: function() {
                            return '{{ trans('global.results_could_not_be_loaded') }}';
                        },
                        searching: function() {
                            return '{{ trans('global.searching') }}';
                        },
                        noResults: function() {
                            return '{{ trans('global.no_results') }}';
                        },
                    }

                });
                function formatItem (item) {
                            if (item.loading) {
                                return '{{ trans('global.searching') }}...';
                            }
                            var markup = "<div class='searchable-link' href='" + item.url + "'>";
                            markup += "<div class='searchable-title'>" + item.model + "</div>";
                            $.each(item.fields, function(key, field) {
                                markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " + item[field] + "</div>";
                            });
                            markup += "</div>";

                            return markup;
                }

                function formatItemSelection (item) {
                        if (!item.model) {
                            return '{{ trans('global.search') }}...';
                        }
                        return item.model;
                }
                $(document).delegate('.searchable-link', 'click', function() {
                    var url = $(this).attr('href');
                    window.location = url;
                });
            });
        </script>
    @endif

    <script>

        $(document).ready(function () {


            $("#darkmode").click(function (e) {
                e.preventDefault();
                $('body').toggleClass('dark-mode')
                $('.main-header').toggleClass('bg-white navbar-light')
                $('.main-header').toggleClass('navbar-dark')
                //$('table').toggleClass('table-dark')

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

    @yield('scripts')
</body>

</html>
