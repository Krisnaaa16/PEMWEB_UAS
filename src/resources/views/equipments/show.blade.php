@extends('layouts.app')

@section('title', $equipment->name)

@push('styles')
<style>
    .image-gallery {
        position: relative;
    }
    
    .thumbnail {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .thumbnail:hover {
        transform: scale(1.05);
        border-color: #10b981;
    }
    
    .thumbnail.active {
        border-color: #10b981;
        border-width: 3px;
    }
    
    .spec-card {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        transition: all 0.3s ease;
    }
    
    .spec-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .floating-cta {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 50;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-radius: 50px;
        padding: 15px 25px;
        box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);
        transition: all 0.3s ease;
    }
    
    .floating-cta:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 35px -5px rgba(16, 185, 129, 0.6);
    }
    
    @media (max-width: 768px) {
        .floating-cta {
            bottom: 10px;
            right: 10px;
            padding: 12px 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Breadcrumb -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-green-600 transition duration-300">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('equipments.index') }}" class="ml-1 text-gray-500 hover:text-green-600 md:ml-2 transition duration-300">Katalog</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-900 font-medium md:ml-2">{{ $equipment->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-12 lg:items-start">
            <!-- Image Gallery -->
            <div class="mb-8 lg:mb-0">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden image-gallery">
                    @if($equipment->images && count($equipment->images) > 0)
                        <div class="relative">
                            <img id="main-image" 
                                 src="{{ $equipment->images[0] }}" 
                                 alt="{{ $equipment->name }}" 
                                 class="w-full h-96 lg:h-[500px] object-cover">
                            
                            <!-- Image Navigation -->
                            @if(count($equipment->images) > 1)
                                <button id="prev-btn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 p-2 rounded-full shadow-lg transition duration-300">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button id="next-btn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 p-2 rounded-full shadow-lg transition duration-300">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                @if($equipment->is_featured)
                                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        ⭐ Unggulan
                                    </span>
                                @endif
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $equipment->category->name }}
                                </span>
                            </div>
                            
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    {{ $equipment->stock_available > 0 ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $equipment->stock_available > 0 ? 'Tersedia' : 'Habis' }}
                                </span>
                            </div>
                        </div>
                        
                        @if(count($equipment->images) > 1)
                            <div class="p-4">
                                <div class="grid grid-cols-4 gap-3">
                                    @foreach($equipment->images as $index => $image)
                                        <img class="thumbnail w-full h-20 object-cover rounded-lg border-2 border-gray-200 {{ $index === 0 ? 'active' : '' }}" 
                                             src="{{ $image }}" 
                                             alt="{{ $equipment->name }}"
                                             data-index="{{ $index }}">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <p class="text-green-600 font-medium text-lg">{{ $equipment->name }}</p>
                                <p class="text-gray-500 text-sm">Gambar tidak tersedia</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Equipment Details -->
            <div class="lg:sticky lg:top-8">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <!-- Header -->
                    <div class="mb-6">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">{{ $equipment->name }}</h1>
                        <p class="text-gray-600 text-lg">{{ $equipment->description }}</p>
                    </div>

                    <!-- Price & Availability -->
                    <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-4xl font-bold text-green-600">
                                    Rp {{ number_format($equipment->price_per_day, 0, ',', '.') }}
                                </span>
                                <span class="text-gray-500 text-lg">/hari</span>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-500">Stok Tersedia</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $equipment->stock_available }}</div>
                            </div>
                        </div>
                        
                        @if($equipment->security_deposit > 0)
                            <div class="bg-white bg-opacity-50 rounded-lg p-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Deposit Keamanan:</span>
                                    <span class="font-semibold text-gray-900">Rp {{ number_format($equipment->security_deposit, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Equipment Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="spec-card rounded-xl p-4">
                            <div class="text-sm text-gray-500 mb-1">Brand</div>
                            <div class="font-semibold text-gray-900">{{ $equipment->brand ?: 'Tidak disebutkan' }}</div>
                        </div>
                        <div class="spec-card rounded-xl p-4">
                            <div class="text-sm text-gray-500 mb-1">Kondisi</div>
                            <div class="font-semibold capitalize
                                {{ $equipment->condition === 'excellent' ? 'text-green-600' : 
                                   ($equipment->condition === 'good' ? 'text-blue-600' : 'text-yellow-600') }}">
                                {{ $equipment->condition === 'excellent' ? 'Sangat Baik' : 
                                   ($equipment->condition === 'good' ? 'Baik' : 'Cukup') }}
                            </div>
                        </div>
                        @if($equipment->size)
                            <div class="spec-card rounded-xl p-4">
                                <div class="text-sm text-gray-500 mb-1">Ukuran</div>
                                <div class="font-semibold text-gray-900">{{ $equipment->size }}</div>
                            </div>
                        @endif
                        @if($equipment->weight)
                            <div class="spec-card rounded-xl p-4">
                                <div class="text-sm text-gray-500 mb-1">Berat</div>
                                <div class="font-semibold text-gray-900">{{ $equipment->weight }} kg</div>
                            </div>
                        @endif
                    </div>

                    <!-- Rental Terms -->
                    @if($equipment->rental_terms)
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                            <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Syarat & Ketentuan
                            </h4>
                            <p class="text-yellow-700 text-sm">{{ $equipment->rental_terms }}</p>
                        </div>
                    @endif

                    <!-- CTA Buttons -->
                    <div class="space-y-3">
                        @if($equipment->stock_available > 0)
                            <button class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white py-4 px-6 rounded-xl text-lg font-semibold transform hover:scale-105 transition duration-300 shadow-lg">
                                <span class="flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    Sewa Sekarang
                                </span>
                            </button>
                        @else
                            <button disabled class="w-full bg-gray-400 text-white py-4 px-6 rounded-xl text-lg font-semibold cursor-not-allowed">
                                Stok Habis
                            </button>
                        @endif
                        
                        <div class="grid grid-cols-2 gap-3">
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan {{ $equipment->name }}" 
                               class="bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-xl font-semibold text-center transition duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                WhatsApp
                            </a>
                            <button class="border-2 border-green-500 text-green-600 hover:bg-green-50 py-3 px-4 rounded-xl font-semibold transition duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Favorit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specifications -->
        @if($equipment->specifications)
            <div class="bg-white rounded-2xl shadow-lg p-8 mt-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Spesifikasi Lengkap</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($equipment->specifications as $key => $value)
                        <div class="spec-card rounded-xl p-4">
                            <div class="text-sm text-gray-500 mb-2 capitalize">{{ str_replace('_', ' ', $key) }}</div>
                            @if(is_array($value))
                                <ul class="text-gray-900 space-y-1">
                                    @foreach($value as $item)
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="font-semibold text-gray-900">{{ $value }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Related Equipment -->
        @if($relatedEquipments && $relatedEquipments->count() > 0)
            <div class="bg-white rounded-2xl shadow-lg p-8 mt-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Alat Serupa</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($relatedEquipments as $related)
                        <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
                            @if($related->images && count($related->images) > 0)
                                <img src="{{ $related->images[0] }}" 
                                     alt="{{ $related->name }}"
                                     class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">{{ $related->name }}</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-bold">Rp {{ number_format($related->price_per_day, 0, ',', '.') }}/hari</span>
                                    <a href="{{ route('equipments.show', $related->slug) }}" 
                                       class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                        Lihat →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Floating CTA -->
    @if($equipment->stock_available > 0)
        <div class="floating-cta md:hidden">
            <button class="text-white font-semibold flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Sewa Sekarang
            </button>
        </div>
    @endif
</div>

<script>
    // Image gallery functionality
    const images = @json($equipment->images ?? []);
    let currentImageIndex = 0;
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    // Thumbnail click handlers
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            currentImageIndex = index;
            updateMainImage();
            updateActiveThumbnail();
        });
    });

    // Navigation button handlers
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentImageIndex = currentImageIndex === 0 ? images.length - 1 : currentImageIndex - 1;
            updateMainImage();
            updateActiveThumbnail();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentImageIndex = currentImageIndex === images.length - 1 ? 0 : currentImageIndex + 1;
            updateMainImage();
            updateActiveThumbnail();
        });
    }

    function updateMainImage() {
        if (mainImage && images[currentImageIndex]) {
            mainImage.src = images[currentImageIndex];
        }
    }

    function updateActiveThumbnail() {
        thumbnails.forEach((thumbnail, index) => {
            if (index === currentImageIndex) {
                thumbnail.classList.add('active');
            } else {
                thumbnail.classList.remove('active');
            }
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' && images.length > 1) {
            currentImageIndex = currentImageIndex === 0 ? images.length - 1 : currentImageIndex - 1;
            updateMainImage();
            updateActiveThumbnail();
        } else if (e.key === 'ArrowRight' && images.length > 1) {
            currentImageIndex = currentImageIndex === images.length - 1 ? 0 : currentImageIndex + 1;
            updateMainImage();
            updateActiveThumbnail();
        }
    });
