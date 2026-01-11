@extends('layout')

@section('content')
<section class="relative bg-white overflow-hidden">

    <!-- BACKGROUND ATMOSPHERE -->
    <div class="absolute -top-40 -left-40 w-[600px] h-[600px] bg-purple-200 rounded-full blur-[120px] opacity-30"></div>
    <div class="absolute -bottom-40 -right-40 w-[600px] h-[600px] bg-indigo-200 rounded-full blur-[120px] opacity-30"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 space-y-40">

        <!-- HERO -->
        <div class="text-center max-w-4xl mx-auto">
            <span class="inline-block mb-6 px-5 py-2 text-xs font-bold tracking-[0.25em]
                         text-purple-700 bg-purple-100 rounded-full">
                TENTANG PETSHOP KAMI
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-gray-900">
                Setiap Anabul<br>
                <span class="text-purple-600">Pantas Dirawat dengan Penuh Cinta</span>
            </h1>

            <p class="mt-8 text-lg md:text-xl text-gray-600 leading-relaxed">
                Kami hadir bukan hanya untuk menjual produk,
                tetapi untuk menemani setiap perjalanan perawatan
                anabul kesayangan Anda — dari hari pertama hingga seterusnya.
            </p>
        </div>

        <!-- MANIFESTO + TIMELINE (DIGABUNG) -->
        <div class="max-w-5xl mx-auto">
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl
                        border border-gray-100 p-12 md:p-16 space-y-16">

                <!-- MANIFESTO -->
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">
                        Manifesto Kami
                    </h2>

                    <p class="text-gray-700 text-lg leading-loose">
                        Kami percaya bahwa merawat hewan adalah bentuk tanggung jawab moral.
                        Setiap produk yang kami sediakan dipilih melalui pertimbangan panjang,
                        bukan tren sesaat—karena kepercayaan Anda adalah hal yang tidak bisa ditawar.
                    </p>
                </div>

                <!-- TIMELINE -->
                <div class="space-y-10">
                    <div class="flex gap-6">
                        <div class="w-3 h-3 mt-2 bg-purple-600 rounded-full"></div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Awal Mula</h4>
                            <p class="text-gray-600">
                                Berawal dari pengalaman pribadi mencari produk hewan
                                yang benar-benar aman dan dapat dipercaya.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-3 h-3 mt-2 bg-purple-600 rounded-full"></div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Proses Kurasi</h4>
                            <p class="text-gray-600">
                                Setiap produk kami evaluasi dari kandungan,
                                manfaat, hingga dampaknya bagi kesehatan anabul.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-3 h-3 mt-2 bg-purple-600 rounded-full"></div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Hari Ini</h4>
                            <p class="text-gray-600">
                                Kami tumbuh menjadi partner perawatan
                                bagi pemilik hewan yang peduli dan bertanggung jawab.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- VALUES + HOW WE WORK (DIGABUNG) -->
        <div class="space-y-28">

            <!-- VALUES -->
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-16">
                    Nilai yang Kami Pegang
                </h2>

                <div class="grid md:grid-cols-3 gap-12">
                    <div class="bg-white rounded-2xl p-8 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-3">Kualitas Nyata</h3>
                        <p class="text-gray-600">
                            Kami tidak menjual produk hanya karena populer.
                            Setiap item harus aman dan bermanfaat jangka panjang.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-3">Empati</h3>
                        <p class="text-gray-600">
                            Setiap hewan unik. Kami mendengarkan kebutuhan Anda
                            dan anabul Anda secara personal.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-3">Tanggung Jawab</h3>
                        <p class="text-gray-600">
                            Kepercayaan Anda adalah amanah
                            yang kami jaga dalam setiap keputusan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- HOW WE WORK -->
            <div class="max-w-5xl mx-auto">
                <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-16">
                    Cara Kami Bekerja
                </h2>

                <div class="grid md:grid-cols-4 gap-10 text-center text-sm">
                    <div>
                        <span class="font-bold text-gray-900">01</span>
                        <p class="text-gray-600 mt-2">Seleksi produsen terpercaya</p>
                    </div>
                    <div>
                        <span class="font-bold text-gray-900">02</span>
                        <p class="text-gray-600 mt-2">Evaluasi manfaat & risiko</p>
                    </div>
                    <div>
                        <span class="font-bold text-gray-900">03</span>
                        <p class="text-gray-600 mt-2">Rekomendasi yang relevan</p>
                    </div>
                    <div>
                        <span class="font-bold text-gray-900">04</span>
                        <p class="text-gray-600 mt-2">Pendampingan berkelanjutan</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- BRAND PROMISE (PENUTUP HALUS) -->
        <div class="text-center bg-gray-50 border border-gray-200 rounded-2xl px-10 py-20">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                Janji Kami untuk Anda & Anabul
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Kami berkomitmen menghadirkan produk yang aman, sehat,
                dan nyaman—dipilih dengan standar kualitas terbaik.
            </p>

            <a href="/product"
               class="inline-flex items-center gap-2 text-indigo-600 font-semibold
                      hover:text-indigo-700 transition">
                Jelajahi Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>
</section>
@endsection
