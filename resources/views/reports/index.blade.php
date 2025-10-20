@extends('layouts.admin')

@section('title', 'Laporan - PresensiApp')
@section('page-title', 'Laporan Presensi')

@section('page-actions')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fas fa-download me-1"></i>Export
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i>Excel</a></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2"></i>PDF</a></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-file-csv me-2"></i>CSV</a></li>
    </ul>
</div>
@endsection

@section('content')
<!-- Filter Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('reports.index') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ request('tanggal_awal', now()->startOfMonth()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ request('tanggal_akhir', now()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="perusahaan_id" class="form-label">Perusahaan</label>
                            <select class="form-select" id="perusahaan_id" name="perusahaan_id">
                                <option value="">Semua Perusahaan</option>
                                <option value="1">PT. Teknologi Maju</option>
                                <option value="2">CV. Kreatif Digital</option>
                                <option value="3">UD. Mandiri Jaya</option>
                            </select>
                        </div>
                        <div class="col-md-3">
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

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Hari Kerja
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">22</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                            Hari Hadir
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
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
                            Hari Terlambat
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
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
                            Hari Tidak Hadir
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Presensi Bulanan</h6>
            </div>
            <div class="card-body">
                <canvas id="presensiChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Distribusi Status</h6>
            </div>
            <div class="card-body">
                <canvas id="statusChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Report Table -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Detail Presensi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="reportTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Karyawan</th>
                                <th>Perusahaan</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Durasi Kerja</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>PT. Teknologi Maju</td>
                                <td>01/12/2024</td>
                                <td>08:00</td>
                                <td>17:00</td>
                                <td>9 jam</td>
                                <td><span class="badge bg-success">Hadir</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>CV. Kreatif Digital</td>
                                <td>01/12/2024</td>
                                <td>08:15</td>
                                <td>17:30</td>
                                <td>9 jam 15 menit</td>
                                <td><span class="badge bg-warning">Terlambat</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Mike Johnson</td>
                                <td>UD. Mandiri Jaya</td>
                                <td>01/12/2024</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge bg-danger">Tidak Hadir</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Presensi Chart
const presensiCtx = document.getElementById('presensiChart').getContext('2d');
const presensiChart = new Chart(presensiCtx, {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
        datasets: [{
            label: 'Hadir',
            data: [1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1],
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1
        }, {
            label: 'Terlambat',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            borderColor: 'rgb(255, 205, 86)',
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Status Chart
const statusCtx = document.getElementById('statusChart').getContext('2d');
const statusChart = new Chart(statusCtx, {
    type: 'doughnut',
    data: {
        labels: ['Hadir', 'Terlambat', 'Tidak Hadir'],
        datasets: [{
            data: [20, 3, 2],
            backgroundColor: [
                'rgba(75, 192, 192, 0.8)',
                'rgba(255, 205, 86, 0.8)',
                'rgba(255, 99, 132, 0.8)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            }
        }
    }
});
</script>
@endpush
