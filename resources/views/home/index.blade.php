@extends('layout')

@section('content')

<section class="relative bg-white overflow-hidden">
    <!-- Background blur -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-tr from-purple-50 to-indigo-50 opacity-70 blur-3xl"></div>

    <div class="container mx-auto px-5 py-24 relative z-10">
        @if($produkUnggulan)
        <div class="flex flex-col md:flex-row items-center gap-16">

            <!-- IMAGE -->
            <div class="md:w-1/2 relative group flex justify-center">
                <div class="absolute -inset-6 bg-gradient-to-tr from-purple-500 to-indigo-500 rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition duration-700"></div>

                <img
                    src="{{ $produkUnggulan->getFirstMediaUrl('gambar') }}"
                    alt="{{ $produkUnggulan->namabarang }}"
                    class="relative w-72 md:w-80 rounded-2xl shadow-2xl object-cover transition-transform duration-500 group-hover:scale-105"
                >

            </div>

            <!-- CONTENT -->
            <div class="md:w-1/2 text-center md:text-left">
                <span class="inline-block mb-4 px-4 py-1 rounded-full bg-purple-100 text-purple-600 text-xs font-bold tracking-widest">
                    🔥 HOT DEAL MINGGU INI
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6 capitalize leading-tight">
                    {{ $produkUnggulan->namabarang }}
                </h1>

                <p class="text-gray-500 text-lg mb-8 max-w-xl mx-auto md:mx-0">
                    {{ $produkUnggulan->produk_deskripsi_short }}
                </p>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produkUnggulan->id }}">

                    <div class="flex flex-col sm:flex-row items-center gap-6 mb-8 justify-center md:justify-start">
                        <!-- Quantity -->
                        <div class="flex items-center border border-gray-300 rounded-full px-5 py-2">
                            <span class="text-gray-400 text-sm mr-3">Jumlah</span>
                            <input
                                type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                class="w-14 text-center bg-transparent font-bold text-gray-900 focus:outline-none"
                            >
                        </div>

                        <!-- Price -->
                        <div class="text-3xl font-black text-gray-900">
                            <span class="text-3xl font-black text-gray-900">
                        Rp {{ number_format($produkUnggulan->price, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-400 line-through">
                        Rp {{ number_format($produkUnggulan->price * 1.15, 0, ',', '.') }}
                    </span>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full text-sm"
                    >
                        Tambah ke Keranjang
                    </button>
                    <!-- whatsapp -->
                    <a
                            href="https://wa.me/6289512848205?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($produkUnggulan->namabarang) }}"
                            target="_blank"
                            class="ml-4 inline-block bg-green-400 hover:bg-green-500 text-white font-bold py-3 px-6 rounded-full text-sm"
                        >
                            Chat via WhatsApp
                    </a>
                </form>
            </div>

        </div>
        @endif
    </div>
</section>

<div class="container mx-auto px-5 pt-20">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="text-xs text-purple-500 tracking-widest font-medium title-font mb-1">KATALOG TERBARU</h2>
        <h1 class="sm:text-3xl text-2xl font-bold title-font text-gray-900">Koleksi Perlengkapan Anabul</h1>
        <div class="h-1 w-20 bg-purple-500 rounded mx-auto mt-2"></div>
    </div>
</div>

<section class="body-font text-gray-600 pb-24">
    <div class="container px-5 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            @foreach ($produks as $index => $produk)
            <div class="flex flex-col items-center group bg-gray-50 rounded-3xl p-6 transition-all hover:bg-white hover:shadow-xl border border-transparent hover:border-purple-100">
                
                <div class="w-full h-72 mb-6 overflow-hidden rounded-2xl relative">
                    <img src="{{ $produk->getFirstMediaUrl('gambar') }}"
                         alt="gambar produk"
                         class="w-full h-full object-cover ">
                    
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg">
                        <span class="text-purple-700 font-bold">Rp {{ number_format($produk->price, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="w-full text-left">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-full bg-purple-600 text-white">
                            {{ $produk->kategori ?? 'Premium' }}
                        </span>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 group-hover:text-purple-600 transition mb-3">
                        {{ $produk->namabarang }}
                    </h2>

                    <p class="text-gray-500 line-clamp-2 mb-6 italic text-sm">
                        "{{ $produk->produk_deskripsi_short }}"
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{ route('produk.detail', $produk->id) }}"
                           class="text-gray-900 font-bold text-sm hover:underline flex items-center">
                            Detail Produk
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <button type="submit" class="p-3 bg-white border border-gray-200 rounded-xl hover:bg-purple-50 hover:border-purple-200 transition">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection