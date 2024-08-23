<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    @if (Auth::user()->id_level == 1)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @endif

    <li class="nav-heading">Pages</li>

    @if (Auth::user()->id_level == 5 || Auth::user()->id_level == 1)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-cashflows') }}">
        <i class="bi bi-cash"></i>
        <span>Cash Flows</span>
      </a>
    </li>
    @endif

    @if (Auth::user()->id_level == 2 || Auth::user()->id_level == 1)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-material') }}">
        <i class="bi bi-box-fill"></i>
        <span>Pembelian Material</span>
      </a>
    </li>
    @endif

    @if (Auth::user()->id_level == 3 || Auth::user()->id_level == 1)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-stocks') }}">
        <i class="bi bi-bricks"></i>
        <span>Stok Material</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-solar') }}">
        <i class="bi bi-fuel-pump-diesel-fill"></i>
        <span>Pemakaian Solar</span>
      </a>
    </li>
    @endif

    @if (Auth::user()->id_level == 6 || Auth::user()->id_level == 1 || Auth::user()->id_level == 2)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('deliveries.index') }}">
        <i class="bi bi-truck-front-fill"></i>
        <span>Deliveries Order</span>
      </a>
    </li>
    @endif

    @if (Auth::user()->id_level == 4 || Auth::user()->id_level == 1)
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-jobmix') }}">
        <i class="bi bi-clipboard2-check"></i>
        <span>Jobmix</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('list-konversi') }}">
        <i class="bi bi-calculator"></i>
        <span>Konversi</span>
      </a>
    </li>
    @endif

    <li class="nav-heading">Logout</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('logout') }}">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>

  </ul>

</aside><!-- End Sidebar-->