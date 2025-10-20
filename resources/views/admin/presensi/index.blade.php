@extends('layouts.admin')

@section('title', 'Kelola Presensi - PresensiApp')
@section('page-title', 'Kelola Presensi')

@section('page-actions')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPresensiModal">
    <i class="fas fa-plus me-1"></i>Tambah Presensi
</button>
@endsection

@section('content')
<!-- Filter Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.presensi.index') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Semua Status</option>
                                <option value="hadir">Hadir</option>
                                <option value="terlambat">Terlambat</option>
                                <option value="tidak_hadir">Tidak Hadir</option>
                                <option value="cuti">Cuti</option>
                                <option value="sakit">Sakit</option>
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
                <i class="fas fa-calendar-times fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data Presensi</h4>
                <p class="text-muted mb-4">
                    Belum ada data presensi. Mulai dengan menambahkan data presensi atau tunggu karyawan melakukan check in.
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPresensiModal">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Presensi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Presensi Modal -->
<div class="modal fade" id="addPresensiModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Presensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addPresensiForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="karyawan_id" class="form-label">Karyawan <span class="text-danger">*</span></label>
                            <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                                <option value="">Pilih Karyawan</option>
                                <!-- Options will be loaded when karyawan data is available -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_presensi" class="form-label">Tanggal Presensi <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_presensi" name="tanggal_presensi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_keluar" class="form-label">Jam Keluar</label>
                            <input type="time" class="form-control" id="jam_keluar" name="jam_keluar">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="hadir">Hadir</option>
                                <option value="terlambat">Terlambat</option>
                                <option value="tidak_hadir">Tidak Hadir</option>
                                <option value="cuti">Cuti</option>
                                <option value="sakit">Sakit</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Set default date to today
    $('#tanggal_presensi').val(new Date().toISOString().split('T')[0]);
});

$('#addPresensiForm').on('submit', function(e) {
    e.preventDefault();
    
    // Simulate form submission
    alert('Presensi berhasil ditambahkan!');
    $('#addPresensiModal').modal('hide');
    $('#addPresensiForm')[0].reset();
});
</script>
@endpush
