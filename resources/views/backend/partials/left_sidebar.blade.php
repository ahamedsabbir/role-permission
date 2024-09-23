<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('backend') }}/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">Nowak Helme</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title mt-2">Roles-Permitions</li>

                <li>
                    <a href="#sidebarUser" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUser">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('user.create') }}" class="{{ request()->routeIs('user.create') ? 'active' : '' }}">Create</a></li>
                            <li><a href="{{ route('user.index') }}" class="{{ request()->routeIs('user.index') ? 'active' : '' }}">List</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarRoles" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRoles">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('roles.create') }}" class="{{ request()->routeIs('roles.create') ? 'active' : '' }}">Create</a></li>
                            <li><a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.index') ? 'active' : '' }}">List</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarPermissions" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Permissions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPermissions">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('permissions.create') }}" class="{{ request()->routeIs('permissions.create') ? 'active' : '' }}">Create</a></li>
                            <li><a href="{{ route('permissions.index') }}" class="{{ request()->routeIs('permissions.index') ? 'active' : '' }}">List</a></li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>