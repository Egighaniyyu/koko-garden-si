<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanPerlengkapan extends Model
{
    protected $table = 'tb_penjualan_perlengkapan';
    protected $fillable = ['id_transaksi', 'id_costumer', 'id_perlengkapan', 'nama_perlengkapan', 'jumlah', 'total', 'tanggal'];

    public function costumer()
    {
        return $this->belongsTo('App\Models\Costumers', 'id_costumer');
    }

    public function perlengkapan()
    {
        return $this->belongsTo('App\Models\Perlengkapan', 'id_perlengkapan');
    }
}
