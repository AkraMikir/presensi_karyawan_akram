@extends('layouts.admin')

@section('title', 'Kelola Perusahaan - PresensiApp')
@section('page-title', 'Kelola Perusahaan')

@section('page-actions')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerusahaanModal">
    <i class="fas fa-plus me-1"></i>Tambah Perusahaan
</button>
@endsection

@section('content')
<!-- Empty State -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <i class="fas fa-building fa-4x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Data Perusahaan</h4>
                <p class="text-muted mb-4">
                    Belum ada data perusahaan. Mulai dengan menambahkan perusahaan pertama.
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerusahaanModal">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Perusahaan
                </button>
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
