<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tb_tanaman';
    protected $fillable = ['id_tanaman', 'nama_tanaman', 'id_kategori', 'deskripsi', 'stok', 'harga', 'sampul'];

    public function kategori_tanaman()
    {
        return $this->belongsTo('App\Models\KategoriTanaman', 'id_kategori');
    }
}
