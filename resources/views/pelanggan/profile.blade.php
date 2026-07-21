<x-customer-layout>

{{-- ── Toast Success ────────────────────────────────────────────────── --}}
@if(session('status') === 'profile-updated' || session('status') === 'password-updated')
<div id="profile-toast" style="position:fixed; top:1.5rem; right:1.5rem; z-index:9999; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #10b981; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); min-width:300px; animation:slideIn 0.3s cubic-bezier(0.16,1,0.3,1) forwards;">
    <div style="width:24px; height:24px; border-radius:50%; background:#dcfce7; color:#10b981; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
    </div>
    <p style="margin:0; font-size:0.875rem; font-weight:600; color:#0f172a; flex:1;">
        {{ session('status') === 'profile-updated' ? 'Profil berhasil diperbarui.' : 'Kata sandi berhasil diperbarui.' }}
    </p>
    <button onclick="document.getElementById('profile-toast').remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer;">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
</div>
@endif

{{-- ── Page Header ─────────────────────────────────────────────────── --}}
<div style="margin-bottom:1.75rem;">
    <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">AKUN & KEAMANAN</p>
    <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Profil Saya</h1>
    <p style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0; font-weight:500;">Kelola informasi akun dan keamanan akun StayEase Anda</p>
</div>

{{-- ── Member Card Hero ─────────────────────────────────────────────── --}}
@php
    $nameParts = explode(' ', $user->name ?? 'User');
    $initials  = strtoupper(substr($nameParts[0],0,1) . substr($nameParts[1] ?? '',0,1));
    $isVip     = ($user->member_tier ?? '') === 'vip';
@endphp
<div style="background:linear-gradient(135deg,#0f1b4c 0%,#1e3a8a 60%,#1d4ed8 100%); border-radius:1.5rem; padding:2rem; margin-bottom:1.75rem; box-shadow:0 10px 30px rgba(15,27,76,0.25); color:#fff; position:relative; overflow:hidden;">
    <div style="position:absolute; right:-30px; top:-30px; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,0.06);"></div>
    <div style="position:absolute; right:60px; bottom:-50px; width:130px; height:130px; border-radius:50%; background:rgba(255,255,255,0.04);"></div>

    <div style="position:relative; z-index:1; display:flex; align-items:center; gap:1.5rem; flex-wrap:wrap;">
        <div style="width:5rem; height:5rem; border-radius:50%; background:linear-gradient(135deg,#f5c518,#f97316); color:#0f1b4c; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.75rem; flex-shrink:0; box-shadow:0 4px 16px rgba(245,197,24,0.4); border:3px solid rgba(255,255,255,0.2);">
            {{ $initials }}
        </div>

        <div style="flex:1; min-width:200px;">
            <div style="display:flex; align-items:center; gap:0.75rem; flex-wrap:wrap; margin-bottom:0.35rem;">
                <h2 style="font-size:1.5rem; font-weight:800; margin:0; color:#fff;">{{ $user->name }}</h2>
                <span style="padding:0.25rem 0.85rem; font-size:0.68rem; font-weight:800; border-radius:999px; letter-spacing:0.08em; text-transform:uppercase;
                    {{ $isVip ? 'background:rgba(245,197,24,0.25); color:#f5c518; border:1px solid rgba(245,197,24,0.45);' : 'background:rgba(255,255,255,0.15); color:rgba(255,255,255,0.9); border:1px solid rgba(255,255,255,0.2);' }}">
                    {{ $isVip ? '⭐ VIP Member' : 'Standard Member' }}
                </span>
            </div>
            <p style="font-size:0.9rem; color:rgba(255,255,255,0.75); margin:0; display:flex; align-items:center; gap:0.4rem;">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                {{ $user->email }}
            </p>
        </div>

        <div style="display:flex; gap:1rem; flex-wrap:wrap;">
            <div style="text-align:center; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); padding:0.875rem 1.25rem; border-radius:1rem;">
                <p style="font-size:1.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ $totalBookings }}</p>
                <p style="font-size:0.7rem; color:rgba(255,255,255,0.65); margin:0.3rem 0 0; font-weight:600; text-transform:uppercase;">Total Pemesanan</p>
            </div>
        </div>
    </div>

    @if($isVip)
    <div style="margin-top:1.25rem; padding-top:1.25rem; border-top:1px solid rgba(255,255,255,0.1); position:relative; z-index:1;">
        <p style="font-size:0.75rem; font-weight:700; color:#f5c518; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 0.6rem;">Keistimewaan VIP Member Anda:</p>
        <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
            @foreach(['Prioritas Check-in', 'Late Check-out Gratis', 'Diskon 15% Fasilitas', 'Layanan Kamar 24 Jam'] as $perk)
            <span style="padding:0.3rem 0.75rem; font-size:0.73rem; font-weight:600; border-radius:999px; background:rgba(245,197,24,0.15); color:#f5c518; border:1px solid rgba(245,197,24,0.3);">
                ✓ {{ $perk }}
            </span>
            @endforeach
        </div>
    </div>
    @endif
