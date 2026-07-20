<x-app-layout>

{{-- ── Page Header ─────────────────────────────────────────────────── --}}
<div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:1.75rem;">
    <div>
        <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">MANAGEMENT</p>
        <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Performance Overview</h1>
    </div>
    <div style="display:flex; align-items:center; gap:0.5rem; background:#fff; border:1px solid #e2e8f0; border-radius:0.875rem; padding:0.6rem 1.1rem; box-shadow:0 2px 8px rgba(0,0,0,0.07);">
        <svg width="15" height="15" fill="none" stroke="#64748b" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <span style="font-size:0.8rem; color:#475569; font-weight:600;">
            {{ now()->startOfMonth()->format('M d, Y') }} – {{ now()->endOfMonth()->format('M d, Y') }}
        </span>
    </div>
</div>

{{-- ── Stat Cards ───────────────────────────────────────────────────── --}}
<div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem; margin-bottom:1.5rem;">

    {{-- Card 1 – Total Rooms (Blue Gradient) --}}
    <div style="
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        border-radius:1.25rem;
        padding:1.5rem;
        display:flex; align-items:center; justify-content:space-between;
        box-shadow: 0 8px 24px rgba(59,130,246,0.35);
        position:relative; overflow:hidden;">
        {{-- Decorative circle --}}
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Total Rooms</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ $totalKamar ?? 0 }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0; display:flex; align-items:center; gap:0.25rem;">
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7 7 7M12 3v18"/></svg>
                +{{ $totalKamar ?? 0 }} bulan ini
            </p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
    </div>

    {{-- Card 2 – Total Pemesanan (Green Gradient) --}}
    <div style="
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
        border-radius:1.25rem;
        padding:1.5rem;
        display:flex; align-items:center; justify-content:space-between;
        box-shadow: 0 8px 24px rgba(16,185,129,0.35);
        position:relative; overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Total Pemesanan</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ $totalBoking ?? 0 }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0; display:flex; align-items:center; gap:0.25rem;">
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7 7 7M12 3v18"/></svg>
                12% vs kemarin
            </p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
        </svg>
    </div>

    {{-- Card 3 – Pending (Orange-Red Gradient) --}}
    <div style="
        background: linear-gradient(135deg, #b91c1c 0%, #f97316 100%);
        border-radius:1.25rem;
        padding:1.5rem;
        display:flex; align-items:center; justify-content:space-between;
        box-shadow: 0 8px 24px rgba(249,115,22,0.35);
        position:relative; overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Pending Action</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ str_pad($bokingPending ?? 0, 2, '0', STR_PAD_LEFT) }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0; display:flex; align-items:center; gap:0.25rem;">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                Requires attention
            </p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
    </div>
</div>

