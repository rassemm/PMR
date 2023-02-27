
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

                @can('admin_panel_access')
                <li class="side-nav-item">
                    <a class="side-nav-link" href="{{route('dachboards.index')}}">
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                @endcan
            </li>

            <li class="side-nav-title side-nav-item">App</li>
            @can('users_access')
            <li class="side-nav-item">
                <a class="side-nav-link @if(request()->is('admin/users') || request()->is('admin/users/*')) is_active @endif" href="{{ route('admin.users.index') }}">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span> Users </span>
                </a>
            </li>
            @endcan
            @can('roles_access')
            <li class="side-nav-item">
                <a class="side-nav-link @if(request()->is('admin/roles') || request()->is('admin/roles/*')) is_active @endif" href="{{ route('admin.roles.index') }}">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span> Roles </span>
                </a>
            </li>
            @endcan
            @can('permissions_access')
            <li class="side-nav-item">
                <a class="side-nav-link @ @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) is_active @endif" href="{{ route('admin.permissions.index') }}">
                    <i class="mdi mdi-lock-outline me-1"></i>
                    <span> Permission </span>
                </a>
            </li>
            @endcan

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="mr-3 mdi mdi-account" aria-hidden="true"></i>
                    <span> Users Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul aria-expanded="false" class="side-nav-second-level
                    @if(request()->is('admin/users') || request()->is('admin/users/*')) in @endif
                        @if(request()->is('admin/roles') || request()->is('admin/roles/*')) in @endif
                        @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) in @endif">
                        @can('users_access')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/users') || request()->is('admin/users/*')) is_active @endif" href="{{ route('admin.users.index') }}" aria-expanded="false">
                                <i class="mr-3 mdi mdi-account-multiple" aria-hidden="true"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                    @endcan

                    @can('roles_access')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/roles') || request()->is('admin/roles/*')) is_active @endif" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                                <i class="mr-3 mdi mdi-star" aria-hidden="false"></i>
                                <span class="hide-menu">Roles</span>
                            </a>
                        </li>
                    @endcan

                    @can('permissions_access')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) is_active @endif" href="{{ route('admin.permissions.index') }}" aria-expanded="false">
                                <i class="mr-3 mdi mdi-key" aria-hidden="false"></i>
                                <span class="hide-menu">Permissions</span>
                            </a>
                        </li>
                    @endcan
                    </ul>
                </div>
            </li>
            @endcanany--}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Messaging</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="messages">Messages @include('messenger.unread-count')</a>
                        </li>
                        <li>
                            <a href="/messages/create">Create new</a>
                        </li>
                    </ul>
                </div>
            </li>
            @can('project_access')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('projects.index')}}">List</a>
                        </li>

                </div>
            </li>
            @endcan
{{--
            <li class="side-nav-item">
                <a href="apps-social-feed.html" class="side-nav-link">
                    <i class="uil-rss"></i>
                    <span> Social Feed </span>
                </a>
            </li> --}}
            @can('planning_access')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Plannings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('plannings.index')}}">List</a>
                        </li>
                </div>
            </li>
            @endcan
            @can('soutenance_access')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                    <i class="uil-document-layout-center"></i>
                    <span> Soutenance </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('soutenances.index')}}">List</a>
                        </li>
                       {{-- <li>
                            <a href="{{route('admin.profile',$user->$id)}}">Profile/a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            @endcan
        <div class="clearfix"></div>

    </div>


</div>
