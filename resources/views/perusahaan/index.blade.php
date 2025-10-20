@extends('layouts.admin')

@section('title', 'Perusahaan - PresensiApp')
@section('page-title', 'Data Perusahaan')

@section('page-actions')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerusahaanModal">
    <i class="fas fa-plus me-1"></i>Tambah Perusahaan
</button>
@endsection

@section('content')
<!-- Perusahaan Cards -->
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-building fa-3x text-primary"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="card-title">PT. Teknologi Maju</h5>
                        <p class="card-text text-muted">Jl. Sudirman No. 123, Jakarta</p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>25 Karyawan
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-phone me-1"></i>021-1234567
                            </small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-outline-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-building fa-3x text-success"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="card-title">CV. Kreatif Digital</h5>
                        <p class="card-text text-muted">Jl. Thamrin No. 456, Jakarta</p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>15 Karyawan
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-phone me-1"></i>021-7654321
                            </small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-outline-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-building fa-3x text-warning"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="card-title">UD. Mandiri Jaya</h5>
                        <p class="card-text text-muted">Jl. Gatot Subroto No. 789, Jakarta</p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>8 Karyawan
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-phone me-1"></i>021-9876543
                            </small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-outline-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Perusahaan Modal -->
<div class="modal fade" id="addPerusahaanModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addPerusahaanForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" class="form-control" id="latitude" name="latitude" step="any">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" class="form-control" id="longitude" name="longitude" step="any">
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
$('#addPerusahaanForm').on('submit', function(e) {
    e.preventDefault();
    
    // Simulate form submission
    alert('Perusahaan berhasil ditambahkan!');
    $('#addPerusahaanModal').modal('hide');
    $('#addPerusahaanForm')[0].reset();
});
</script>
@endpush
