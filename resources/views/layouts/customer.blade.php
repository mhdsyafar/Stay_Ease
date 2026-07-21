<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StayEase') }} – Portal Pelanggan</title>

    <!-- Google Fonts: Inter & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html, body { min-height: 100vh; margin: 0; padding: 0; }
        body { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; background: #f8fafc; color: #1e293b; display: flex; flex-direction: column; }
        .font-serif-display { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body>
    {{-- ── Customer Top Navigation Bar ───────────────────────────────── --}}
    <header style="background: linear-gradient(135deg, #0a1628 0%, #0f1b4c 60%, #1a2a6c 100%); position: sticky; top: 0; z-index: 999; box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
        <div style="height: 3px; background: linear-gradient(90deg, #f5c518, #f97316, #f5c518); width: 100%;"></div>
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; height: 70px; display: flex; align-items: center; justify-content: space-between;">
            
            {{-- Brand Logo --}}
            <a href="{{ route('pelanggan.dashboard') }}" style="display: flex; align-items: center; gap: 0.6rem; text-decoration: none;">
                <div style="width: 36px; height: 36px; border-radius: 10px; background: linear-gradient(135deg, #f5c518, #f97316); display: flex; align-items: center; justify-content: center; color: #0f1b4c; font-weight: 900; font-size: 1.1rem; box-shadow: 0 2px 10px rgba(245,197,24,0.4);">
                    S
                </div>
                <div>
                    <span class="font-serif-display" style="color: #fff; font-size: 1.35rem; font-weight: 700; letter-spacing: -0.01em;">StayEase</span>
                    <span style="display: block; font-size: 0.6rem; color: #f5c518; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; margin-top: -3px;">PORTAL PELANGGAN</span>
                </div>
            </a>

            {{-- Nav Links --}}
            <nav style="display: flex; align-items: center; gap: 0.5rem;">
                @php
                    $isDash   = request()->routeIs('pelanggan.dashboard');
                    $isKamar  = request()->routeIs('pelanggan.kamar*');
                    $isBoking = request()->routeIs('pelanggan.boking*');
                    $isProf   = request()->routeIs('pelanggan.profile*');
                @endphp

                {{-- Beranda --}}
                <a href="{{ route('pelanggan.dashboard') }}" style="
                    padding: 0.55rem 1rem; border-radius: 0.625rem; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: all 0.15s; display: flex; align-items: center; gap: 0.4rem;
                    {{ $isDash ? 'background: rgba(245,197,24,0.18); color: #f5c518; border: 1px solid rgba(245,197,24,0.3);' : 'color: rgba(255,255,255,0.75); border: 1px solid transparent;' }}"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#fff';"
                   onmouseout="this.style.background='{{ $isDash ? 'rgba(245,197,24,0.18)' : 'transparent' }}'; this.style.color='{{ $isDash ? '#f5c518' : 'rgba(255,255,255,0.75)' }}';">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Beranda
                </a>

                {{-- Katalog Kamar --}}
                <a href="{{ route('pelanggan.kamar') }}" style="
                    padding: 0.55rem 1rem; border-radius: 0.625rem; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: all 0.15s; display: flex; align-items: center; gap: 0.4rem;
                    {{ $isKamar ? 'background: rgba(245,197,24,0.18); color: #f5c518; border: 1px solid rgba(245,197,24,0.3);' : 'color: rgba(255,255,255,0.75); border: 1px solid transparent;' }}"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#fff';"
                   onmouseout="this.style.background='{{ $isKamar ? 'rgba(245,197,24,0.18)' : 'transparent' }}'; this.style.color='{{ $isKamar ? '#f5c518' : 'rgba(255,255,255,0.75)' }}';">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Katalog Kamar
                </a>

                {{-- Pesanan Saya --}}
                <a href="{{ route('pelanggan.boking.index') }}" style="
                    padding: 0.55rem 1rem; border-radius: 0.625rem; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: all 0.15s; display: flex; align-items: center; gap: 0.4rem;
                    {{ $isBoking ? 'background: rgba(245,197,24,0.18); color: #f5c518; border: 1px solid rgba(245,197,24,0.3);' : 'color: rgba(255,255,255,0.75); border: 1px solid transparent;' }}"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#fff';"
                   onmouseout="this.style.background='{{ $isBoking ? 'rgba(245,197,24,0.18)' : 'transparent' }}'; this.style.color='{{ $isBoking ? '#f5c518' : 'rgba(255,255,255,0.75)' }}';">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Pesanan Saya
                </a>

                {{-- Profil Saya --}}
                <a href="{{ route('pelanggan.profile') }}" style="
                    padding: 0.55rem 1rem; border-radius: 0.625rem; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: all 0.15s; display: flex; align-items: center; gap: 0.4rem;
                    {{ $isProf ? 'background: rgba(245,197,24,0.18); color: #f5c518; border: 1px solid rgba(245,197,24,0.3);' : 'color: rgba(255,255,255,0.75); border: 1px solid transparent;' }}"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#fff';"
                   onmouseout="this.style.background='{{ $isProf ? 'rgba(245,197,24,0.18)' : 'transparent' }}'; this.style.color='{{ $isProf ? '#f5c518' : 'rgba(255,255,255,0.75)' }}';">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profil Saya
                </a>
            </nav>

            {{-- Right Actions --}}
            <div style="display: flex; align-items: center; gap: 1rem;">
                {{-- Switch to Admin --}}
                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; gap: 0.35rem; padding: 0.45rem 0.85rem; border-radius: 0.625rem; font-size: 0.75rem; font-weight: 700; color: #fff; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); text-decoration: none; transition: all 0.15s;"
                   onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.12)'">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                    Admin Panel
                </a>

                {{-- User Info --}}
                @php
                    $nameParts = explode(' ', Auth::user()->name ?? 'User');
                    $initials  = strtoupper(substr($nameParts[0],0,1) . substr($nameParts[1] ?? '',0,1));
                @endphp
                <div style="display: flex; align-items: center; gap: 0.6rem; padding-left: 0.75rem; border-left: 1px solid rgba(255,255,255,0.15);">
                    <div style="width: 2.1rem; height: 2.1rem; border-radius: 50%; background: linear-gradient(135deg, #f5c518, #f97316); color: #0f1b4c; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.75rem; flex-shrink: 0; box-shadow: 0 2px 8px rgba(245,197,24,0.3);">
                        {{ $initials }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; font-size: 0.75rem; color: rgba(255,255,255,0.5); font-weight: 600;"
                                onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='rgba(255,255,255,0.5)'" title="Keluar dari akun">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    {{-- ── Main Content Container ────────────────────────────────────── --}}
    <main style="flex: 1; max-width: 1280px; width: 100%; margin: 0 auto; padding: 2rem 1.5rem;">
        {{ $slot }}
    </main>

    {{-- ── Customer Footer ───────────────────────────────────────────── --}}
    <footer style="background: #0f172a; color: #94a3b8; border-top: 1px solid #1e293b; padding: 2rem 1.5rem; font-size: 0.8rem; margin-top: auto;">
        <div style="max-width: 1280px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span class="font-serif-display" style="color: #fff; font-size: 1.1rem; font-weight: 700;">StayEase</span>
                <p style="margin: 0.25rem 0 0; color: #64748b;">© {{ date('Y') }} StayEase Luxury Hospitality. Seluruh Hak Cipta Dilindungi.</p>
            </div>
            <div style="display: flex; gap: 1.5rem; font-weight: 500;">
                <a href="{{ route('pelanggan.kamar') }}" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'">Katalog Kamar</a>
                <a href="{{ route('pelanggan.boking.index') }}" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'">Status Pemesanan</a>
                <a href="{{ route('pelanggan.profile') }}" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'">Profil Saya</a>
            </div>
        </div>
    </footer>
</body>
</html>
