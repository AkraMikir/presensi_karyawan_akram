@extends('layouts.karyawan')

@section('title', 'Presensi - Dashboard Karyawan')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Presensi Saya</h1>
        <p class="text-gray-600">Pantau dan kelola kehadiran Anda dengan mudah</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Kehadiran -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Kehadiran</p>
                    <p class="text-2xl font-bold text-gray-900">22</p>
                </div>
                <div class="w-12 h-12 bg-pastel-green rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-primary-green text-xl"></i>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-green-600 font-medium">+2 dari bulan lalu</span>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Terlambat</p>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                </div>
                <div class="w-12 h-12 bg-pastel-yellow rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-primary-yellow text-xl"></i>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-yellow-600 font-medium">-1 dari bulan lalu</span>
            </div>
        </div>

        <!-- Cuti -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Cuti</p>
                    <p class="text-2xl font-bold text-gray-900">2</p>
                </div>
                <div class="w-12 h-12 bg-pastel-purple rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-times text-primary-purple text-xl"></i>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-purple-600 font-medium">Sisa 8 hari</span>
            </div>
        </div>

        <!-- Persentase Kehadiran -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Kehadiran</p>
                    <p class="text-2xl font-bold text-gray-900">95%</p>
                </div>
                <div class="w-12 h-12 bg-pastel-blue rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-pie text-primary-blue text-xl"></i>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-blue-600 font-medium">Sangat baik</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Check In/Out Status -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Hari Ini</h3>
            <div class="space-y-4">
                <!-- Check In Status -->
                <div class="flex items-center justify-between p-4 bg-pastel-green/30 rounded-xl">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary-green rounded-lg flex items-center justify-center mr-4">
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
                        <div class="w-10 h-10 bg-gray-400 rounded-lg flex items-center justify-center mr-4">
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

    <!-- Presensi History -->
    <div class="bg-white rounded-2xl shadow-soft border border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Riwayat Presensi</h3>
                <div class="flex items-center space-x-4">
                    <!-- Filter -->
                    <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        <option>Bulan ini</option>
                        <option>3 bulan terakhir</option>
                        <option>Tahun ini</option>
                    </select>
                    <!-- Export -->
                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Sample Data -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sen, 23 Okt 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">08:15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">17:30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">9h 15m</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Hadir</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-primary-blue hover:text-blue-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Min, 22 Okt 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Cuti</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-primary-blue hover:text-blue-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sab, 21 Okt 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">08:45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">17:00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">8h 15m</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Terlambat</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-primary-blue hover:text-blue-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">97</span> hasil
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">
                        Sebelumnya
                    </button>
                    <button class="px-3 py-2 text-sm bg-primary-blue text-white rounded-lg">1</button>
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">3</button>
                    <button class="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">
                        Selanjutnya
                    </button>
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
        // You can add AJAX call here to refresh data
        console.log('Refreshing presensi data...');
    }, 30000);

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        // Add any initialization code here
    });
</script>
@endpush