</script>
@endsection
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach($equipment->images as $index => $image)
                                        <button onclick="changeMainImage('{{ $image }}')" 
                                                class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden hover:opacity-75 {{ $index === 0 ? 'ring-2 ring-green-500' : '' }}">
                                            <img src="{{ $image }}" alt="{{ $equipment->name }}" class="w-full h-20 object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="aspect-w-1 aspect-h-1 bg-gray-300 flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $equipment->name }}</h1>
                        @if($equipment->is_featured)
                            <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-medium">
                                Unggulan
                            </span>
                        @endif
                    </div>
                    
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                            {{ $equipment->category->name }}
                        </span>
                        @if($equipment->brand)
                            <span class="text-gray-600 text-sm">{{ $equipment->brand }}</span>
                        @endif
                        <span class="text-xs px-2 py-1 rounded-full
                            {{ $equipment->condition == 'excellent' ? 'bg-green-100 text-green-800' : 
                               ($equipment->condition == 'good' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $equipment->condition == 'excellent' ? 'Sangat Baik' : 
                               ($equipment->condition == 'good' ? 'Baik' : 'Cukup') }}
                        </span>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <div class="flex items-baseline space-x-2">
                        <span class="text-4xl font-bold text-green-600">
                            Rp {{ number_format($equipment->price_per_day, 0, ',', '.') }}
                        </span>
                        <span class="text-lg text-gray-500">/ hari</span>
                    </div>
                    @if($equipment->security_deposit > 0)
                        <div class="text-sm text-gray-600 mt-1">
                            Jaminan: Rp {{ number_format($equipment->security_deposit, 0, ',', '.') }}
                        </div>
                    @endif
                </div>

                <!-- Availability -->
                <div class="mb-6">
                    <div class="flex items-center justify-between p-4 rounded-lg
                        {{ $equipment->stock_available > 0 ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200' }}">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 {{ $equipment->stock_available > 0 ? 'text-green-600' : 'text-red-600' }}" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($equipment->stock_available > 0)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                @endif
                            </svg>
                            <span class="font-medium {{ $equipment->stock_available > 0 ? 'text-green-800' : 'text-red-800' }}">
                                {{ $equipment->stock_available > 0 ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </div>
                        <span class="text-sm {{ $equipment->stock_available > 0 ? 'text-green-600' : 'text-red-600' }}">
                            Stok: {{ $equipment->stock_available }}
                        </span>
                    </div>
                </div>

                <!-- Basic Info -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    @if($equipment->size)
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-sm text-gray-600">Ukuran</div>
                            <div class="font-medium">{{ $equipment->size }}</div>
                        </div>
                    @endif
                    @if($equipment->weight)
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-sm text-gray-600">Berat</div>
                            <div class="font-medium">{{ $equipment->weight }} kg</div>
                        </div>
                    @endif
                    <div class="bg-gray-50 p-3 rounded">
                        <div class="text-sm text-gray-600">Min. Sewa</div>
                        <div class="font-medium">{{ $equipment->min_rental_days }} hari</div>
                    </div>
                    <div class="bg-gray-50 p-3 rounded">
                        <div class="text-sm text-gray-600">Max. Sewa</div>
                        <div class="font-medium">{{ $equipment->max_rental_days }} hari</div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="space-y-3">
                    @if($equipment->stock_available > 0)
                        <a href="{{ route('contact') }}" 
                           class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg text-lg font-semibold text-center block transition duration-200">
                            Sewa Sekarang
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo, saya tertarik untuk menyewa {{ $equipment->name }}" 
                           class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-lg text-center block transition duration-200">
                            WhatsApp
                        </a>
                    @else
                        <button disabled 
                                class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg text-lg font-semibold cursor-not-allowed">
                            Tidak Tersedia
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Description & Details -->
        <div class="mt-12 grid lg:grid-cols-3 gap-8">
            <!-- Description -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-700 leading-relaxed">{{ $equipment->description }}</p>
                    </div>

                    @if($equipment->specifications && count($equipment->specifications) > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Spesifikasi</h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($equipment->specifications as $key => $value)
                                    <div class="border-b border-gray-200 pb-2">
                                        <div class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>
                                        <div class="font-medium">
                                            @if(is_array($value))
                                                {{ implode(', ', $value) }}
                                            @else
                                                {{ $value }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($equipment->rental_terms)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Syarat & Ketentuan</h3>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <p class="text-gray-700">{{ $equipment->rental_terms }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Related Equipment -->
            <div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Peralatan Serupa</h3>
                    <div class="space-y-4">
                        @foreach($relatedEquipments as $related)
                            <a href="{{ route('equipments.show', $related) }}" 
                               class="block p-3 border rounded-lg hover:border-green-500 transition duration-200">
                                <div class="flex items-center space-x-3">
                                    @if($related->main_image)
                                        <img src="{{ $related->main_image }}" alt="{{ $related->name }}" 
                                             class="w-16 h-16 object-cover rounded">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $related->name }}</h4>
                                        <p class="text-sm text-gray-500">Rp {{ number_format($related->price_per_day, 0, ',', '.') }}/hari</p>
                                        <p class="text-xs text-gray-400">Stok: {{ $related->stock_available }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function changeMainImage(imageSrc) {
    document.getElementById('main-image').src = imageSrc;
    
    // Update active thumbnail
    const thumbnails = document.querySelectorAll('[onclick^="changeMainImage"]');
    thumbnails.forEach(thumb => thumb.classList.remove('ring-2', 'ring-green-500'));
    event.target.closest('button').classList.add('ring-2', 'ring-green-500');
}
</script>
@endpush
@endsection
