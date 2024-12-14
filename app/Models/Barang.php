<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Barang extends Model
{
    // protected $table = 'Barang';
    protected $fillable = [
        'img',
        'nama',
        'harga',
        'deskripsi',
        'stok',
        'kategori_id',
        'gudang_id',
        'pemasok_id',
        'notifikasi'
    ];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke model Gudang
    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }

    // Relasi ke model Pemasok
    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}
