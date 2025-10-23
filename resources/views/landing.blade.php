@extends('layouts.app')

@section('title', 'Sistem Presensi Karyawan - Solusi Digital Terbaik')

@section('content')
<!-- Navigation -->
<nav class="bg-white/80 backdrop-blur-md shadow-soft fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-blue to-primary-purple rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-white text-lg"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <h1 class="text-xl font-bold text-gray-900">PresensiPro</h1>
                    <p class="text-xs text-gray-500">Sistem Presensi Digital</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="#home" class="text-gray-900 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors">Beranda</a>
                    <a href="#features" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors">Fitur</a>
                    <a href="#about" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors">Tentang</a>
                    <a href="#contact" class="text-gray-600 hover:text-primary-blue px-3 py-2 text-sm font-medium transition-colors">Kontak</a>
                </div>
            </div>

            <!-- Login Buttons -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.login') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors">
                    <i class="fas fa-user-shield mr-2"></i>Admin
                </a>
                <a href="{{ route('user.login') }}" class="bg-gradient-to-r from-primary-blue to-primary-purple hover:from-blue-600 hover:to-purple-600 text-white px-4 py-2 rounded-xl text-sm font-medium transition-all shadow-soft">
                    <i class="fas fa-user mr-2"></i>Karyawan
                </a>
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

