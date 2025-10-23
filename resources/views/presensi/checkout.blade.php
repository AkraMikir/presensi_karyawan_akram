@extends('layouts.admin')

@section('title', 'Check Out - Admin Dashboard')
@section('page-title', 'Check Out')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="w-20 h-20 bg-gradient-to-r from-primary-purple to-primary-blue rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-sign-out-alt text-3xl text-white"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Check Out Karyawan</h1>
        <p class="text-gray-600">Lakukan check out untuk karyawan yang sudah check in</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Check Out Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-8">
                <form id="checkoutForm" class="space-y-6">
                    @csrf
                    
                    <!-- Karyawan Selection -->
                    <div>
                        <label for="karyawan_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-primary-blue"></i>Pilih Karyawan
                        </label>
                        <select id="karyawan_id" name="karyawan_id" required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all">
                            <option value="">-- Pilih Karyawan --</option>
                            <option value="1">Ahmad Rizki - IT Department (Check In: 08:15)</option>
                            <option value="2">Sarah Putri - HR Department (Check In: 08:45)</option>
                            <option value="3">Budi Santoso - Finance (Check In: 08:10)</option>
                            <option value="4">Lisa Sari - Marketing (Check In: 08:20)</option>
                        </select>
                    </div>

                    <!-- Current Time Display -->
                    <div class="text-center mb-6">
                        <div class="text-4xl font-bold text-gray-900 mb-2" id="currentTime">17:30:45</div>
                        <div class="text-lg text-gray-600" id="currentDate">Senin, 23 Oktober 2024</div>
                    </div>

                    <!-- Work Duration -->
                    <div class="bg-gradient-to-r from-pastel-green to-pastel-blue rounded-xl p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-clock mr-2 text-primary-blue"></i>Durasi Kerja
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

                    <!-- Photo Upload -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">
                            <i class="fas fa-camera mr-2 text-primary-purple"></i>Foto Check Out
                        </h3>
                        
                        <!-- Photo Upload Area -->
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary-purple transition-colors">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-600 mb-2">Klik untuk mengupload foto atau drag & drop</p>
                            <p class="text-sm text-gray-500">PNG, JPG, JPEG maksimal 5MB</p>
                            <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
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
                        <i class="fas fa-check mr-2"></i>Check Out Karyawan
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <!-- Today's Check Outs -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Check Out Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Ahmad Rizki</p>
                            <p class="text-sm text-gray-600">17:30 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">9h 15m</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Sarah Putri</p>
                            <p class="text-sm text-gray-600">17:00 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">8h 15m</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Lisa Sari</p>
                            <p class="text-sm text-gray-600">17:45 WIB</p>
                        </div>
                        <span class="text-sm text-gray-500">9h 25m</span>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Check Out:</span>
                        <span class="font-medium">142</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Rata-rata Jam Kerja:</span>
                        <span class="font-medium text-blue-600">8.5h</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Lembur:</span>
                        <span class="font-medium text-yellow-600">23</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Belum Check Out:</span>
                        <span class="font-medium text-red-600">14</span>
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
                        Pastikan karyawan sudah check in terlebih dahulu
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Upload foto yang jelas untuk dokumentasi
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

    // Photo upload handling
    document.querySelector('.border-dashed').addEventListener('click', function() {
        document.getElementById('photo').click();
    });

    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const uploadArea = document.querySelector('.border-dashed');
                uploadArea.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg mb-2">
                    <p class="text-sm text-gray-600">${file.name}</p>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Form submission
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            alert('Check out berhasil!');
            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
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
