<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresensiApp - Sistem Presensi Karyawan Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .card-hover {
            transition: transform 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
        .testimonial-card {
            background: #f8f9fa;
            border: none;
            border-radius: 15px;
        }
        .faq-item {
            border: none;
            border-bottom: 1px solid #dee2e6;
        }
        .footer {
            background: #343a40;
            color: white;
        }
        .btn-gradient {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            background: linear-gradient(45deg, #5a6fd8, #6a4190);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-clock text-primary me-2"></i>
                PresensiApp
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                </ul>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-user-shield me-1"></i>Login Admin
                    </a>
                    <a href="{{ route('user.login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-1"></i>Login User
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Sistem Presensi Karyawan Modern
                    </h1>
                    <p class="lead mb-4">
                        Kelola kehadiran karyawan dengan mudah menggunakan teknologi terdepan. 
                        Fitur geolocation, foto verifikasi, dan laporan real-time.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('user.login') }}" class="btn btn-light btn-lg px-4">
                            <i class="fas fa-play me-2"></i>Mulai Sekarang
                        </a>
                        <a href="#features" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-mobile-alt fa-10x opacity-75"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Fitur Unggulan</h2>
                <p class="lead text-muted">Solusi lengkap untuk manajemen presensi karyawan</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Geolocation</h5>
                            <p class="card-text text-muted">
                                Verifikasi lokasi karyawan dengan teknologi GPS untuk memastikan kehadiran di tempat yang tepat.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-camera fa-2x text-success"></i>
                            </div>
                            <h5 class="card-title">Foto Verifikasi</h5>
                            <p class="card-text text-muted">
                                Ambil foto saat check in/out untuk verifikasi identitas dan mencegah kecurangan.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-chart-bar fa-2x text-info"></i>
                            </div>
                            <h5 class="card-title">Laporan Real-time</h5>
                            <p class="card-text text-muted">
                                Pantau kehadiran karyawan dengan laporan real-time dan statistik yang akurat.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-mobile-alt fa-2x text-warning"></i>
                            </div>
                            <h5 class="card-title">Mobile Friendly</h5>
                            <p class="card-text text-muted">
                                Akses sistem presensi dari smartphone atau tablet dengan antarmuka yang responsif.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-shield-alt fa-2x text-danger"></i>
                            </div>
                            <h5 class="card-title">Keamanan Tinggi</h5>
                            <p class="card-text text-muted">
                                Sistem keamanan berlapis dengan enkripsi data dan autentikasi yang kuat.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-hover shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-users fa-2x text-secondary"></i>
                            </div>
                            <h5 class="card-title">Multi User</h5>
                            <p class="card-text text-muted">
                                Dukungan untuk multiple perusahaan dan ribuan karyawan dalam satu sistem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Testimoni Pengguna</h2>
                <p class="lead text-muted">Apa kata mereka tentang PresensiApp</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50x50/007bff/ffffff?text=JD" class="rounded-circle me-3" alt="Avatar">
                                <div>
                                    <h6 class="mb-0">John Doe</h6>
                                    <small class="text-muted">HR Manager, PT. Teknologi Maju</small>
                                </div>
                            </div>
                            <p class="card-text">
                                "PresensiApp sangat membantu dalam mengelola kehadiran karyawan. Fitur geolocation dan foto verifikasi membuat sistem presensi menjadi lebih akurat dan transparan."
                            </p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50x50/28a745/ffffff?text=JS" class="rounded-circle me-3" alt="Avatar">
                                <div>
                                    <h6 class="mb-0">Jane Smith</h6>
                                    <small class="text-muted">CEO, CV. Kreatif Digital</small>
                                </div>
                            </div>
                            <p class="card-text">
                                "Interface yang user-friendly dan laporan yang detail. Tim kami bisa fokus pada pekerjaan tanpa khawatir tentang sistem presensi yang rumit."
                            </p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50x50/ffc107/ffffff?text=MJ" class="rounded-circle me-3" alt="Avatar">
                                <div>
                                    <h6 class="mb-0">Mike Johnson</h6>
                                    <small class="text-muted">Operations Director, UD. Mandiri Jaya</small>
                                </div>
                            </div>
                            <p class="card-text">
                                "Sistem yang sangat reliable dan mudah digunakan. Laporan real-time membantu kami membuat keputusan yang lebih baik untuk operasional perusahaan."
                            </p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Frequently Asked Questions</h2>
                <p class="lead text-muted">Pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara menggunakan sistem presensi?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sangat mudah! Karyawan hanya perlu login ke sistem, kemudian melakukan check in saat datang dan check out saat pulang. Sistem akan otomatis mencatat waktu dan lokasi.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Apakah sistem mendukung multiple perusahaan?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, PresensiApp mendukung multiple perusahaan dalam satu sistem. Setiap perusahaan dapat mengelola karyawan dan data presensi mereka secara terpisah.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Bagaimana keamanan data karyawan?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami menggunakan enkripsi data tingkat enterprise dan sistem keamanan berlapis. Data karyawan dilindungi dengan standar keamanan internasional.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Apakah bisa digunakan di mobile?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tentu! PresensiApp dirancang responsive dan dapat diakses melalui smartphone atau tablet dengan performa yang optimal.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Bagaimana cara mendapatkan laporan presensi?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Admin dapat mengakses menu Laporan untuk melihat berbagai jenis laporan presensi. Laporan dapat diekspor dalam format Excel, PDF, atau CSV.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">
                        <i class="fas fa-clock me-2"></i>
                        PresensiApp
                    </h5>
                    <p class="text-light">
                        Sistem presensi karyawan modern dengan teknologi terdepan. 
                        Kelola kehadiran dengan mudah dan efisien.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Produk</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Fitur</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Harga</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Demo</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Integrasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Perusahaan</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Tentang Kami</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Karir</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Dukungan</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Bantuan</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Dokumentasi</a></li>
                        <li><a href="#" class="text-light text-decoration-none">FAQ</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Status</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-white mb-3">Legal</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Privacy Policy</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Terms of Service</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Cookie Policy</a></li>
                        <li><a href="#" class="text-light text-decoration-none">GDPR</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-light mb-0">
                        &copy; 2025 PresensiApp. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-light mb-0">
                        Dibuat dengan <i class="fas fa-heart text-danger"></i> di Indonesia
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
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

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow');
            } else {
                navbar.classList.remove('bg-white', 'shadow');
            }
        });
    </script>
</body>
</html>
