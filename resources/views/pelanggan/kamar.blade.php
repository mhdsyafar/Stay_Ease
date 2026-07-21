<x-customer-layout>

{{-- ── Toast Error / Validation Messages ───────────────────────────── --}}
@if($errors->any())
<div style="margin-bottom: 1.5rem; background: #fee2e2; border-left: 4px solid #ef4444; border-radius: 0.75rem; padding: 1rem 1.25rem;">
    <p style="margin: 0; font-weight: 700; color: #991b1b; font-size: 0.875rem;">Gagal Mengajukan Pemesanan:</p>
    <ul style="margin: 0.35rem 0 0; padding-left: 1.2rem; color: #b91c1c; font-size: 0.8rem;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- ── Header ──────────────────────────────────────────────────────── --}}
<div style="display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 1.75rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <p style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #94a3b8; margin: 0 0 0.3rem;">KATALOG AKOMODASI</p>
        <h1 style="font-size: 1.875rem; font-weight: 800; color: #0f172a; margin: 0; line-height: 1.2;">Daftar Kamar StayEase</h1>
        <p style="font-size: 0.875rem; color: #64748b; margin: 0.25rem 0 0; font-weight: 500;">Pilih kamar favorit Anda dan tentukan tanggal menginap</p>
    </div>
</div>

{{-- ── Filter Bar ──────────────────────────────────────────────────── --}}
<div style="background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.25rem; margin-bottom: 1.75rem; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
    <form method="GET" action="{{ route('pelanggan.kamar') }}" style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
        
        {{-- Search Input --}}
        <div style="position: relative; flex: 1; min-width: 260px;">
            <span style="position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%); pointer-events: none; color: #94a3b8;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nomor atau tipe kamar..."
                   style="width: 100%; padding: 0.625rem 1rem 0.625rem 2.5rem; font-size: 0.875rem; border: 1px solid #e2e8f0; border-radius: 0.75rem; color: #1e293b; background: #f8fafc;"
                   onkeydown="if(event.key === 'Enter') this.form.submit();">
        </div>

        {{-- Type Dropdown --}}
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Tipe:</span>
            <select name="type" onchange="this.form.submit()"
                    style="padding: 0.625rem 2.25rem 0.625rem 1rem; font-size: 0.875rem; border: 1px solid #e2e8f0; border-radius: 0.75rem; color: #1e293b; font-weight: 600; background: #fff; cursor: pointer;">
                <option value="all">Semua Tipe Kamar</option>
                @foreach($allTypes as $t)
                    <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
        </div>

        {{-- Reset Filter Button --}}
        @if(request()->anyFilled(['search', 'type']))
        <a href="{{ route('pelanggan.kamar') }}" style="display: flex; align-items: center; gap: 0.4rem; text-decoration: none; font-size: 0.85rem; font-weight: 600; color: #ef4444; padding: 0.625rem 1rem; border-radius: 0.75rem; background: #fef2f2;">
            Reset Filter
        </a>
        @endif
    </form>
</div>

