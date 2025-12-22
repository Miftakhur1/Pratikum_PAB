@extends('layout')

@section('content')

@php
    $produk = App\Models\Produk::first();
@endphp

<!-- ================= HERO PRODUK ================= -->
<section class="relative body-font text-gray-600 bg-gradient-to-r from-purple-50 to-indigo-50 overflow-hidden">
    <span class="absolute top-10 left-10 bg-purple-600 text-white
                 text-sm px-4 py-1 rounded-full shadow animate-pulse">
        Produk Unggulan
    </span>

    <div class="container mx-auto flex px-5 py-28 md:flex-row flex-col items-center">

        <!-- Gambar -->
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0
                    transform hover:scale-105 transition duration-500">
            <img class="object-cover object-center rounded-xl shadow-xl"
                 alt="hero"
                 src="{{ $produk->getFirstMediaUrl('gambar') }}">
        </div>

        <!-- Deskripsi -->
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16
                    flex flex-col md:items-start md:text-left
                    items-center text-center">

            <h1 class="title-font sm:text-5xl text-4xl mb-4 font-bold text-gray-900">
                {{ $produk->namabarang }}
            </h1>

            <p class="mb-8 leading-relaxed text-gray-600 max-w-xl">
                {{ $produk->produk_deskripsi_short }}
            </p>

            <div class="flex gap-4">
                <a href="/cart"
                   class="inline-flex text-white bg-purple-700
                          py-3 px-8 rounded-lg text-lg
                          hover:bg-purple-600 transition
                          shadow-md hover:shadow-xl">
                    Pesan Sekarang
                </a>

                <a href="{{ route('produk.detail', $produk->id) }}"
                   class="inline-flex text-purple-700 bg-white
                          py-3 px-8 rounded-lg text-lg
                          hover:bg-purple-100 transition shadow">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= DIVIDER ================= -->
<hr class="my-24 border-t-4 border-purple-100 w-1/3 mx-auto">

<!-- ================= LIST PRODUK (ZIG-ZAG) ================= -->
<section class="body-font text-gray-600">
    <div class="container px-1 py-15 mx-auto">

        @php
            $produks = App\Models\Produk::all();
        @endphp

        @foreach ($produks as $index => $produk)
        <div class="flex flex-col md:flex-row
                    {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }}
                    items-center gap-12 mb-24 group">

            <!-- Gambar + Overlay -->
            <div class="relative w-full md:w-1/2 overflow-hidden rounded-xl shadow-lg">
                <img src="{{ $produk->getFirstMediaUrl('gambar') }}"
                     alt="gambar produk"
                     class="w-full h-80 object-cover
                            transform group-hover:scale-110
                            transition duration-500">

                <div class="absolute inset-0 bg-black/50
                            flex items-center justify-center
                            opacity-0 group-hover:opacity-100
                            transition duration-300">
                    <a href="{{ route('produk.detail', $produk->id) }}"
                       class="bg-white text-purple-700 px-6 py-3 rounded-lg
                              font-semibold hover:bg-purple-100 transition">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Konten -->
            <div class="md:w-1/2 hover:-translate-y-2 transition duration-300">
                <span class="inline-block mb-3 px-3 py-1 text-xs font-semibold
                             rounded-full bg-purple-100 text-purple-700">
                    {{ $produk->kategori ?? 'Best Seller' }}
                </span>

                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    {{ $produk->namabarang }}
                </h2>

                <p class="text-gray-600 leading-relaxed max-w-lg">
                    {{ $produk->produk_deskripsi_short }}
                </p>

                <div class="flex items-center justify-between mt-6 max-w-lg">
                    <span class="text-sm text-gray-400">
                        {{ now()->format('d M Y') }}
                    </span>

                    <a href="{{ route('produk.detail', $produk->id) }}"
                       class="text-purple-600 font-semibold
                              hover:text-purple-800 inline-flex items-center transition">
                        Learn More
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</section>

@endsection
