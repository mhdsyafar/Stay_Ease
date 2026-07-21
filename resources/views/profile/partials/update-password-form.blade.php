<section style="max-width:640px;">
    <form method="post" action="{{ route('password.update') }}" style="display:flex; flex-direction:column; gap:1.25rem; margin:0;">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div>
            <label for="update_password_current_password" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                Kata Sandi Saat Ini
            </label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                   style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                   onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
            @if($errors->updatePassword->get('current_password'))
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        {{-- New Password --}}
        <div>
            <label for="update_password_password" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                Kata Sandi Baru
            </label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                   style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                   onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
            @if($errors->updatePassword->get('password'))
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </div>

        {{-- Password Confirmation --}}
        <div>
            <label for="update_password_password_confirmation" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                Konfirmasi Kata Sandi Baru
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                   style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                   onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
            @if($errors->updatePassword->get('password_confirmation'))
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        {{-- Submit Action --}}
        <div style="display:flex; align-items:center; gap:1rem; margin-top:0.5rem;">
            <button type="submit" style="
                display:inline-flex; align-items:center; gap:0.5rem;
                padding:0.65rem 1.35rem; font-size:0.875rem; font-weight:700;
                border-radius:0.75rem; border:none; background:linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
                color:#fff; cursor:pointer; box-shadow:0 4px 14px rgba(245,158,11,0.3); transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 18px rgba(245,158,11,0.45)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(245,158,11,0.3)'">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Perbarui Kata Sandi
            </button>

            @if (session('status') === 'password-updated')
                <span style="font-size:0.8rem; font-weight:700; color:#10b981; display:flex; align-items:center; gap:0.25rem;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Tersimpan
                </span>
            @endif
        </div>
    </form>
</section>
