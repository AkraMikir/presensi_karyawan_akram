@extends('layouts.admin')

@section('title', 'Check In - Admin Dashboard')
@section('page-title', 'Check In')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="w-20 h-20 bg-gradient-to-r from-primary-green to-primary-blue rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-sign-in-alt text-3xl text-white"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Check In Karyawan</h1>
        <p class="text-gray-600">Lakukan check in untuk karyawan yang terlambat atau tidak bisa check in sendiri</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Check In Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-8">
                <form id="checkinForm" class="space-y-6">
                    @csrf
                    
                    <!-- Karyawan Selection -->
                    <div>
                        <label for="karyawan_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-primary-blue"></i>Pilih Karyawan
                        </label>
                        <select id="karyawan_id" name="karyawan_id" required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all">
                            <option value="">-- Pilih Karyawan --</option>
                            <option value="1">Ahmad Rizki - IT Department</option>
                            <option value="2">Sarah Putri - HR Department</option>
                            <option value="3">Budi Santoso - Finance</option>
                            <option value="4">Lisa Sari - Marketing</option>
                        </select>
                    </div>

                    <!-- Current Time Display -->
                    <div class="text-center mb-6">
                        <div class="text-4xl font-bold text-gray-900 mb-2" id="currentTime">08:15:30</div>
                        <div class="text-lg text-gray-600" id="currentDate">Senin, 23 Oktober 2024</div>
                    </div>

                    <!-- Location Info -->
                    <div class="bg-pastel-blue/30 rounded-xl p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            <i class="fas fa-map-marker-alt mr-2 text-primary-blue"></i>Informasi Lokasi
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
                            <i class="fas fa-camera mr-2 text-primary-blue"></i>Foto Check In
                        </h3>
                        
                        <!-- Photo Upload Area -->
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary-blue transition-colors">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-600 mb-2">Klik untuk mengupload foto atau drag & drop</p>
                            <p class="text-sm text-gray-500">PNG, JPG, JPEG maksimal 5MB</p>
                            <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                        </div>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-sticky-note mr-2 text-primary-blue"></i>Catatan (Opsional)
                        </label>
                        <textarea id="notes" name="notes" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent"
                                  placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-4 bg-gradient-to-r from-primary-green to-primary-blue text-white text-lg font-semibold rounded-xl hover:from-green-600 hover:to-blue-600 transition-all shadow-lg hover:shadow-xl">
                        <i class="fas fa-check mr-2"></i>Check In Karyawan
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <!-- Today's Check Ins -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Check In Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Ahmad Rizki</p>
                            <p class="text-sm text-gray-600">08:15 WIB</p>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Selesai</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Sarah Putri</p>
                            <p class="text-sm text-gray-600">08:45 WIB</p>
                        </div>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Terlambat</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">Lisa Sari</p>
                            <p class="text-sm text-gray-600">08:10 WIB</p>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Selesai</span>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Check In:</span>
                        <span class="font-medium">156</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tepat Waktu:</span>
                        <span class="font-medium text-green-600">142</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Terlambat:</span>
                        <span class="font-medium text-yellow-600">14</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Belum Check In:</span>
                        <span class="font-medium text-red-600">91</span>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="bg-gradient-to-br from-pastel-blue to-pastel-purple rounded-2xl p-6 text-white">
                <h3 class="text-lg font-semibold mb-4">
                    <i class="fas fa-lightbulb mr-2"></i>Tips Check In
                </h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Pastikan karyawan berada di lokasi kantor
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Upload foto yang jelas dan terlihat wajah
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mr-2 mt-1 text-green-300"></i>
                        Catat alasan jika check in dilakukan manual
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update time display
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
    document.getElementById('checkinForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            alert('Check in berhasil!');
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
