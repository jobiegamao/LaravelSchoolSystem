<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #124559;position:fixed" >
    <!-- Brand Logo -->
    <a href="" class="brand-link logo-switch">
      <img src="{{ asset('dist/img/SEUlogo.jpeg') }}" alt="Logo" class="brand-image-xl rounded elevation-4" style="opacity: .8;">
      <span class="brand-text">SEU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/dp/{{ Auth::user()->dp }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

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

      <!-- Sidebar Menu -->
      @include('layouts.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>