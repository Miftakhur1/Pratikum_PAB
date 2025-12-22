<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Model 'Produk' untuk mempermudah pemanggilan
use App\Models\Produk;

// Nama kelas diperbaiki dari 'ProdukControlerr' menjadi 'ProdukController'
class ProdukController extends Controller
{
    /**
     * Menampilkan detail produk berdasarkan ID yang diterima dari request.
     */
    public function detail(Request $request)
    {
        // Mencari data produk menggunakan Model 'Produk'
        // \App\Models\Produk::find(...) diubah menjadi Produk::find(...)
        $produk = Produk::find($request->id);
        
        // Mengembalikan view 'produk.detail' dan menyertakan data $produk
        // Data $produk tersedia di view dengan nama variabel yang sama: $produk
        return view('produk.detail', compact('produk'));
    }
}