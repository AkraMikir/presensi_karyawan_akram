<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login Admin - PresensiApp')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .login-header {
            background: linear-gradient(45deg, #343a40, #495057);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        .btn-login {
            background: linear-gradient(45deg, #343a40, #495057);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(45deg, #495057, #6c757d);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #495057;
            box-shadow: 0 0 0 0.2rem rgba(73, 80, 87, 0.25);
        }
        .back-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-2px);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container">
                    <!-- Header -->
                    <div class="login-header text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-shield fa-3x"></i>
                        </div>
                        <h3 class="mb-0">Admin Login</h3>
                        <p class="mb-0 opacity-75">Masuk ke Panel Administrasi</p>
                    </div>
                    
                    <!-- Login Form -->
                    <div class="p-4">
                        <form id="adminLoginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="Masukkan email admin" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Masukkan password" required>
                            </div>
                            
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-login btn-lg text-white">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Login Admin
                                </button>
                            </div>
                        </form>
                        
                        <!-- Links -->
                        <div class="text-center">
                            <hr class="my-3">
                            <p class="mb-2">
                                <small class="text-muted">
                                    Bukan admin? 
                                    <a href="{{ route('user.login') }}" class="text-decoration-none fw-bold">
                                        Login sebagai User
                                    </a>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Back Button -->
                <div class="text-center mt-4">
                    <a href="{{ route('landing') }}" class="btn back-btn">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <script>
        $('#adminLoginForm').on('submit', function(e) {
            e.preventDefault();
            
            const email = $('#email').val();
            const password = $('#password').val();
            
            // Show loading state
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');
            submitBtn.prop('disabled', true);
            
            // Simulate login process
            setTimeout(function() {
                // Simple validation for demo
                if (email === 'admin@example.com' && password === 'admin123') {
                    // Store login status in sessionStorage
                    sessionStorage.setItem('admin_logged_in', 'true');
                    sessionStorage.setItem('admin_email', email);
                    
                    // Show success message
                    alert('Login admin berhasil! Selamat datang Admin.');
                    window.location.href = '{{ route("admin.dashboard") }}';
                } else {
                    // Show error message
                    alert('Email atau password admin salah!');
                    
                    // Reset button
                    submitBtn.html(originalText);
                    submitBtn.prop('disabled', false);
                }
            }, 1500);
        });
        
        // Add some interactive effects
        $('.form-control').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });
    </script>
    
    @stack('scripts')
</body>
</html>
