<section style="max-width:640px;">
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" style="display:flex; flex-direction:column; gap:1.25rem; margin:0;">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <label for="name" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                Nama Lengkap
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                   onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
            @if($errors->get('name'))
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->first('name') }}</p>
            @endif
        </div>

        {{-- Email --}}
        <div>
            <label for="email" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                Alamat Email
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                   style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b; transition:all 0.2s;"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.15)';"
                   onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
            @if($errors->get('email'))
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->first('email') }}</p>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="margin-top:0.75rem; padding:0.75rem 1rem; background:#fef3c7; border:1px solid #fde68a; border-radius:0.75rem;">
                    <p style="margin:0; font-size:0.8rem; color:#92400e; font-weight:500;">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification" style="background:none; border:none; padding:0; font-size:0.8rem; color:#b45309; text-decoration:underline; cursor:pointer; font-weight:700; margin-left:0.25rem;">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p style="margin:0.5rem 0 0; font-size:0.75rem; color:#15803d; font-weight:700;">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Submit Action --}}
        <div style="display:flex; align-items:center; gap:1rem; margin-top:0.5rem;">
            <button type="submit" style="
                display:inline-flex; align-items:center; gap:0.5rem;
                padding:0.65rem 1.35rem; font-size:0.875rem; font-weight:700;
                border-radius:0.75rem; border:none; background:linear-gradient(135deg, #0f1b4c 0%, #1e3a8a 100%);
                color:#fff; cursor:pointer; box-shadow:0 4px 14px rgba(15,27,76,0.3); transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 18px rgba(15,27,76,0.45)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(15,27,76,0.3)'">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <span style="font-size:0.8rem; font-weight:700; color:#10b981; display:flex; align-items:center; gap:0.25rem;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Tersimpan
                </span>
            @endif
        </div>
    </form>
</section>
