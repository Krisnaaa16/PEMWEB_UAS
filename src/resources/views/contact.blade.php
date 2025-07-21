@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="bg-gray-50">
    <!-- Header -->
    <div class="bg-green-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-xl max-w-2xl mx-auto">
                    Siap membantu Anda merencanakan petualangan outdoor yang tak terlupakan
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>
                
                <div class="space-y-6">
                    <!-- Location -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Alamat</h3>
                            <p class="text-gray-600">
                                Jl. Gunung Bromo No. 123<br>
                                Malang, Jawa Timur 65141<br>
                                Indonesia
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Telepon</h3>
                            <p class="text-gray-600">088224696350</p>
                            <p class="text-gray-600">+62 882-2469-6350 (WhatsApp)</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                            <p class="text-gray-600">info@mountaingear.com</p>
                            <p class="text-gray-600">rental@mountaingear.com</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Jam Operasional</h3>
                            <div class="text-gray-600 space-y-1">
                                <p>Senin - Jumat: 08:00 - 17:00</p>
                                <p>Sabtu: 08:00 - 15:00</p>
                                <p>Minggu: 09:00 - 12:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-8 space-y-4">
                    <a href="https://wa.me/6288224696350" 
                       class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg flex items-center justify-center space-x-2 transition duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.087"/>
                        </svg>
                        <span>Chat WhatsApp</span>
                    </a>
                    
                    <!-- Social Media Section -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <!-- Instagram -->
                            <a href="https://instagram.com/krissna_16" target="_blank" 
                               class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-3 rounded-lg flex items-center space-x-2 transition duration-200 flex-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <span class="text-sm">@krissna_16</span>
                            </a>
                            
                            <!-- GitHub -->
                            <a href="https://github.com/Krisnaaa16" target="_blank" 
                               class="bg-gray-800 hover:bg-gray-900 text-white p-3 rounded-lg flex items-center space-x-2 transition duration-200 flex-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                <span class="text-sm">Krisnaaa16</span>
                            </a>
                        </div>
                    </div>
                    
                    <a href="tel:+6281234567890" 
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg flex items-center justify-center space-x-2 transition duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Telepon Sekarang</span>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
                
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" id="phone" name="phone"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <select id="subject" name="subject" required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="">Pilih Subjek</option>
                            <option value="rental">Rental Peralatan</option>
                            <option value="consultation">Konsultasi</option>
                            <option value="complaint">Keluhan</option>
                            <option value="suggestion">Saran</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"
                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-md font-semibold transition duration-200">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="bg-gray-200 h-96">
        <div class="h-full flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <p class="text-gray-600">Peta Lokasi</p>
                <p class="text-sm text-gray-500">Jl. Gunung Bromo No. 123, Malang</p>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>
                <p class="text-lg text-gray-600">Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-6">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Bagaimana cara menyewa peralatan?</h3>
                    <p class="text-gray-600">Anda dapat menyewa melalui WhatsApp, telepon, atau datang langsung ke toko kami. Tim kami akan membantu proses booking dan memberikan konsultasi sesuai kebutuhan.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Berapa lama minimal sewa?</h3>
                    <p class="text-gray-600">Minimal sewa adalah 1 hari, namun beberapa peralatan khusus memiliki minimal sewa yang berbeda sesuai dengan spesifikasinya.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Apakah ada jaminan yang diperlukan?</h3>
                    <p class="text-gray-600">Ya, setiap penyewaan memerlukan jaminan sesuai dengan nilai peralatan. Jaminan akan dikembalikan setelah peralatan dikembalikan dalam kondisi baik.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Apakah tersedia layanan antar-jemput?</h3>
                    <p class="text-gray-600">Ya, kami menyediakan layanan antar-jemput untuk area Malang dan sekitarnya dengan biaya tambahan sesuai jarak.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
