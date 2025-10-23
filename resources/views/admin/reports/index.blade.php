@extends('layouts.admin')

@section('title', 'Laporan - Admin Dashboard')
@section('page-title', 'Laporan')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Laporan Presensi</h1>
            <p class="text-gray-600">Generate dan kelola laporan kehadiran karyawan</p>
        </div>
        <div class="flex space-x-4 mt-4 sm:mt-0">
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-download mr-2"></i>Export PDF
            </button>
            <button class="px-4 py-2 bg-primary-green text-white rounded-lg hover:bg-green-600 transition-colors">
                <i class="fas fa-file-excel mr-2"></i>Export Excel
            </button>
        </div>
    </div>

    <!-- Report Filters -->
    <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100 mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Filter Laporan</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Periode</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    <option>Bulan ini</option>
                    <option>3 bulan terakhir</option>
                    <option>6 bulan terakhir</option>
                    <option>Tahun ini</option>
                    <option>Custom</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Divisi</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    <option>Semua Divisi</option>
                    <option>IT Department</option>
                    <option>HR Department</option>
                    <option>Finance</option>
                    <option>Marketing</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    <option>Semua Jabatan</option>
                    <option>Manager</option>
                    <option>Supervisor</option>
                    <option>Staff</option>
                    <option>Intern</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Laporan</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    <option>Ringkasan Kehadiran</option>
                    <option>Detail Presensi</option>
                    <option>Analisis Terlambat</option>
                    <option>Laporan Cuti</option>
                    <option>Performa Divisi</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button class="px-6 py-2 bg-primary-blue text-white rounded-lg hover:bg-blue-600 transition-colors">
                <i class="fas fa-chart-bar mr-2"></i>Generate Laporan
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Kehadiran</p>
                    <p class="text-2xl font-bold text-gray-900">1,156</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+5.2% dari bulan lalu
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-green rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-primary-green text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Terlambat</p>
                    <p class="text-2xl font-bold text-gray-900">47</p>
                    <p class="text-sm text-yellow-600 mt-1">
                        <i class="fas fa-arrow-down mr-1"></i>-2.1% dari bulan lalu
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-yellow rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-primary-yellow text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Cuti</p>
                    <p class="text-2xl font-bold text-gray-900">44</p>
                    <p class="text-sm text-purple-600 mt-1">
                        <i class="fas fa-calendar-times mr-1"></i>3.5% dari total
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-purple rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-times text-primary-purple text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Rata-rata Jam Kerja</p>
                    <p class="text-2xl font-bold text-gray-900">8.5h</p>
                    <p class="text-sm text-blue-600 mt-1">
                        <i class="fas fa-chart-line mr-1"></i>Target: 8h
                    </p>
                </div>
                <div class="w-12 h-12 bg-pastel-blue rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-primary-blue text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Attendance Trend Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tren Kehadiran 30 Hari Terakhir</h3>
            <div class="h-64">
                <canvas id="attendanceTrendChart"></canvas>
            </div>
        </div>

        <!-- Department Performance -->
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Performa Divisi</h3>
            <div class="h-64">
                <canvas id="departmentChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Detailed Report Table -->
    <div class="bg-white rounded-2xl shadow-soft border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Detail Laporan Presensi</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Karyawan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Hari Kerja</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hadir</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terlambat</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cuti</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-primary-blue to-primary-purple rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Ahmad Rizki</div>
                                    <div class="text-sm text-gray-500">IT Department</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IT Department</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">22</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">21</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">95.5%</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-primary-green to-primary-blue rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Sarah Putri</div>
                                    <div class="text-sm text-gray-500">HR Department</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">HR Department</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">22</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">90.9%</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-primary-purple to-primary-yellow rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                                    <div class="text-sm text-gray-500">Finance</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Finance</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">22</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">18</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">4</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">81.8%</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Attendance Trend Chart
    const trendCtx = document.getElementById('attendanceTrendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: Array.from({length: 30}, (_, i) => {
                const date = new Date();
                date.setDate(date.getDate() - (29 - i));
                return date.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit' });
            }),
            datasets: [{
                label: 'Kehadiran (%)',
                data: Array.from({length: 30}, () => Math.floor(Math.random() * 20) + 80),
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#3B82F6',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 4
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
            }
        }
    });

    // Department Performance Chart
    const deptCtx = document.getElementById('departmentChart').getContext('2d');
    new Chart(deptCtx, {
        type: 'doughnut',
        data: {
            labels: ['IT Department', 'HR Department', 'Finance', 'Marketing', 'Operations'],
            datasets: [{
                data: [95, 92, 88, 85, 90],
                backgroundColor: [
                    '#3B82F6',
                    '#10B981',
                    '#F59E0B',
                    '#8B5CF6',
                    '#EF4444'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
</script>
@endpush
