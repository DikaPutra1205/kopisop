<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/kopi1.png') }}" alt="Kopi 1">
      <span class="d-none d-lg-block">Bisa Ngopi</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if(Auth::user()->profile_picture)
          <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile" class="rounded-circle">
          @else
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama }}</span>
        </a>
        <!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->nama }}</h6>
            @if (Auth::user()->id_level == 1)
            <span>Admin</span>
            @elseif (Auth::user()->id_level == 2)
            <span>Manajer</span>
            @elseif (Auth::user()->id_level == 3)
            <span>Kasir</span>
            @endif
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile')}}">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->