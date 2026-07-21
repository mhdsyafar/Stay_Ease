<x-customer-layout>

{{-- ── Hero Welcome Banner ────────────────────────────────────────── --}}
<div style="background: linear-gradient(135deg, #0f1b4c 0%, #1e3a8a 60%, #1d4ed8 100%); border-radius: 1.5rem; padding: 2.25rem 2rem; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(15,27,76,0.25); color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; right: -30px; top: -30px; width: 160px; height: 160px; border-radius: 50%; background: rgba(255,255,255,0.06);"></div>
    <div style="position: absolute; right: 50px; bottom: -50px; width: 140px; height: 140px; border-radius: 50%; background: rgba(255,255,255,0.04);"></div>

    <div style="position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
        <div>
            <span style="padding: 0.3rem 0.85rem; font-size: 0.7rem; font-weight: 800; border-radius: 999px; background: rgba(245,197,24,0.2); color: #f5c518; border: 1px solid rgba(245,197,24,0.4); letter-spacing: 0.08em; text-transform: uppercase;">
                Layanan Pelanggan StayEase
            </span>
            <h1 class="font-serif-display" style="font-size: 2.1rem; font-weight: 700; margin: 0.6rem 0 0.4rem; color: #fff; line-height: 1.2;">
                Selamat Datang, {{ $user->name }}!
            </h1>
            <p style="font-size: 0.9375rem; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400; max-width: 580px; line-height: 1.5;">
                Nikmati kemudahan memesan kamar impian Anda, melihat katalog fasilitas, dan memantau status reservasi menginap secara langsung.
            </p>
        </div>

        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('pelanggan.kamar') }}" style="
                display: inline-flex; align-items: center; gap: 0.6rem;
                padding: 0.85rem 1.5rem; border-radius: 0.875rem; font-size: 0.875rem; font-weight: 700;
                background: linear-gradient(135deg, #f5c518, #f97316); color: #0f1b4c;
                text-decoration: none; box-shadow: 0 4px 16px rgba(245,197,24,0.4); transition: all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Jelajah & Pesan Kamar
            </a>
        </div>
    </div>
</div>

{{-- ── Quick Stat Widgets ─────────────────────────────────────────── --}}
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">

    {{-- Stat 1: Kamar Tersedia --}}
    <a href="{{ route('pelanggan.kamar') }}" style="text-decoration: none; background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 16px rgba(0,0,0,0.04); transition: all 0.2s;"
       onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='#cbd5e1'" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'">
        <div>
            <p style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; uppercase; letter-spacing: 0.08em; margin: 0 0 0.35rem;">KAMAR SIAP DIPESAN</p>
            <p style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin: 0; line-height: 1;">{{ $totalTersedia }}</p>
            <p style="font-size: 0.78rem; color: #10b981; font-weight: 600; margin: 0.5rem 0 0; display: flex; align-items: center; gap: 0.25rem;">
                ✓ Tersedia untuk tanggal hari ini
            </p>
        </div>
        <div style="width: 52px; height: 52px; border-radius: 1rem; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
    </a>

    {{-- Stat 2: Total Pemesanan Saya --}}
    <a href="{{ route('pelanggan.boking.index') }}" style="text-decoration: none; background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 16px rgba(0,0,0,0.04); transition: all 0.2s;"
       onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='#cbd5e1'" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'">
        <div>
            <p style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; uppercase; letter-spacing: 0.08em; margin: 0 0 0.35rem;">PESANAN SAYA</p>
            <p style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin: 0; line-height: 1;">{{ $myTotalBooking }}</p>
            <p style="font-size: 0.78rem; color: #3b82f6; font-weight: 600; margin: 0.5rem 0 0; display: flex; align-items: center; gap: 0.25rem;">
                Lihat riwayat & status →
            </p>
        </div>
        <div style="width: 52px; height: 52px; border-radius: 1rem; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
    </a>

    {{-- Stat 3: Member Tier --}}
    <a href="{{ route('pelanggan.profile') }}" style="text-decoration: none; background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 16px rgba(0,0,0,0.04); transition: all 0.2s;"
       onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='#cbd5e1'" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'">
        <div>
            <p style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; uppercase; letter-spacing: 0.08em; margin: 0 0 0.35rem;">STATUS ANGGOTA</p>
            <p style="font-size: 1.75rem; font-weight: 800; color: #d97706; margin: 0; line-height: 1; text-transform: uppercase;">
                {{ $user->member_tier ?? 'Standard' }}
            </p>
            <p style="font-size: 0.78rem; color: #64748b; font-weight: 600; margin: 0.5rem 0 0;">
                Atur profil & keamanan
            </p>
        </div>
        <div style="width: 52px; height: 52px; border-radius: 1rem; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.9 1.52-1.3 2.1-.3l1.76 3.56 3.93.57c1.08.15 1.52 1.48.74 2.2l-2.84 2.76.67 3.92c.18 1.07-.94 1.88-1.9 1.37L12 14.6l-3.52 1.85c-.96.5-2.08-.3-1.9-1.37l.67-3.92-2.84-2.76c-.78-.72-.34-2.05.74-2.2l3.93-.57 1.76-3.56z"/></svg>
        </div>
    </a>

</div>

{{-- ── Active Booking Banner (if any) ─────────────────────────────── --}}
@if($activeBookings->count() > 0)
<div style="background: #fff; border-radius: 1.25rem; border: 1px solid #e2e8f0; padding: 1.5rem; margin-bottom: 2rem; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <div style="display: flex; align-items: center; gap: 0.6rem;">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #f59e0b; box-shadow: 0 0 8px #f59e0b;"></span>
            <h3 style="font-size: 1.05rem; font-weight: 800; color: #0f172a; margin: 0;">Reservasi Aktif Anda</h3>
        </div>
        <a href="{{ route('pelanggan.boking.index') }}" style="font-size: 0.8rem; font-weight: 700; color: #2563eb; text-decoration: none;">Lihat Semua →</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
        @foreach($activeBookings as $boking)
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.1rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem;">
            <div>
                <p style="font-size: 0.9375rem; font-weight: 800; color: #0f1b4c; margin: 0;">
                    Kamar {{ $boking->kamar->nomor_kamar ?? 'N/A' }} – {{ $boking->kamar->tipe_kamar ?? 'N/A' }}
                </p>
                <p style="font-size: 0.78rem; color: #64748b; margin: 0.25rem 0 0; font-weight: 500;">
                    📅 Check-in: {{ \Carbon\Carbon::parse($boking->tanggal_check_in)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($boking->tanggal_check_out)->format('d M Y') }}
                </p>
            </div>
            <div>
                @if($boking->status_boking === 'pending')
                    <span style="padding: 0.35rem 0.85rem; font-size: 0.72rem; font-weight: 700; border-radius: 999px; background: #fef3c7; color: #92400e; letter-spacing: 0.04em;">
                        ⏳ Menunggu Konfirmasi
                    </span>
                @elseif($boking->status_boking === 'dikonfirmasi')
                    <span style="padding: 0.35rem 0.85rem; font-size: 0.72rem; font-weight: 700; border-radius: 999px; background: #dcfce7; color: #15803d; letter-spacing: 0.04em;">
                        ✓ Dikonfirmasi
                    </span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- ── Featured Rooms Preview ─────────────────────────────────────── --}}
