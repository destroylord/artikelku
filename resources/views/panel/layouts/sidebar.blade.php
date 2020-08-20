<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Master</li>
          <li class="{{ Request::is('dashboard') ? ' active' : '' }}">
            <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="{{ request()->is('artikel/my-artikel') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('my.artikel') }}"><i class="fas fa-newspaper"></i> <span>Artikel</span>
            </a>
          </li>
          <li class="{{ request()->is('category') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('categori.index') }}"><i class="fas fa-newspaper"></i> <span>Kategori</span>
            </a>
          </li>
          <li class="{{ request()->is('tag') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-newspaper"></i> <span>Tag</span>
            </a>
          </li>
          <li class="menu-header">Settings</li>

            <li class="">
              <a class="nav-link" href="#"><i class="fas fa-users"></i> <span>User Management</span></a>
            </li>
            <li class="">
              <a class="nav-link" href="#"><i class="fas fa-user-cog"></i> <span>Usertype Management</span></a>
            <li class="">
              <a class="nav-link" href="#"><i class="fas fa-bars"></i> <span>Menu Management</span></a>
            </li>
            <li class="">
              <a class="nav-link" href="#"><i class="fas fa-bars"></i> <span>Sub Menu Management</span></a>
            </li>
            <li class="">
              <a class="nav-link" href="#"><i class="fas fa-user-lock"></i> <span>Menu Access</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div>
    </aside>
  </div>