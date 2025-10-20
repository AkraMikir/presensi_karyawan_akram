@extends('layouts.admin')

@section('title', 'Login Admin - PresensiApp')
@section('page-title', 'Login Admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-shield me-2"></i>
                    Login Admin
                </h5>
            </div>
            <div class="card-body">
                <form id="adminLoginForm">
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
                        <button type="submit" class="btn btn-dark btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Login Admin
                        </button>
                    </div>
                </form>
                
                <hr>
                <div class="text-center">
                    <small class="text-muted">
                        Bukan admin? 
                        <a href="{{ route('user.login') }}">Login sebagai User</a>
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
$('#adminLoginForm').on('submit', function(e) {
    e.preventDefault();
    
    const email = $('#email').val();
    const password = $('#password').val();
    
    // Simple validation for demo
    if (email === 'admin@example.com' && password === 'admin123') {
        // Store login status in sessionStorage
        sessionStorage.setItem('admin_logged_in', 'true');
        sessionStorage.setItem('admin_email', email);
        
        alert('Login admin berhasil! Selamat datang Admin.');
        window.location.href = '{{ route("admin.dashboard") }}';
    } else {
        alert('Email atau password admin salah!');
    }
});
</script>
@endpush