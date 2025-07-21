@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-green-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Tentang Mountain Gear</h1>
                <p class="text-xl max-w-2xl mx-auto">
                    Menyediakan peralatan hiking berkualitas tinggi untuk petualangan outdoor yang aman dan menyenangkan
                </p>
            </div>
        </div>
    </div>

    <!-- Story Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Cerita Kami</h2>
                <div class="prose prose-lg text-gray-600">
                    <p class="mb-4">
                        Mountain Gear didirikan pada tahun 2015 dengan visi sederhana: membuat petualangan outdoor lebih accessible bagi semua orang. Kami memahami bahwa tidak semua orang memiliki peralatan hiking lengkap, terutama untuk mereka yang baru memulai atau hanya sesekali melakukan aktivitas outdoor.
                    </p>
                    <p class="mb-4">
                        Berawal dari pengalaman pribadi pendiri kami yang sering kesulitan mencari peralatan berkualitas dengan harga terjangkau, kami berkomitmen untuk menyediakan layanan rental peralatan hiking dengan standar kualitas dan keamanan yang tinggi.
                    </p>
                    <p>
                        Hingga saat ini, Mountain Gear telah melayani ribuan petualang dan menjadi partner terpercaya untuk berbagai ekspedisi, mulai dari day hiking hingga pendakian gunung berhari-hari.
                    </p>
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Visi & Misi</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-medium text-gray-900">Visi</h4>
                            <p class="text-gray-600">Menjadi penyedia layanan rental peralatan outdoor terdepan di Indonesia</p>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Misi</h4>
                            <ul class="text-gray-600 space-y-1">
                                <li>• Menyediakan peralatan berkualitas tinggi</li>
                                <li>• Memberikan layanan terbaik kepada pelanggan</li>
                                <li>• Mendukung komunitas outdoor Indonesia</li>
                                <li>• Mempromosikan aktivitas outdoor yang aman</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-lg text-gray-600">Prinsip yang memandu setiap langkah perjalanan kami</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Kualitas</h3>
                    <p class="text-gray-600">Kami hanya menyediakan peralatan dari brand terpercaya yang telah teruji kualitasnya</p>
                </div>

                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Layanan</h3>
                    <p class="text-gray-600">Pelayanan ramah dan profesional adalah prioritas utama dalam setiap interaksi</p>
                </div>

                <div class="text-center">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Keamanan</h3>
                    <p class="text-gray-600">Keselamatan petualang adalah tanggung jawab kami melalui peralatan yang terawat</p>
                </div>

                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Komunitas</h3>
                    <p class="text-gray-600">Membangun dan mendukung komunitas outdoor yang solid dan berkelanjutan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tim Kami</h2>
                <p class="text-lg text-gray-600">Orang-orang berpengalaman yang siap membantu petualangan Anda</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-300 h-64 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Ahmad Fauzi</h3>
                        <p class="text-green-600 mb-2">Founder & CEO</p>
                        <p class="text-gray-600 text-sm">Pendaki berpengalaman 15+ tahun dengan rekam jejak pendakian 7 summits Indonesia</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-300 h-64 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Sarah Wijaya</h3>
                        <p class="text-green-600 mb-2">Operations Manager</p>
                        <p class="text-gray-600 text-sm">Expert dalam manajemen logistik dan maintenance peralatan outdoor</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-300 h-64 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Rahman Hidayat</h3>
                        <p class="text-green-600 mb-2">Customer Service</p>
                        <p class="text-gray-600 text-sm">Siap membantu konsultasi dan rekomendasi peralatan sesuai kebutuhan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-green-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">5000+</div>
                    <div class="text-green-100">Pelanggan Puas</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-green-100">Peralatan Berkualitas</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">8+</div>
                    <div class="text-green-100">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">50+</div>
                    <div class="text-green-100">Gunung Terjamah</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
