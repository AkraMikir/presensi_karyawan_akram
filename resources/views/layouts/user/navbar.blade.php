<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">
            <i class="fas fa-clock me-2"></i>
            PresensiApp
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.presensi.*') ? 'active' : '' }}" href="{{ route('user.presensi.index') }}">
                        <i class="fas fa-calendar-check me-1"></i>Presensi Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.checkin') ? 'active' : '' }}" href="{{ route('user.checkin') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>Check In
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.checkout') ? 'active' : '' }}" href="{{ route('user.checkout') }}">
                        <i class="fas fa-sign-out-alt me-1"></i>Check Out
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i>User
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admin.login') }}"><i class="fas fa-user-shield me-2"></i>Admin Login</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
