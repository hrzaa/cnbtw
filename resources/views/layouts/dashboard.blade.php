
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->


  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">

  {{-- datatables --}}
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

   <!-- ck editor -->
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ url('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi,{{ auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item  has-icon text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="fas fa-sign-out-alt"></i>Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"><img src="/vendor/img/logo1.png"  alt="" style="max-height: 60px"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-clipboard-list"></i> <span>Categories</span></a></li>
              <li class="{{ (request()->is('admin/culiner')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('culiner.index') }}"><i class="fas fa-utensils"></i> <span>Culinary</span></a></li>
              <li class="{{ (request()->is('admin/culiner-gallery*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('culiner-gallery.index') }}"><i class="fas fa-utensils"></i> <span>Culinary Gallery</span></a></li>
              <li class="{{ (request()->is('admin/resto')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('resto.index') }}"><i class="fas fa-store"></i> <span>Resto</span></a></li>
              <li class="{{ (request()->is('admin/resto-gallery*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('resto-gallery.index') }}"><i class="fas fa-store"></i> <span>Resto Gallery</span></a></li>
              <li class="{{ (request()->is('admin/event')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('event.index') }}"><i class="fas fa-calendar-alt"></i><span>Event</span></a></li>
              <li class="{{ (request()->is('admin/event-gallery*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('event-gallery.index') }}"><i class="fas fa-calendar-alt"></i><span>Event Gallery</span></a></li>
              <li class="{{ (request()->is('admin/review*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('review.index') }}"><i class="fas fa-comments"></i> <span>Review</span></a></li>
              <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>
            </ul>
        </aside>
      </div>

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('title')</h1>
                </div>
                {{-- Main Content --}}
                @yield('content')

            </section>
        </div>


      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/custom.js"></script>

  {{-- datatables --}}
  <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>


  <!-- Page Specific JS File -->

  @stack('addon-script')
</body>
</html>
