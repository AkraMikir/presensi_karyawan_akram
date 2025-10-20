@extends('layouts.user')

@section('title', 'Login User - PresensiApp')
@section('page-title', 'Login User')

@section('content')
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
        
        <!-- Back to Landing Page -->
        <div class="text-center mt-4">
            <a href="{{ route('landing') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
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
        // Store login status in sessionStorage
        sessionStorage.setItem('user_logged_in', 'true');
        sessionStorage.setItem('user_email', email);
        
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
