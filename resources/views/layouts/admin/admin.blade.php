<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - Sistem Presensi')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-sidebar': '#1A1A1A',
                        'cream-bg': '#F5F3EF',
                        'pastel-purple': '#E8D5F2',
                        'pastel-green': '#D5F2E8',
                        'pastel-yellow': '#F2E8D5',
                        'pastel-blue': '#D5E8F2',
                        'primary-blue': '#3B82F6',
                        'primary-purple': '#8B5CF6',
                        'primary-green': '#10B981',
                        'primary-yellow': '#F59E0B',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    borderRadius: {
                        'xl': '20px',
                        '2xl': '24px',
                    },
                    boxShadow: {
                        'soft': '0 4px 20px rgba(0, 0, 0, 0.08)',
                        'neumorphic': '8px 8px 16px rgba(0, 0, 0, 0.1), -8px -8px 16px rgba(255, 255, 255, 0.7)',
                        'glass': '0 8px 32px rgba(0, 0, 0, 0.1)',
                    }
                }
            }
        }
    </script>
    
    <!-- Chart.js for data visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @stack('styles')
</head>
<body class="font-inter bg-cream-bg min-h-screen" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-dark-sidebar transform transition-transform duration-300 ease-in-out" 
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-blue to-primary-purple rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-shield text-white text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-lg font-bold text-white">Admin Panel</h1>
                        <p class="text-xs text-gray-400">Sistem Presensi</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <!-- Presensi Management -->
                    <div x-data="{ open: {{ request()->routeIs('admin.presensi.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="flex items-center justify-between w-full px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-clock w-5 h-5 mr-3"></i>
                                <span class="font-medium">Presensi</span>
                            </div>
                            <i class="fas fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="{{ route('admin.presensi.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-400 hover:text-white rounded-lg transition-colors">
                                <i class="fas fa-list w-4 h-4 mr-3"></i>
                                Daftar Presensi
                            </a>
                            <a href="{{ route('admin.presensi.checkin') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-400 hover:text-white rounded-lg transition-colors">
                                <i class="fas fa-sign-in-alt w-4 h-4 mr-3"></i>
                                Check In
                            </a>
                            <a href="{{ route('admin.presensi.checkout') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-400 hover:text-white rounded-lg transition-colors">
                                <i class="fas fa-sign-out-alt w-4 h-4 mr-3"></i>
                                Check Out
                            </a>
                        </div>
                    </div>

                    <!-- Karyawan Management -->
                    <div x-data="{ open: {{ request()->routeIs('admin.karyawan.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="flex items-center justify-between w-full px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-users w-5 h-5 mr-3"></i>
                                <span class="font-medium">Karyawan</span>
                            </div>
                            <i class="fas fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="{{ route('admin.karyawan.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-400 hover:text-white rounded-lg transition-colors">
                                <i class="fas fa-list w-4 h-4 mr-3"></i>
                                Daftar Karyawan
                            </a>
                            <a href="#" 
                               class="flex items-center px-3 py-2 text-sm text-gray-400 hover:text-white rounded-lg transition-colors">
                                <i class="fas fa-user-plus w-4 h-4 mr-3"></i>
                                Tambah Karyawan
                            </a>
                        </div>
                    </div>

                    <!-- Perusahaan Management -->
                    <a href="{{ route('admin.perusahaan.index') }}" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.perusahaan.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-building w-5 h-5 mr-3"></i>
                        <span class="font-medium">Perusahaan</span>
                    </a>

                    <!-- Jabatan Management -->
                    <a href="{{ route('admin.jabatan.index') }}" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.jabatan.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-briefcase w-5 h-5 mr-3"></i>
                        <span class="font-medium">Jabatan</span>
                    </a>

                    <!-- Divisi Management -->
                    <a href="{{ route('admin.divisi.index') }}" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.divisi.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-sitemap w-5 h-5 mr-3"></i>
                        <span class="font-medium">Divisi</span>
                    </a>

                    <!-- Reports -->
                    <a href="{{ route('admin.reports.index') }}" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.reports.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                        <span class="font-medium">Laporan</span>
                    </a>

                    <!-- Settings -->
                    <a href="#" 
                       class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-xl transition-colors">
                        <i class="fas fa-cog w-5 h-5 mr-3"></i>
                        <span class="font-medium">Pengaturan</span>
                    </a>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-primary-green to-primary-blue rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-soft sticky top-0 z-40">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen" 
                            class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <!-- Page Title -->
                    <div class="flex-1 lg:flex-none">
                        <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    </div>

                    <!-- Right side items -->
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="hidden md:block">
                            <div class="relative">
                                <input type="text" 
                                       class="w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent"
                                       placeholder="Cari...">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                        </button>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-3 text-gray-700 hover:text-gray-900">
                                <div class="w-8 h-8 bg-gradient-to-r from-primary-green to-primary-blue rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="hidden md:block text-sm font-medium">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-lg border border-gray-100 py-2 z-50">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    <i class="fas fa-user mr-3 text-gray-400"></i>Profil
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    <i class="fas fa-cog mr-3 text-gray-400"></i>Pengaturan
                                </a>
                                <hr class="my-2">
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-3"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
         @click="sidebarOpen = false">
    </div>

    <!-- Alpine.js for dropdown functionality -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>
