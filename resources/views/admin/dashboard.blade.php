@extends('layouts.admin')

@section('title', 'Dashboard Admin - PresensiApp')
@section('page-title', 'Dashboard Admin')

@section('content')
<!-- Welcome Card -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="card-title mb-3">
                            <i class="fas fa-user-shield me-2"></i>
                            Selamat Datang, Admin!
                        </h4>
                        <p class="card-text mb-0">
                            Ini adalah dashboard admin. Gunakan sidebar untuk mengakses fitur manajemen.
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="display-6">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h5>{{ now()->format('H:i:s') }}</h5>
                        <small>{{ now()->format('d F Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat Admin</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.presensi.index') }}" class="btn btn-info btn-lg w-100">
                            <i class="fas fa-calendar-check me-2"></i>
                            Kelola Presensi
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.karyawan.index') }}" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-users me-2"></i>
                            Kelola Karyawan
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.perusahaan.index') }}" class="btn btn-warning btn-lg w-100">
                            <i class="fas fa-building me-2"></i>
                            Kelola Perusahaan
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary btn-lg w-100">
                            <i class="fas fa-chart-bar me-2"></i>
                            Lihat Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Empty State -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <i class="fas fa-database fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data</h4>
                <p class="text-muted mb-4">
                    Sistem masih kosong. Mulai dengan menambahkan data perusahaan dan karyawan.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.perusahaan.index') }}" class="btn btn-primary">
                        <i class="fas fa-building me-2"></i>
                        Tambah Perusahaan
                    </a>
                    <a href="{{ route('admin.karyawan.index') }}" class="btn btn-success">
                        <i class="fas fa-users me-2"></i>
                        Tambah Karyawan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    // Check if admin is logged in
    if (!sessionStorage.getItem('admin_logged_in')) {
        alert('Anda belum login sebagai admin!');
        window.location.href = '{{ route("admin.login") }}';
    }
});
</script>
@endpush