<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sewa Alat Hiking') - Mountain Gear Rental</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"/>
                        </svg>
                        <span class="text-xl font-bold text-gray-900">Mountain Gear</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'text-green-600 bg-green-50' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('equipments.index') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('equipments.*') ? 'text-green-600 bg-green-50' : '' }}">
                        Alat Hiking
                    </a>
                    <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-green-600 bg-green-50' : '' }}">
                        Kategori
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'text-green-600 bg-green-50' : '' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'text-green-600 bg-green-50' : '' }}">
                        Kontak
                    </a>
                </div>

                <!-- CTA Button -->
                <div class="flex items-center">
                    <a href="{{ route('filament.admin.auth.login') }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                        Admin Login
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="{{ route('equipments.index') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Alat Hiking</a>
                <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Kategori</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-4 xl:col-span-1">
                    <div class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"/>
                        </svg>
                        <span class="text-xl font-bold">Mountain Gear</span>
                    </div>
                    <p class="text-gray-300 text-sm max-w-md">
                        Penyedia alat hiking dan camping terlengkap dengan kualitas terbaik untuk petualangan outdoor Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.017 0C8.396 0 8.025.01 6.77.048 5.519.085 4.712.19 3.996.373c-.723.18-1.335.42-1.943.82-.608.4-1.126.918-1.526 1.543-.4.625-.64 1.237-.82 1.96-.183.716-.288 1.523-.325 2.774C.01 8.025 0 8.396 0 12.017c0 3.621.01 3.992.048 5.247.037 1.251.142 2.058.325 2.774.18.723.42 1.335.82 1.943.4.608.918 1.126 1.543 1.526.625.4 1.237.64 1.96.82.716.183 1.523.288 2.774.325 1.255.038 1.626.048 5.247.048 3.621 0 3.992-.01 5.247-.048 1.251-.037 2.058-.142 2.774-.325.723-.18 1.335-.42 1.943-.82.608-.4 1.126-.918 1.526-1.543.4-.625.64-1.237.82-1.96.183-.716.288-1.523.325-2.774.038-1.255.048-1.626.048-5.247 0-3.621-.01-3.992-.048-5.247-.037-1.251-.142-2.058-.325-2.774-.18-.723-.42-1.335-.82-1.943-.4-.608-.918-1.126-1.543-1.526-.625-.4-1.237-.64-1.96-.82-.716-.183-1.523-.288-2.774-.325C15.992.01 15.621 0 12.017 0zm0 2.16c3.584 0 4.015.014 5.432.052 1.31.06 2.023.277 2.496.46.628.244 1.077.536 1.548 1.007.471.471.763.92 1.007 1.548.183.473.4 1.186.46 2.496.038 1.417.052 1.848.052 5.432 0 3.584-.014 4.015-.052 5.432-.06 1.31-.277 2.023-.46 2.496-.244.628-.536 1.077-1.007 1.548-.471.471-.92.763-1.548 1.007-.473.183-1.186.4-2.496.46-1.417.038-1.848.052-5.432.052-3.584 0-4.015-.014-5.432-.052-1.31-.06-2.023-.277-2.496-.46-.628-.244-1.077-.536-1.548-1.007-.471-.471-.763-.92-1.007-1.548-.183-.473-.4-1.186-.46-2.496-.038-1.417-.052-1.848-.052-5.432 0-3.584.014-4.015.052-5.432.06-1.31.277-2.023.46-2.496.244-.628.536-1.077 1.007-1.548.471-.471.92-.763 1.548-1.007.473-.183 1.186-.4 2.496-.46 1.417-.038 1.848-.052 5.432-.052z"/>
                                <path d="M12.017 6.01c-3.311 0-6.007 2.696-6.007 6.007 0 3.311 2.696 6.007 6.007 6.007 3.311 0 6.007-2.696 6.007-6.007 0-3.311-2.696-6.007-6.007-6.007zm0 9.902c-2.147 0-3.895-1.748-3.895-3.895 0-2.147 1.748-3.895 3.895-3.895 2.147 0 3.895 1.748 3.895 3.895 0 2.147-1.748 3.895-3.895 3.895z"/>
                                <circle cx="18.406" cy="5.594" r="1.44"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Menu</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="{{ route('home') }}" class="text-base text-gray-300 hover:text-white">Beranda</a></li>
                                <li><a href="{{ route('equipments.index') }}" class="text-base text-gray-300 hover:text-white">Alat Hiking</a></li>
                                <li><a href="{{ route('categories.index') }}" class="text-base text-gray-300 hover:text-white">Kategori</a></li>
                                <li><a href="{{ route('about') }}" class="text-base text-gray-300 hover:text-white">Tentang Kami</a></li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Layanan</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-300 hover:text-white">Sewa Peralatan</a></li>
                                <li><a href="#" class="text-base text-gray-300 hover:text-white">Konsultasi</a></li>
                                <li><a href="#" class="text-base text-gray-300 hover:text-white">Delivery</a></li>
                                <li><a href="#" class="text-base text-gray-300 hover:text-white">Maintenance</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Kontak</h3>
                            <ul class="mt-4 space-y-4">
                                <li class="text-base text-gray-300">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        088224696350
                                    </div>
                                </li>
                                <li class="text-base text-gray-300">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        info@mountaingear.com
                                    </div>
                                </li>
                                <li class="text-base text-gray-300">
                                    <div class="flex items-start">
                                        <svg class="h-4 w-4 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Jl. Gunung Bromo No. 123<br>
                                        Malang, Jawa Timur
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Social Media</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="https://instagram.com/krissna_16" target="_blank" class="text-base text-gray-300 hover:text-white transition duration-300">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                            </svg>
                                            @krissna_16
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/6288224696350" target="_blank" class="text-base text-gray-300 hover:text-white transition duration-300">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                                            </svg>
                                            088224696350
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/Krisnaaa16" target="_blank" class="text-base text-gray-300 hover:text-white transition duration-300">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                            </svg>
                                            Krisnaaa16
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; {{ date('Y') }} Mountain Gear Rental. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    @stack('scripts')
</body>
</html>
