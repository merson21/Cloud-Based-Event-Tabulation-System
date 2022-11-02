<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    {{-- <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"></span>
    </a> --}}
    <a href="#" class="brand-link">

        <img src="{{ asset('assets/img/EventsLogo.png') }}" alt="Events Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bolder"><b>Tabulation</b>System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-header">Select Category</li>

                @foreach ($categories as $key => $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tabulation/'.$slug.'/' .$category->id) }}">
                            <i class="fa fa-list-alt">
                            </i>
                            <p>
                                {{ $category->name }}
                            </p>
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('tabulation/'.$slug.'/') }}">
                        <i class="fas fa-info-circle"></i>
                        </i>
                        <p>
                            About us
                        </p>

                    </a>
                </li>

                {{-- @foreach ($possitionData as $key => $possition)
                    <li class="nav-item">
                        <a class="nav-link" href="#position{{$key+1}}">
                            <i class="fa-fw nav-icon fas fa-cogs">
                            </i>
                            <p>
                                {{ $possition->position }}
                            </p>
                        </a>
                    </li>
                @endforeach --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
