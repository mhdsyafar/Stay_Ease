{{-- resources/views/boking/index.blade.php --}}
<x-app-layout>

{{-- ══ Toast Notification ══════════════════════════════════════════════ --}}
@if(session('success'))
<div id="toast-container" style="position:fixed; top:1.5rem; right:1.5rem; z-index:9999; pointer-events:none;">
    <div id="bk-toast" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #10b981; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16,1,0.3,1) forwards; min-width:320px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#dcfce7; color:#10b981; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </div>
        <div style="flex:1;">
            <p style="margin:0; font-size:0.875rem; font-weight:700; color:#0f172a;">Success</p>
            <p style="margin:0.125rem 0 0; font-size:0.75rem; font-weight:500; color:#64748b;">{{ session('success') }}</p>
        </div>
        <button onclick="document.getElementById('bk-toast').remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer; padding:0.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#cbd5e1'">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>
@endif

{{-- ══ PAGE HEADER ═══════════════════════════════════════════════════════ --}}
<div style="display:flex; align-items:flex-start; justify-content:space-between; gap:1rem; flex-wrap:wrap; margin-bottom:1.75rem;">
    <div>
        <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">MANAGEMENT</p>
        <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Booking Management</h1>
        <p style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0; font-weight:500;">Review, confirm and manage all guest booking requests</p>
    </div>

    {{-- Search Box --}}
    <form method="GET" action="{{ route('boking.index') }}" style="display:flex; align-items:center; gap:0.625rem; flex-wrap:wrap;">
        <input type="hidden" name="tab"    value="{{ $tab }}">
        <input type="hidden" name="filter" value="{{ $filter }}">
        <div style="position:relative; flex:1; min-width:240px;">
            <span style="position:absolute; left:0.875rem; top:50%; transform:translateY(-50%); display:flex; align-items:center; pointer-events:none;">
                <svg width="16" height="16" fill="none" stroke="#94a3b8" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input type="text" name="search" value="{{ $search }}"
                placeholder="Search by guest name or room…"
                style="width:100%; padding:0.625rem 1rem 0.625rem 2.5rem; font-size:0.875rem; border:1px solid #e2e8f0; border-radius:0.75rem; color:#1e293b; background:#f8fafc; transition:all 0.2s; outline:none;"
                onfocus="this.style.borderColor='#3b82f6'; this.style.background='#fff'"
                onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'">
        </div>
        <button type="submit"
            style="display:flex; align-items:center; gap:0.5rem; background:linear-gradient(135deg,#0f1b4c 0%,#1e3a8a 100%); color:#fff; font-size:0.875rem; font-weight:700; padding:0.625rem 1.25rem; border-radius:0.75rem; border:none; cursor:pointer; box-shadow:0 4px 14px rgba(15,27,76,0.3); transition:all 0.2s; white-space:nowrap;"
            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 18px rgba(15,27,76,0.45)'"
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(15,27,76,0.3)'">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Search
        </button>
        @if($search)
        <a href="{{ route('boking.index', ['tab'=>$tab,'filter'=>$filter]) }}"
           style="font-size:0.8rem; color:#94a3b8; text-decoration:none; padding:0.5rem;"
           onmouseover="this.style.color='#475569'" onmouseout="this.style.color='#94a3b8'">✕ Clear</a>
        @endif
    </form>
</div>

