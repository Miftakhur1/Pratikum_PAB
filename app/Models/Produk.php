<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    protected $fillable = ['namabarang', 'kodebarang','tanggal_masuk', 'quantity','price'];
    protected $table = 'produks';
}
