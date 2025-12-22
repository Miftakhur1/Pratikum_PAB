<?php

namespace App\Models;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    protected $fillable = ['namabarang', 'kodebarang','tanggal_masuk', 'quantity','price', 'produk_deskripsi_short', 'produk_deskripsi_long'];
    protected $table = 'produks';
    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'produk_kategoris', 'produk_id', 'kategori_id');

    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'produk_tags', 'produk_id', 'tags_id');
    }
}
