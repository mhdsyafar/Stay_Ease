<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'StayEase') }} – Admin</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html, body { height: 100%; margin: 0; padding: 0; }
        body { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; background: #f1f5f9; }
    </style>
</head>
<body class="antialiased">
    <div style="display:flex; min-height:100vh;">
        @include('layouts.sidebar')

        <!-- Main column -->
        <div style="flex:1; display:flex; flex-direction:column; min-width:0;">
            <main style="flex:1; padding: 2rem 2rem 1.5rem;">
                {{ $slot }}
            </main>
            <footer style="padding: 0.875rem 2rem; display:flex; justify-content:space-between; align-items:center;
                           font-size:0.75rem; color:#94a3b8; background:#fff; border-top:1px solid #e2e8f0;">
                <span>© {{ date('Y') }} StayEase Professional Management. All rights reserved.</span>
                <div style="display:flex; gap:1rem;">
                    <a href="#" style="color:#94a3b8; text-decoration:none;" onmouseover="this.style.color='#475569'" onmouseout="this.style.color='#94a3b8'">Privacy Policy</a>
                    <a href="#" style="color:#94a3b8; text-decoration:none;" onmouseover="this.style.color='#475569'" onmouseout="this.style.color='#94a3b8'">Support Center</a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
