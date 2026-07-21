<section style="max-width:640px;">
    <p style="font-size:0.875rem; color:#64748b; margin:0 0 1.25rem; line-height:1.5;">
        Setelah akun Anda dihapus, seluruh data dan hak akses terkait akan dihapus secara permanen. Harap pastikan data penting telah dicatat sebelum melanjutkan.
    </p>

    <button type="button" onclick="openDeleteAccountModal()" style="
        display:inline-flex; align-items:center; gap:0.5rem;
        padding:0.65rem 1.35rem; font-size:0.875rem; font-weight:700;
        border-radius:0.75rem; border:none; background:#ef4444;
        color:#fff; cursor:pointer; box-shadow:0 4px 14px rgba(239,68,68,0.3); transition:all 0.2s;"
        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 18px rgba(239,68,68,0.45)'; this.style.background='#dc2626';"
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(239,68,68,0.3)'; this.style.background='#ef4444';">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
        Hapus Akun Saya
    </button>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteAccountModal" style="display:{{ $errors->userDeletion->isNotEmpty() ? 'flex' : 'none' }}; position:fixed; inset:0; background:rgba(15,23,42,0.5); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; border-radius:1.25rem; width:100%; max-width:440px; box-shadow:0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); overflow:hidden; animation:scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;">

            <div style="padding:2rem 1.5rem; text-align:center;">
                <div style="width:56px; height:56px; border-radius:50%; background:#fee2e2; color:#ef4444; display:flex; align-items:center; justify-content:center; margin:0 auto 1.25rem;">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 style="font-size:1.125rem; font-weight:800; color:#0f172a; margin:0 0 0.5rem;">Konfirmasi Penghapusan Akun</h3>
                <p style="font-size:0.875rem; color:#64748b; margin:0 0 1.25rem; line-height:1.5;">
                    Apakah Anda yakin ingin menghapus akun Anda? Masukkan kata sandi Anda untuk konfirmasi.
                </p>

                <form method="post" action="{{ route('profile.destroy') }}" style="margin:0; text-align:left;">
                    @csrf
                    @method('delete')

                    <div style="margin-bottom:1.25rem;">
                        <label for="password" style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">
                            Kata Sandi
                        </label>
                        <input id="password" name="password" type="password" placeholder="Masukkan kata sandi..." required
                               style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;"
                               onfocus="this.style.borderColor='#ef4444'; this.style.boxShadow='0 0 0 3px rgba(239,68,68,0.15)';"
                               onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
                        @if($errors->userDeletion->get('password'))
                            <p style="margin:0.35rem 0 0; font-size:0.75rem; color:#ef4444; font-weight:600;">{{ $errors->userDeletion->first('password') }}</p>
                        @endif
                    </div>

                    <div style="display:flex; justify-content:flex-end; gap:0.75rem; background:#f8fafc; padding:1rem 1.5rem; margin:-1.25rem -1.5rem -2rem -1.5rem; border-top:1px solid #f1f5f9;">
                        <button type="button" onclick="closeDeleteAccountModal()" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:1px solid #cbd5e1; background:#fff; color:#475569; cursor:pointer;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#fff'">
                            Batal
                        </button>
                        <button type="submit" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:#ef4444; color:#fff; cursor:pointer; box-shadow:0 2px 8px rgba(239,68,68,0.25);" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                            Ya, Hapus Akun
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<script>
    function openDeleteAccountModal() {
        document.getElementById('deleteAccountModal').style.display = 'flex';
    }
    function closeDeleteAccountModal() {
        document.getElementById('deleteAccountModal').style.display = 'none';
    }
    window.addEventListener('click', (event) => {
        const modal = document.getElementById('deleteAccountModal');
        if (event.target === modal) closeDeleteAccountModal();
    });
</script>
