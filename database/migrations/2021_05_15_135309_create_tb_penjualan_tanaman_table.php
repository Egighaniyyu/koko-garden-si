<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenjualanTanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penjualan_tanaman', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_costumer');
            $table->foreign('id_costumer')->references('id_costumer')->on('tb_costumer');
            $table->unsignedInteger('id_tanaman');
            $table->foreign('id_tanaman')->references('id_tanaman')->on('tb_tanaman');
            $table->string('nama_tanaman', 15);
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_penjualan_tanaman');
    }
}
