<x-app-layout>
 
{{-- ── Toast Notification System ────────────────────────────────────── --}}
@if(session('success') || $errors->any())
<div id="toast-container" style="position:fixed; top:1.5rem; right:1.5rem; z-index:9999; display:flex; flex-direction:column; gap:0.75rem; pointer-events:none;">
    @if(session('success'))
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #10b981; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#dcfce7; color:#10b981; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </div>
        <div style="flex:1;">
            <p style="margin:0; font-size:0.875rem; font-weight:700; color:#0f172a;">Success</p>
            <p style="margin:0.125rem 0 0; font-size:0.75rem; font-weight:500; color:#64748b;">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#cbd5e1; cursor:pointer; padding:0.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#cbd5e1'">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif
 
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="toast-item" style="pointer-events:auto; display:flex; align-items:center; gap:0.875rem; background:#fff; border-left:4px solid #ef4444; border-radius:0.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(0,0,0,0.15); animation:slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; min-width:320px; max-width:400px;">
        <div style="width:24px; height:24px; border-radius:50%; background:#fee2fee2; color:#ef4444; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div style="flex:1;">
            <p style="margin:0; font-size:0.875rem; font-weight:700; color:#0f172a;">Error</p>
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
        <p style="font-size:0.65rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#94a3b8; margin:0 0 0.3rem;">MANAGEMENT</p>
        <h1 style="font-size:1.875rem; font-weight:800; color:#0f172a; margin:0; line-height:1.2;">Room Management</h1>
        <p style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0; font-weight:500;">Oversee inventory and property status</p>
    </div>
    
    <button onclick="openAddModal()" style="
        display:flex; align-items:center; gap:0.625rem;
        background:linear-gradient(135deg, #0f1b4c 0%, #1e3a8a 100%);
        color:#fff; font-size:0.875rem; font-weight:700;
        padding:0.75rem 1.25rem; border-radius:0.75rem; border:none; cursor:pointer;
        box-shadow:0 4px 14px rgba(15,27,76,0.3); transition:all 0.2s;"
        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 18px rgba(15,27,76,0.45)'"
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 14px rgba(15,27,76,0.3)'">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Room
    </button>
</div>
 
{{-- ── Filter Bar ───────────────────────────────────────────────────── --}}
<div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; padding:1.25rem; display:flex; align-items:center; gap:1rem; margin-bottom:1.5rem; box-shadow:0 4px 16px rgba(0,0,0,0.04);">
    <form id="filter-form" method="GET" action="{{ route('kamar.index') }}" style="display:flex; align-items:center; gap:1.25rem; width:100%; flex-wrap:wrap;">
        
        <!-- Search Box -->
        <div style="position:relative; flex:1; min-width:280px;">
            <span style="position:absolute; left:0.875rem; top:50%; transform:translateY(-50%); display:flex; align-items:center; pointer-events:none;">
                <svg width="18" height="18" fill="none" stroke="#94a3b8" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by room number or type..." 
                   style="width:100%; padding:0.625rem 1rem 0.625rem 2.5rem; font-size:0.875rem; border:1px solid #e2e8f0; border-radius:0.75rem; color:#1e293b; background:#f8fafc; transition:all 0.2s;"
                   onkeydown="if(event.key === 'Enter') this.form.submit();">
        </div>
        
        <!-- Status Dropdown -->
        <div style="display:flex; align-items:center; gap:0.5rem;">
            <span style="font-size:0.75rem; font-weight:700; color:#64748b; letter-spacing:0.05em; text-transform:uppercase;">STATUS:</span>
            <select name="status" onchange="this.form.submit()" 
                    style="padding:0.625rem 2.25rem 0.625rem 1rem; font-size:0.875rem; border:1px solid #e2e8f0; border-radius:0.75rem; color:#1e293b; font-weight:600; background:#fff; cursor:pointer; appearance:none; -webkit-appearance:none; background-image:url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" fill=\"none\" stroke=\"%2364748b\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M19 9l-7 7-7-7\"></path></svg>'); background-repeat:no-repeat; background-position:right 0.875rem center; background-size:10px;">
                <option value="all">All Status</option>
                @foreach($allStatuses as $val => $label)
                    <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
 
        <!-- Type Dropdown -->
        <div style="display:flex; align-items:center; gap:0.5rem;">
            <span style="font-size:0.75rem; font-weight:700; color:#64748b; letter-spacing:0.05em; text-transform:uppercase;">TYPE:</span>
            <select name="type" onchange="this.form.submit()"
                    style="padding:0.625rem 2.25rem 0.625rem 1rem; font-size:0.875rem; border:1px solid #e2e8f0; border-radius:0.75rem; color:#1e293b; font-weight:600; background:#fff; cursor:pointer; appearance:none; -webkit-appearance:none; background-image:url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" fill=\"none\" stroke=\"%2364748b\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M19 9l-7 7-7-7\"></path></svg>'); background-repeat:no-repeat; background-position:right 0.875rem center; background-size:10px;">
                <option value="all">All Types</option>
                @foreach($allTypes as $type)
                    <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>
 
        <!-- Clear Filters Button -->
        @if(request()->anyFilled(['search', 'status', 'type']))
            <a href="{{ route('kamar.index') }}" style="display:flex; align-items:center; gap:0.5rem; text-decoration:none; font-size:0.875rem; font-weight:600; color:#4f46e5; padding:0.625rem 1rem; border-radius:0.75rem; background:#f5f3ff; transition:all 0.2s;"
               onmouseover="this.style.background='#ede9fe'" onmouseout="this.style.background='#f5f3ff'">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Clear Filters
            </a>
        @else
            <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:600; color:#94a3b8; padding:0.625rem 1rem; cursor:not-allowed;">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
                Clear Filters
            </div>
        @endif
    </form>
</div>
 
{{-- ── Rooms Table ──────────────────────────────────────────────────── --}}
<div style="background:#fff; border-radius:1.25rem; border:1px solid #f1f5f9; box-shadow:0 4px 16px rgba(0,0,0,0.04); overflow:hidden; margin-bottom:1.5rem;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:linear-gradient(90deg, #0f1b4c, #1e3a8a); color:#fff;">
                <th style="text-align:left; padding:1.1rem 1.5rem; font-size:0.75rem; font-weight:700; letter-spacing:0.075em; text-transform:uppercase;">Room Number</th>
                <th style="text-align:left; padding:1.1rem 1.5rem; font-size:0.75rem; font-weight:700; letter-spacing:0.075em; text-transform:uppercase;">Type</th>
                <th style="text-align:left; padding:1.1rem 1.5rem; font-size:0.75rem; font-weight:700; letter-spacing:0.075em; text-transform:uppercase;">Price / Night</th>
                <th style="text-align:left; padding:1.1rem 1.5rem; font-size:0.75rem; font-weight:700; letter-spacing:0.075em; text-transform:uppercase;">Status</th>
                <th style="text-align:right; padding:1.1rem 1.8rem; font-size:0.75rem; font-weight:700; letter-spacing:0.075em; text-transform:uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $statusMap = [
                    'tersedia' => ['label' => 'Available', 'bg' => '#dcfce7', 'color' => '#15803d'],
                    'terisi' => ['label' => 'Booked', 'bg' => '#e0e7ff', 'color' => '#3730a3'],
                    'tidak tersedia' => ['label' => 'Maintenance', 'bg' => '#fef3c7', 'color' => '#92400e'],
                ];
            @endphp
            @forelse($kamarList as $kamar)
            @php
                $statusDetails = $statusMap[$kamar->status_kamar] ?? ['label' => 'Unknown', 'bg' => '#f1f5f9', 'color' => '#64748b'];
            @endphp
            <tr style="border-top:1px solid #f1f5f9; transition:background 0.15s;"
                onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                
                {{-- Room Number --}}
                <td style="padding:1.1rem 1.5rem; font-size:0.9375rem; font-weight:800; color:#0f1b4c;">
                    {{ $kamar->nomor_kamar }}
                </td>
                
                {{-- Room Type --}}
                <td style="padding:1.1rem 1.5rem; font-size:0.875rem; font-weight:500; color:#475569;">
                    {{ $kamar->tipe_kamar }}
                </td>
                
                {{-- Price --}}
                <td style="padding:1.1rem 1.5rem; font-size:0.9375rem; font-weight:700; color:#d97706;">
                    ${{ number_format($kamar->harga, 2) }}
                </td>
                
                {{-- Status Badge --}}
                <td style="padding:1.1rem 1.5rem;">
                    <span style="display:inline-block; padding:0.35rem 0.875rem; font-size:0.75rem; font-weight:700; border-radius:999px; background:{{ $statusDetails['bg'] }}; color:{{ $statusDetails['color'] }}; letter-spacing:0.02em;">
                        {{ $statusDetails['label'] }}
                    </span>
                </td>
                
                {{-- Actions --}}
                <td style="padding:1.1rem 1.5rem; text-align:right;">
                    <div style="display:flex; align-items:center; justify-content:flex-end; gap:0.5rem;">
                        
                        <!-- Edit Button -->
                        <button onclick="openEditModal('{{ $kamar->id_kamar }}', '{{ $kamar->nomor_kamar }}', '{{ $kamar->tipe_kamar }}', '{{ $kamar->harga }}', '{{ $kamar->status_kamar }}')" 
                                style="background:none; border:none; cursor:pointer; color:#94a3b8; padding:0.4rem; border-radius:0.5rem; display:flex; align-items:center; justify-content:center; transition:all 0.15s;"
                                onmouseover="this.style.background='#eff6ff'; this.style.color='#2563eb'"
                                onmouseout="this.style.background='none'; this.style.color='#94a3b8'">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </button>
                        
                        <!-- Delete Button -->
                        <button onclick="openDeleteModal('{{ $kamar->id_kamar }}', '{{ $kamar->nomor_kamar }}')" 
                                style="background:none; border:none; cursor:pointer; color:#94a3b8; padding:0.4rem; border-radius:0.5rem; display:flex; align-items:center; justify-content:center; transition:all 0.15s;"
                                onmouseover="this.style.background='#fef2f2'; this.style.color='#dc2626'"
                                onmouseout="this.style.background='none'; this.style.color='#94a3b8'">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding:4rem; text-align:center; font-size:0.9375rem; color:#94a3b8; font-weight:500;">
                    No rooms found matching your search.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
 
    {{-- ── Custom Pagination ────────────────────────────────────────── --}}
    @if($kamarList->hasPages() || $kamarList->total() > 0)
    <div style="display:flex; justify-content:space-between; align-items:center; padding:1.25rem 1.5rem; background:#fff; border-top:1px solid #f1f5f9;">
        <span style="font-size:0.875rem; color:#64748b; font-weight:500;">
            Showing {{ $kamarList->firstItem() ?? 0 }} to {{ $kamarList->lastItem() ?? 0 }} of {{ $kamarList->total() }} rooms
        </span>
        
        <div style="display:flex; align-items:center; gap:0.375rem;">
            {{-- Previous Page Link --}}
            @if ($kamarList->onFirstPage())
                <span style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; border:1px solid #e2e8f0; color:#cbd5e1; cursor:not-allowed;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </span>
            @else
                <a href="{{ $kamarList->previousPageUrl() }}" style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; border:1px solid #e2e8f0; color:#475569; text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>
            @endif
 
            {{-- Page Numbers --}}
            @php
                $currentPage = $kamarList->currentPage();
                $lastPage = $kamarList->lastPage();
            @endphp
 
            @for ($page = 1; $page <= $lastPage; $page++)
                @if ($page == 1 || $page == $lastPage || abs($page - $currentPage) <= 1)
                    @if ($page == $currentPage)
                        <span style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; background:#0f1b4c; color:#fff; font-weight:700; font-size:0.875rem;">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $kamarList->url($page) }}" style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; border:1px solid #e2e8f0; color:#475569; font-weight:600; font-size:0.875rem; text-decoration:none; transition:all 0.15s;"
                           onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'">
                            {{ $page }}
                        </a>
                    @endif
                @elseif (($page == 2 && $currentPage > 3) || ($page == $lastPage - 1 && $currentPage < $lastPage - 2))
                    <span style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; color:#94a3b8; font-weight:600; font-size:0.875rem;">...</span>
                @endif
            @endfor
 
            {{-- Next Page Link --}}
            @if ($kamarList->hasMorePages())
                <a href="{{ $kamarList->nextPageUrl() }}" style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; border:1px solid #e2e8f0; color:#475569; text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:0.5rem; border:1px solid #e2e8f0; color:#cbd5e1; cursor:not-allowed;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>
    </div>
    @endif
