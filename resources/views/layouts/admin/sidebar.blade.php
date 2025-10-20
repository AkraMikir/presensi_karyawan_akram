<nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="text-center mb-4">
            <h4 class="text-white">
                <i class="fas fa-user-shield me-2"></i>
                Admin Panel
            </h4>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.presensi.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.presensi.index') }}">
                    <i class="fas fa-calendar-check me-2"></i>
                    Presensi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.karyawan.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.karyawan.index') }}">
                    <i class="fas fa-users me-2"></i>
                    Karyawan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.perusahaan.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.perusahaan.index') }}">
                    <i class="fas fa-building me-2"></i>
                    Perusahaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.reports.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.reports.index') }}">
                    <i class="fas fa-chart-bar me-2"></i>
                    Laporan
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Pengaturan</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-cog me-2"></i>
                    Pengaturan Sistem
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-user-cog me-2"></i>
                    Manajemen User
                </a>
            </li>
        </ul>
        
        <hr class="text-white">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-eye me-2"></i>
                    Lihat sebagai User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" onclick="logout()">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
