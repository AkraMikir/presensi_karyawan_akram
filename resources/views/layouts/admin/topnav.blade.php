<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <i class="fas fa-bars"></i>
        </button>
        
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-user-shield me-2"></i>
            Admin Panel
        </a>
        
        <div class="navbar-nav ms-auto">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle me-1"></i>
                    Admin User
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-eye me-2"></i>Lihat sebagai User</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
