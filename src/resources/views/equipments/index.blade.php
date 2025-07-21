@extends('layouts.app')

@section('title', 'Alat Hiking')

@section('content')
<div class="bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Alat Hiking & Camping
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $equipments->total() }} peralatan tersedia
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            <!-- Filters Sidebar -->
            <div class="hidden lg:block">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Filter</h3>
                    
                    <form method="GET" action="{{ route('equipments.index') }}">
                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cari</label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Nama peralatan..." 
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga per Hari</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" 
                                       placeholder="Min" 
                                       class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                <input type="number" name="max_price" value="{{ request('max_price') }}" 
                                       placeholder="Max" 
                                       class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>

                        <!-- Condition -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                            <select name="condition" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="">Semua Kondisi</option>
                                <option value="excellent" {{ request('condition') == 'excellent' ? 'selected' : '' }}>Sangat Baik</option>
                                <option value="good" {{ request('condition') == 'good' ? 'selected' : '' }}>Baik</option>
                                <option value="fair" {{ request('condition') == 'fair' ? 'selected' : '' }}>Cukup</option>
                            </select>
                        </div>

                        <!-- Availability -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="available_only" value="1" 
                                       {{ request('available_only') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Hanya yang tersedia</span>
                            </label>
                        </div>

                        <button type="submit" 
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-200">
                            Terapkan Filter
                        </button>
                        
                        @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'condition', 'available_only']))
                            <a href="{{ route('equipments.index') }}" 
                               class="mt-2 w-full bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-md transition duration-200 block text-center">
                                Reset Filter
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Equipment Grid -->
            <div class="lg:col-span-3">
                <!-- Sort -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <form method="GET" action="{{ route('equipments.index') }}" class="flex items-center justify-between">
                        @foreach(request()->except('sort') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        
                        <div class="flex items-center space-x-4">
                            <label class="text-sm font-medium text-gray-700">Urutkan:</label>
                            <select name="sort" onchange="this.form.submit()" 
                                    class="border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z-A</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            </select>
                        </div>
                        
                        <div class="text-sm text-gray-500">
                            {{ $equipments->firstItem() }}-{{ $equipments->lastItem() }} dari {{ $equipments->total() }}
                        </div>
                    </form>
                </div>

                @if($equipments->count() > 0)
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($equipments as $equipment)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                            <div class="relative">
                                @if($equipment->main_image)
                                    <img src="{{ $equipment->main_image }}" alt="{{ $equipment->name }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                @if($equipment->is_featured)
                                    <span class="absolute top-2 left-2 bg-yellow-400 text-gray-900 px-2 py-1 rounded text-xs font-medium">
                                        Unggulan
                                    </span>
                                @endif
                                
                                <span class="absolute top-2 right-2 px-2 py-1 rounded text-xs font-medium
                                    {{ $equipment->stock_available > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $equipment->stock_available > 0 ? 'Tersedia' : 'Habis' }}
                                </span>
                            </div>
                            
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $equipment->name }}</h3>
                                    <span class="text-xs px-2 py-1 rounded-full
                                        {{ $equipment->condition == 'excellent' ? 'bg-green-100 text-green-800' : 
                                           ($equipment->condition == 'good' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ $equipment->condition == 'excellent' ? 'Sangat Baik' : 
                                           ($equipment->condition == 'good' ? 'Baik' : 'Cukup') }}
                                    </span>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-2">{{ $equipment->category->name }}</p>
                                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($equipment->description, 100) }}</p>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-2xl font-bold text-green-600">
                                            Rp {{ number_format($equipment->price_per_day, 0, ',', '.') }}
                                        </span>
                                        <span class="text-sm text-gray-500">/hari</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm text-gray-500">Stok: {{ $equipment->stock_available }}</div>
                                        @if($equipment->brand)
                                            <div class="text-xs text-gray-400">{{ $equipment->brand }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <a href="{{ route('equipments.show', $equipment) }}" 
                                   class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md text-center block transition duration-200">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $equipments->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow p-12 text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada peralatan ditemukan</h3>
                        <p class="text-gray-500 mb-4">Coba ubah filter pencarian Anda</p>
                        <a href="{{ route('equipments.index') }}" 
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition duration-200">
                            Reset Pencarian
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
