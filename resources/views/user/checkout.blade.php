@extends('layouts.karyawan')

@section('title', 'Check Out - Dashboard Karyawan')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="w-20 h-20 bg-gradient-to-r from-primary-purple to-primary-blue rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-sign-out-alt text-3xl text-white"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Check Out</h1>
        <p class="text-gray-600">Lakukan check out untuk mengakhiri hari kerja Anda</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Check Out Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-8">
                <form id="checkoutForm" class="space-y-6">
                    @csrf
                    
                    <!-- Current Time Display -->
                    <div class="text-center mb-6">
                        <div class="text-4xl font-bold text-gray-900 mb-2" id="currentTime">17:30:45</div>
                        <div class="text-lg text-gray-600" id="currentDate">Senin, 23 Oktober 2024</div>
                    </div>

                    <!-- Work Duration -->
                    <div class="bg-gradient-to-r from-pastel-green to-pastel-blue rounded-xl p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-clock mr-2 text-primary-blue"></i>Durasi Kerja Hari Ini
                        </h3>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-blue mb-2" id="workDuration">9h 15m</div>
                            <div class="text-sm text-gray-600">
                                Check In: <span class="font-medium">08:15</span> | 
                                Target: <span class="font-medium">8 jam</span>
                            </div>
                        </div>
                    </div>

                    <!-- Location Info -->
                    <div class="bg-pastel-purple/30 rounded-xl p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-map-marker-alt mr-2 text-primary-purple"></i>Informasi Lokasi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                                <input type="text" id="latitude" readonly 
                                       class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-600"
                                       value="-6.2088">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                                <input type="text" id="longitude" readonly 
                                       class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-600"
                                       value="106.8456">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <input type="text" id="address" readonly 
                                   class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-600"
                                   value="Jl. Sudirman No. 123, Jakarta Pusat">
                        </div>
                    </div>

                    <!-- Photo Capture -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">
                            <i class="fas fa-camera mr-2 text-primary-purple"></i>Foto Check Out
                        </h3>
                        
                        <!-- Camera Preview -->
                        <div class="relative">
                            <div id="cameraPreview" class="w-full h-64 bg-gray-100 rounded-xl flex items-center justify-center border-2 border-dashed border-gray-300">
                                <div class="text-center">
                                    <i class="fas fa-camera text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-500">Klik untuk mengambil foto</p>
                                </div>
                            </div>
                            <video id="video" class="hidden w-full h-64 rounded-xl"></video>
                            <canvas id="canvas" class="hidden"></canvas>
                            
                            <!-- Camera Controls -->
                            <div id="cameraControls" class="hidden absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-4">
                                <button type="button" id="captureBtn" 
                                        class="w-12 h-12 bg-primary-purple text-white rounded-full flex items-center justify-center hover:bg-purple-600 transition-colors">
                                    <i class="fas fa-camera"></i>
                                </button>
                                <button type="button" id="retakeBtn" 
                                        class="w-12 h-12 bg-gray-500 text-white rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors">
                                    <i class="fas fa-redo"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Photo Actions -->
                        <div class="flex space-x-4">
                            <button type="button" id="startCamera" 
                                    class="flex-1 px-4 py-2 bg-primary-purple text-white rounded-lg hover:bg-purple-600 transition-colors">
                                <i class="fas fa-camera mr-2"></i>Buka Kamera
                            </button>
                            <button type="button" id="uploadPhoto" 
                                    class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                <i class="fas fa-upload mr-2"></i>Upload Foto
                            </button>
                        </div>
                    </div>

                    <!-- Work Summary -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-clipboard-list mr-2 text-primary-blue"></i>Ringkasan Hari Kerja
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tugas yang Diselesaikan</label>
                                <textarea name="tasks_completed" rows="3" 
                                          class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent"
                                          placeholder="Daftar tugas yang telah diselesaikan hari ini..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan</label>
                                <textarea name="additional_notes" rows="3" 
                                          class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent"
                                          placeholder="Catatan atau hal penting lainnya..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-4 bg-gradient-to-r from-primary-purple to-primary-blue text-white text-lg font-semibold rounded-xl hover:from-purple-600 hover:to-blue-600 transition-all shadow-lg hover:shadow-xl">
                        <i class="fas fa-check mr-2"></i>Check Out Sekarang
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <!-- Today's Summary -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Check In:</span>
                        <span class="font-medium text-green-600">08:15</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Check Out:</span>
                        <span class="font-medium text-gray-400">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Durasi Kerja:</span>
                        <span class="font-medium text-primary-blue">9h 15m</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Sedang Bekerja</span>
                    </div>
                </div>
            </div>

            <!-- Work Statistics -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Minggu Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Jam Kerja:</span>
                        <span class="font-medium">45h 30m</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Rata-rata per hari:</span>
                        <span class="font-medium">9h 6m</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Kehadiran:</span>
                        <span class="font-medium text-green-600">100%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Terlambat:</span>
                        <span class="font-medium text-yellow-600">1x</span>
                    </div>
                </div>
            </div>

            <!-- Recent Check Outs -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Check Out Terbaru</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">22 Okt 2024</p>
                            <p class="text-sm text-gray-600">17:30 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">9h 15m</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">21 Okt 2024</p>
                            <p class="text-sm text-gray-600">17:00 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">8h 15m</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">20 Okt 2024</p>
                            <p class="text-sm text-gray-600">17:45 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">9h 35m</span>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="bg-gradient-to-br from-pastel-purple to-pastel-blue rounded-2xl p-6 text-white">
                <h3 class="text-lg font-semibold mb-4">
                    <i class="fas fa-lightbulb mr-2"></i>Tips Check Out
                </h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Pastikan semua tugas hari ini telah selesai
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Ambil foto yang jelas untuk dokumentasi
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Isi ringkasan kerja dengan detail
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let stream = null;
    let capturedImage = null;
    let checkInTime = new Date('2024-10-23T08:15:00'); // Mock check-in time

    // Update time display and work duration
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit' 
        });
        const dateString = now.toLocaleDateString('id-ID', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        document.getElementById('currentTime').textContent = timeString;
        document.getElementById('currentDate').textContent = dateString;
        
        // Calculate work duration
        const diffMs = now - checkInTime;
        const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
        const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
        document.getElementById('workDuration').textContent = `${diffHours}h ${diffMinutes}m`;
    }

    // Start camera
    document.getElementById('startCamera').addEventListener('click', async function() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { 
                    width: 640, 
                    height: 480,
                    facingMode: 'user'
                } 
            });
            
            const video = document.getElementById('video');
            const preview = document.getElementById('cameraPreview');
            const controls = document.getElementById('cameraControls');
            
            video.srcObject = stream;
            video.style.display = 'block';
            preview.style.display = 'none';
            controls.classList.remove('hidden');
            
            video.play();
        } catch (err) {
            alert('Tidak dapat mengakses kamera. Pastikan izin kamera telah diberikan.');
            console.error('Error accessing camera:', err);
        }
    });

    // Capture photo
    document.getElementById('captureBtn').addEventListener('click', function() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        ctx.drawImage(video, 0, 0);
        
        capturedImage = canvas.toDataURL('image/jpeg', 0.8);
        
        // Stop camera
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
        
        // Show captured image
        const preview = document.getElementById('cameraPreview');
        preview.innerHTML = `<img src="${capturedImage}" class="w-full h-64 object-cover rounded-xl">`;
        preview.style.display = 'block';
        video.style.display = 'none';
        document.getElementById('cameraControls').classList.add('hidden');
    });

    // Retake photo
    document.getElementById('retakeBtn').addEventListener('click', function() {
        document.getElementById('startCamera').click();
    });

    // Upload photo
    document.getElementById('uploadPhoto').addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    capturedImage = e.target.result;
                    const preview = document.getElementById('cameraPreview');
                    preview.innerHTML = `<img src="${capturedImage}" class="w-full h-64 object-cover rounded-xl">`;
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    });

    // Form submission
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!capturedImage) {
            alert('Silakan ambil foto terlebih dahulu');
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            alert('Check out berhasil! Terima kasih atas kerja keras Anda hari ini.');
            window.location.href = '{{ route("user.presensi.index") }}';
        }, 2000);
    });

    // Get current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('latitude').value = position.coords.latitude.toFixed(6);
            document.getElementById('longitude').value = position.coords.longitude.toFixed(6);
        });
    }

    // Initialize
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endpush
