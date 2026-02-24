@extends('layout')

@section('content')
<div class="bg-gray-50 min-h-screen pb-24">

    <!-- HEADER -->
    <div class="bg-gradient-to-br from-purple-50 to-white">
        <div class="container mx-auto px-5 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Semua Produk Kami
            </h1>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg">
                Pilihan perlengkapan dan nutrisi terbaik untuk kesehatan dan kebahagiaan anabul kesayangan Anda.
            </p>
            <div class="h-1 w-24 bg-purple-500 rounded-full mx-auto mt-6"></div>
        </div>
    </div>

    <!-- GRID PRODUK -->
    <div class="container mx-auto px-5 mt-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            @forelse ($produks as $produk)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col">

                    <!-- IMAGE -->
                    <div class="relative overflow-hidden aspect-square">
                        <img
                            src="{{ str_replace('http://', 'https://', $produk->getFirstMediaUrl('gambar')) }}"
                            alt="{{ $produk->namabarang }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                        >

                        <!-- BADGE -->
                        <span class="absolute top-4 left-4 bg-purple-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow">
                            {{ $produk->kategori ?? 'Produk' }}
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-purple-600 transition mb-2 line-clamp-1">
                            {{ $produk->namabarang }}
                        </h3>

                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                            {{ $produk->produk_deskripsi_short }}
                        </p>

                        <div class="mt-auto">
                            <div class="text-2xl font-extrabold text-gray-900 mb-5">
                                Rp {{ number_format($produk->price, 0, ',', '.') }}
                            </div>

                            <!-- ACTION -->
                            <div class="flex gap-3">
                                <a href="{{ route('produk.detail', $produk->id) }}"
                                   class="flex-1 text-center py-2.5 rounded-xl border border-gray-200 text-sm font-semibold hover:bg-gray-100 transition">
                                    Detail
                                </a>

                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button
                                        type="submit"
                                        class="p-3 rounded-xl bg-purple-600 hover:bg-purple-700 text-white transition shadow-md shadow-purple-200"
                                        title="Tambah ke keranjang"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center">
                    <img src="https://illustrations.popsy.co/purple/searching.svg"
                         class="w-48 mx-auto mb-6"
                         alt="Empty">
                    <h3 class="text-xl font-bold text-gray-400">
                        Belum ada produk tersedia
                    </h3>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