</div>

{{-- ── Profile Forms Section ────────────────────────────────────────── --}}
<div style="display:flex; flex-direction:column; gap:1.75rem;">

    {{-- 1. Update Profile Information --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden;">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9; background:linear-gradient(90deg,#f8fafc,#fff); display:flex; align-items:center; gap:0.75rem;">
            <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; color:#2563eb; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h3 style="font-size:1rem; font-weight:800; color:#0f172a; margin:0;">Informasi Profil</h3>
                <p style="font-size:0.75rem; color:#64748b; margin:0.15rem 0 0; font-weight:500;">Perbarui nama lengkap dan alamat email Anda.</p>
            </div>
        </div>
        <div style="padding:1.5rem;">
            <form method="POST" action="{{ route('profile.update') }}" style="display:flex; flex-direction:column; gap:1.25rem; margin:0; max-width:560px;">
                @csrf
                @method('patch')

                <div>
                    <label for="cust_name" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Nama Lengkap</label>
                    <input id="cust_name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                           style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                           onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                           onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
                    @if($errors->get('name'))
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div>
                    <label for="cust_email" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Alamat Email</label>
                    <input id="cust_email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                           style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                           onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                           onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
                    @if($errors->get('email'))
                        <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div style="display:flex; align-items:center; gap:1rem;">
                    <button type="submit" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.65rem 1.35rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:linear-gradient(135deg,#0f1b4c,#1e3a8a); color:#fff; cursor:pointer; box-shadow:0 4px 14px rgba(15,27,76,0.25); transition:all 0.2s;"
                            onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='translateY(0)'">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan
                    </button>
                    @if(session('status') === 'profile-updated')
                        <span style="font-size:0.8rem; font-weight:700; color:#10b981;">✓ Tersimpan</span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- 2. Update Password --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden;">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9; background:linear-gradient(90deg,#f8fafc,#fff); display:flex; align-items:center; gap:0.75rem;">
            <div style="width:36px; height:36px; border-radius:10px; background:#fef3c7; color:#d97706; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <div>
                <h3 style="font-size:1rem; font-weight:800; color:#0f172a; margin:0;">Perbarui Kata Sandi</h3>
                <p style="font-size:0.75rem; color:#64748b; margin:0.15rem 0 0; font-weight:500;">Gunakan kata sandi unik dan kuat untuk keamanan akun Anda.</p>
            </div>
        </div>
        <div style="padding:1.5rem;">
            <form method="POST" action="{{ route('password.update') }}" style="display:flex; flex-direction:column; gap:1.25rem; margin:0; max-width:560px;">
                @csrf
                @method('put')

                @foreach([['update_password_current_password', 'current_password', 'Kata Sandi Saat Ini', 'current-password'], ['update_password_password', 'password', 'Kata Sandi Baru', 'new-password'], ['update_password_password_confirmation', 'password_confirmation', 'Konfirmasi Kata Sandi', 'new-password']] as [$id, $name, $label, $autocomplete])
                <div>
                    <label for="{{ $id }}" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">{{ $label }}</label>
                    <input id="{{ $id }}" name="{{ $name }}" type="password" autocomplete="{{ $autocomplete }}"
                           style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                           onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                           onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
                </div>
                @endforeach

                <div style="display:flex; align-items:center; gap:1rem;">
                    <button type="submit" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.65rem 1.35rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:linear-gradient(135deg,#d97706,#f59e0b); color:#fff; cursor:pointer; box-shadow:0 4px 14px rgba(245,158,11,0.25); transition:all 0.2s;"
                            onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='translateY(0)'">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Perbarui Kata Sandi
                    </button>
                    @if(session('status') === 'password-updated')
                        <span style="font-size:0.8rem; font-weight:700; color:#10b981;">✓ Tersimpan</span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- 3. Quick Links --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); padding:1.5rem;">
        <h3 style="font-size:1rem; font-weight:800; color:#0f172a; margin:0 0 1rem;">Tautan Cepat</h3>
        <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
            <a href="{{ route('pelanggan.kamar') }}" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.65rem 1.25rem; border-radius:0.75rem; font-size:0.875rem; font-weight:700; background:#eff6ff; color:#2563eb; text-decoration:none;">
                🏠 Jelajah Kamar
            </a>
            <a href="{{ route('pelanggan.boking.index') }}" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.65rem 1.25rem; border-radius:0.75rem; font-size:0.875rem; font-weight:700; background:#f0fdf4; color:#16a34a; text-decoration:none;">
                📅 Pesanan Saya
            </a>
            <a href="{{ route('pelanggan.dashboard') }}" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.65rem 1.25rem; border-radius:0.75rem; font-size:0.875rem; font-weight:700; background:#faf5ff; color:#7c3aed; text-decoration:none;">
                🏡 Beranda Portal
            </a>
        </div>
    </div>

</div>

<style>
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toast = document.getElementById('profile-toast');
        if (toast) {
            setTimeout(() => {
                toast.style.transition = 'opacity 0.5s ease';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }
    });
</script>

</x-customer-layout>
