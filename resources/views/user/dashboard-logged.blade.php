@extends('layouts.user')

@section('title', 'Dashboard User - PresensiApp')
@section('page-title', 'Dashboard User')

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
                            Selamat Datang, User!
                        </h4>
                        <p class="card-text mb-0">
                            Ini adalah dashboard user. Silakan gunakan menu di atas untuk navigasi.
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

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-sign-in-alt fa-3x text-success mb-3"></i>
                <h5 class="card-title">Check In</h5>
                <p class="card-text">Lakukan check in untuk memulai hari kerja Anda</p>
                <a href="{{ route('user.checkin') }}" class="btn btn-success btn-lg w-100">
                    <i class="fas fa-check me-2"></i>Check In Sekarang
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-sign-out-alt fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Check Out</h5>
                <p class="card-text">Lakukan check out untuk mengakhiri hari kerja Anda</p>
                <a href="{{ route('user.checkout') }}" class="btn btn-warning btn-lg w-100">
                    <i class="fas fa-times me-2"></i>Check Out Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Status Info -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Status
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Status:</strong> Belum ada data presensi. Silakan lakukan check in untuk memulai.
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
    
    // Check if user is logged in
    if (!sessionStorage.getItem('user_logged_in')) {
        alert('Anda belum login!');
        window.location.href = '{{ route("user.login") }}';
    }
});
</script>
@endpush
