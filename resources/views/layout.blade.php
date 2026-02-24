<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet"
    />

    <!-- STYLES & SCRIPTS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">

    <!-- ================= HEADER ================= -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-5">
        <div class="flex items-center justify-between h-16">

            <!-- LOGO -->
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center
                            bg-indigo-600 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="white"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="w-6 h-6"
                         viewBox="0 0 24 24">
                        <path d="M12 12c-1.3 0-2.5.8-3 2-.3.7-.1 1.5.4 2
                                 .7.7 1.6 1 2.6 1s1.9-.3 2.6-1
                                 c.5-.5.7-1.3.4-2-.5-1.2-1.7-2-3-2z"/>
                        <circle cx="5.5" cy="9.5" r="2.5"/>
                        <circle cx="8.5" cy="5.5" r="2.5"/>
                        <circle cx="15.5" cy="5.5" r="2.5"/>
                        <circle cx="18.5" cy="9.5" r="2.5"/>
                    </svg>
                </div>

                <span class="text-xl font-bold tracking-wide text-gray-800">
                    PETSHOP
                </span>
            </a>

            <!-- MENU -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="/"
                   class="relative text-gray-700 hover:text-indigo-600 transition
                          after:absolute after:-bottom-1 after:left-0 after:h-0.5
                          after:w-0 after:bg-indigo-600 after:transition-all
                          hover:after:w-full">
                    Home
                </a>

                <a href="/about"
                   class="relative text-gray-700 hover:text-indigo-600 transition
                          after:absolute after:-bottom-1 after:left-0 after:h-0.5
                          after:w-0 after:bg-indigo-600 after:transition-all
                          hover:after:w-full">
                    Tentang
                </a>

                <a href="/product"
                   class="relative text-gray-700 hover:text-indigo-600 transition
                          after:absolute after:-bottom-1 after:left-0 after:h-0.5
                          after:w-0 after:bg-indigo-600 after:transition-all
                          hover:after:w-full">
                    Produk
                </a>
            </nav>

            <!-- RIGHT ACTION -->
          <!-- RIGHT ACTION -->
<div class="flex items-center gap-3">

    <!-- CART -->
    <a href="{{ route('cart.index') }}"
       class="relative flex items-center justify-center
              text-gray-700 hover:text-indigo-600 transition
              w-10 h-10">

        <svg fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             class="w-6 h-6" viewBox="0 0 24 24">
            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4
                     M7 13L5.4 5M7 13l-2.293 2.293
                     c-.63.63-.184 1.707.707 1.707H17
                     m0 0a2 2 0 100 4 2 2 0 000-4
                     zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>

        @php
            $cartCount = count(session('cart', []));
        @endphp

        @if ($cartCount > 0)
            <span
                class="absolute -top-1 -right-1 bg-red-500 text-white
                       text-[10px] font-bold rounded-full
                       h-5 w-5 flex items-center justify-center
                       ring-2 ring-white">
                {{ $cartCount }}
            </span>
        @endif
    </a>

    <!-- LOGIN -->
    <a href="/admin"
       class="inline-flex items-center gap-2
              bg-indigo-600 text-white text-sm font-medium
              px-4 py-2 rounded-lg
              hover:bg-indigo-700 transition shadow
              whitespace-nowrap">
        Login
        <svg fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             class="w-4 h-4" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
    </a>

</div>


        </div>
    </div>
</header>


    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
   <footer class="bg-gradient-to-b from-gray-100 to-gray-200 text-gray-700 body-font mt-24">
    <div class="container mx-auto px-5 py-20">

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            <!-- BRAND -->
            <div>
                <div class="flex items-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="w-11 h-11 text-white p-2 bg-indigo-600 rounded-full shadow"
                         viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                    <span class="ml-3 text-2xl font-bold text-gray-900">
                        PETSHOP
                    </span>
                </div>

                <p class="text-sm leading-relaxed text-gray-600">
                    PETSHOP adalah toko perlengkapan hewan terpercaya yang
                    menyediakan produk berkualitas untuk kesehatan dan
                    kenyamanan hewan kesayangan Anda.
                </p>
            </div>

            <!-- MENU -->
            <div>
                <h3 class="text-gray-900 font-semibold mb-5 tracking-wide uppercase text-sm">
                    Navigasi
                </h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="/" class="hover:text-indigo-600 transition">Home</a></li>
                    <li><a href="/about" class="hover:text-indigo-600 transition">Tentang Toko</a></li>
                    <li><a href="/product" class="hover:text-indigo-600 transition">Produk</a></li>
                    <li>
                        <a href="{{ route('cart.index') }}" class="hover:text-indigo-600 transition">
                            Keranjang
                        </a>
                    </li>
                </ul>
            </div>

            <!-- LOKASI -->
            <div>
                <h3 class="text-gray-900 font-semibold mb-5 tracking-wide uppercase text-sm">
                    Lokasi Toko
                </h3>

                <ul class="text-sm space-y-2 mb-4">
                    <li>📍 Jl. Contoh Alamat No. 12</li>
                    <li>📞 0812-3456-7890</li>
                    <li>✉️ petshop@email.com</li>
                </ul>

                <div class="w-full h-44 rounded-xl overflow-hidden shadow-md border">
                    <iframe
                        class="w-full h-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q=Jakarta&output=embed">
                    </iframe>
                </div>
            </div>

            <!-- SUBSCRIBE -->
            <div>
                <h3 class="text-gray-900 font-semibold mb-5 tracking-wide uppercase text-sm">
                    Newsletter
                </h3>

                <p class="text-sm mb-4 text-gray-600">
                    Dapatkan promo dan informasi produk terbaru langsung ke email Anda.
                </p>

                <form
                    class="flex flex-col gap-3"
                >

                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Masukkan email Anda"
                        class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >

                    <button
                        type="submit"
                        class="bg-indigo-600 text-white py-2.5 rounded-lg
                               hover:bg-indigo-700 transition font-medium"
                    >
                        Berlangganan
                    </button>
                </form>

                @if(session('success'))
                    <p class="text-green-600 text-sm mt-3">
                        {{ session('success') }}
                    </p>
                @endif
            </div>

        </div>

        <!-- DIVIDER -->
        <div class="border-t border-gray-300 mt-16 pt-6
                    flex flex-col sm:flex-row items-center
                    justify-between text-sm">

            <p class="text-gray-500">
                © {{ date('Y') }} PETSHOP. All rights reserved.
            </p>

            <!-- SOSIAL MEDIA -->
            <div class="flex space-x-5 mt-4 sm:mt-0 text-gray-600">
                <a href="#" class="hover:text-indigo-600 transition">
                    <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7
                                 a1 1 0 011-1h3z"/>
                    </svg>
                </a>

                <a href="#" class="hover:text-indigo-600 transition">
                    <svg fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5"/>
                        <path d="M16 11.37A4 4 0 1112.63 8
                                 4 4 0 0116 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/>
                    </svg>
                </a>

                <a href="#" class="hover:text-indigo-600 transition">
                    <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53
                                 4.48 4.48 0 00-7.86 3v1
                                 A10.66 10.66 0 013 4
                                 s-4 9 5 13
                                 a11.64 11.64 0 01-7 2
                                 c9 5 20 0 20-11.5"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</footer>


</body>
</html>
