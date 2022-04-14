<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriTanaman extends Model
{
    protected $table = 'tb_kategori_tanaman';
    protected $primaryKey = 'id_kategori';

    protected $fillable = ['nama_kategori'];

    public function tanaman()
    {
        return $this->hasMany('App\Models\Tanaman');
    }
}
