@extends('layouts.admin')

@section('title', 'Kelola Karyawan - PresensiApp')
@section('page-title', 'Kelola Karyawan')

@section('page-actions')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">
    <i class="fas fa-plus me-1"></i>Tambah Karyawan
</button>
@endsection

@section('content')
<!-- Filter Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.karyawan.index') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="perusahaan_id" class="form-label">Perusahaan</label>
                            <select class="form-select" id="perusahaan_id" name="perusahaan_id">
                                <option value="">Semua Perusahaan</option>
                                <!-- Options will be loaded when perusahaan data is available -->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Semua Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="search" class="form-label">Cari</label>
                            <input type="text" class="form-control" id="search" name="search" placeholder="Nama atau NIK...">
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
                <i class="fas fa-users fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data Karyawan</h4>
                <p class="text-muted mb-4">
                    Belum ada data karyawan. Mulai dengan menambahkan karyawan pertama.
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Karyawan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Karyawan Modal -->
<div class="modal fade" id="addKaryawanModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addKaryawanForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="perusahaan_id" class="form-label">Perusahaan <span class="text-danger">*</span></label>
                            <select class="form-select" id="perusahaan_id" name="perusahaan_id" required>
                                <option value="">Pilih Perusahaan</option>
                                <!-- Options will be loaded when perusahaan data is available -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
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
$('#addKaryawanForm').on('submit', function(e) {
    e.preventDefault();
    
    // Simulate form submission
    alert('Karyawan berhasil ditambahkan!');
    $('#addKaryawanModal').modal('hide');
    $('#addKaryawanForm')[0].reset();
});
</script>
@endpush