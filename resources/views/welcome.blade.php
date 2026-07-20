<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StayEase - Rasakan Kenyamanan Luar Biasa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
            }
            .font-serif-display {
                font-family: 'Playfair Display', serif;
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-800" x-data="{ mobileMenuOpen: false }">

        <!-- Header / Navbar -->
        <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-2xl font-bold font-serif-display text-[#101b4b] tracking-wide flex items-center gap-2">
                            StayEase
                        </a>
                    </div>

                    <!-- Navigation Links (Desktop) -->
                    <nav class="hidden md:flex space-x-10">
                        <a href="#suites" class="text-sm font-medium text-[#101b4b] hover:text-amber-600 border-b-2 border-transparent hover:border-amber-500 pb-1 transition-all duration-200">Kamar</a>
                        <a href="#experiences" class="text-sm font-medium text-slate-500 hover:text-amber-600 border-b-2 border-transparent hover:border-amber-500 pb-1 transition-all duration-200">Pengalaman</a>
                        <a href="#amenities" class="text-sm font-medium text-slate-500 hover:text-amber-600 border-b-2 border-transparent hover:border-amber-500 pb-1 transition-all duration-200">Fasilitas</a>
                        <a href="#concierge" class="text-sm font-medium text-slate-500 hover:text-amber-600 border-b-2 border-transparent hover:border-amber-500 pb-1 transition-all duration-200">Layanan</a>
                    </nav>

                    <!-- Authentication & CTA -->
                    <div class="hidden md:flex items-center space-x-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-[#101b4b] hover:text-amber-600 transition-colors">Dasbor</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-[#101b4b] hover:text-amber-600 transition-colors">Masuk</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-sm text-sm font-semibold text-white bg-[#101b4b] hover:bg-[#1a2b6d] transition-all shadow-md hover:shadow-lg">
                                        Pesan Sekarang
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500">
                            <span class="sr-only">Buka menu utama</span>
                            <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-show="mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden border-b border-slate-100 bg-white" style="display: none;">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#suites" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Kamar</a>
                    <a href="#experiences" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Pengalaman</a>
                    <a href="#amenities" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Fasilitas</a>
                    <a href="#concierge" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Layanan</a>
                </div>
                <div class="pt-4 pb-4 border-t border-slate-100">
                    <div class="flex items-center px-5 space-x-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Dasbor</a>
                            @else
                                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-slate-50">Masuk</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block text-center w-full px-5 py-3 rounded-sm text-base font-semibold text-white bg-[#101b4b] hover:bg-[#1a2b6d]">
                                        Pesan Sekarang
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative min-h-[85vh] flex items-center justify-center bg-slate-900 overflow-hidden">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero_bg.png') }}" alt="StayEase Luxury Skyline Rooftop" class="w-full h-full object-cover object-center opacity-80">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-slate-900/60"></div>
            </div>

            <!-- Content Container -->
            <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white py-16 sm:py-24">
                <h1 class="text-4xl sm:text-6xl font-extrabold font-serif-display tracking-tight leading-tight max-w-4xl mx-auto mb-6">
                    Rasakan Kenyamanan Luar Biasa
                </h1>
                <p class="text-base sm:text-lg text-slate-200 max-w-2xl mx-auto mb-12 font-light">
                    Temukan dan pesan kamar terbaik di lokasi paling ikonik, di mana setiap detail dirancang untuk kepuasan mutlak Anda.
                </p>

                <!-- Search Widget Card (Glassmorphism) -->
                <div class="bg-white/95 backdrop-blur-md rounded-sm p-4 sm:p-6 shadow-2xl max-w-4xl mx-auto text-slate-800 border border-white/20">
                    <form action="#" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <!-- Destination Selection -->
                        <div class="text-left px-3 py-2 border-b md:border-b-0 md:border-r border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tujuan</span>
                            <div class="relative mt-1">
                                <select class="block w-full border-0 p-0 text-slate-800 font-semibold focus:ring-0 text-sm bg-transparent cursor-pointer">
                                    <option value="">Mau ke mana?</option>
                                    <option value="jakarta">Jakarta, Indonesia</option>
                                    <option value="bali">Bali, Indonesia</option>
                                    <option value="singapore">Singapura</option>
                                    <option value="tokyo">Tokyo, Jepang</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date Picker / Range -->
                        <div class="text-left px-3 py-2 border-b md:border-b-0 md:border-r border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tanggal</span>
                            <div class="relative mt-1 flex items-center gap-2">
                                <svg class="h-4 w-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <input type="text" placeholder="12 - 19 Okt" class="block w-full border-0 p-0 text-slate-800 font-semibold focus:ring-0 text-sm bg-transparent cursor-pointer">
                            </div>
                        </div>

                        <!-- Guest Selection -->
                        <div class="text-left px-3 py-2 border-b md:border-b-0 md:border-r border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tamu</span>
                            <div class="relative mt-1 flex items-center gap-2">
                                <svg class="h-4 w-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <select class="block w-full border-0 p-0 text-slate-800 font-semibold focus:ring-0 text-sm bg-transparent cursor-pointer">
                                    <option value="1">1 Tamu</option>
                                    <option value="2" selected>2 Tamu</option>
                                    <option value="3">3 Tamu</option>
                                    <option value="4">4+ Tamu</option>
                                </select>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="px-2">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-4 rounded-sm text-sm font-semibold text-white bg-[#101b4b] hover:bg-[#1a2b6d] transition-all shadow-md">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Highlights / Features Section -->
        <section id="experiences" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                    <!-- Feature 1 -->
                    <div class="flex flex-col items-center group">
                        <div class="w-16 h-16 rounded-full bg-amber-500 flex items-center justify-center text-white mb-6 shadow-md transition-transform duration-300 group-hover:scale-110">
                            <!-- Star Badge Icon -->
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.9 1.52-1.3 2.1-.3l1.76 3.56 3.93.57c1.08.15 1.52 1.48.74 2.2l-2.84 2.76.67 3.92c.18 1.07-.94 1.88-1.9 1.37L12 14.6l-3.52 1.85c-.96.5-2.08-.3-1.9-1.37l.67-3.92-2.84-2.76c-.78-.72-.34-2.05.74-2.2l3.93-.57 1.76-3.56z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#101b4b] mb-3">Kamar Premium</h3>
                        <p class="text-slate-500 text-sm max-w-xs leading-relaxed">
                            Kemewahan dan desain tak tertandingi di setiap sudut koleksi kamar pilihan kami.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col items-center group">
                        <div class="w-16 h-16 rounded-full bg-amber-500 flex items-center justify-center text-white mb-6 shadow-md transition-transform duration-300 group-hover:scale-110">
                            <!-- Service Bell Icon -->
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#101b4b] mb-3">Layanan Global</h3>
                        <p class="text-slate-500 text-sm max-w-xs leading-relaxed">
                            Bantuan personal 24/7 untuk melayani setiap keinginan Anda, di mana pun Anda berada.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col items-center group">
                        <div class="w-16 h-16 rounded-full bg-amber-500 flex items-center justify-center text-white mb-6 shadow-md transition-transform duration-300 group-hover:scale-110">
                            <!-- Comfort Bed/Flower Icon -->
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#101b4b] mb-3">Kenyamanan Tak Tertandingi</h3>
                        <p class="text-slate-500 text-sm max-w-xs leading-relaxed">
                            Tempat tidur khas dan lingkungan tenang yang dirancang untuk istirahat yang sempurna.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Collections Section -->
        <section id="suites" class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12">
                    <div>
                        <span class="block text-xs font-bold text-amber-600 uppercase tracking-widest mb-2">Pilihan Menginap</span>
                        <h2 class="text-3xl sm:text-4xl font-bold font-serif-display text-[#101b4b]">Koleksi Unggulan</h2>
                    </div>
                    <a href="#" class="mt-4 sm:mt-0 inline-flex items-center text-sm font-semibold text-[#101b4b] hover:text-amber-600 group transition-colors">
                        Lihat Semua Kamar
                        <svg class="h-4 w-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Suite 1 -->
                    <div class="bg-white rounded-sm overflow-hidden shadow-lg border border-slate-100 flex flex-col group h-full">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset('images/presidential_suite.png') }}" alt="Presidential Suite" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <span class="absolute top-4 right-4 bg-amber-800/90 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-sm">Teratas</span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-[#101b4b] mb-3 group-hover:text-amber-600 transition-colors">Presidential Suite</h3>
                            <p class="text-slate-500 text-sm mb-6 flex-grow leading-relaxed">
                                Puncak kemewahan yang menampilkan pemandangan kota yang indah, kantor pribadi, dan layanan koki pribadi.
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                                <div>
                                    <span class="text-lg font-bold text-[#101b4b]">$1,250</span>
                                    <span class="text-xs text-slate-400">/ malam</span>
                                </div>
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 rounded-sm text-xs font-semibold text-[#101b4b] hover:bg-slate-50 transition-colors">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Suite 2 -->
                    <div class="bg-white rounded-sm overflow-hidden shadow-lg border border-slate-100 flex flex-col group h-full">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset('images/deluxe_ocean.png') }}" alt="Deluxe Ocean View" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <span class="absolute top-4 right-4 bg-amber-800/90 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-sm">Tepi Laut</span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-[#101b4b] mb-3 group-hover:text-amber-600 transition-colors">Deluxe Ocean View</h3>
                            <p class="text-slate-500 text-sm mb-6 flex-grow leading-relaxed">
                                Bangun dengan suara ombak di kamar luas ini dengan teras pribadi yang mengelilinginya.
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                                <div>
                                    <span class="text-lg font-bold text-[#101b4b]">$850</span>
                                    <span class="text-xs text-slate-400">/ malam</span>
                                </div>
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 rounded-sm text-xs font-semibold text-[#101b4b] hover:bg-slate-50 transition-colors">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Suite 3 -->
                    <div class="bg-white rounded-sm overflow-hidden shadow-lg border border-slate-100 flex flex-col group h-full">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset('images/executive_studio.png') }}" alt="Executive Studio" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <span class="absolute top-4 right-4 bg-amber-800/90 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-sm">Bisnis</span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-[#101b4b] mb-3 group-hover:text-amber-600 transition-colors">Executive Studio</h3>
                            <p class="text-slate-500 text-sm mb-6 flex-grow leading-relaxed">
                                Ruang tamu modern dan cerdas yang dioptimalkan untuk pelancong bisnis yang membutuhkan gaya dan fungsionalitas.
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                                <div>
                                    <span class="text-lg font-bold text-[#101b4b]">$420</span>
                                    <span class="text-xs text-slate-400">/ malam</span>
                                </div>
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 rounded-sm text-xs font-semibold text-[#101b4b] hover:bg-slate-50 transition-colors">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Section -->
        <section id="concierge" class="py-24 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Quote Mark -->
                <div class="text-amber-500/20 text-8xl font-serif-display leading-none mb-6">”</div>
                
                <!-- Quote -->
                <blockquote class="text-lg sm:text-2xl font-serif-display font-medium text-[#101b4b] leading-relaxed mb-8 italic">
                    "StayEase telah sepenuhnya mengubah pengalaman perjalanan saya. Perhatian terhadap detail di Presidential Suite tidak seperti yang pernah saya lihat selama tiga puluh tahun bepergian mewah. Petugas tidak hanya memenuhi harapan; mereka mengantisipasi kebutuhan yang bahkan belum saya utarakan."
                </blockquote>

                <!-- Reviewer Profile -->
                <div class="flex flex-col items-center">
                    <img class="w-16 h-16 rounded-full border-2 border-amber-500/25 object-cover mb-4" src="{{ asset('images/julian_avatar.png') }}" alt="Julian V. Rothschild">
                    <div class="text-base font-semibold text-[#101b4b]">Julian V. Rothschild</div>
                    <div class="text-xs text-slate-400 mb-4">Eksekutif Perusahaan & Tamu Langganan</div>
                    
                    <!-- Stars -->
                    <div class="flex gap-1 text-amber-500">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.9 1.52-1.3 2.1-.3l1.76 3.56 3.93.57c1.08.15 1.52 1.48.74 2.2l-2.84 2.76.67 3.92c.18 1.07-.94 1.88-1.9 1.37L10 14.6l-3.52 1.85c-.96.5-2.08-.3-1.9-1.37l.67-3.92-2.84-2.76c-.78-.72-.34-2.05.74-2.2l3.93-.57 1.76-3.56z" />
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        <!-- Call To Action Section (StayEase Plus) -->
        <section class="py-20 bg-[#162150] text-white">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="block text-xs font-bold text-amber-400 uppercase tracking-widest mb-3">Gabung StayEase Plus</span>
                <h2 class="text-3xl sm:text-5xl font-bold font-serif-display mb-6 tracking-tight">Buka Hak Istimewa Eksklusif</h2>
                <p class="text-slate-300 max-w-xl mx-auto mb-10 text-sm leading-relaxed">
                    Buka dunia hadiah eksklusif, check-in lebih awal, dan pengalaman dipesan lebih dahulu yang disesuaikan dengan gaya hidup Anda. Keanggotaan melalui undangan atau pendaftaran.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-sm text-sm font-semibold text-white bg-[#966b10] hover:bg-[#b08018] transition-colors shadow-lg">
                        Daftar Keanggotaan
                    </a>
                    <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 border border-white/30 rounded-sm text-sm font-semibold text-white hover:bg-white/10 transition-colors">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center border-b border-slate-800 pb-12 mb-12">
                    <div>
                        <span class="text-2xl font-bold font-serif-display text-white tracking-wide">StayEase</span>
                        <p class="mt-2 text-xs text-slate-500">© {{ date('Y') }} StayEase Luxury Hospitality. Seluruh hak cipta.</p>
                    </div>
                    <div class="flex flex-wrap gap-x-8 gap-y-3 justify-start md:justify-end text-xs">
                        <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition-colors">Aksesibilitas</a>
                        <a href="#" class="hover:text-white transition-colors">Karir</a>
                        <a href="#" class="hover:text-white transition-colors">Keberlanjutan</a>
                        <a href="#" class="hover:text-white transition-colors">Buletin</a>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="text-xs text-slate-600">
                        Menciptakan pengalaman keramahan mewah yang tak terlupakan di seluruh dunia.
                    </div>
                    <!-- Social icons -->
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-white transition-colors" aria-label="Twitter">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-white transition-colors" aria-label="Instagram">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm5 10a5 5 0 11-10 0 5 5 0 0110 0zm-5-3a3 3 0 100 6 3 3 0 000-6zm5-2.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
