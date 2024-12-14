<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $fillable = [
        'nama',
        'telp',
        'alamat',
    ];

    public function barang(){
        return $this->hasMany(Barang::class);
    }
}
