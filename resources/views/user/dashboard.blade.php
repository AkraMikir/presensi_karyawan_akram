@extends('layouts.user')

@section('title', 'Beranda - PresensiApp')
@section('page-title', 'Beranda')

@section('content')
<!-- Welcome Card -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="card-title mb-3">
                            <i class="fas fa-sun me-2"></i>
                            Selamat Datang!
                        </h4>
                        <p class="card-text mb-0">
                            Selamat datang di sistem presensi karyawan. 
                            Silakan login untuk mengakses fitur presensi.
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="display-6">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 id="currentTime">{{ now()->format('H:i:s') }}</h5>
                        <small>{{ now()->format('d F Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Form -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Login User
                </h5>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Login
                        </button>
                    </div>
                </form>
                
                <hr>
                <div class="text-center">
                    <small class="text-muted">
                        Belum punya akun? 
                        <a href="#" onclick="showRegisterForm()">Daftar di sini</a>
                    </small>
                </div>
            </div>
        </div>
        
        <!-- Register Form (Hidden by default) -->
        <div class="card shadow mt-4" id="registerForm" style="display: none;">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>
                    Daftar User Baru
                </h5>
            </div>
            <div class="card-body">
                <form id="registerFormData">
                    @csrf
                    <div class="mb-3">
                        <label for="reg_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="reg_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="reg_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="reg_password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-user-plus me-2"></i>
                            Daftar
                        </button>
                    </div>
                </form>
                
                <hr>
                <div class="text-center">
                    <small class="text-muted">
                        Sudah punya akun? 
                        <a href="#" onclick="showLoginForm()">Login di sini</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Update time every second
    setInterval(function() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        $('#currentTime').text(timeString);
    }, 1000);
});

function showRegisterForm() {
    $('#loginForm').closest('.card').hide();
    $('#registerForm').show();
}

function showLoginForm() {
    $('#registerForm').hide();
    $('#loginForm').closest('.card').show();
}

$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    
    const email = $('#email').val();
    const password = $('#password').val();
    
    // Simple validation for demo
    if (email === 'user@example.com' && password === 'password') {
        alert('Login berhasil! Selamat datang User.');
        window.location.href = '{{ route("user.dashboard") }}';
    } else {
        alert('Email atau password salah!');
    }
});

$('#registerFormData').on('submit', function(e) {
    e.preventDefault();
    
    const password = $('#reg_password').val();
    const passwordConfirmation = $('#reg_password_confirmation').val();
    
    if (password !== passwordConfirmation) {
        alert('Password dan konfirmasi password tidak sama!');
        return;
    }
    
    alert('Registrasi berhasil! Silakan login.');
    showLoginForm();
    $('#registerFormData')[0].reset();
});
</script>
@endpush