</div>
 
{{-- ── MODALS CONTAINER ──────────────────────────────────────────────── --}}
 
{{-- 1. Add Room Modal --}}
<div id="addRoomModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); backdrop-filter:blur(4px); z-index:999; align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:1.25rem; width:100%; max-width:480px; box-shadow:0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); overflow:hidden; animation:scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;">
        <!-- Header -->
        <div style="background:#0f1b4c; padding:1.25rem 1.5rem; display:flex; align-items:center; justify-content:space-between; color:#fff;">
            <h3 style="font-size:1.125rem; font-weight:800; margin:0;">Add New Room</h3>
            <button onclick="closeAddModal()" style="background:none; border:none; color:rgba(255,255,255,0.7); cursor:pointer; font-size:1.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <!-- Form -->
        <form action="{{ route('kamar.store') }}" method="POST" style="padding:1.5rem; display:flex; flex-direction:column; gap:1.25rem; margin:0;">
            @csrf
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Room Number</label>
                <input type="text" name="nomor_kamar" placeholder="e.g. 101" required 
                       style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Room Type</label>
                <select name="tipe_kamar" required style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
                    @foreach($allTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Price per Night ($)</label>
                <input type="number" name="harga" placeholder="e.g. 185" min="0" step="0.01" required 
                       style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Status</label>
                <select name="status_kamar" required style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
                    <option value="tersedia">Available (tersedia)</option>
                    <option value="terisi">Booked (terisi)</option>
                    <option value="tidak tersedia">Maintenance (tidak tersedia)</option>
                </select>
            </div>
            <!-- Actions -->
            <div style="display:flex; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem;">
                <button type="button" onclick="closeAddModal()" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:1px solid #cbd5e1; background:#fff; color:#475569; cursor:pointer;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#fff'">
                    Cancel
                </button>
                <button type="submit" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:#0f1b4c; color:#fff; cursor:pointer; box-shadow:0 2px 8px rgba(15,27,76,0.25);" onmouseover="this.style.background='#1e3a8a'" onmouseout="this.style.background='#0f1b4c'">
                    Create Room
                </button>
            </div>
        </form>
    </div>
</div>
 
{{-- 2. Edit Room Modal --}}
<div id="editRoomModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); backdrop-filter:blur(4px); z-index:999; align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:1.25rem; width:100%; max-width:480px; box-shadow:0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); overflow:hidden; animation:scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;">
        <!-- Header -->
        <div style="background:#0f1b4c; padding:1.25rem 1.5rem; display:flex; align-items:center; justify-content:space-between; color:#fff;">
            <h3 style="font-size:1.125rem; font-weight:800; margin:0;">Edit Room Details</h3>
            <button onclick="closeEditModal()" style="background:none; border:none; color:rgba(255,255,255,0.7); cursor:pointer; font-size:1.25rem; display:flex; align-items:center;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <!-- Form -->
        <form id="edit-room-form" method="POST" style="padding:1.5rem; display:flex; flex-direction:column; gap:1.25rem; margin:0;">
            @csrf
            @method('PUT')
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Room Number</label>
                <input type="text" name="nomor_kamar" id="edit_nomor_kamar" placeholder="e.g. 101" required 
                       style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Room Type</label>
                <select name="tipe_kamar" id="edit_tipe_kamar" required style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
                    @foreach($allTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Price per Night ($)</label>
                <input type="number" name="harga" id="edit_harga" placeholder="e.g. 185" min="0" step="0.01" required 
                       style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
            </div>
            <div>
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.5rem;">Status</label>
                <select name="status_kamar" id="edit_status_kamar" required style="width:100%; padding:0.625rem 0.875rem; font-size:0.875rem; border:1px solid #cbd5e1; border-radius:0.75rem; color:#1e293b;">
                    <option value="tersedia">Available (tersedia)</option>
                    <option value="terisi">Booked (terisi)</option>
                    <option value="tidak tersedia">Maintenance (tidak tersedia)</option>
                </select>
            </div>
            <!-- Actions -->
            <div style="display:flex; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem;">
                <button type="button" onclick="closeEditModal()" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:1px solid #cbd5e1; background:#fff; color:#475569; cursor:pointer;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#fff'">
                    Cancel
                </button>
                <button type="submit" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:#0f1b4c; color:#fff; cursor:pointer; box-shadow:0 2px 8px rgba(15,27,76,0.25);" onmouseover="this.style.background='#1e3a8a'" onmouseout="this.style.background='#0f1b4c'">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
 
{{-- 3. Delete Confirmation Modal --}}
<div id="deleteRoomModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); backdrop-filter:blur(4px); z-index:999; align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:1.25rem; width:100%; max-width:400px; box-shadow:0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); overflow:hidden; animation:scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;">
        <!-- Body -->
        <div style="padding:2rem 1.5rem; text-align:center;">
            <div style="width:54px; height:54px; border-radius:50%; background:#fee2e2; color:#ef4444; display:flex; align-items:center; justify-content:center; margin:0 auto 1.25rem;">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 style="font-size:1.125rem; font-weight:800; color:#0f172a; margin:0 0 0.5rem;">Delete Room</h3>
            <p style="font-size:0.875rem; color:#64748b; margin:0; line-height:1.5;">
                Are you sure you want to delete room <strong id="delete_room_num_label" style="color:#0f172a;"></strong>? This action cannot be undone.
            </p>
        </div>
        <!-- Actions -->
        <form id="delete-room-form" method="POST" style="margin:0; background:#f8fafc; padding:1rem 1.5rem; display:flex; justify-content:flex-end; gap:0.75rem; border-top:1px solid #f1f5f9;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:1px solid #cbd5e1; background:#fff; color:#475569; cursor:pointer;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#fff'">
                Cancel
            </button>
            <button type="submit" style="padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; border-radius:0.75rem; border:none; background:#ef4444; color:#fff; cursor:pointer; box-shadow:0 2px 8px rgba(239,68,68,0.25);" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                Delete Room
            </button>
        </form>
    </div>
</div>
 
{{-- ── JAVASCRIPT & MODAL ANIMATION STYLES ──────────────────────────── --}}
<style>
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes scaleUp {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>
 
<script>
    // Toast Auto Fade Out
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
 
    // Add Modal functions
    function openAddModal() {
        const modal = document.getElementById('addRoomModal');
        modal.style.display = 'flex';
    }
    function closeAddModal() {
        const modal = document.getElementById('addRoomModal');
        modal.style.display = 'none';
    }
 
    // Edit Modal functions
    function openEditModal(id, nomor, tipe, harga, status) {
        const modal = document.getElementById('editRoomModal');
        const form = document.getElementById('edit-room-form');
        
        // Update form action with current room ID
        form.action = `/kamar/${id}`;
        
        // Populate inputs
        document.getElementById('edit_nomor_kamar').value = nomor;
        document.getElementById('edit_tipe_kamar').value = tipe;
        document.getElementById('edit_harga').value = harga;
        document.getElementById('edit_status_kamar').value = status;
        
        modal.style.display = 'flex';
    }
    function closeEditModal() {
        const modal = document.getElementById('editRoomModal');
        modal.style.display = 'none';
    }
 
    // Delete Modal functions
    function openDeleteModal(id, nomor) {
        const modal = document.getElementById('deleteRoomModal');
        const form = document.getElementById('delete-room-form');
        
        // Update form action with current room ID
        form.action = `/kamar/${id}`;
        document.getElementById('delete_room_num_label').textContent = nomor;
        
        modal.style.display = 'flex';
    }
    function closeDeleteModal() {
        const modal = document.getElementById('deleteRoomModal');
        modal.style.display = 'none';
    }
 
    // Close modal when clicking outside contents
    window.addEventListener('click', (event) => {
        const addModal = document.getElementById('addRoomModal');
        const editModal = document.getElementById('editRoomModal');
        const deleteModal = document.getElementById('deleteRoomModal');
 
        if (event.target === addModal) closeAddModal();
        if (event.target === editModal) closeEditModal();
        if (event.target === deleteModal) closeDeleteModal();
    });
</script>
 
</x-app-layout>