{{-- ══ STAT CARDS ════════════════════════════════════════════════════════ --}}
<div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem; margin-bottom:1.5rem;">

    {{-- Card 1 – Total Bookings (Blue) --}}
    <div style="background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%); border-radius:1.25rem; padding:1.5rem; display:flex; align-items:center; justify-content:space-between; box-shadow:0 8px 24px rgba(59,130,246,0.35); position:relative; overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Total Bookings</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ $statusCounts['all'] }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0;">All time records</p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
    </div>

    {{-- Card 2 – Pending (Orange-Red) --}}
    <div style="background:linear-gradient(135deg,#b91c1c 0%,#f97316 100%); border-radius:1.25rem; padding:1.5rem; display:flex; align-items:center; justify-content:space-between; box-shadow:0 8px 24px rgba(249,115,22,0.35); position:relative; overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Pending Action</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ str_pad($statusCounts['pending'], 2, '0', STR_PAD_LEFT) }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0; display:flex; align-items:center; gap:0.25rem;">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                Requires attention
            </p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>

    {{-- Card 3 – Confirmed (Green) --}}
    <div style="background:linear-gradient(135deg,#065f46 0%,#10b981 100%); border-radius:1.25rem; padding:1.5rem; display:flex; align-items:center; justify-content:space-between; box-shadow:0 8px 24px rgba(16,185,129,0.35); position:relative; overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.08);"></div>
        <div style="position:absolute;right:20px;bottom:-30px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="position:relative; z-index:1;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.75); font-weight:500; margin:0 0 0.4rem; text-transform:uppercase; letter-spacing:0.05em;">Confirmed</p>
            <p style="font-size:2.75rem; font-weight:800; color:#fff; margin:0; line-height:1;">{{ str_pad($statusCounts['dikonfirmasi'], 2, '0', STR_PAD_LEFT) }}</p>
            <p style="font-size:0.75rem; color:rgba(255,255,255,0.8); font-weight:600; margin:0.6rem 0 0; display:flex; align-items:center; gap:0.25rem;">
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Active bookings
            </p>
        </div>
        <svg width="64" height="64" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="1.5" viewBox="0 0 24 24" style="position:relative; z-index:1; flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>
</div>

{{-- ══ SECONDARY STATS (row) ══════════════════════════════════════════════ --}}
<div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1rem; margin-bottom:1.5rem;">
    @php
        $miniCards = [
            ['label'=>'Completed',  'value'=>$statusCounts['selesai'],      'color'=>'#0284c7','bg'=>'#e0f2fe','icon'=>'M5 13l4 4L19 7'],
            ['label'=>'Cancelled',  'value'=>$statusCounts['batal'],        'color'=>'#dc2626','bg'=>'#fee2e2','icon'=>'M6 18L18 6M6 6l12 12'],
            ['label'=>'VIP Guests', 'value'=>$totalVip,                     'color'=>'#d97706','bg'=>'#fef3c7','icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
            ['label'=>'Urgent',     'value'=>$totalUrgent,                  'color'=>'#c2410c','bg'=>'#ffedd5','icon'=>'M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z'],
        ];
    @endphp
    @foreach($miniCards as $mc)
    <div style="background:#fff; border-radius:1rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); padding:1.1rem 1.25rem; display:flex; align-items:center; gap:0.875rem; transition:all 0.2s;"
         onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.08)'"
         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 16px rgba(0,0,0,0.04)'">
        <div style="width:40px; height:40px; border-radius:10px; background:{{ $mc['bg'] }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="18" height="18" fill="none" stroke="{{ $mc['color'] }}" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $mc['icon'] }}"/>
            </svg>
        </div>
        <div>
            <p style="font-size:1.625rem; font-weight:800; color:#0f172a; margin:0; line-height:1;">{{ $mc['value'] }}</p>
            <p style="font-size:0.72rem; color:#94a3b8; font-weight:600; margin:2px 0 0; text-transform:uppercase; letter-spacing:0.05em;">{{ $mc['label'] }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- ══ FILTER BAR ════════════════════════════════════════════════════════ --}}
