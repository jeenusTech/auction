
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/index" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" id="navbardropdown">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="{{asset('/frontend/logo/logo.png')}}" class="img-circle elevation-2" alt="User Image" width="35px">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          {{-- <a href="#" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> log out
          </a> --}}
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
             <i class="fas fa-lock mr-2"></i> {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->