@extends('layouts.user')

@section('title', 'Presensi Saya - PresensiApp')
@section('page-title', 'Presensi Saya')

@section('content')
<!-- Filter Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('user.presensi.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ request('tanggal_awal', now()->startOfMonth()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ request('tanggal_akhir', now()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Empty State -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-calendar-times fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data Presensi</h4>
                <p class="text-muted mb-4">
                    Anda belum melakukan presensi. Silakan lakukan check in untuk memulai.
                </p>
                <a href="{{ route('user.checkin') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Check In Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    // Check if user is logged in
    if (!sessionStorage.getItem('user_logged_in')) {
        alert('Anda belum login!');
        window.location.href = '{{ route("user.login") }}';
    }
});
</script>
@endpush