<!-- Hero Section -->
<section id="home" class="pt-20 pb-16 bg-gradient-to-br from-cream-bg via-white to-pastel-blue">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="space-y-8">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Sistem Presensi
                        <span class="bg-gradient-to-r from-primary-blue to-primary-purple bg-clip-text text-transparent">
                            Digital Terbaik
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Kelola kehadiran karyawan dengan mudah, akurat, dan real-time. 
                        Dilengkapi dengan GPS tracking, foto verifikasi, dan laporan komprehensif.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('user.login') }}" class="bg-gradient-to-r from-primary-blue to-primary-purple hover:from-blue-600 hover:to-purple-600 text-white px-8 py-4 rounded-2xl text-lg font-semibold transition-all shadow-soft hover:shadow-lg text-center">
                        <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                    </a>
                    <a href="#features" class="bg-white hover:bg-gray-50 text-gray-700 px-8 py-4 rounded-2xl text-lg font-semibold transition-all shadow-soft border border-gray-200 text-center">
                        <i class="fas fa-play mr-2"></i>Lihat Demo
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 pt-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">500+</div>
                        <div class="text-sm text-gray-600">Perusahaan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-green">50K+</div>
                        <div class="text-sm text-gray-600">Karyawan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-purple">99.9%</div>
                        <div class="text-sm text-gray-600">Uptime</div>
                    </div>
                </div>
            </div>

            <!-- Hero Image/Dashboard Preview -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-glass p-8 border border-gray-100">
                    <div class="space-y-6">
                        <!-- Mock Dashboard Header -->
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Dashboard Presensi</h3>
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                <span class="text-sm text-gray-600">Live</span>
                            </div>
                        </div>
                        
                        <!-- Mock Chart -->
                        <div class="h-32 bg-gradient-to-r from-primary-blue/20 to-primary-purple/20 rounded-2xl flex items-end justify-around p-4">
                            <div class="w-8 bg-primary-blue rounded-t-lg" style="height: 60%"></div>
                            <div class="w-8 bg-primary-purple rounded-t-lg" style="height: 80%"></div>
                            <div class="w-8 bg-primary-green rounded-t-lg" style="height: 45%"></div>
                            <div class="w-8 bg-primary-yellow rounded-t-lg" style="height: 90%"></div>
                            <div class="w-8 bg-primary-blue rounded-t-lg" style="height: 70%"></div>
                        </div>
                        
                        <!-- Mock Cards -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-pastel-blue rounded-2xl p-4">
                                <div class="text-2xl font-bold text-primary-blue">95%</div>
                                <div class="text-sm text-gray-600">Kehadiran</div>
                            </div>
                            <div class="bg-pastel-green rounded-2xl p-4">
                                <div class="text-2xl font-bold text-primary-green">2.3%</div>
                                <div class="text-sm text-gray-600">Terlambat</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-pastel-purple rounded-2xl opacity-60"></div>
                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-pastel-yellow rounded-2xl opacity-60"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dilengkapi dengan teknologi terdepan untuk memudahkan manajemen presensi karyawan
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-blue rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-map-marker-alt text-2xl text-primary-blue"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">GPS Tracking</h3>
                <p class="text-gray-600 leading-relaxed">
                    Verifikasi lokasi kehadiran dengan akurasi tinggi menggunakan GPS untuk mencegah presensi palsu.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-green rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-camera text-2xl text-primary-green"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Foto Verifikasi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Capture foto saat check-in/out untuk memastikan keaslian kehadiran karyawan.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-purple rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-2xl text-primary-purple"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Laporan Real-time</h3>
                <p class="text-gray-600 leading-relaxed">
                    Pantau kehadiran karyawan secara real-time dengan dashboard yang informatif dan mudah dipahami.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-yellow rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-mobile-alt text-2xl text-primary-yellow"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mobile Friendly</h3>
                <p class="text-gray-600 leading-relaxed">
                    Akses sistem presensi dari smartphone dengan antarmuka yang responsif dan user-friendly.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-blue rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-2xl text-primary-blue"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Keamanan Tinggi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Data terlindungi dengan enkripsi end-to-end dan sistem keamanan berlapis.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft hover:shadow-lg transition-all border border-gray-100">
                <div class="w-16 h-16 bg-pastel-green rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-2xl text-primary-green"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Multi-Company</h3>
                <p class="text-gray-600 leading-relaxed">
                    Kelola beberapa perusahaan dalam satu platform dengan akses terpisah dan aman.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="about" class="py-20 bg-gradient-to-br from-pastel-blue/30 to-pastel-purple/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tim Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dikembangkan oleh tim profesional yang berdedikasi untuk memberikan solusi terbaik
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft text-center">
                <div class="w-24 h-24 bg-gradient-to-r from-primary-blue to-primary-purple rounded-full mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-user text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Ahmad Rizki</h3>
                <p class="text-primary-blue mb-4">Lead Developer</p>
                <p class="text-gray-600 text-sm">
                    Spesialis dalam pengembangan sistem enterprise dengan pengalaman 8+ tahun.
                </p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft text-center">
                <div class="w-24 h-24 bg-gradient-to-r from-primary-green to-primary-blue rounded-full mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-user text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Sarah Putri</h3>
                <p class="text-primary-green mb-4">UI/UX Designer</p>
                <p class="text-gray-600 text-sm">
                    Ahli dalam desain antarmuka yang intuitif dan user experience yang optimal.
                </p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-3xl p-8 shadow-soft text-center">
                <div class="w-24 h-24 bg-gradient-to-r from-primary-purple to-primary-yellow rounded-full mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-user text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Budi Santoso</h3>
                <p class="text-primary-purple mb-4">System Analyst</p>
                <p class="text-gray-600 text-sm">
                    Berpengalaman dalam analisis kebutuhan bisnis dan arsitektur sistem.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Testimoni Klien</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dengar pengalaman klien yang telah menggunakan sistem presensi kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gradient-to-br from-pastel-blue to-pastel-purple rounded-3xl p-8 text-white">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">PT. Maju Jaya</h4>
                        <p class="text-sm opacity-80">CEO</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed">
                    "Sistem presensi ini sangat membantu kami mengelola 500+ karyawan dengan efisien. 
                    Akurasi data dan kemudahan penggunaan sangat memuaskan."
                </p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gradient-to-br from-pastel-green to-pastel-blue rounded-3xl p-8 text-white">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">CV. Sukses Mandiri</h4>
                        <p class="text-sm opacity-80">HR Manager</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed">
                    "GPS tracking dan foto verifikasi sangat membantu mencegah presensi palsu. 
                    Laporan yang detail memudahkan evaluasi kinerja karyawan."
                </p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gradient-to-br from-pastel-purple to-pastel-yellow rounded-3xl p-8 text-white">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">UD. Berkah Abadi</h4>
                        <p class="text-sm opacity-80">Owner</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed">
                    "Interface yang user-friendly dan support 24/7 membuat kami nyaman menggunakan sistem ini. 
                    Highly recommended!"
                </p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gradient-to-br from-cream-bg to-pastel-blue/30">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>
            <p class="text-xl text-gray-600">
                Temukan jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>

        <div class="space-y-6">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-soft">
                <button class="w-full text-left flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Bagaimana cara kerja GPS tracking?</h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </button>
                <div class="mt-4 text-gray-600">
                    <p>Sistem akan mencatat koordinat GPS saat karyawan melakukan check-in/out. 
                    Koordinat ini akan dibandingkan dengan lokasi kantor yang telah ditentukan untuk memverifikasi kehadiran.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-soft">
                <button class="w-full text-left flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Apakah data karyawan aman?</h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </button>
                <div class="mt-4 text-gray-600">
                    <p>Ya, semua data dilindungi dengan enkripsi end-to-end dan sistem keamanan berlapis. 
                    Kami mengikuti standar keamanan internasional untuk melindungi privasi karyawan.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-soft">
                <button class="w-full text-left flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Berapa biaya implementasi sistem?</h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </button>
                <div class="mt-4 text-gray-600">
                    <p>Biaya bervariasi tergantung jumlah karyawan dan fitur yang dibutuhkan. 
                    Hubungi tim sales kami untuk konsultasi gratis dan penawaran yang sesuai kebutuhan.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-soft">
                <button class="w-full text-left flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Apakah ada training untuk admin?</h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </button>
                <div class="mt-4 text-gray-600">
                    <p>Ya, kami menyediakan training lengkap untuk admin sistem, termasuk video tutorial, 
                    dokumentasi lengkap, dan support teknis selama masa implementasi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact" class="bg-dark-sidebar text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-blue to-primary-purple rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-white text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-xl font-bold">PresensiPro</h3>
                        <p class="text-sm text-gray-400">Sistem Presensi Digital</p>
                    </div>
                </div>
                <p class="text-gray-400 leading-relaxed">
                    Solusi terdepan untuk manajemen presensi karyawan dengan teknologi GPS dan AI.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-primary-blue rounded-lg flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-primary-blue rounded-lg flex items-center justify-center transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-primary-blue rounded-lg flex items-center justify-center transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-primary-blue rounded-lg flex items-center justify-center transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Tautan Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="#home" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                    <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">Tentang</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <!-- Features -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Fitur</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">GPS Tracking</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Foto Verifikasi</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Laporan Real-time</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Mobile App</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Kontak</h4>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-primary-blue mr-3"></i>
                        <span class="text-gray-400">Jl. Teknologi No. 123, Jakarta</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-primary-blue mr-3"></i>
                        <span class="text-gray-400">+62 21 1234 5678</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-primary-blue mr-3"></i>
                        <span class="text-gray-400">info@presensipro.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8 text-center">
            <p class="text-gray-400">
                © 2024 PresensiPro. All rights reserved. | 
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a> | 
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>

@endsection

@push('scripts')
<script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // FAQ Toggle
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            if (content.style.display === 'block') {
                content.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
</script>
@endpush