{{-- ── Room Grid Cards ────────────────────────────────────────────── --}}
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    @forelse($kamarList as $kamar)
    @php
        $isAvailable = ($kamar->status_kamar === 'tersedia');
    @endphp
    <div style="background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.2s;"
         onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.08)';"
         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 16px rgba(0,0,0,0.04)';">

        {{-- Card Header --}}
        <div style="padding: 1.5rem 1.5rem 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.875rem;">
                <span style="padding: 0.3rem 0.75rem; font-size: 0.7rem; font-weight: 800; border-radius: 999px; background: #e0e7ff; color: #3730a3; text-transform: uppercase; letter-spacing: 0.05em;">
                    {{ $kamar->tipe_kamar }}
                </span>
                @if($isAvailable)
                    <span style="padding: 0.3rem 0.75rem; font-size: 0.7rem; font-weight: 700; border-radius: 999px; background: #dcfce7; color: #15803d;">
                        ✓ Tersedia
                    </span>
                @elseif($kamar->status_kamar === 'terisi')
                    <span style="padding: 0.3rem 0.75rem; font-size: 0.7rem; font-weight: 700; border-radius: 999px; background: #e0e7ff; color: #3730a3;">
                        Dipesan
                    </span>
                @else
                    <span style="padding: 0.3rem 0.75rem; font-size: 0.7rem; font-weight: 700; border-radius: 999px; background: #fef3c7; color: #92400e;">
                        Pemeliharaan
                    </span>
                @endif
            </div>

            <h3 style="font-size: 1.5rem; font-weight: 800; color: #0f1b4c; margin: 0 0 0.5rem;">
                Kamar Nomor {{ $kamar->nomor_kamar }}
            </h3>

            <p style="font-size: 0.85rem; color: #64748b; margin: 0; line-height: 1.5;">
                Fasilitas lengkap mencakup tempat tidur mewah, kamar mandi dalam, akses Wi-Fi berkecepatan tinggi, dan TV layar datar.
            </p>
        </div>

        {{-- Card Footer --}}
        <div style="padding: 1.25rem 1.5rem; background: #f8fafc; border-top: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <span style="font-size: 1.35rem; font-weight: 800; color: #d97706;">${{ number_format($kamar->harga, 2) }}</span>
                <span style="font-size: 0.75rem; color: #94a3b8;">/ malam</span>
            </div>

            @if($isAvailable)
                <button type="button" onclick="openBookingModal('{{ $kamar->id_kamar }}', '{{ $kamar->nomor_kamar }}', '{{ $kamar->tipe_kamar }}', '{{ $kamar->harga }}')"
                        style="padding: 0.65rem 1.25rem; font-size: 0.85rem; font-weight: 700; border-radius: 0.75rem; border: none; background: linear-gradient(135deg, #0f1b4c 0%, #1e3a8a 100%); color: #fff; cursor: pointer; box-shadow: 0 4px 12px rgba(15,27,76,0.25); transition: all 0.15s;"
                        onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='translateY(0)'">
                    Pesan Kamar Ini
                </button>
            @else
                <button type="button" disabled style="padding: 0.65rem 1.25rem; font-size: 0.85rem; font-weight: 700; border-radius: 0.75rem; border: 1px solid #cbd5e1; background: #f1f5f9; color: #94a3b8; cursor: not-allowed;">
                    Tidak Tersedia
                </button>
            @endif
        </div>

    </div>
    @empty
    <div style="grid-column: 1/-1; padding: 4rem 2rem; text-align: center; background: #fff; border-radius: 1.25rem; border: 1px solid #f1f5f9;">
        <p style="font-size: 1.125rem; font-weight: 700; color: #64748b; margin: 0;">Tidak ada kamar yang sesuai dengan kriteria pencarian Anda.</p>
        <a href="{{ route('pelanggan.kamar') }}" style="display: inline-block; margin-top: 1rem; color: #2563eb; font-weight: 700; text-decoration: none;">Lihat Semua Kamar →</a>
    </div>
    @endforelse
</div>

