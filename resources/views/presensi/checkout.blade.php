@extends('layouts.admin')

@section('title', 'Check Out - PresensiApp')
@section('page-title', 'Check Out')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Check Out
                </h5>
            </div>
            <div class="card-body">
                <form id="checkoutForm">
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
                        <label for="foto_keluar" class="form-label">Foto Check Out</label>
                        <input type="file" class="form-control" id="foto_keluar" name="foto_keluar" accept="image/*" capture="camera">
                        <div class="form-text">Ambil foto untuk verifikasi keluar</div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude_keluar" class="form-label">Latitude</label>
                            <input type="number" class="form-control" id="latitude_keluar" name="latitude_keluar" step="any" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude_keluar" class="form-label">Longitude</label>
                            <input type="number" class="form-control" id="longitude_keluar" name="longitude_keluar" step="any" readonly>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="alert alert-warning">
                            <i class="fas fa-clock me-2"></i>
                            <strong>Waktu Check Out:</strong> <span id="currentTime">{{ now()->format('H:i:s') }}</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan keterangan jika diperlukan..."></textarea>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Check Out Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Today's Summary -->
        <div class="card shadow mt-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-chart-pie me-2"></i>
                    Ringkasan Hari Ini
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="border-end">
                            <h4 class="text-success">8 jam</h4>
                            <small class="text-muted">Total Jam Kerja</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border-end">
                            <h4 class="text-primary">08:00</h4>
                            <small class="text-muted">Jam Masuk</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-warning">17:00</h4>
                        <small class="text-muted">Jam Keluar</small>
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
            $('#latitude_keluar').val(position.coords.latitude);
            $('#longitude_keluar').val(position.coords.longitude);
        });
    }
});

$('#checkoutForm').on('submit', function(e) {
    e.preventDefault();
    
    // Simulate check out process
    const submitBtn = $(this).find('button[type="submit"]');
    const originalText = submitBtn.html();
    
    submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');
    submitBtn.prop('disabled', true);
    
    setTimeout(function() {
        submitBtn.html(originalText);
        submitBtn.prop('disabled', false);
        
        // Show success message
        alert('Check out berhasil! Terima kasih atas kerja keras hari ini.');
        
        // Reset form
        $('#checkoutForm')[0].reset();
    }, 2000);
});
</script>
@endpush