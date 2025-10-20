@extends('layouts.admin')

@section('title', 'Check In - PresensiApp')
@section('page-title', 'Check In')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Check In
                </h5>
            </div>
            <div class="card-body">
                <form id="checkinForm">
                    @csrf
                    <div class="mb-3">
                        <label for="karyawan_id" class="form-label">Karyawan <span class="text-danger">*</span></label>
                        <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                            <option value="">Pilih Karyawan</option>
                            <option value="1">John Doe - Manager</option>
                            <option value="2">Jane Smith - Developer</option>
                            <option value="3">Mike Johnson - Designer</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto_masuk" class="form-label">Foto Check In</label>
                        <input type="file" class="form-control" id="foto_masuk" name="foto_masuk" accept="image/*" capture="camera">
                        <div class="form-text">Ambil foto untuk verifikasi kehadiran</div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude_masuk" class="form-label">Latitude</label>
                            <input type="number" class="form-control" id="latitude_masuk" name="latitude_masuk" step="any" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude_masuk" class="form-label">Longitude</label>
                            <input type="number" class="form-control" id="longitude_masuk" name="longitude_masuk" step="any" readonly>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Waktu Check In:</strong> <span id="currentTime">{{ now()->format('H:i:s') }}</span>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-check me-2"></i>
                            Check In Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Recent Check Ins -->
        <div class="card shadow mt-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-history me-2"></i>
                    Check In Terbaru
                </h6>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>John Doe</strong>
                            <br>
                            <small class="text-muted">08:00 - Tepat Waktu</small>
                        </div>
                        <span class="badge bg-success">Hadir</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Jane Smith</strong>
                            <br>
                            <small class="text-muted">08:15 - Terlambat</small>
                        </div>
                        <span class="badge bg-warning">Terlambat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Update time every second
    setInterval(function() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        $('#currentTime').text(timeString);
    }, 1000);
    
    // Get current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            $('#latitude_masuk').val(position.coords.latitude);
            $('#longitude_masuk').val(position.coords.longitude);
        });
    }
});

$('#checkinForm').on('submit', function(e) {
    e.preventDefault();
    
    // Simulate check in process
    const submitBtn = $(this).find('button[type="submit"]');
    const originalText = submitBtn.html();
    
    submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');
    submitBtn.prop('disabled', true);
    
    setTimeout(function() {
        submitBtn.html(originalText);
        submitBtn.prop('disabled', false);
        
        // Show success message
        alert('Check in berhasil! Selamat bekerja.');
        
        // Reset form
        $('#checkinForm')[0].reset();
    }, 2000);
});
</script>
@endpush