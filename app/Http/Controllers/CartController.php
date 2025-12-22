<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        // VALIDASI: menyesuaikan dengan input form (produk_id)
        $request->validate([
            'produk_id' => 'required|exists:produks,id'
        ]);

        // ambil produk berdasarkan id
        $produk = Produk::findOrFail($request->produk_id);

        // ambil session cart
        $cart = session()->get('cart', []);

        // cek apakah produk sudah ada di cart
        if (isset($cart[$produk->id])) {
            // tambah quantity
            $cart[$produk->id]['quantity'] += 1;
        } else {
            // tambah produk baru ke cart
            $cart[$produk->id] = [
                'produk_id' => $produk->id,
                'namabarang' => $produk->namabarang,
                'price' => $produk->price,
                'quantity' => 1,
                'image' => $produk->getFirstMediaUrl('gambar'),
            ];
        }

        // simpan ke sesi
        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->produk_id])) {
            $cart[$request->produk_id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'produk_id' => 'required'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->produk_id])) {
            unset($cart[$request->produk_id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan!');
    }
}
