@extends('layouts.admin')

@section('title', 'Daftar Karyawan - Admin Dashboard')
@section('page-title', 'Daftar Karyawan')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Daftar Karyawan</h1>
            <p class="text-gray-600">Kelola data karyawan dan informasi personal</p>
        </div>
        <div class="flex space-x-4 mt-4 sm:mt-0">
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-download mr-2"></i>Export
            </button>
            <button class="px-4 py-2 bg-primary-green text-white rounded-lg hover:bg-green-600 transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Karyawan
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Karyawan</p>
                    <p class="text-2xl font-bold text-gray-900">1,247</p>
                </div>
                <div class="w-12 h-12 bg-pastel-blue rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-primary-blue text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">1,156</p>
                </div>
                <div class="w-12 h-12 bg-pastel-green rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-primary-green text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Tidak Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">91</p>
                </div>
                <div class="w-12 h-12 bg-pastel-yellow rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-times text-primary-yellow text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Divisi</p>
                    <p class="text-2xl font-bold text-gray-900">12</p>
                </div>
                <div class="w-12 h-12 bg-pastel-purple rounded-xl flex items-center justify-center">
                    <i class="fas fa-sitemap text-primary-purple text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-2xl p-6 shadow-soft border border-gray-100 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Karyawan</label>
                <input type="text" placeholder="Nama, NIK, atau email..." 
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                    <option>Cuti</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button class="px-6 py-2 bg-primary-blue text-white rounded-lg hover:bg-blue-600 transition-colors">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
        </div>
    </div>

    <!-- Karyawan Table -->
    <div class="bg-white rounded-2xl shadow-soft border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-blue focus:ring-primary-blue">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Karyawan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Masuk</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Sample Data -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-blue focus:ring-primary-blue">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary-blue to-primary-purple rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Ahmad Rizki</div>
                                    <div class="text-sm text-gray-500">ahmad.rizki@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1234567890</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IT Department</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Senior Developer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Jan 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Aktif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button class="text-primary-blue hover:text-blue-600" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-primary-green hover:text-green-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-primary-yellow hover:text-yellow-600" title="Presensi">
                                    <i class="fas fa-clock"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-600" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-blue focus:ring-primary-blue">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary-green to-primary-blue rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Sarah Putri</div>
                                    <div class="text-sm text-gray-500">sarah.putri@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1234567891</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">HR Department</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">HR Manager</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">20 Feb 2022</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Aktif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button class="text-primary-blue hover:text-blue-600" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-primary-green hover:text-green-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-primary-yellow hover:text-yellow-600" title="Presensi">
                                    <i class="fas fa-clock"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-600" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-blue focus:ring-primary-blue">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary-purple to-primary-yellow rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                                    <div class="text-sm text-gray-500">budi.santoso@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1234567892</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Finance</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Finance Manager</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10 Mar 2021</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Cuti</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button class="text-primary-blue hover:text-blue-600" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-primary-green hover:text-green-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-primary-yellow hover:text-yellow-600" title="Presensi">
                                    <i class="fas fa-clock"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-600" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-blue focus:ring-primary-blue">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary-yellow to-primary-green rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Lisa Sari</div>
                                    <div class="text-sm text-gray-500">lisa.sari@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1234567893</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Marketing</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Marketing Specialist</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">05 Apr 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Aktif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button class="text-primary-blue hover:text-blue-600" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-primary-green hover:text-green-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-primary-yellow hover:text-yellow-600" title="Presensi">
                                    <i class="fas fa-clock"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-600" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">1,247</span> hasil
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
    // Select all checkbox functionality
    document.querySelector('thead input[type="checkbox"]').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Individual checkbox functionality
    document.querySelectorAll('tbody input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const allCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            const checkedCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            const selectAllCheckbox = document.querySelector('thead input[type="checkbox"]');
            
            if (checkedCheckboxes.length === allCheckboxes.length) {
                selectAllCheckbox.checked = true;
            } else {
                selectAllCheckbox.checked = false;
            }
        });
    });
</script>
@endpush