<div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; padding:1.1rem 1.25rem; display:flex; align-items:center; gap:1rem; margin-bottom:1.5rem; box-shadow:0 4px 16px rgba(0,0,0,0.04); flex-wrap:wrap;">

    {{-- Status tabs --}}
    <div style="display:flex; align-items:center; gap:0.25rem; flex-wrap:wrap;">
        <span style="font-size:0.72rem; font-weight:700; color:#94a3b8; letter-spacing:0.08em; text-transform:uppercase; margin-right:0.5rem;">STATUS:</span>
        @php
            $tabs = [
                'all'          => 'All ('.$statusCounts['all'].')',
                'pending'      => 'Pending ('.$statusCounts['pending'].')',
                'dikonfirmasi' => 'Confirmed ('.$statusCounts['dikonfirmasi'].')',
                'selesai'      => 'Completed ('.$statusCounts['selesai'].')',
                'batal'        => 'Cancelled ('.$statusCounts['batal'].')',
            ];
        @endphp
        @foreach($tabs as $key => $label)
        <a href="{{ route('boking.index', ['tab'=>$key,'filter'=>$filter,'search'=>$search]) }}"
           style="padding:0.4rem 0.85rem; border-radius:0.625rem; font-size:0.78rem; font-weight:600; text-decoration:none; white-space:nowrap; transition:all 0.15s;
           {{ $tab === $key
               ? 'background:linear-gradient(135deg,#0f1b4c,#1e3a8a); color:#fff; box-shadow:0 2px 8px rgba(15,27,76,0.25);'
               : 'color:#64748b; background:#f8fafc;' }}"
           onmouseover="if(this.style.color !== 'rgb(255, 255, 255)') { this.style.background='#f1f5f9'; this.style.color='#334155'; }"
           onmouseout="if(this.style.color !== 'rgb(255, 255, 255)') { this.style.background='#f8fafc'; this.style.color='#64748b'; }">
            {{ $label }}
        </a>
        @endforeach
    </div>

    <div style="width:1px; height:28px; background:#e2e8f0; flex-shrink:0;"></div>

    {{-- Quick filter (VIP / Urgent) --}}
    <div style="display:flex; align-items:center; gap:0.25rem;">
        <span style="font-size:0.72rem; font-weight:700; color:#94a3b8; letter-spacing:0.08em; text-transform:uppercase; margin-right:0.5rem;">FILTER:</span>
        @php $quickFilters = ['all'=>'All','vip'=>'⚡ VIP','urgent'=>'🔥 Urgent']; @endphp
        @foreach($quickFilters as $key => $label)
        <a href="{{ route('boking.index', ['tab'=>$tab,'filter'=>$key,'search'=>$search]) }}"
           style="padding:0.4rem 0.85rem; border-radius:0.625rem; font-size:0.78rem; font-weight:600; text-decoration:none; white-space:nowrap; transition:all 0.15s;
           {{ $filter === $key
               ? 'background:linear-gradient(135deg,#92400e,#f59e0b); color:#fff; box-shadow:0 2px 8px rgba(245,158,11,0.3);'
               : 'color:#64748b; background:#f8fafc;' }}"
           onmouseover="if(this.style.color !== 'rgb(255, 255, 255)') { this.style.background='#f1f5f9'; this.style.color='#334155'; }"
           onmouseout="if(this.style.color !== 'rgb(255, 255, 255)') { this.style.background='#f8fafc'; this.style.color='#64748b'; }">
            {{ $label }}
        </a>
        @endforeach
    </div>
</div>

{{-- ══ BOOKING CARDS GRID ════════════════════════════════════════════════ --}}
@if($allBookings->isEmpty())
<div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); padding:5rem 2rem; text-align:center;">
    <svg width="52" height="52" fill="none" stroke="#cbd5e1" stroke-width="1.2" viewBox="0 0 24 24" style="margin:0 auto 1.25rem; display:block;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
    </svg>
    <p style="font-size:1rem; font-weight:700; color:#334155; margin:0 0 0.4rem;">No bookings found</p>
    <p style="font-size:0.85rem; color:#94a3b8; margin:0;">Try changing your filters or search query.</p>
