<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column text-danger">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin') ? 'text-primary' : 'text-light' }}" aria-current="page" href="{{ route('admin.index') }}">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/comics*') ? 'text-primary' : 'text-light' }}" href="{{ route('admin.comics.index') }}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            All Comics
          </a>
        </li>
        <hr>
      </ul>
    </div>
  </nav>