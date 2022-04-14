<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanTanaman extends Model
{
    protected $table = 'tb_penjualan_tanaman';
    protected $fillable = ['id_transaksi', 'id_costumer', 'id_tanaman', 'nama_tanaman', 'jumlah', 'total', 'tanggal'];

    public function costumer()
    {
        return $this->belongsTo('App\Models\Costumers', 'id_costumer');
    }

    public function tanaman()
    {
        return $this->belongsTo('App\Models\Tanaman', 'id_tanaman');
    }
}
