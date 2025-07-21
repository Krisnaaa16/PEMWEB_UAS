@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
    .hero-bg {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .equipment-card {
        background: linear-gradient(135deg, #fff 0%, #f8fafc 100%);
        transition: all 0.3s ease;
    }
    
    .equipment-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .category-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s ease;
    }
    
    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.3);
    }
    
    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    
    .floating-elements::before,
    .floating-elements::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-elements::before {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .floating-elements::after {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: 3s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-bounce-slow {
        animation: bounce 2s infinite;
    }
    
    .text-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="floating-elements"></div>
    <div class="container mx-auto px-4 text-center text-white relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Animated Logo -->
            <div class="mb-8 animate-bounce-slow">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white bg-opacity-20 rounded-full backdrop-blur-sm">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                Sewa Alat <span class="text-green-400">Hiking</span><br>
                <span class="text-3xl md:text-5xl text-gray-300">Petualangan Dimulai Dari Sini</span>
            </h1>
            
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Temukan peralatan hiking terlengkap dengan kualitas terbaik untuk mendukung petualangan outdoor Anda. 
                Dari carrier, tenda, hingga perlengkapan cooking gear.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('equipments.index') }}" 
                   class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-full text-lg font-semibold transform hover:scale-105 transition duration-300 shadow-lg hover:shadow-xl">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Jelajahi Katalog
                    </span>
                </a>
                
                <a href="{{ route('categories.index') }}" 
                   class="border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-4 rounded-full text-lg font-semibold transform hover:scale-105 transition duration-300">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Lihat Kategori
                    </span>
                </a>
            </div>
            
            <!-- Social Media Hero Section -->
            <div class="mt-12 text-center">
                <p class="text-lg text-gray-300 mb-6">Ikuti & Hubungi Kami</p>
                <div class="flex justify-center space-x-6">
                    <!-- WhatsApp -->
                    <a href="https://wa.me/6288224696350" target="_blank" 
                       class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full transform hover:scale-110 transition duration-300 shadow-lg group">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                        </svg>
                        <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black text-white px-3 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                            WA: 088224696350
                        </div>
                    </a>
                    
                    <!-- Instagram -->
                    <a href="https://instagram.com/krissna_16" target="_blank" 
                       class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-4 rounded-full transform hover:scale-110 transition duration-300 shadow-lg group">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black text-white px-3 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                            IG: @krissna_16
                        </div>
                    </a>
                    
                    <!-- GitHub -->
                    <a href="https://github.com/Krisnaaa16" target="_blank" 
                       class="bg-gray-800 hover:bg-gray-900 text-white p-4 rounded-full transform hover:scale-110 transition duration-300 shadow-lg group">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black text-white px-3 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                            GitHub: Krisnaaa16
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-blue-600">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div class="transform hover:scale-105 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2">{{ $equipmentCount }}+</div>
                <div class="text-sm md:text-base opacity-90">Alat Tersedia</div>
            </div>
            <div class="transform hover:scale-105 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2">{{ $categoryCount }}+</div>
                <div class="text-sm md:text-base opacity-90">Kategori</div>
            </div>
            <div class="transform hover:scale-105 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2">1000+</div>
                <div class="text-sm md:text-base opacity-90">Customer Puas</div>
            </div>
            <div class="transform hover:scale-105 transition duration-300">
                <div class="text-4xl md:text-5xl font-bold mb-2">5</div>
                <div class="text-sm md:text-base opacity-90">Tahun Pengalaman</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Kategori <span class="text-gradient">Populer</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Pilih kategori alat hiking sesuai kebutuhan petualangan Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($categories->take(4) as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="category-card rounded-2xl p-8 text-center text-white block transform hover:scale-105 transition duration-300">
                <div class="mb-6">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ $category->name }}</h3>
                    <p class="text-sm opacity-90">{{ $category->description }}</p>
                </div>
                
                <div class="bg-white bg-opacity-20 rounded-full px-4 py-2 text-sm inline-block">
                    {{ $category->hiking_equipments_count ?? 0 }} Alat
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Equipment -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Alat <span class="text-gradient">Unggulan</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Koleksi peralatan hiking pilihan dengan kualitas terbaik dan harga terjangkau
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredEquipments as $equipment)
            <div class="equipment-card rounded-2xl overflow-hidden shadow-lg">
                <!-- Equipment Image -->
                <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 relative overflow-hidden">
                    @if($equipment->images && count($equipment->images) > 0)
                        <img src="{{ $equipment->images[0] }}" 
                             alt="{{ $equipment->name }}"
                             class="w-full h-full object-cover transform hover:scale-110 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-100 to-blue-100">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <p class="text-green-600 font-medium">{{ $equipment->name }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Featured Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            ⭐ Unggulan
                        </span>
                    </div>
                    
                    <!-- Stock Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Stok: {{ $equipment->stock_available }}
                        </span>
                    </div>
                </div>
                
                <!-- Equipment Info -->
                <div class="p-6">
                    <div class="mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            {{ $equipment->category->name }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $equipment->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $equipment->description }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Brand:</span>
                            <span class="text-sm font-semibold text-gray-900">{{ $equipment->brand }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="text-sm text-gray-500">Kondisi:</span>
                            <span class="text-sm font-semibold text-green-600 capitalize">{{ $equipment->condition }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-green-600">Rp {{ number_format($equipment->price_per_day, 0, ',', '.') }}</span>
                            <span class="text-gray-500 text-sm">/hari</span>
                        </div>
                        
                        <a href="{{ route('equipments.show', $equipment->slug) }}" 
                           class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white px-6 py-3 rounded-full text-sm font-semibold transform hover:scale-105 transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('equipments.index') }}" 
               class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold transform hover:scale-105 transition duration-300 inline-flex items-center">
                <span>Lihat Semua Alat</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Mengapa Memilih <span class="text-green-400">Kami?</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Pengalaman terbaik dengan layanan berkualitas untuk petualangan Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-2xl bg-white bg-opacity-10 backdrop-blur-sm transform hover:scale-105 transition duration-300">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Kualitas Terjamin</h3>
                <p class="text-gray-300">Semua peralatan telah melalui quality control ketat dan maintenance rutin</p>
            </div>
            
            <div class="text-center p-8 rounded-2xl bg-white bg-opacity-10 backdrop-blur-sm transform hover:scale-105 transition duration-300">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Harga Terjangkau</h3>
                <p class="text-gray-300">Tarif rental yang kompetitif dengan berbagai paket dan promo menarik</p>
            </div>
            
            <div class="text-center p-8 rounded-2xl bg-white bg-opacity-10 backdrop-blur-sm transform hover:scale-105 transition duration-300">
                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Pelayanan Cepat</h3>
                <p class="text-gray-300">Proses booking mudah dan pickup/delivery yang fleksibel sesuai kebutuhan</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-blue-600">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Siap Memulai Petualangan?
            </h2>
            <p class="text-xl text-white opacity-90 mb-8">
                Jangan biarkan mimpi petualangan Anda tertunda. Temukan peralatan hiking terbaik dan mulai jelajahi keindahan alam Indonesia.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('equipments.index') }}" 
                   class="bg-white text-green-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold transform hover:scale-105 transition duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Mulai Sewa Sekarang
                </a>
                
                <a href="/admin" 
                   class="border-2 border-white text-white hover:bg-white hover:text-green-600 px-8 py-4 rounded-full text-lg font-semibold transform hover:scale-105 transition duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Admin Panel
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Floating Social Media Buttons -->
<div class="fixed right-6 bottom-6 z-50 flex flex-col space-y-3">
    <!-- WhatsApp -->
    <a href="https://wa.me/6288224696350" target="_blank" 
       class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-2xl transform hover:scale-125 transition duration-300 group pulse-animation">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
        </svg>
        <div class="absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-lg">
            <strong>WhatsApp</strong><br>088224696350
        </div>
    </a>
    
    <!-- Instagram -->
    <a href="https://instagram.com/krissna_16" target="_blank" 
       class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-4 rounded-full shadow-2xl transform hover:scale-125 transition duration-300 group pulse-animation">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
        <div class="absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-lg">
            <strong>Instagram</strong><br>@krissna_16
        </div>
    </a>
    
    <!-- GitHub -->
    <a href="https://github.com/Krisnaaa16" target="_blank" 
       class="bg-gray-800 hover:bg-gray-900 text-white p-4 rounded-full shadow-2xl transform hover:scale-125 transition duration-300 group pulse-animation">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
        </svg>
        <div class="absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-lg">
            <strong>GitHub</strong><br>Krisnaaa16
        </div>
    </a>
</div>

<!-- Add pulse animation CSS -->
<style>
    .pulse-animation {
        animation: pulse-glow 2s infinite;
    }
    
    @keyframes pulse-glow {
        0% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
        }
    }
    
    .pulse-animation:nth-child(2) {
        animation: pulse-glow-purple 2s infinite;
        animation-delay: 0.5s;
    }
    
    @keyframes pulse-glow-purple {
        0% {
            box-shadow: 0 0 0 0 rgba(168, 85, 247, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(168, 85, 247, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(168, 85, 247, 0);
        }
    }
    
    .pulse-animation:nth-child(3) {
        animation: pulse-glow-gray 2s infinite;
        animation-delay: 1s;
    }
    
    @keyframes pulse-glow-gray {
        0% {
            box-shadow: 0 0 0 0 rgba(75, 85, 99, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(75, 85, 99, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(75, 85, 99, 0);
        }
    }
</style>
@endsection
