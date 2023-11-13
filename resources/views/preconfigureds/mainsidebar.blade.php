<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AMS PROJECT 1</span>
  </a>
  <!-- /.Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (account) -->
    <div class="user-panel mt-3 pb-0 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/storage/images/' .Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('profiles.edit') }}" class="d-block">
          <h6>{{ Auth::user()->name }}</h6>
          <p class="text-muted text-center">{{ Auth::user()->role }}</p>
        </a>
      </div>
    </div>
    <!-- /.Sidebar user panel (account) -->

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- /.SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <!-- Menu Start -->
        <li class="nav-item menu-open">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Starter Pages
            </p>
          </a>
        </li>
        <!-- Menu End -->

        <!-- Menu Start -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <!-- Submenus -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('items.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>All Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('unconfigureds.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Unconfigured Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('preconfigureds.index') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Preconfigured Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('configureds.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Configured Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('testeds.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tested Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('installeds.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Installed Items</p>
              </a>
            </li>
          </ul>
          <!-- /.Submenus -->
        </li>
        <!-- Menu End -->

        <!-- Menu Start -->
        <li class="nav-item menu-open">
          <a href="{{ route('logs.index') }}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
            Histories
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <!-- Submenus -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('logs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Activity</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logs-user') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Log</p>
              </a>
            </li>
          </ul>
          <!-- /.Submenus -->
        </li>
        <!-- Menu End -->

      </ul>
    </nav>
    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->

</aside>
<!-- /.Main Sidebar Container -->


@yield('content')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->