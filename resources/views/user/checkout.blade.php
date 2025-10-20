@extends('layouts.user')

@section('title', 'Check Out - PresensiApp')
@section('page-title', 'Check Out')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
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
                    
                    <!-- Current Time Display -->
                    <div class="text-center mb-4">
                        <div class="display-6 text-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 id="currentTime">{{ now()->format('H:i:s') }}</h3>
                        <p class="text-muted">{{ now()->format('d F Y') }}</p>
                    </div>
                    
                    <!-- Info Alert -->
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Perhatian:</strong> Pastikan Anda sudah melakukan check in hari ini sebelum melakukan check out.
                    </div>
                    
                    <!-- Location Info -->
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
                    
                    <!-- Photo Upload -->
                    <div class="mb-3">
                        <label for="foto_keluar" class="form-label">Foto Check Out</label>
                        <input type="file" class="form-control" id="foto_keluar" name="foto_keluar" accept="image/*" capture="camera">
                        <div class="form-text">Ambil foto untuk verifikasi keluar</div>
                    </div>
                    
                    <!-- Notes -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan keterangan tentang pekerjaan hari ini..."></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Check Out Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Info Card -->
        <div class="card shadow mt-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Check Out
                </h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Catatan:</strong> Pastikan Anda sudah menyelesaikan pekerjaan hari ini sebelum melakukan check out.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Check if user is logged in
    if (!sessionStorage.getItem('user_logged_in')) {
        alert('Anda belum login!');
        window.location.href = '{{ route("user.login") }}';
        return;
    }
    
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
        }, function(error) {
            console.log('Error getting location:', error);
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
        
        // Redirect to dashboard
        window.location.href = '{{ route("user.dashboard") }}';
    }, 2000);
});
</script>
@endpush