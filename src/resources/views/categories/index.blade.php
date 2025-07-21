@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    Kategori Peralatan Hiking
                </h1>
                <p class="mt-2 text-lg text-gray-600">
                    Pilih kategori sesuai kebutuhan petualangan Anda
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category) }}" 
               class="group bg-white rounded-lg shadow-md hover:shadow-lg transition duration-200 overflow-hidden">
                <div class="p-6">
                    <div class="text-center">
                        <!-- Icon -->
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 group-hover:bg-green-200 transition duration-200 mb-4">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-600 transition duration-200 mb-2">
                            {{ $category->name }}
                        </h3>
                        
                        <p class="text-sm text-gray-600 mb-4">
                            {{ $category->description }}
                        </p>
                        
                        <div class="text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                {{ $category->active_equipments_count }} peralatan
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        @if($categories->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kategori</h3>
                <p class="mt-1 text-sm text-gray-500">Kategori sedang dalam proses penambahan.</p>
            </div>
        @endif
    </div>
</div>
@endsection
