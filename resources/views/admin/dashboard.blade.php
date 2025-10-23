@extends('layouts.admin')

@section('title', 'Admin Dashboard - Sistem Presensi')
@section('page-title', 'Dashboard')

@section('content')
<div class="p-6">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h1>
        <p class="text-gray-600">Berikut adalah ringkasan sistem presensi hari ini</p>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Karyawan -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Karyawan</p>
                    <p class="text-3xl font-bold text-gray-900">1,247</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+12% dari bulan lalu
                    </p>
                </div>
                <div class="w-16 h-16 bg-pastel-blue rounded-2xl flex items-center justify-center">
                    <i class="fas fa-users text-2xl text-primary-blue"></i>
                </div>
            </div>
        </div>

        <!-- Kehadiran Hari Ini -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Kehadiran Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-900">1,156</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>92.7% hadir
                    </p>
                </div>
                <div class="w-16 h-16 bg-pastel-green rounded-2xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-2xl text-primary-green"></i>
                </div>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Terlambat</p>
                    <p class="text-3xl font-bold text-gray-900">47</p>
                    <p class="text-sm text-yellow-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>4.1% terlambat
                    </p>
                </div>
                <div class="w-16 h-16 bg-pastel-yellow rounded-2xl flex items-center justify-center">
                    <i class="fas fa-clock text-2xl text-primary-yellow"></i>
                </div>
            </div>
        </div>

        <!-- Cuti -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Cuti Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-900">44</p>
                    <p class="text-sm text-purple-600 mt-1">
                        <i class="fas fa-calendar-times mr-1"></i>3.5% cuti
                    </p>
                </div>
                <div class="w-16 h-16 bg-pastel-purple rounded-2xl flex items-center justify-center">
                    <i class="fas fa-calendar-times text-2xl text-primary-purple"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Attendance Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Tren Kehadiran 7 Hari Terakhir</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-primary-blue text-white text-sm rounded-lg">7 Hari</button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-lg">30 Hari</button>
                </div>
            </div>
            <div class="h-64">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        <!-- Department Performance -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Performa Divisi</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary-blue rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-900">IT Department</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-primary-blue h-2 rounded-full" style="width: 95%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">95%</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary-green rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-900">HR Department</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-primary-green h-2 rounded-full" style="width: 92%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">92%</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary-yellow rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-900">Finance</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-primary-yellow h-2 rounded-full" style="width: 88%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">88%</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-primary-purple rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-gray-900">Marketing</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-primary-purple h-2 rounded-full" style="width: 85%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">85%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities and Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activities -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-sign-in-alt text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Ahmad Rizki melakukan check in</p>
                        <p class="text-xs text-gray-500">2 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Sarah Putri terlambat 15 menit</p>
                        <p class="text-xs text-gray-500">5 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-times text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Budi Santoso mengajukan cuti</p>
                        <p class="text-xs text-gray-500">10 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-plus text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Karyawan baru ditambahkan</p>
                        <p class="text-xs text-gray-500">1 jam yang lalu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.karyawan.index') }}" 
                       class="flex items-center p-3 bg-pastel-blue/30 hover:bg-pastel-blue/50 rounded-xl transition-colors">
                        <i class="fas fa-user-plus text-primary-blue mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Tambah Karyawan</span>
                    </a>
                    <a href="{{ route('admin.presensi.index') }}" 
                       class="flex items-center p-3 bg-pastel-green/30 hover:bg-pastel-green/50 rounded-xl transition-colors">
                        <i class="fas fa-clock text-primary-green mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Lihat Presensi</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" 
                       class="flex items-center p-3 bg-pastel-purple/30 hover:bg-pastel-purple/50 rounded-xl transition-colors">
                        <i class="fas fa-chart-bar text-primary-purple mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Generate Laporan</span>
                    </a>
                    <a href="#" 
                       class="flex items-center p-3 bg-pastel-yellow/30 hover:bg-pastel-yellow/50 rounded-xl transition-colors">
                        <i class="fas fa-cog text-primary-yellow mr-3"></i>
                        <span class="text-sm font-medium text-gray-900">Pengaturan</span>
                    </a>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-gradient-to-br from-primary-blue to-primary-purple rounded-2xl p-6 text-white">
                <h3 class="text-lg font-semibold mb-4">Status Sistem</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Server Status:</span>
                        <span class="px-2 py-1 bg-green-500/20 text-green-200 rounded text-xs">Online</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Database:</span>
                        <span class="px-2 py-1 bg-green-500/20 text-green-200 rounded text-xs">Connected</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">API Status:</span>
                        <span class="px-2 py-1 bg-green-500/20 text-green-200 rounded text-xs">Active</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Uptime:</span>
                        <span class="text-white font-medium">99.9%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Attendance Chart
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Kehadiran (%)',
                data: [92, 95, 88, 94, 96, 89, 85],
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#3B82F6',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            elements: {
                point: {
                    hoverRadius: 8
                }
            }
        }
    });

    // Auto-refresh data every 30 seconds
    setInterval(function() {
        // You can add AJAX call here to refresh dashboard data
        console.log('Refreshing dashboard data...');
    }, 30000);
</script>
@endpush
