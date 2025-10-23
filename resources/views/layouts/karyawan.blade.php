<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Karyawan - Sistem Presensi')</title>
    
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
<body class="font-inter bg-cream-bg min-h-screen">
    <!-- Top Navigation -->
    <nav class="bg-white shadow-soft sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo & Title -->
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-green to-primary-blue rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-gray-900">Dashboard Karyawan</h1>
                        <p class="text-xs text-gray-500">Sistem Presensi Digital</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('user.dashboard') }}" class="text-gray-900 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('user.dashboard') ? 'text-primary-blue' : '' }}">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('user.presensi.index') }}" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('user.presensi.*') ? 'text-primary-blue' : '' }}">
                        <i class="fas fa-clock mr-2"></i>Presensi
                    </a>
                    <a href="{{ route('user.checkin') }}" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('user.checkin') ? 'text-primary-blue' : '' }}">
                        <i class="fas fa-sign-in-alt mr-2"></i>Check In
                    </a>
                    <a href="{{ route('user.checkout') }}" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('user.checkout') ? 'text-primary-blue' : '' }}">
                        <i class="fas fa-sign-out-alt mr-2"></i>Check Out
                    </a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-600 hover:text-primary-blue transition-colors">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-3 text-gray-700 hover:text-primary-blue transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-r from-primary-green to-primary-blue rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <span class="hidden md:block text-sm font-medium">{{ Auth::user()->name ?? 'Karyawan' }}</span>
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
                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Alpine.js for dropdown functionality -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>