<div style="background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.75rem; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
        <div>
            <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin: 0;">Pilihan Kamar Populer</h2>
            <p style="font-size: 0.85rem; color: #64748b; margin: 0.2rem 0 0; font-weight: 500;">Pesan langsung kamar favorit Anda dengan kenyamanan ekstra</p>
        </div>
        <a href="{{ route('pelanggan.kamar') }}" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.6rem 1.1rem; border-radius: 0.75rem; font-size: 0.8125rem; font-weight: 700; background: #eff6ff; color: #2563eb; text-decoration: none; transition: all 0.15s;"
           onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">
            Katalog Lengkap →
        </a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.25rem;">
        @forelse($featuredRooms as $kamar)
        <div style="border: 1px solid #e2e8f0; border-radius: 1.125rem; padding: 1.25rem; background: #fff; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.2s;"
             onmouseover="this.style.borderColor='#cbd5e1'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.06)';"
             onmouseout="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none';">
            <div>
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                    <span style="padding: 0.25rem 0.65rem; font-size: 0.7rem; font-weight: 800; border-radius: 999px; background: #e0e7ff; color: #3730a3; text-transform: uppercase; letter-spacing: 0.05em;">
                        {{ $kamar->tipe_kamar }}
                    </span>
                    <span style="padding: 0.25rem 0.65rem; font-size: 0.7rem; font-weight: 700; border-radius: 999px; background: #dcfce7; color: #15803d;">
                        Tersedia
                    </span>
                </div>

                <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f1b4c; margin: 0 0 0.35rem;">
                    Kamar {{ $kamar->nomor_kamar }}
                </h3>
                <p style="font-size: 0.8125rem; color: #64748b; margin: 0 0 1rem; line-height: 1.4;">
                    Fasilitas lengkap, tempat tidur king size, pemandangan indah, dan AC 24 jam.
                </p>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; pt-3; border-top: 1px solid #f1f5f9; margin-top: 0.5rem; padding-top: 0.75rem;">
                <div>
                    <span style="font-size: 1.125rem; font-weight: 800; color: #d97706;">${{ number_format($kamar->harga, 2) }}</span>
                    <span style="font-size: 0.7rem; color: #94a3b8;">/ malam</span>
                </div>
                <a href="{{ route('pelanggan.kamar', ['search' => $kamar->nomor_kamar]) }}" style="
                    padding: 0.5rem 0.875rem; font-size: 0.78rem; font-weight: 700; border-radius: 0.625rem;
                    background: #0f1b4c; color: #fff; text-decoration: none; transition: all 0.15s;"
                   onmouseover="this.style.background='#1e3a8a'" onmouseout="this.style.background='#0f1b4c'">
                    Pesan
                </a>
            </div>
        </div>
        @empty
        <div style="grid-column: 1/-1; padding: 2rem; text-align: center; color: #94a3b8; font-size: 0.875rem;">
            Belum ada data kamar tersedia.
        </div>
        @endforelse
    </div>
</div>

</x-customer-layout>
