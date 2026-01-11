<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'produkUnggulan' => Produk::latest()->first(),
            'produks' => Produk::latest()->get(),
        ]);
    }
}
