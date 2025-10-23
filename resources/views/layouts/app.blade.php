<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Presensi Karyawan')</title>
    
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
    @yield('content')
    
    @stack('scripts')
</body>
</html>
