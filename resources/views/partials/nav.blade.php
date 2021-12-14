<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
        </li>
        {{-- <li class="nav-item menu-open"> --}}
        <li class="nav-item {{ request()->is('users*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ver Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users/create" class="nav-link {{ request()->is('users/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear Usuario</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->