<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('presensi.*') ? 'active' : '' }}" href="{{ route('presensi.index') }}">
                    <i class="fas fa-calendar-check me-2"></i>
                    Presensi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('perusahaan.*') ? 'active' : '' }}" href="{{ route('perusahaan.index') }}">
                    <i class="fas fa-building me-2"></i>
                    Perusahaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}">
                    <i class="fas fa-chart-bar me-2"></i>
                    Laporan
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Aksi Cepat</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('presensi.checkin') }}">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Check In
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('presensi.checkout') }}">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Check Out
                </a>
            </li>
        </ul>
    </div>
</nav>