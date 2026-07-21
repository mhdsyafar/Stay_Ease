<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk – StayEase</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html, body { min-height: 100vh; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body { display: flex; min-height: 100vh; background: #f8fafc; }

        /* Left panel */
        .auth-left {
            width: 45%;
            background: linear-gradient(160deg, #0a1628 0%, #0f1b4c 50%, #1a2a6c 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        .auth-left::before {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(245,197,24,0.06);
            top: -100px; right: -100px;
        }
        .auth-left::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            bottom: -60px; left: -60px;
        }

        /* Right panel */
        .auth-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
            background: #fff;
        }

        .form-card {
            width: 100%;
            max-width: 420px;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.875rem;
            color: #1e293b;
            background: #f8fafc;
            transition: all 0.2s;
            outline: none;
        }
        .input-field:focus {
            border-color: #1e3a8a;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(30,58,138,0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 0.875rem;
            font-size: 0.95rem;
            font-weight: 700;
            border: none;
            border-radius: 0.875rem;
            background: linear-gradient(135deg, #0f1b4c, #1e3a8a);
            color: #fff;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(15,27,76,0.3);
            transition: all 0.2s;
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(15,27,76,0.35); }

        @media (max-width: 768px) {
            .auth-left { display: none; }
            .auth-right { padding: 2rem 1.25rem; }
        }
    </style>
</head>
<body>

    {{-- ── Left Branding Panel ──────────────────────────────────────── --}}
    <div class="auth-left">
        <div style="position:relative; z-index:1; text-align:center; color:#fff;">
            {{-- Logo --}}
            <div style="width:72px; height:72px; border-radius:20px; background:linear-gradient(135deg,#f5c518,#f97316); display:flex; align-items:center; justify-content:center; font-weight:900; font-size:2rem; color:#0f1b4c; margin:0 auto 1.5rem; box-shadow:0 8px 24px rgba(245,197,24,0.4);">
                S
            </div>
            <h1 style="font-family:'Playfair Display',serif; font-size:2.5rem; font-weight:800; margin:0 0 0.5rem; line-height:1.2;">StayEase</h1>
            <p style="font-size:0.85rem; color:#f5c518; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; margin:0 0 2.5rem;">Luxury Hospitality</p>

            <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:1.25rem; padding:1.75rem; text-align:left; max-width:320px; margin:0 auto;">
                <p style="font-size:1rem; color:rgba(255,255,255,0.9); font-weight:600; margin:0 0 1.25rem; line-height:1.5;">Selamat datang di sistem manajemen hotel StayEase</p>
                <div style="display:flex; flex-direction:column; gap:0.875rem;">
                    <div style="display:flex; align-items:center; gap:0.75rem;">
                        <div style="width:32px; height:32px; border-radius:8px; background:rgba(245,197,24,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="#f5c518" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/></svg>
                        </div>
                        <span style="font-size:0.85rem; color:rgba(255,255,255,0.75);">Katalog kamar premium</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.75rem;">
                        <div style="width:32px; height:32px; border-radius:8px; background:rgba(245,197,24,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="#f5c518" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <span style="font-size:0.85rem; color:rgba(255,255,255,0.75);">Reservasi mudah & cepat</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.75rem;">
                        <div style="width:32px; height:32px; border-radius:8px; background:rgba(245,197,24,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="#f5c518" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <span style="font-size:0.85rem; color:rgba(255,255,255,0.75);">Sistem aman & terpercaya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Right Form Panel ─────────────────────────────────────────── --}}
    <div class="auth-right">
        <div class="form-card">

            {{-- Header --}}
            <div style="margin-bottom:2rem;">
                <p style="font-size:0.7rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.14em; margin:0 0 0.4rem;">PORTAL STAYEASE</p>
                <h2 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0 0 0.5rem; font-family:'Playfair Display',serif;">Masuk ke Akun</h2>
                <p style="font-size:0.875rem; color:#64748b; margin:0;">Belum punya akun?
                    <a href="{{ route('register') }}" style="color:#1e3a8a; font-weight:700; text-decoration:none;">Daftar sekarang →</a>
                </p>
            </div>

            {{-- Session Status --}}
            @if(session('status'))
            <div style="margin-bottom:1rem; padding:0.75rem 1rem; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:0.75rem; font-size:0.85rem; color:#15803d; font-weight:600;">
                {{ session('status') }}
            </div>
            @endif

            @if(session('error'))
            <div style="margin-bottom:1rem; padding:0.75rem 1rem; background:#fef2f2; border:1px solid #fecaca; border-radius:0.75rem; font-size:0.85rem; color:#dc2626; font-weight:600;">
                {{ session('error') }}
            </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" style="display:flex; flex-direction:column; gap:1.25rem; margin:0;">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Alamat Email</label>
                    <input id="email" name="email" type="email" class="input-field"
                           value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="contoh@email.com">
                    @error('email')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;">
                        <label for="password" style="font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Kata Sandi</label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size:0.75rem; color:#1e3a8a; font-weight:600; text-decoration:none;">Lupa kata sandi?</a>
                        @endif
                    </div>
                    <div style="position:relative;">
                        <input id="password" name="password" type="password" class="input-field"
                               required autocomplete="current-password" placeholder="••••••••"
                               style="padding-right:3rem;">
                        <button type="button" onclick="togglePwd('password', this)"
                                style="position:absolute; right:0.875rem; top:50%; transform:translateY(-50%); background:none; border:none; color:#94a3b8; cursor:pointer; display:flex; align-items:center; padding:0;">
                            <svg id="eye-password" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <label style="display:flex; align-items:center; gap:0.5rem; cursor:pointer;">
                    <input id="remember_me" name="remember" type="checkbox"
                           style="width:16px; height:16px; accent-color:#1e3a8a; cursor:pointer;">
                    <span style="font-size:0.875rem; color:#64748b; font-weight:500;">Ingat saya</span>
                </label>

                {{-- Submit --}}
                <button type="submit" class="btn-primary" style="margin-top:0.5rem;">
                    Masuk ke Akun
                </button>
            </form>

            {{-- Divider --}}
            <div style="margin:1.5rem 0; display:flex; align-items:center; gap:1rem;">
                <div style="flex:1; height:1px; background:#f1f5f9;"></div>
                <span style="font-size:0.75rem; color:#cbd5e1; font-weight:600;">INFO AKUN</span>
                <div style="flex:1; height:1px; background:#f1f5f9;"></div>
            </div>

            {{-- Demo Accounts --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem;">
                <div style="padding:0.875rem; background:#f8fafc; border:1px solid #e2e8f0; border-radius:0.875rem; cursor:pointer; transition:all 0.15s;"
                     onclick="fillLogin('admin@stayease.com','admin123')"
                     onmouseover="this.style.borderColor='#1e3a8a'; this.style.background='#eff6ff';"
                     onmouseout="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                    <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.4rem;">
                        <div style="width:20px; height:20px; border-radius:5px; background:linear-gradient(135deg,#0f1b4c,#1e3a8a); display:flex; align-items:center; justify-content:center;">
                            <svg width="11" height="11" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                        </div>
                        <span style="font-size:0.72rem; font-weight:800; color:#0f172a; text-transform:uppercase; letter-spacing:0.05em;">Admin</span>
                    </div>
                    <p style="font-size:0.7rem; color:#64748b; margin:0; line-height:1.4;">admin@stayease.com<br><span style="color:#94a3b8;">admin123</span></p>
                </div>
                <div style="padding:0.875rem; background:#f8fafc; border:1px solid #e2e8f0; border-radius:0.875rem; cursor:pointer; transition:all 0.15s;"
                     onclick="fillLogin('pelanggan@stayease.com','pelanggan123')"
                     onmouseover="this.style.borderColor='#15803d'; this.style.background='#f0fdf4';"
                     onmouseout="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                    <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.4rem;">
                        <div style="width:20px; height:20px; border-radius:5px; background:linear-gradient(135deg,#15803d,#16a34a); display:flex; align-items:center; justify-content:center;">
                            <svg width="11" height="11" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <span style="font-size:0.72rem; font-weight:800; color:#0f172a; text-transform:uppercase; letter-spacing:0.05em;">Pelanggan</span>
                    </div>
                    <p style="font-size:0.7rem; color:#64748b; margin:0; line-height:1.4;">pelanggan@stayease.com<br><span style="color:#94a3b8;">pelanggan123</span></p>
                </div>
            </div>
            <p style="text-align:center; font-size:0.7rem; color:#cbd5e1; margin:0.75rem 0 0;">Klik kartu di atas untuk mengisi formulir otomatis</p>

        </div>
    </div>

    <script>
        function togglePwd(fieldId, btn) {
            const field = document.getElementById(fieldId);
            field.type = field.type === 'password' ? 'text' : 'password';
            btn.style.color = field.type === 'text' ? '#1e3a8a' : '#94a3b8';
        }
        function fillLogin(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
</body>
</html>
