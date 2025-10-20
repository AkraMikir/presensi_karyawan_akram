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
                <form method="GET" action="{{ route('admin.reports.index') }}">
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
                                <!-- Options will be loaded when perusahaan data is available -->
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

<!-- Empty State -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <i class="fas fa-chart-bar fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data Laporan</h4>
                <p class="text-muted mb-4">
                    Belum ada data untuk ditampilkan dalam laporan. Mulai dengan menambahkan data perusahaan dan karyawan.
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
@endsection