{{-- ── Interactive Booking Modal ───────────────────────────────────── --}}
<div id="bookingModal" style="display: none; position: fixed; inset: 0; background: rgba(15,23,42,0.5); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: #fff; border-radius: 1.25rem; width: 100%; max-width: 480px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); overflow: hidden; animation: scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;">
        
        {{-- Modal Header --}}
        <div style="background: #0f1b4c; padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between; color: #fff;">
            <div>
                <h3 style="font-size: 1.125rem; font-weight: 800; margin: 0;">Pemesanan Kamar</h3>
                <p style="font-size: 0.75rem; color: #f5c518; margin: 0.15rem 0 0; font-weight: 600;" id="modal_room_info">Kamar</p>
            </div>
            <button onclick="closeBookingModal()" style="background: none; border: none; color: rgba(255,255,255,0.7); cursor: pointer; font-size: 1.25rem; display: flex; align-items: center;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Form --}}
        <form action="{{ route('pelanggan.booking.store') }}" method="POST" style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1.25rem; margin: 0;">
            @csrf
            <input type="hidden" name="id_kamar" id="modal_id_kamar">

            {{-- Check-In Date --}}
            <div>
                <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Tanggal Check-In</label>
                <input type="date" name="tanggal_check_in" id="modal_check_in" min="{{ date('Y-m-d') }}" required
                       style="width: 100%; padding: 0.625rem 0.875rem; font-size: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; color: #1e293b;"
                       onchange="calculateTotalCost()">
            </div>

            {{-- Check-Out Date --}}
            <div>
                <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Tanggal Check-Out</label>
                <input type="date" name="tanggal_check_out" id="modal_check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                       style="width: 100%; padding: 0.625rem 0.875rem; font-size: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; color: #1e293b;"
                       onchange="calculateTotalCost()">
            </div>

            {{-- Estimasi Biaya Box --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 0.875rem; padding: 1rem; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span style="font-size: 0.75rem; color: #64748b; font-weight: 600; display: block;">ESTIMASI BIAYA (<span id="total_nights_label">0</span> Malam)</span>
                    <span style="font-size: 1.25rem; font-weight: 800; color: #0f1b4c;" id="total_price_label">$0.00</span>
                </div>
                <span style="font-size: 0.7rem; color: #10b981; font-weight: 700; background: #dcfce7; padding: 0.25rem 0.6rem; border-radius: 999px;">Termasuk Pajak</span>
            </div>

            {{-- Actions --}}
            <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 0.5rem;">
                <button type="button" onclick="closeBookingModal()" style="padding: 0.625rem 1.25rem; font-size: 0.875rem; font-weight: 700; border-radius: 0.75rem; border: 1px solid #cbd5e1; background: #fff; color: #475569; cursor: pointer;">
                    Batal
                </button>
                <button type="submit" style="padding: 0.625rem 1.25rem; font-size: 0.875rem; font-weight: 700; border-radius: 0.75rem; border: none; background: #0f1b4c; color: #fff; cursor: pointer; box-shadow: 0 2px 8px rgba(15,27,76,0.25);">
                    Konfirmasi Pemesanan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes scaleUp {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>

<script>
    let currentRoomPrice = 0;

    function openBookingModal(id, nomor, tipe, harga) {
        document.getElementById('modal_id_kamar').value = id;
        document.getElementById('modal_room_info').textContent = `Kamar ${nomor} – ${tipe} ($${harga}/malam)`;
        currentRoomPrice = parseFloat(harga);

        // Default dates: today and tomorrow
        const today = new Date();
        const tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        document.getElementById('modal_check_in').value = today.toISOString().split('T')[0];
        document.getElementById('modal_check_out').value = tomorrow.toISOString().split('T')[0];

        calculateTotalCost();
        document.getElementById('bookingModal').style.display = 'flex';
    }

    function closeBookingModal() {
        document.getElementById('bookingModal').style.display = 'none';
    }

    function calculateTotalCost() {
        const inVal = document.getElementById('modal_check_in').value;
        const outVal = document.getElementById('modal_check_out').value;

        if (inVal && outVal) {
            const dateIn = new Date(inVal);
            const dateOut = new Date(outVal);
            const diffTime = dateOut - dateIn;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays > 0) {
                document.getElementById('total_nights_label').textContent = diffDays;
                const total = diffDays * currentRoomPrice;
                document.getElementById('total_price_label').textContent = `$${total.toFixed(2)}`;
            } else {
                document.getElementById('total_nights_label').textContent = '0';
                document.getElementById('total_price_label').textContent = '$0.00';
            }
        }
    }

    window.addEventListener('click', (e) => {
        const modal = document.getElementById('bookingModal');
        if (e.target === modal) closeBookingModal();
    });
</script>

</x-customer-layout>