</div>
@else
<div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(330px,1fr)); gap:1.25rem;">
    @foreach($allBookings as $booking)
    @php
        $isVip    = $booking->user && $booking->user->member_tier === 'vip';
        $isUrgent = $booking->is_urgent;
        $nights   = $booking->nights_count;
        $status   = $booking->status_boking;

        $sc = match($status) {
            'pending'      => ['label'=>'Pending',   'color'=>'#92400e','bg'=>'linear-gradient(135deg,#fef3c7,#fde68a)'],
            'dikonfirmasi' => ['label'=>'Confirmed',  'color'=>'#15803d','bg'=>'linear-gradient(135deg,#dcfce7,#bbf7d0)'],
            'selesai'      => ['label'=>'Completed',  'color'=>'#1d4ed8','bg'=>'linear-gradient(135deg,#eff6ff,#dbeafe)'],
            'batal'        => ['label'=>'Cancelled',  'color'=>'#b91c1c','bg'=>'linear-gradient(135deg,#fee2e2,#fecaca)'],
            default        => ['label'=>ucfirst($status),'color'=>'#475569','bg'=>'linear-gradient(135deg,#f1f5f9,#e2e8f0)'],
        };

        $nameParts  = explode(' ', $booking->user->name ?? 'Guest');
        $initials   = strtoupper(substr($nameParts[0],0,1) . substr($nameParts[1] ?? '',0,1));

        // Avatar colors – cycle through like the dashboard
        $avatarColors = ['#3b82f6','#10b981','#f59e0b','#8b5cf6','#ef4444','#06b6d4'];
        $avatarBg     = $isVip ? '#f59e0b' : $avatarColors[$booking->id_boking % count($avatarColors)];
        $totalPrice   = number_format(($booking->kamar->harga ?? 0) * $nights, 0);
    @endphp

    <div style="background:#fff; border:1px solid #f1f5f9; border-radius:1.25rem; box-shadow:0 4px 16px rgba(0,0,0,0.04); padding:1.375rem; transition:all 0.22s; position:relative; overflow:hidden;"
         onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 12px 32px rgba(0,0,0,0.1)'"
         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 16px rgba(0,0,0,0.04)'">

        {{-- Left accent bar --}}
        @if($isUrgent && $status === 'pending')
        <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background:linear-gradient(180deg,#f97316,#dc2626);"></div>
        @elseif($isVip)
        <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background:linear-gradient(180deg,#f59e0b,#d97706);"></div>
        @elseif($status === 'dikonfirmasi')
        <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background:linear-gradient(180deg,#10b981,#065f46);"></div>
        @else
        <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background:linear-gradient(180deg,#e2e8f0,#cbd5e1);"></div>
        @endif

        {{-- Guest info + status badge --}}
        <div style="display:flex; align-items:flex-start; justify-content:space-between; gap:0.75rem; margin-bottom:1rem; padding-left:0.5rem;">
            <div style="display:flex; align-items:center; gap:0.75rem; min-width:0;">
                <div style="width:40px; height:40px; border-radius:50%; background:{{ $avatarBg }}; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:0.875rem; flex-shrink:0; box-shadow:0 2px 8px {{ $avatarBg }}66;">
                    {{ $initials }}
                </div>
                <div style="min-width:0;">
                    <div style="display:flex; align-items:center; gap:0.4rem; flex-wrap:wrap;">
                        <span style="font-weight:700; font-size:0.9375rem; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:140px;">{{ $booking->user->name ?? 'Unknown Guest' }}</span>
                        @if($isVip)
                        <span style="background:linear-gradient(135deg,#fef3c7,#fde68a); color:#92400e; font-size:0.6rem; font-weight:800; padding:1px 6px; border-radius:4px; letter-spacing:0.06em; border:1px solid #fde68a;">VIP</span>
                        @endif
                        @if($isUrgent && $status === 'pending')
                        <span style="background:linear-gradient(135deg,#ffedd5,#fed7aa); color:#c2410c; font-size:0.6rem; font-weight:800; padding:1px 6px; border-radius:4px; letter-spacing:0.06em; border:1px solid #fed7aa;">URGENT</span>
                        @endif
                    </div>
                    <div style="font-size:0.74rem; color:#94a3b8; margin-top:2px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:180px;">{{ $booking->user->email ?? '' }}</div>
                </div>
            </div>
            {{-- Status badge --}}
            <span style="background:{{ $sc['bg'] }}; color:{{ $sc['color'] }}; border-radius:999px; padding:0.3rem 0.8rem; font-size:0.68rem; font-weight:700; white-space:nowrap; flex-shrink:0; letter-spacing:0.05em;">
                {{ strtoupper($sc['label']) }}
            </span>
        </div>

        {{-- Room & Dates --}}
        <div style="background:#f8fafc; border-radius:0.875rem; padding:0.875rem 1rem; margin:0 0 0.875rem 0.5rem; border:1px solid #f1f5f9;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.625rem;">
                <div style="display:flex; align-items:center; gap:0.4rem;">
                    <svg width="13" height="13" fill="none" stroke="#94a3b8" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span style="font-size:0.75rem; color:#64748b; font-weight:500;">Room</span>
                </div>
                <div>
                    <span style="font-size:0.875rem; font-weight:700; color:#0f172a;">#{{ $booking->kamar->nomor_kamar ?? '—' }}</span>
                    <span style="font-size:0.72rem; color:#94a3b8; font-weight:500; margin-left:4px;">{{ $booking->kamar->tipe_kamar ?? '' }}</span>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.5rem;">
                <div>
                    <p style="font-size:0.67rem; color:#94a3b8; margin:0 0 2px; font-weight:700; text-transform:uppercase; letter-spacing:0.06em;">Check-In</p>
                    <p style="font-size:0.8rem; font-weight:600; color:#334155; margin:0;">{{ \Carbon\Carbon::parse($booking->tanggal_check_in)->format('D, d M Y') }}</p>
                </div>
                <div>
                    <p style="font-size:0.67rem; color:#94a3b8; margin:0 0 2px; font-weight:700; text-transform:uppercase; letter-spacing:0.06em;">Check-Out</p>
                    <p style="font-size:0.8rem; font-weight:600; color:#334155; margin:0;">{{ \Carbon\Carbon::parse($booking->tanggal_check_out)->format('D, d M Y') }}</p>
                </div>
            </div>

            <div style="margin-top:0.625rem; padding-top:0.625rem; border-top:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
                <span style="font-size:0.73rem; color:#94a3b8; font-weight:500;">{{ $nights }} night{{ $nights != 1 ? 's' : '' }}</span>
                <span style="font-size:0.9rem; font-weight:800; color:#0f1b4c;">${{ $totalPrice }}</span>
            </div>
        </div>

        {{-- Booked date + ID --}}
        <div style="display:flex; justify-content:space-between; align-items:center; margin:0 0 0.875rem 0.5rem;">
            <div style="display:flex; align-items:center; gap:0.4rem; color:#94a3b8; font-size:0.72rem;">
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Booked: {{ \Carbon\Carbon::parse($booking->tanggal_boking)->format('d M Y') }}
            </div>
            <span style="font-size:0.68rem; color:#cbd5e1; font-weight:500;">ID #{{ $booking->id_boking }}</span>
        </div>

        {{-- Action Buttons --}}
        <div style="padding-left:0.5rem;">
            @if($status === 'pending')
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.5rem;">
                <form method="POST" action="{{ route('boking.confirm', $booking->id_boking) }}">
                    @csrf @method('PATCH')
                    <button type="submit" onclick="return confirm('Confirm this booking?')"
                        style="width:100%; background:linear-gradient(135deg,#065f46,#10b981); color:#fff; border:none; border-radius:0.75rem; padding:0.6rem 0; font-size:0.8rem; font-weight:700; cursor:pointer; letter-spacing:0.02em; box-shadow:0 4px 12px rgba(16,185,129,0.3); transition:all 0.2s;"
                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                        ✓ Confirm
                    </button>
                </form>
                <form method="POST" action="{{ route('boking.reject', $booking->id_boking) }}">
                    @csrf @method('PATCH')
                    <button type="submit" onclick="return confirm('Cancel this booking?')"
                        style="width:100%; background:#fff; color:#dc2626; border:1.5px solid #fecaca; border-radius:0.75rem; padding:0.6rem 0; font-size:0.8rem; font-weight:700; cursor:pointer; letter-spacing:0.02em; transition:all 0.2s;"
                        onmouseover="this.style.background='#fee2e2'; this.style.borderColor='#fca5a5'"
                        onmouseout="this.style.background='#fff'; this.style.borderColor='#fecaca'">
                        ✕ Reject
                    </button>
                </form>
            </div>
            @elseif($status === 'dikonfirmasi')
            <form method="POST" action="{{ route('boking.complete', $booking->id_boking) }}">
                @csrf @method('PATCH')
                <button type="submit" onclick="return confirm('Mark as completed?')"
                    style="width:100%; background:linear-gradient(135deg,#1e40af,#3b82f6); color:#fff; border:none; border-radius:0.75rem; padding:0.6rem 0; font-size:0.8rem; font-weight:700; cursor:pointer; letter-spacing:0.02em; box-shadow:0 4px 12px rgba(59,130,246,0.3); transition:all 0.2s;"
                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(59,130,246,0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.3)'">
                    ✓ Mark as Completed
                </button>
            </form>
            @elseif($status === 'selesai')
            <div style="text-align:center; padding:0.5rem; font-size:0.78rem; color:#15803d; font-weight:700; background:linear-gradient(135deg,#dcfce7,#bbf7d0); border-radius:0.625rem; letter-spacing:0.03em;">
                ✓ Booking completed
            </div>
            @else
            <div style="text-align:center; padding:0.5rem; font-size:0.78rem; color:#b91c1c; font-weight:700; background:linear-gradient(135deg,#fee2e2,#fecaca); border-radius:0.625rem; letter-spacing:0.03em;">
                ✕ Booking cancelled
            </div>
            @endif
        </div>

    </div>{{-- /card --}}
    @endforeach
</div>{{-- /grid --}}
@endif

<style>
@keyframes slideIn {
    from { opacity:0; transform:translateX(20px); }
    to   { opacity:1; transform:translateX(0); }
}
</style>

</x-app-layout>
