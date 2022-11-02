<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    {{-- <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"></span>
    </a> --}}
    <a href="{{ url("/") }}" class="brand-link">

        <img src="{{ asset('assets/img/EventsLogo.png') }}" alt="Events Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bolder">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('landingpage_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/homepages*") ? "menu-open" : "" }} {{ request()->is("admin/abouts*") ? "menu-open" : "" }} {{ request()->is("admin/faqs*") ? "menu-open" : "" }} {{ request()->is("admin/services*") ? "menu-open" : "" }} {{ request()->is("admin/prices*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.landingpage.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('homepage_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.homepages.index") }}" class="nav-link {{ request()->is("admin/homepages") || request()->is("admin/homepages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.homepage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('about_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.abouts.index") }}" class="nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-info-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.about.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faq_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faqs.index") }}" class="nav-link {{ request()->is("admin/faqs") || request()->is("admin/faqs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faq.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('service_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-servicestack">

                                        </i>
                                        <p>
                                            {{ trans('cruds.service.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('price_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.prices.index") }}" class="nav-link {{ request()->is("admin/prices") || request()->is("admin/prices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.price.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('election_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/organizations*") ? "menu-open" : "" }} {{ request()->is("admin/positions*") ? "menu-open" : "" }} {{ request()->is("admin/partylists*") ? "menu-open" : "" }} {{ request()->is("admin/candidates*") ? "menu-open" : "" }} {{ request()->is("admin/voters*") ? "menu-open" : "" }} {{ request()->is("admin/results*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.election.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('organization_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.organizations.index") }}" class="nav-link {{ request()->is("admin/organizations") || request()->is("admin/organizations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sitemap">

                                        </i>
                                        <p>
                                            {{ trans('cruds.organization.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('position_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.positions.index") }}" class="nav-link {{ request()->is("admin/positions") || request()->is("admin/positions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked">

                                        </i>
                                        <p>
                                            {{ trans('cruds.position.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partylist_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partylists.index") }}" class="nav-link {{ request()->is("admin/partylists") || request()->is("admin/partylists/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partylist.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('candidate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.candidates.index") }}" class="nav-link {{ request()->is("admin/candidates") || request()->is("admin/candidates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.candidate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('voter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.voters.index") }}" class="nav-link {{ request()->is("admin/voters") || request()->is("admin/voters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.voter.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_voter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-voters.index") }}" class="nav-link {{ request()->is("admin/audit-voters") || request()->is("admin/audit-voters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditVoter.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('result_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.results.index") }}" class="nav-link {{ request()->is("admin/results") || request()->is("admin/results/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.result.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tabulation_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/titles*") ? "menu-open" : "" }} {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/criteria*") ? "menu-open" : "" }} {{ request()->is("admin/judges*") ? "menu-open" : "" }} {{ request()->is("admin/participants*") ? "menu-open" : "" }} {{ request()->is("admin/monitors*") ? "menu-open" : "" }} {{ request()->is("admin/generate-results*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.tabulation.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('title_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.titles.index") }}" class="nav-link {{ request()->is("admin/titles") || request()->is("admin/titles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.title.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-filter">

                                        </i>
                                        <p>
                                            {{ trans('cruds.category.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('criterion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.criteria.index") }}" class="nav-link {{ request()->is("admin/criteria") || request()->is("admin/criteria/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-list-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.criterion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('judge_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.judges.index") }}" class="nav-link {{ request()->is("admin/judges") || request()->is("admin/judges/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-balance-scale">

                                        </i>
                                        <p>
                                            {{ trans('cruds.judge.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('participant_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.participants.index") }}" class="nav-link {{ request()->is("admin/participants") || request()->is("admin/participants/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.participant.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('monitor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.monitors.index") }}" target="_blank" class="nav-link {{ request()->is("admin/monitors") || request()->is("admin/monitors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tv">

                                        </i>
                                        <p>
                                            {{ trans('cruds.monitor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('generate_result_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.generate-results.index") }}" class="nav-link {{ request()->is("admin/generate-results") || request()->is("admin/generate-results/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.generateResult.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_score_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-scores.index") }}" class="nav-link {{ request()->is("admin/audit-scores") || request()->is("admin/audit-scores/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditScore.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                                <i class="fa-fw fa fa-users nav-icon">
                                </i>
                                <p>
                                    {{ trans("global.team-members") }}
                                </p>
                            </a>
                        </li>
                    @endif
{{--
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
