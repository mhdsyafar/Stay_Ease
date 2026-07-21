<x-customer-layout>

{{-- ── Toast Notifications ──────────────────────────────────────────── --}}
@if(session('success') || $errors->any())
<div id="toast-container" style="position:fixed; top:1.5rem; right:1.5rem; z-index:9999; display:flex; flex-direction:column; gap:0.75rem; pointer-events:none;">
    @if(session('success'))
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #10b981; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16,1,0.3,1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#dcfce7; color:#10b981; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </div>
        <p style="margin:0; font-size:0.875rem; font-weight:600; color:#0f172a; flex:1;">{{ session('success') }}</p>
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer; display:flex; align-items:center;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif

    @foreach($errors->all() as $error)
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #ef4444; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16,1,0.3,1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#fee2e2; color:#ef4444; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <p style="margin:0; font-size:0.875rem; font-weight:600; color:#0f172a; flex:1;">{{ $error }}</p>
    </div>
    @endforeach
</div>
@endif

{{-- ── Page Header ─────────────────────────────────────────────────── --}}
<div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:1.75rem; flex-wrap:wrap; gap:1rem;">
    <div>
        <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">RIWAYAT RESERVASI</p>
        <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Pesanan Saya</h1>
        <p style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0; font-weight:500;">Pantau status reservasi & riwayat menginap Anda</p>
    </div>
    <a href="{{ route('pelanggan.kamar') }}" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.7rem 1.25rem; border-radius:0.875rem; font-size:0.875rem; font-weight:700; background:linear-gradient(135deg,#0f1b4c,#1e3a8a); color:#fff; text-decoration:none; box-shadow:0 4px 14px rgba(15,27,76,0.3); transition:all 0.2s;"
       onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='translateY(0)'">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Pesan Kamar Baru
    </a>
</div>

{{-- ── Status Counters ──────────────────────────────────────────────── --}}
<div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:1rem; margin-bottom:1.75rem;">
    @php
        $statusTabs = [
            'all'          => ['label' => 'Semua', 'color' => '#64748b', 'bg' => '#f1f5f9'],
            'pending'      => ['label' => 'Menunggu', 'color' => '#92400e', 'bg' => '#fef3c7'],
            'dikonfirmasi' => ['label' => 'Dikonfirmasi', 'color' => '#15803d', 'bg' => '#dcfce7'],
            'selesai'      => ['label' => 'Selesai', 'color' => '#1d4ed8', 'bg' => '#dbeafe'],
            'batal'        => ['label' => 'Dibatalkan', 'color' => '#b91c1c', 'bg' => '#fee2e2'],
        ];
    @endphp
    @foreach($statusTabs as $key => $meta)
    <a href="{{ route('pelanggan.boking.index', ['status' => $key]) }}" style="
        text-decoration:none; padding:1rem; border-radius:1rem; text-align:center; transition:all 0.15s;
        background:{{ $statusFilter === $key ? $meta['bg'] : '#fff' }};
        border:{{ $statusFilter === $key ? '1px solid '.$meta['color'].'55' : '1px solid #f1f5f9' }};
        box-shadow:{{ $statusFilter === $key ? '0 4px 12px rgba(0,0,0,0.08)' : '0 2px 8px rgba(0,0,0,0.03)' }};"
       onmouseover="this.style.borderColor='{{ $meta['color'] }}55'; this.style.background='{{ $meta['bg'] }}';"
       onmouseout="this.style.borderColor='{{ $statusFilter === $key ? $meta['color'].'55' : '#f1f5f9' }}'; this.style.background='{{ $statusFilter === $key ? $meta['bg'] : '#fff' }}';">
        <p style="font-size:1.75rem; font-weight:800; color:{{ $meta['color'] }}; margin:0; line-height:1;">{{ $counts[$key] }}</p>
        <p style="font-size:0.73rem; font-weight:700; color:#64748b; margin:0.3rem 0 0; text-transform:uppercase; letter-spacing:0.05em;">{{ $meta['label'] }}</p>
    </a>
    @endforeach
</div>

{{-- ── Booking Cards List ───────────────────────────────────────────── --}}
<div style="display:flex; flex-direction:column; gap:1rem;">
    @forelse($bookings as $boking)
    @php
        $st = $boking->status_boking;
        $badgeStyles = [
            'pending'      => ['bg' => '#fef3c7', 'color' => '#92400e', 'label' => '⏳ Menunggu Konfirmasi'],
            'dikonfirmasi' => ['bg' => '#dcfce7', 'color' => '#15803d', 'label' => '✓ Dikonfirmasi'],
            'selesai'      => ['bg' => '#dbeafe', 'color' => '#1d4ed8', 'label' => '🏁 Selesai'],
            'batal'        => ['bg' => '#fee2e2', 'color' => '#b91c1c', 'label' => '✕ Dibatalkan'],
        ];
        $badge = $badgeStyles[$st] ?? ['bg' => '#f1f5f9', 'color' => '#64748b', 'label' => $st];

        $checkIn  = \Carbon\Carbon::parse($boking->tanggal_check_in);
        $checkOut = \Carbon\Carbon::parse($boking->tanggal_check_out);
        $nights   = $checkIn->diffInDays($checkOut);
        $totalCost = $nights * ($boking->kamar->harga ?? 0);
    @endphp
    <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden; transition:box-shadow 0.2s;"
         onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.07)'" onmouseout="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.04)'">
        
        <div style="display:flex; align-items:center; flex-wrap:wrap; gap:0; padding:0;">
            
            {{-- Left accent stripe --}}
            <div style="width:5px; background:{{ $badge['color'] }}; align-self:stretch; flex-shrink:0;"></div>

            {{-- Main content --}}
            <div style="flex:1; padding:1.25rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem; min-width:0;">
                
                {{-- Room Info --}}
                <div>
                    <p style="font-size:0.7rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 0.3rem;">
                        Kamar {{ $boking->kamar->nomor_kamar ?? 'N/A' }} &bull; {{ $boking->kamar->tipe_kamar ?? 'N/A' }}
                    </p>
                    <div style="display:flex; align-items:center; gap:0.75rem; flex-wrap:wrap;">
                        <p style="font-size:0.95rem; font-weight:700; color:#1e293b; margin:0;">
                            <svg width="15" height="15" fill="none" stroke="#64748b" stroke-width="2" viewBox="0 0 24 24" style="display:inline; vertical-align:-2px; margin-right:4px;"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $checkIn->format('d M Y') }} → {{ $checkOut->format('d M Y') }}
                        </p>
                        <span style="font-size:0.75rem; color:#64748b; font-weight:600; background:#f1f5f9; padding:0.2rem 0.6rem; border-radius:999px;">
                            {{ $nights }} Malam
                        </span>
                    </div>
                    <p style="font-size:0.8rem; color:#94a3b8; margin:0.35rem 0 0;">
                        Dipesan pada: {{ \Carbon\Carbon::parse($boking->tanggal_boking)->format('d M Y') }}
                    </p>
                </div>

                {{-- Cost & Status --}}
                <div style="display:flex; align-items:center; gap:1.25rem; flex-wrap:wrap;">
                    <div style="text-align:right;">
                        <p style="font-size:0.7rem; font-weight:600; color:#94a3b8; margin:0 0 0.2rem; text-transform:uppercase;">Estimasi Total</p>
                        <p style="font-size:1.25rem; font-weight:800; color:#d97706; margin:0;">${{ number_format($totalCost, 2) }}</p>
                        <p style="font-size:0.7rem; color:#94a3b8; margin:0;">${{ number_format($boking->kamar->harga ?? 0, 2) }}/malam</p>
                    </div>

                    <div>
                        <span style="display:block; padding:0.4rem 0.875rem; font-size:0.73rem; font-weight:700; border-radius:999px; background:{{ $badge['bg'] }}; color:{{ $badge['color'] }}; white-space:nowrap; margin-bottom:0.5rem; text-align:center;">
                            {{ $badge['label'] }}
                        </span>

                        @if($st === 'pending')
                        <form method="POST" action="{{ route('pelanggan.boking.cancel', $boking->id_boking) }}" style="margin:0;" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" style="width:100%; padding:0.4rem 0.875rem; font-size:0.73rem; font-weight:700; border-radius:999px; border:1px solid #ef4444; background:#fff; color:#ef4444; cursor:pointer; transition:all 0.15s;"
                                    onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fff'">
                                Batalkan
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
    @empty
    <div style="padding:4rem 2rem; text-align:center; background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04);">
        <div style="width:64px; height:64px; border-radius:50%; background:#f1f5f9; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; color:#94a3b8;">
            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <p style="font-size:1.125rem; font-weight:700; color:#1e293b; margin:0 0 0.5rem;">
            {{ $statusFilter === 'all' ? 'Anda belum memiliki pemesanan' : 'Tidak ada pemesanan dengan status ini' }}
        </p>
        <p style="font-size:0.875rem; color:#94a3b8; margin:0 0 1.5rem;">Mulai jelajahi kamar terbaik kami dan buat pemesanan pertama Anda</p>
        <a href="{{ route('pelanggan.kamar') }}" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.75rem 1.5rem; border-radius:0.875rem; font-size:0.875rem; font-weight:700; background:linear-gradient(135deg,#0f1b4c,#1e3a8a); color:#fff; text-decoration:none;">
            Jelajah Kamar Sekarang
        </a>
    </div>
    @endforelse
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
            document.querySelectorAll('.toast-item').forEach(item => {
                item.style.transition = 'opacity 0.5s ease';
                item.style.opacity = '0';
                setTimeout(() => item.remove(), 500);
            });
        }, 4000);
    });
</script>

</x-customer-layout>
