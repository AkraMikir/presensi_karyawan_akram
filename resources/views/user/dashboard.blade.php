@extends('layouts.karyawan')

@section('title', 'Dashboard Karyawan - Sistem Presensi')
@section('page-title', 'Dashboard')

@section('content')
<div class="p-6">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Karyawan' }}!</h1>
        <p class="text-gray-600">Berikut adalah ringkasan presensi Anda hari ini</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Kehadiran -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Kehadiran</p>
                    <p class="text-2xl font-bold text-gray-900">22</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+2 dari bulan lalu
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-green rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-primary-green text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Terlambat</p>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                    <p class="text-sm text-yellow-600 mt-1">
                        <i class="fas fa-arrow-down mr-1"></i>-1 dari bulan lalu
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-yellow rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-primary-yellow text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Cuti -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Cuti</p>
                    <p class="text-2xl font-bold text-gray-900">2</p>
                    <p class="text-sm text-purple-600 mt-1">
                        <i class="fas fa-calendar-times mr-1"></i>Sisa 8 hari
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-purple rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-times text-primary-purple text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Persentase Kehadiran -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Kehadiran</p>
                    <p class="text-2xl font-bold text-gray-900">95%</p>
                    <p class="text-sm text-blue-600 mt-1">
                        <i class="fas fa-chart-line mr-1"></i>Sangat baik
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-blue rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-pie text-primary-blue text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Status and Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Today's Status -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Hari Ini</h3>
            <div class="space-y-4">
                <!-- Check In Status -->
                <div class="flex items-center justify-between p-4 bg-pastel-green/30 rounded-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-green rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-sign-in-alt text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Check In</p>
                            <p class="text-sm text-gray-600">08:15 WIB</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                        Selesai
                    </span>
                </div>

                <!-- Check Out Status -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-400 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-sign-out-alt text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Check Out</p>
                            <p class="text-sm text-gray-600">Belum dilakukan</p>
                        </div>
                    </div>
                    <a href="{{ route('user.checkout') }}" class="px-4 py-2 bg-primary-blue text-white text-sm font-medium rounded-lg hover:bg-blue-600 transition-colors">
                        Check Out
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('user.checkin') }}" 
                       class="flex items-center p-3 bg-pastel-green/30 hover:bg-pastel-green/50 rounded-xl transition-colors">
                        <i class="fas fa-sign-in-alt text-primary-green mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Check In</span>
                    </a>
                    <a href="{{ route('user.checkout') }}" 
                       class="flex items-center p-3 bg-pastel-blue/30 hover:bg-pastel-blue/50 rounded-xl transition-colors">
                        <i class="fas fa-sign-out-alt text-primary-blue mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Check Out</span>
                    </a>
                    <a href="{{ route('user.presensi.index') }}" 
                       class="flex items-center p-3 bg-pastel-purple/30 hover:bg-pastel-purple/50 rounded-xl transition-colors">
                        <i class="fas fa-clock text-primary-purple mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Riwayat Presensi</span>
                    </a>
                </div>
            </div>

            <!-- Today's Summary -->
            <div class="bg-gradient-to-br from-primary-blue to-primary-purple rounded-2xl p-6 text-white">
                <h3 class="text-lg font-semibold mb-4">Ringkasan Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-blue-100">Jam Masuk:</span>
                        <span class="font-medium">08:15</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-100">Jam Keluar:</span>
                        <span class="font-medium">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-100">Durasi Kerja:</span>
                        <span class="font-medium">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-100">Status:</span>
                        <span class="px-2 py-1 bg-green-500/20 text-green-200 rounded text-xs">Hadir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-2xl shadow-soft border border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-sign-in-alt text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Check in berhasil</p>
                        <p class="text-xs text-gray-500">Hari ini, 08:15 WIB</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Presensi kemarin tercatat</p>
                        <p class="text-xs text-gray-500">Kemarin, 17:30 WIB</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-times text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Pengajuan cuti disetujui</p>
                        <p class="text-xs text-gray-500">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-refresh data every 30 seconds
    setInterval(function() {
        // You can add AJAX call here to refresh dashboard data
        console.log('Refreshing dashboard data...');
    }, 30000);
</script>
@endpush
