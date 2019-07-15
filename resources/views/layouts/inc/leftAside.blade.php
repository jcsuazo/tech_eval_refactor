<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="{{ asset('img/logo2.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Super Movies</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user/profile.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/home" class="d-block text-capitalize">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>
                            Users Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users" class="nav-link active">
                                <i class="fas fa-users nav-icon"></i>
                                <p>See All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-wrench nav-icon"></i>
                        <p>
                            Movies Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/movies" class="nav-link active">
                                <i class="fas fa-video nav-icon"></i>
                                <p>See All Movies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/browse" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Browse Movies</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-sliders-h nav-icon"></i>
                        <p>
                            Developer Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dev" class="nav-link active">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>Developer Panel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-danger nav-icon"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>