@extends('layouts.admin')

@section('title', 'Presensi - PresensiApp')
@section('page-title', 'Data Presensi')

@section('page-actions')
<div class="btn-group" role="group">
    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fas fa-filter me-1"></i>Filter
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Hari Ini</a></li>
        <li><a class="dropdown-item" href="#">Minggu Ini</a></li>
        <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
    </ul>
</div>
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
                <form method="GET" action="{{ route('presensi.index') }}">
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
                                <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                                <option value="tidak_hadir" {{ request('status') == 'tidak_hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                <option value="cuti" {{ request('status') == 'cuti' ? 'selected' : '' }}>Cuti</option>
                                <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
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

<!-- Presensi Table -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="presensiTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Karyawan</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($presensi ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/007bff/ffffff?text={{ substr($item->karyawan->nama ?? 'N/A', 0, 1) }}" 
                                             class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                                        <div>
                                            <div class="fw-bold">{{ $item->karyawan->nama ?? 'N/A' }}</div>
                                            <small class="text-muted">{{ $item->karyawan->jabatan ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_presensi)->format('d/m/Y') }}</td>
                                <td>
                                    @if($item->jam_masuk)
                                        <span class="badge bg-success">{{ $item->jam_masuk }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->jam_keluar)
                                        <span class="badge bg-warning">{{ $item->jam_keluar }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @switch($item->status)
                                        @case('hadir')
                                            <span class="badge bg-success">Hadir</span>
                                            @break
                                        @case('terlambat')
                                            <span class="badge bg-warning">Terlambat</span>
                                            @break
                                        @case('tidak_hadir')
                                            <span class="badge bg-danger">Tidak Hadir</span>
                                            @break
                                        @case('cuti')
                                            <span class="badge bg-info">Cuti</span>
                                            @break
                                        @case('sakit')
                                            <span class="badge bg-secondary">Sakit</span>
                                            @break
                                        @default
                                            <span class="badge bg-light text-dark">Unknown</span>
                                    @endswitch
                                </td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-primary" 
                                                onclick="viewPresensi({{ $item->id }})" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-warning" 
                                                onclick="editPresensi({{ $item->id }})" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" 
                                                onclick="deletePresensi({{ $item->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Tidak ada data presensi</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
                                <!-- Options will be loaded via AJAX -->
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
    
    // Load karyawan options
    loadKaryawanOptions();
});

function loadKaryawanOptions() {
    // This would typically load from API
    // For now, we'll add some sample data
    const karyawanSelect = $('#karyawan_id');
    karyawanSelect.append('<option value="1">John Doe - Manager</option>');
    karyawanSelect.append('<option value="2">Jane Smith - Developer</option>');
    karyawanSelect.append('<option value="3">Mike Johnson - Designer</option>');
}

function viewPresensi(id) {
    // Implement view presensi functionality
    console.log('View presensi:', id);
}

function editPresensi(id) {
    // Implement edit presensi functionality
    console.log('Edit presensi:', id);
}

function deletePresensi(id) {
    if (confirm('Apakah Anda yakin ingin menghapus presensi ini?')) {
        // Implement delete presensi functionality
        console.log('Delete presensi:', id);
    }
}

$('#addPresensiForm').on('submit', function(e) {
    e.preventDefault();
    
    // Implement form submission
    console.log('Form submitted');
    
    // Close modal
    $('#addPresensiModal').modal('hide');
    
    // Show success message
    alert('Presensi berhasil ditambahkan!');
});
</script>
@endpush
