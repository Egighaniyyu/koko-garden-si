<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerlengkapan extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori_perlengkapan';

    protected $primaryKey = 'id_kategori';

    protected $fillable = ['id_kategori', 'nama_kategori'];

    public function perlengkapan()
    {
        return $this->hasMany('App\Models\Perlengkapan');
    }
}
