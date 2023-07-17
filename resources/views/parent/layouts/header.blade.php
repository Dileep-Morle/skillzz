<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
  <div class="container-xl">
    <b>Parent Dashboard</b>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row order-md-last">
      
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" ><i class="fa fa-user" style="font-size:40px;color:black;"></i></span>
          <div class="d-none d-xl-block ps-2">
            <div>{{ Auth::user()->name }}</div>
            <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="{{route('parent.profileview')}}" class="dropdown-item">Profile</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">Settings</a>
          <a href="{{ route('parent.logout') }}" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <!-- Welcome <b> &nbsp{{ Auth::user()->name }} &nbsp</b> you are logged -->
    </div>
  </div>
</header>