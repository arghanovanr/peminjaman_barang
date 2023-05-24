<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/dashboard" class="brand-link mb-3">
    <img src="{{asset('images/LogoKemenku.png')}}" alt="LogoKemenku_logo" class="img-fluid" >
  </a>
<div class="sidebar">

    
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

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->role=="admin")
        {{-- Menu Data Master --}}
        <li class="nav-header">DATA MASTER</li>
        <li class="nav-item">
          <a href="/user" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User Management
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/barang" class="nav-link">
            <i class="nav-icon fas fa-archive"></i>
            <p>
              Barang
            </p>
          </a>
        </li>
        @endif
        <li class="nav-header">MODUL</li>
        <li class="nav-item">
          <a href="/formulir" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Formulir
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>