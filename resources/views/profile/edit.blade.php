<x-app-layout>

{{-- ── Toast Notification System ────────────────────────────────────── --}}
@if (session('status') || session('success') || $errors->any())
<div id="toast-container" style="position:fixed; top:1.5rem; right:1.5rem; z-index:9999; display:flex; flex-direction:column; gap:0.75rem; pointer-events:none;">
    @if(session('status') === 'profile-updated' || session('status') === 'password-updated' || session('success'))
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #10b981; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#dcfce7; color:#10b981; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </div>
        <div style="flex:1;">
            <p style="margin:0; font-size:0.875rem; font-weight:700; color:#0f172a;">Success</p>
            <p style="margin:0.125rem 0 0; font-size:0.75rem; font-weight:500; color:#64748b;">
                @if(session('status') === 'profile-updated')
                    Profile information updated successfully.
                @elseif(session('status') === 'password-updated')
                    Password updated successfully.
                @else
                    {{ session('success') }}
                @endif
            </p>
        </div>
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer; padding:0.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#cbd5e1'">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #ef4444; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#fee2e2; color:#ef4444; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div style="flex:1;">
            <p style="margin:0; font-size:0.875rem; font-weight:700; color:#0f172a;">Validation Error</p>
            <p style="margin:0.125rem 0 0; font-size:0.75rem; font-weight:500; color:#64748b;">{{ $error }}</p>
        </div>
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer; padding:0.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#cbd5e1'">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endforeach
    @endif
</div>
@endif

{{-- ── Page Header ─────────────────────────────────────────────────── --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.75rem;">
    <div>
        <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">ACCOUNT & SECURITY</p>
        <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Profile Settings</h1>
        <p style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0; font-weight:500;">Manage your admin profile details and account security settings</p>
    </div>
</div>

{{-- ── User Summary Card Header ───────────────────────────────────── --}}
@php
    $nameParts = explode(' ', Auth::user()->name ?? 'User');
    $initials  = strtoupper(substr($nameParts[0],0,1) . substr($nameParts[1] ?? '',0,1));
@endphp
<div style="background:linear-gradient(135deg, #0f1b4c 0%, #1e3a8a 60%, #1d4ed8 100%); border-radius:1.25rem; padding:1.75rem; margin-bottom:1.75rem; box-shadow:0 8px 24px rgba(15,27,76,0.25); color:#fff; position:relative; overflow:hidden;">
    <div style="position:absolute; right:-20px; top:-20px; width:120px; height:120px; border-radius:50%; background:rgba(255,255,255,0.06);"></div>
    <div style="position:absolute; right:40px; bottom:-40px; width:100px; height:100px; border-radius:50%; background:rgba(255,255,255,0.04);"></div>

    <div style="display:flex; align-items:center; gap:1.5rem; position:relative; z-index:1; flex-wrap:wrap;">
        <div style="width:4.25rem; height:4.25rem; border-radius:50%; background:linear-gradient(135deg,#f5c518,#f97316); color:#0f1b4c; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.5rem; flex-shrink:0; box-shadow:0 4px 14px rgba(245,197,24,0.4); border:3px solid rgba(255,255,255,0.2);">
            {{ $initials }}
        </div>
        <div style="flex:1; min-width:240px;">
            <div style="display:flex; align-items:center; gap:0.75rem; flex-wrap:wrap;">
                <h2 style="font-size:1.375rem; font-weight:800; margin:0; color:#fff;">{{ Auth::user()->name }}</h2>
                <span style="padding:0.25rem 0.75rem; font-size:0.68rem; font-weight:800; border-radius:999px; background:rgba(245,197,24,0.2); color:#f5c518; border:1px solid rgba(245,197,24,0.4); letter-spacing:0.06em; text-transform:uppercase;">
                    Administrator
                </span>
            </div>
            <p style="font-size:0.875rem; color:rgba(255,255,255,0.75); margin:0.35rem 0 0; font-weight:500; display:flex; align-items:center; gap:0.4rem;">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                {{ Auth::user()->email }}
            </p>
        </div>
        <div style="display:flex; align-items:center; gap:0.5rem; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); padding:0.6rem 1rem; border-radius:0.875rem;">
            <div style="width:8px; height:8px; border-radius:50%; background:#10b981; box-shadow:0 0 8px #10b981;"></div>
            <span style="font-size:0.78rem; font-weight:600; color:rgba(255,255,255,0.9);">Account Active</span>
        </div>
    </div>
</div>

{{-- ── Main Sections ────────────────────────────────────────────────── --}}
<div style="display:flex; flex-direction:column; gap:1.75rem;">

    {{-- 1. Profile Information Form --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden;">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9; background:linear-gradient(90deg,#f8fafc,#fff); display:flex; align-items:center; gap:0.75rem;">
            <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; color:#2563eb; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h3 style="font-size:1rem; font-weight:800; color:#0f172a; margin:0;">Informasi Profil</h3>
                <p style="font-size:0.75rem; color:#64748b; margin:0.15rem 0 0; font-weight:500;">Perbarui nama dan alamat email akun Anda.</p>
            </div>
        </div>
        <div style="padding:1.5rem;">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- 2. Update Password Form --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden;">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9; background:linear-gradient(90deg,#f8fafc,#fff); display:flex; align-items:center; gap:0.75rem;">
            <div style="width:36px; height:36px; border-radius:10px; background:#fef3c7; color:#d97706; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <div>
                <h3 style="font-size:1rem; font-weight:800; color:#0f172a; margin:0;">Perbarui Kata Sandi</h3>
                <p style="font-size:0.75rem; color:#64748b; margin:0.15rem 0 0; font-weight:500;">Pastikan akun Anda menggunakan kata sandi acak yang aman.</p>
            </div>
        </div>
        <div style="padding:1.5rem;">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- 3. Delete User Account Form --}}
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #fee2e2; box-shadow:0 4px 16px rgba(239,68,68,0.05); overflow:hidden;">
        <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #fee2e2; background:linear-gradient(90deg,#fef2f2,#fff); display:flex; align-items:center; gap:0.75rem;">
            <div style="width:36px; height:36px; border-radius:10px; background:#fee2e2; color:#ef4444; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <div>
                <h3 style="font-size:1rem; font-weight:800; color:#b91c1c; margin:0;">Zona Bahaya - Hapus Akun</h3>
                <p style="font-size:0.75rem; color:#991b1b; margin:0.15rem 0 0; font-weight:500;">Penghapusan akun bersifat permanen dan tidak dapat dibatalkan.</p>
            </div>
        </div>
        <div style="padding:1.5rem;">
            @include('profile.partials.delete-user-form')
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
        setTimeout(() => {
            const items = document.querySelectorAll('.toast-item');
            items.forEach(item => {
                item.style.transition = 'opacity 0.5s ease';
                item.style.opacity = '0';
                setTimeout(() => item.remove(), 500);
            });
        }, 4000);
    });
</script>

</x-app-layout>
