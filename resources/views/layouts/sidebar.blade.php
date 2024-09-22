<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard Nav -->
    <li class="nav-item">
      <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Nav -->
    <li class="nav-item">
      <a href=" " class="nav-link collapsed">
        <i class="bi bi-people-fill"></i>
        <span>Fitur 1</span>
      </a>
    </li><!-- End Nav -->

    <!-- Nav -->
    <li class="nav-item">
      <a href=" " class="nav-link collapsed">
        <i class="bi bi-people-fill"></i>
        <span>Fitur 2</span>
      </a>
    </li><!-- End Nav -->

    <!-- Nav -->
    <li class="nav-item">
      <a href=" " class="nav-link collapsed">
        <i class="bi bi-people-fill"></i>
        <span>Fitur 3</span>
      </a>
    </li><!-- End Nav -->

    <!-- Logout Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Logout Nav -->

  </ul>

</aside><!-- End Sidebar -->
