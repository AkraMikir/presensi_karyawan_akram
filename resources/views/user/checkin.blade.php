@extends('layouts.user')

@section('title', 'Check In - PresensiApp')
@section('page-title', 'Check In')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
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
                    
                    <!-- Current Time Display -->
                    <div class="text-center mb-4">
                        <div class="display-6 text-success">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 id="currentTime">{{ now()->format('H:i:s') }}</h3>
                        <p class="text-muted">{{ now()->format('d F Y') }}</p>
                    </div>
                    
                    <!-- Location Info -->
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
                    
                    <!-- Photo Upload -->
                    <div class="mb-3">
                        <label for="foto_masuk" class="form-label">Foto Check In</label>
                        <input type="file" class="form-control" id="foto_masuk" name="foto_masuk" accept="image/*" capture="camera">
                        <div class="form-text">Ambil foto untuk verifikasi kehadiran</div>
                    </div>
                    
                    <!-- Notes -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan keterangan jika diperlukan..."></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-check me-2"></i>
                            Check In Sekarang
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
                    Informasi Check In
                </h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Catatan:</strong> Pastikan Anda berada di lokasi yang tepat sebelum melakukan check in.
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
            $('#latitude_masuk').val(position.coords.latitude);
            $('#longitude_masuk').val(position.coords.longitude);
        }, function(error) {
            console.log('Error getting location:', error);
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
        
        // Redirect to dashboard
        window.location.href = '{{ route("user.dashboard") }}';
    }, 2000);
});
</script>
@endpush