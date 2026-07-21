<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun – StayEase</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html, body { min-height: 100vh; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body { display: flex; min-height: 100vh; background: #f8fafc; }

        .auth-left {
            width: 42%;
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
            width: 350px; height: 350px; border-radius: 50%;
            background: rgba(245,197,24,0.07);
            top: -80px; right: -80px;
        }
        .auth-left::after {
            content: '';
            position: absolute;
            width: 250px; height: 250px; border-radius: 50%;
            background: rgba(255,255,255,0.03);
            bottom: -50px; left: -50px;
        }

        .auth-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
            background: #fff;
            overflow-y: auto;
        }

        .form-card { width: 100%; max-width: 440px; }

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

        .password-strength { height: 4px; border-radius: 999px; background: #e2e8f0; margin-top: 0.5rem; overflow: hidden; }
        .password-strength-bar { height: 100%; border-radius: 999px; width: 0; transition: width 0.3s, background 0.3s; }

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
            <div style="width:72px; height:72px; border-radius:20px; background:linear-gradient(135deg,#f5c518,#f97316); display:flex; align-items:center; justify-content:center; font-weight:900; font-size:2rem; color:#0f1b4c; margin:0 auto 1.5rem; box-shadow:0 8px 24px rgba(245,197,24,0.4);">
                S
            </div>
            <h1 style="font-family:'Playfair Display',serif; font-size:2.25rem; font-weight:800; margin:0 0 0.5rem; line-height:1.2;">StayEase</h1>
            <p style="font-size:0.8rem; color:#f5c518; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; margin:0 0 2rem;">Luxury Hospitality</p>

            <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:1.25rem; padding:1.5rem; text-align:left; max-width:300px; margin:0 auto;">
                <p style="font-size:0.875rem; color:rgba(255,255,255,0.85); font-weight:600; margin:0 0 1rem;">Keuntungan menjadi member StayEase:</p>
                @foreach([
                    ['icon' => '⭐', 'text' => 'Akses ke kamar-kamar eksklusif'],
                    ['icon' => '⚡', 'text' => 'Pemesanan instan & real-time'],
                    ['icon' => '🎁', 'text' => 'Program loyalitas & diskon member'],
                    ['icon' => '📱', 'text' => 'Pantau status pemesanan kapan saja'],
                ] as $item)
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.625rem;">
                    <span style="font-size:1rem;">{{ $item['icon'] }}</span>
                    <span style="font-size:0.82rem; color:rgba(255,255,255,0.75);">{{ $item['text'] }}</span>
                </div>
                @endforeach
            </div>

            <div style="margin-top:2rem; padding:1rem; background:rgba(245,197,24,0.12); border:1px solid rgba(245,197,24,0.25); border-radius:0.875rem;">
                <p style="font-size:0.75rem; color:#f5c518; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 0.3rem;">GRATIS SELAMANYA</p>
                <p style="font-size:0.82rem; color:rgba(255,255,255,0.8); margin:0;">Tidak ada biaya pendaftaran. Daftar dan mulai memesan dalam hitungan menit.</p>
            </div>
        </div>
    </div>

    {{-- ── Right Form Panel ─────────────────────────────────────────── --}}
    <div class="auth-right">
        <div class="form-card">

            {{-- Header --}}
            <div style="margin-bottom:1.75rem;">
                <p style="font-size:0.7rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.14em; margin:0 0 0.4rem;">DAFTAR AKUN PELANGGAN</p>
                <h2 style="font-size:1.75rem; font-weight:800; color:#0f172a; margin:0 0 0.5rem; font-family:'Playfair Display',serif;">Buat Akun Baru</h2>
                <p style="font-size:0.875rem; color:#64748b; margin:0;">Sudah punya akun?
                    <a href="{{ route('login') }}" style="color:#1e3a8a; font-weight:700; text-decoration:none;">Masuk di sini →</a>
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('register') }}" style="display:flex; flex-direction:column; gap:1.125rem; margin:0;">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Nama Lengkap</label>
                    <input id="name" name="name" type="text" class="input-field"
                           value="{{ old('name') }}" required autofocus autocomplete="name"
                           placeholder="Masukkan nama lengkap Anda">
                    @error('name')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Alamat Email</label>
                    <input id="email" name="email" type="email" class="input-field"
                           value="{{ old('email') }}" required autocomplete="username"
                           placeholder="contoh@email.com">
                    @error('email')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Kata Sandi</label>
                    <div style="position:relative;">
                        <input id="password" name="password" type="password" class="input-field"
                               required autocomplete="new-password" placeholder="Min. 8 karakter"
                               style="padding-right:3rem;"
                               oninput="checkStrength(this.value)">
                        <button type="button" onclick="togglePwd('password', this)"
                                style="position:absolute; right:0.875rem; top:50%; transform:translateY(-50%); background:none; border:none; color:#94a3b8; cursor:pointer; display:flex; align-items:center; padding:0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    <div class="password-strength"><div id="strength-bar" class="password-strength-bar"></div></div>
                    <p id="strength-text" style="margin:0.3rem 0 0; font-size:0.7rem; color:#94a3b8; font-weight:600;"></p>
                    @error('password')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Konfirmasi Kata Sandi</label>
                    <div style="position:relative;">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="input-field"
                               required autocomplete="new-password" placeholder="Ulangi kata sandi"
                               style="padding-right:3rem;">
                        <button type="button" onclick="togglePwd('password_confirmation', this)"
                                style="position:absolute; right:0.875rem; top:50%; transform:translateY(-50%); background:none; border:none; color:#94a3b8; cursor:pointer; display:flex; align-items:center; padding:0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Info badge --}}
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.75rem; background:#eff6ff; border:1px solid #bfdbfe; border-radius:0.75rem;">
                    <svg width="16" height="16" fill="none" stroke="#2563eb" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0; margin-top:1px;"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p style="font-size:0.75rem; color:#1d4ed8; font-weight:600; margin:0; line-height:1.5;">
                        Akun yang dibuat akan memiliki peran sebagai <strong>Pelanggan</strong>. Akun Admin hanya dibuat oleh sistem.
                    </p>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary" style="margin-top:0.25rem;">
                    Buat Akun Pelanggan
                </button>

            </form>

        </div>
    </div>

    <script>
        function togglePwd(fieldId, btn) {
            const field = document.getElementById(fieldId);
            field.type = field.type === 'password' ? 'text' : 'password';
            btn.style.color = field.type === 'text' ? '#1e3a8a' : '#94a3b8';
        }

        function checkStrength(password) {
            const bar = document.getElementById('strength-bar');
            const text = document.getElementById('strength-text');
            let score = 0;
            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            const levels = [
                { width: '0%', color: '#e2e8f0', label: '' },
                { width: '25%', color: '#ef4444', label: '⚠ Sangat Lemah' },
                { width: '50%', color: '#f97316', label: '⚡ Lemah' },
                { width: '75%', color: '#eab308', label: '✓ Cukup' },
                { width: '100%', color: '#22c55e', label: '✓ Kuat' },
            ];

            const level = password.length === 0 ? levels[0] : levels[score] || levels[1];
            bar.style.width = level.width;
            bar.style.background = level.color;
            text.textContent = level.label;
            text.style.color = level.color;
        }
    </script>
</body>
</html>