{{-- ── Content Row ──────────────────────────────────────────────────── --}}
<div style="display:flex; gap:1.25rem; align-items:flex-start;">

    {{-- ── Latest Bookings Table ─────────────────────────────────────── --}}
    <div style="flex:1; background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.06); overflow:hidden; min-width:0;">

        <div style="padding:1.25rem 1.5rem; display:flex; align-items:center; justify-content:space-between; border-bottom:2px solid #f8fafc;">
            <h2 style="font-size:1rem; font-weight:800; color:#0f1b4c; margin:0;">Latest Bookings</h2>
            <a href="#" style="font-size:0.8rem; font-weight:700; color:#3b82f6; text-decoration:none; padding:0.3rem 0.75rem; background:#eff6ff; border-radius:999px;"
               onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">View All →</a>
        </div>

        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:linear-gradient(90deg,#f8fafc,#f1f5f9);">
                    <th style="text-align:left; padding:0.75rem 1.5rem; font-size:0.68rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em;">Guest Name</th>
                    <th style="text-align:left; padding:0.75rem 1rem; font-size:0.68rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em;">Room</th>
                    <th style="text-align:left; padding:0.75rem 1rem; font-size:0.68rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em;">Status</th>
                    <th style="text-align:left; padding:0.75rem 1rem; font-size:0.68rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bokingTerbaru ?? [] as $index => $boking)
                @php
                    $avatarColors = ['#3b82f6','#10b981','#f59e0b','#8b5cf6','#ef4444','#06b6d4'];
                    $avatarBg = $avatarColors[$index % count($avatarColors)];
                @endphp
                <tr style="border-top:1px solid #f8fafc; transition:background 0.15s;"
                    onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                    <td style="padding:1rem 1.5rem;">
                        <div style="display:flex; align-items:center; gap:0.75rem;">
                            <div style="width:2.25rem; height:2.25rem; border-radius:50%; background:{{ $avatarBg }}; color:#fff; display:flex; align-items:center; justify-content:center; font-size:0.8rem; font-weight:700; flex-shrink:0; box-shadow:0 2px 8px {{ $avatarBg }}66;">
                                {{ strtoupper(substr($boking->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <span style="font-size:0.875rem; font-weight:600; color:#1e293b;">{{ $boking->user->name ?? 'N/A' }}</span>
                        </div>
                    </td>
                    <td style="padding:1rem; font-size:0.875rem; color:#64748b; font-weight:500;">
                        {{ $boking->kamar->tipe_kamar ?? 'N/A' }} {{ $boking->kamar->nomor_kamar ?? '' }}
                    </td>
                    <td style="padding:1rem;">
                        @php $st = $boking->status_boking; @endphp
                        @if($st == 'dikonfirmasi' || $st == 'selesai')
                            <span style="padding:0.3rem 0.8rem; font-size:0.68rem; font-weight:700; border-radius:999px; background:linear-gradient(135deg,#dcfce7,#bbf7d0); color:#15803d; letter-spacing:0.05em;">✓ DIKONFIRMASI</span>
                        @elseif($st == 'batal')
                            <span style="padding:0.3rem 0.8rem; font-size:0.68rem; font-weight:700; border-radius:999px; background:linear-gradient(135deg,#fee2e2,#fecaca); color:#b91c1c; letter-spacing:0.05em;">✕ BATAL</span>
                        @elseif($st == 'pending')
                            <span style="padding:0.3rem 0.8rem; font-size:0.68rem; font-weight:700; border-radius:999px; background:linear-gradient(135deg,#fef3c7,#fde68a); color:#92400e; letter-spacing:0.05em;">⏳ PENDING</span>
                        @else
                            <span style="padding:0.3rem 0.8rem; font-size:0.68rem; font-weight:700; border-radius:999px; background:linear-gradient(135deg,#eff6ff,#dbeafe); color:#1d4ed8; letter-spacing:0.05em;">{{ strtoupper($st) }}</span>
                        @endif
                    </td>
                    <td style="padding:1rem;">
                        <button style="background:none; border:none; cursor:pointer; color:#94a3b8; padding:0.3rem; border-radius:0.5rem; display:flex; align-items:center; justify-content:center;"
                                onmouseover="this.style.background='#f1f5f9'; this.style.color='#475569'"
                                onmouseout="this.style.background='none'; this.style.color='#94a3b8'">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding:3rem; text-align:center; font-size:0.875rem; color:#94a3b8;">
                        Belum ada data pemesanan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ── Right Panel ───────────────────────────────────────────────── --}}
    <div style="width:215px; flex-shrink:0; display:flex; flex-direction:column; gap:1rem;">

        {{-- Quick Actions --}}
        <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.06); padding:1.25rem;">
            <h3 style="font-size:0.9375rem; font-weight:800; color:#0f172a; margin:0 0 1rem;">Quick Actions</h3>
            <div style="display:flex; flex-direction:column; gap:0.625rem;">

                {{-- Add New Room --}}
                <a href="#" style="
                    display:flex; align-items:center; gap:0.875rem;
                    background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);
                    color:#fff; font-size:0.8125rem; font-weight:700;
                    padding:0.875rem 1rem; border-radius:0.875rem; text-decoration:none;
                    box-shadow:0 4px 14px rgba(59,130,246,0.45);"
                   onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(59,130,246,0.55)'"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(59,130,246,0.45)'">
                    <div style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span>Add New Room</span>
                </a>

                {{-- Export Report --}}
                <a href="#" style="
                    display:flex; align-items:center; gap:0.875rem;
                    background:linear-gradient(135deg,#0f766e 0%,#14b8a6 100%);
                    color:#fff; font-size:0.8125rem; font-weight:700;
                    padding:0.875rem 1rem; border-radius:0.875rem; text-decoration:none;
                    box-shadow:0 4px 14px rgba(20,184,166,0.45);"
                   onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(20,184,166,0.55)'"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(20,184,166,0.45)'">
                    <div style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                    </div>
                    <span>Export Report</span>
                </a>

                {{-- Room Upgrade --}}
                <a href="#" style="
                    display:flex; align-items:center; gap:0.875rem;
                    background:linear-gradient(135deg,#92400e 0%,#f59e0b 100%);
                    color:#fff; font-size:0.8125rem; font-weight:700;
                    padding:0.875rem 1rem; border-radius:0.875rem; text-decoration:none;
                    box-shadow:0 4px 14px rgba(245,158,11,0.45);"
                   onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(245,158,11,0.55)'"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(245,158,11,0.45)'">
                    <div style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <span>Room Upgrade</span>
                </a>

            </div>
        </div>

        {{-- Occupancy Rate --}}
        <div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.06); padding:1.25rem;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                <span style="font-size:0.8rem; font-weight:700; color:#334155;">Occupancy Rate</span>
                <span style="font-size:0.8rem; font-weight:800; color:#1d4ed8;">{{ $occupancy ?? 82 }}%</span>
            </div>
            <div style="background:#e0e7ff; border-radius:999px; height:7px; margin-bottom:1rem; overflow:hidden;">
                <div style="background:linear-gradient(90deg,#3b82f6,#8b5cf6); height:100%; border-radius:999px; width:{{ $occupancy ?? 82 }}%; transition:width 0.5s;"></div>
            </div>
            <div style="display:flex; flex-direction:column; gap:0.5rem;">
                <div style="display:flex; justify-content:space-between; font-size:0.7rem;">
                    <span style="color:#94a3b8; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Direct Bookings</span>
                    <span style="font-weight:700; color:#10b981;">65%</span>
                </div>
                <div style="display:flex; justify-content:space-between; font-size:0.7rem;">
                    <span style="color:#94a3b8; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">OTA Bookings</span>
                    <span style="font-weight:700; color:#f59e0b;">35%</span>
                </div>
            </div>
        </div>

        {{-- Weather Card --}}
        <div style="background:linear-gradient(135deg,#0f1b4c 0%,#1e3a8a 60%,#1d4ed8 100%); border-radius:1.25rem; padding:1.25rem; box-shadow:0 8px 24px rgba(15,27,76,0.4); position:relative; overflow:hidden;">
            <div style="position:absolute; top:-20px; right:-20px; width:90px; height:90px; border-radius:50%; background:rgba(255,255,255,0.06);"></div>
            <div style="position:absolute; bottom:-30px; left:-10px; width:70px; height:70px; border-radius:50%; background:rgba(255,255,255,0.04);"></div>
            <h3 style="font-size:0.9375rem; font-weight:800; color:#fff; margin:0 0 0.25rem; position:relative; z-index:1;">Local Weather</h3>
            <p style="font-size:0.75rem; color:#f5c518; margin:0 0 0.75rem; font-weight:600; position:relative; z-index:1;">Sunny, 24°C in Jakarta</p>
            <div style="font-size:2.75rem; text-align:center; line-height:1; position:relative; z-index:1;">☀️</div>
        </div>

    </div>
</div>

</x-app-layout>
