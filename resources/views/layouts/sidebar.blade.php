{{-- resources/views/layouts/sidebar.blade.php --}}
<aside style="
    display: flex;
    flex-direction: column;
    width: 220px;
    min-height: 100vh;
    background: linear-gradient(180deg, #0a1628 0%, #0f1b4c 60%, #1a2a6c 100%);
    flex-shrink: 0;
    box-shadow: 4px 0 20px rgba(0,0,0,0.25);
    position: relative;
">
    {{-- Decorative top accent line --}}
    <div style="height:3px; background:linear-gradient(90deg,#f5c518,#f97316,#f5c518); width:100%;"></div>

    {{-- Brand --}}
    <div style="padding: 1.5rem 1.5rem 1.25rem; border-bottom: 1px solid rgba(255,255,255,0.08);">
        <h1 style="color:#f5c518; font-weight:800; font-size:1.125rem; margin:0; letter-spacing:-0.01em;">StayEase Admin</h1>
        <p style="color:rgba(255,255,255,0.4); font-size:0.7rem; margin:0.2rem 0 0; font-weight:500; letter-spacing:0.05em; text-transform:uppercase;">Property Manager</p>
    </div>

    {{-- Navigation --}}
    <nav style="flex:1; padding: 1rem 0.75rem; display:flex; flex-direction:column; gap:0.25rem;">

        @php
            $isDash = request()->routeIs('dashboard');
            $isKamar = request()->routeIs('kamar.*');
            $isBoking = request()->routeIs('boking.*');
        @endphp
 
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}" style="
            display:flex; align-items:center; gap:0.75rem;
            padding: 0.7rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.875rem; font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
            {{ $isDash
                ? 'background:rgba(245,197,24,0.15); color:#f5c518; border:1px solid rgba(245,197,24,0.3);'
                : 'color:rgba(255,255,255,0.65); border:1px solid transparent;' }}"
           onmouseover="{{ $isDash ? '' : 'this.style.background=\'rgba(255,255,255,0.08)\'; this.style.color=\'#fff\';' }}"
           onmouseout="{{ $isDash ? '' : 'this.style.background=\'transparent\'; this.style.color=\'rgba(255,255,255,0.65)\';' }}">
            <div style="width:32px; height:32px; border-radius:8px; background:{{ $isDash ? 'rgba(245,197,24,0.25)' : 'rgba(255,255,255,0.06)' }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="{{ $isDash ? '#f5c518' : 'rgba(255,255,255,0.5)' }}" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                </svg>
            </div>
            Dashboard
            @if($isDash)
                <div style="margin-left:auto; width:6px; height:6px; border-radius:50%; background:#f5c518;"></div>
            @endif
        </a>
 
        {{-- Rooms --}}
        <a href="{{ route('kamar.index') }}" style="
            display:flex; align-items:center; gap:0.75rem;
            padding: 0.7rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.875rem; font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
            {{ $isKamar
                ? 'background:rgba(245,197,24,0.15); color:#f5c518; border:1px solid rgba(245,197,24,0.3);'
                : 'color:rgba(255,255,255,0.65); border:1px solid transparent;' }}"
           onmouseover="{{ $isKamar ? '' : 'this.style.background=\'rgba(255,255,255,0.08)\'; this.style.color=\'#fff\';' }}"
           onmouseout="{{ $isKamar ? '' : 'this.style.background=\'transparent\'; this.style.color=\'rgba(255,255,255,0.65)\';' }}">
            <div style="width:32px; height:32px; border-radius:8px; background:{{ $isKamar ? 'rgba(245,197,24,0.25)' : 'rgba(255,255,255,0.06)' }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="{{ $isKamar ? '#f5c518' : 'rgba(255,255,255,0.5)' }}" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            Rooms
            @if($isKamar)
                <div style="margin-left:auto; width:6px; height:6px; border-radius:50%; background:#f5c518;"></div>
            @endif
        </a>

        {{-- Bookings --}}
        <a href="{{ route('boking.index') }}" style="
            display:flex; align-items:center; gap:0.75rem;
            padding: 0.7rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.875rem; font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
            {{ $isBoking
                ? 'background:rgba(245,197,24,0.15); color:#f5c518; border:1px solid rgba(245,197,24,0.3);'
                : 'color:rgba(255,255,255,0.65); border:1px solid transparent;' }}"
           onmouseover="{{ $isBoking ? '' : 'this.style.background=\'rgba(255,255,255,0.08)\'; this.style.color=\'#fff\';' }}"
           onmouseout="{{ $isBoking ? '' : 'this.style.background=\'transparent\'; this.style.color=\'rgba(255,255,255,0.65)\';' }}">
            <div style="width:32px; height:32px; border-radius:8px; background:{{ $isBoking ? 'rgba(245,197,24,0.25)' : 'rgba(255,255,255,0.06)' }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="{{ $isBoking ? '#f5c518' : 'rgba(255,255,255,0.5)' }}" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            Bookings
            @if($isBoking)
                <div style="margin-left:auto; width:6px; height:6px; border-radius:50%; background:#f5c518;"></div>
            @endif
        </a>

        {{-- Settings --}}
        <a href="#" style="
            display:flex; align-items:center; gap:0.75rem;
            padding: 0.7rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.875rem; font-weight: 600;
            text-decoration: none;
            color: rgba(255,255,255,0.65);
            border: 1px solid transparent;
            transition: all 0.15s;"
           onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#fff';"
           onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.65)';">
            <div style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.06); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="rgba(255,255,255,0.5)" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            Settings
        </a>
    </nav>

    {{-- User Profile --}}
    <div style="padding: 1rem; margin: 0 0.75rem 0.875rem; background:rgba(255,255,255,0.06); border-radius:1rem; border:1px solid rgba(255,255,255,0.08);">
        @php
            $nameParts = explode(' ', Auth::user()->name ?? 'User');
            $initials  = strtoupper(substr($nameParts[0],0,1) . substr($nameParts[1] ?? '',0,1));
        @endphp
        <div style="display:flex; align-items:center; gap:0.75rem;">
            <div style="width:2.25rem; height:2.25rem; border-radius:50%; background:linear-gradient(135deg,#f5c518,#f97316); color:#0f1b4c; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.8rem; flex-shrink:0; box-shadow:0 2px 8px rgba(245,197,24,0.4);">
                {{ $initials }}
            </div>
            <div style="min-width:0; flex:1;">
                <p style="font-size:0.8125rem; font-weight:700; color:#fff; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ Auth::user()->name ?? 'User' }}</p>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0; cursor:pointer; font-size:0.7rem; color:rgba(255,255,255,0.4); font-weight:500; margin-top:1px;"
                            onmouseover="this.style.color='#f5c518'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
