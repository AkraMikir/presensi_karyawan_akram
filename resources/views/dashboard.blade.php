@extends('layouts.app')

@section('title', 'Dashboard - PresensiApp')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Karyawan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Hadir Hari Ini
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">142</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Terlambat
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Tidak Hadir
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
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
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('presensi.checkin') }}" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Check In
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('presensi.checkout') }}" class="btn btn-warning btn-lg w-100">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Check Out
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('presensi.index') }}" class="btn btn-info btn-lg w-100">
                            <i class="fas fa-calendar-check me-2"></i>
                            Lihat Presensi
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary btn-lg w-100">
                            <i class="fas fa-chart-bar me-2"></i>
                            Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Karyawan</th>
                                <th>Aktivitas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>08:30</td>
                                <td>John Doe</td>
                                <td>Check In</td>
                                <td><span class="badge bg-success">Tepat Waktu</span></td>
                            </tr>
                            <tr>
                                <td>08:45</td>
                                <td>Jane Smith</td>
                                <td>Check In</td>
                                <td><span class="badge bg-warning">Terlambat</span></td>
                            </tr>
                            <tr>
                                <td>09:00</td>
                                <td>Mike Johnson</td>
                                <td>Check In</td>
                                <td><span class="badge bg-success">Tepat Waktu</span></td>
                            </tr>
                            <tr>
                                <td>17:00</td>
                                <td>Sarah Wilson</td>
                                <td>Check Out</td>
                                <td><span class="badge bg-info">Normal</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Presensi Hari Ini</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Hadir</span>
                        <span class="fw-bold">142</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: 91%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Terlambat</span>
                        <span class="fw-bold">8</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 5%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Tidak Hadir</span>
                        <span class="fw-bold">6</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-danger" style="width: 4%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Weather Widget -->
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cuaca Hari Ini</h6>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-sun fa-3x text-warning mb-3"></i>
                <h4>28°C</h4>
                <p class="text-muted">Cerah</p>
                <small class="text-muted">Jakarta, Indonesia</small>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.border-left-danger {
    border-left: 0.25rem solid #e74a3b !important;
}
</style>
@endpush
