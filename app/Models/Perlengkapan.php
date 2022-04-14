<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    protected $table = 'tb_perlengkapan';
    protected $fillable = ['id_perlengkapan', 'nama_perlengkapan', 'id_kategori', 'deskripsi', 'stok', 'harga', 'sampul'];

    public function kategori_perlengkapan()
    {
        return $this->belongsTo('App\Models\KategoriPerlengkapan', 'id_kategori');
    }
}
