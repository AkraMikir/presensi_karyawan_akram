<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login User - PresensiApp')</title>
    
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
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        .btn-login {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(45deg, #0056b3, #004085);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-register {
            background: linear-gradient(45deg, #28a745, #1e7e34);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background: linear-gradient(45deg, #1e7e34, #155724);
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
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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
        .register-form {
            display: none;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <!-- Login Form -->
                <div class="login-container" id="loginForm">
                    <!-- Header -->
                    <div class="login-header text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-sign-in-alt fa-3x"></i>
                        </div>
                        <h3 class="mb-0">Login User</h3>
                        <p class="mb-0 opacity-75">Masuk ke Sistem Presensi</p>
                    </div>
                    
                    <!-- Login Form -->
                    <div class="p-4">
                        <form id="userLoginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="Masukkan email user" required>
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
                                    Login
                                </button>
                            </div>
                        </form>
                        
                        <!-- Links -->
                        <div class="text-center">
                            <hr class="my-3">
                            <p class="mb-2">
                                <small class="text-muted">
                                    Belum punya akun? 
                                    <a href="#" onclick="showRegisterForm()" class="text-decoration-none fw-bold">
                                        Daftar di sini
                                    </a>
                                </small>
                            </p>
                            <p class="mb-0">
                                <small class="text-muted">
                                    Admin? 
                                    <a href="{{ route('admin.login') }}" class="text-decoration-none fw-bold">
                                        Login sebagai Admin
                                    </a>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Register Form -->
                <div class="login-container register-form" id="registerForm">
                    <!-- Header -->
                    <div class="login-header text-center p-4" style="background: linear-gradient(45deg, #28a745, #1e7e34);">
                        <div class="mb-3">
                            <i class="fas fa-user-plus fa-3x"></i>
                        </div>
                        <h3 class="mb-0">Daftar User Baru</h3>
                        <p class="mb-0 opacity-75">Buat akun untuk mengakses sistem</p>
                    </div>
                    
                    <!-- Register Form -->
                    <div class="p-4">
                        <form id="userRegisterForm">
                            @csrf
                            <div class="mb-3">
                                <label for="reg_name" class="form-label fw-bold">
                                    <i class="fas fa-user me-2"></i>Nama Lengkap
                                </label>
                                <input type="text" class="form-control" id="reg_name" name="name" 
                                       placeholder="Masukkan nama lengkap" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="reg_email" class="form-label fw-bold">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control" id="reg_email" name="email" 
                                       placeholder="Masukkan email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="reg_password" class="form-label fw-bold">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password" class="form-control" id="reg_password" name="password" 
                                       placeholder="Masukkan password" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="reg_password_confirmation" class="form-label fw-bold">
                                    <i class="fas fa-lock me-2"></i>Konfirmasi Password
                                </label>
                                <input type="password" class="form-control" id="reg_password_confirmation" name="password_confirmation" 
                                       placeholder="Konfirmasi password" required>
                            </div>
                            
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-register btn-lg text-white">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Daftar
                                </button>
                            </div>
                        </form>
                        
                        <!-- Links -->
                        <div class="text-center">
                            <hr class="my-3">
                            <p class="mb-0">
                                <small class="text-muted">
                                    Sudah punya akun? 
                                    <a href="#" onclick="showLoginForm()" class="text-decoration-none fw-bold">
                                        Login di sini
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
        function showRegisterForm() {
            $('#loginForm').hide();
            $('#registerForm').show();
        }
        
        function showLoginForm() {
            $('#registerForm').hide();
            $('#loginForm').show();
        }
        
        $('#userLoginForm').on('submit', function(e) {
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
                if (email === 'user@example.com' && password === 'password') {
                    // Store login status in sessionStorage
                    sessionStorage.setItem('user_logged_in', 'true');
                    sessionStorage.setItem('user_email', email);
                    
                    // Show success message
                    alert('Login berhasil! Selamat datang User.');
                    window.location.href = '{{ route("user.dashboard") }}';
                } else {
                    // Show error message
                    alert('Email atau password salah!');
                    
                    // Reset button
                    submitBtn.html(originalText);
                    submitBtn.prop('disabled', false);
                }
            }, 1500);
        });
        
        $('#userRegisterForm').on('submit', function(e) {
            e.preventDefault();
            
            const password = $('#reg_password').val();
            const passwordConfirmation = $('#reg_password_confirmation').val();
            
            if (password !== passwordConfirmation) {
                alert('Password dan konfirmasi password tidak sama!');
                return;
            }
            
            // Show loading state
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');
            submitBtn.prop('disabled', true);
            
            // Simulate registration process
            setTimeout(function() {
                alert('Registrasi berhasil! Silakan login.');
                showLoginForm();
                $('#userRegisterForm')[0].reset();
                
                // Reset button
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
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
