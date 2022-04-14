<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenjualanPerlengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penjualan_perlengkapan', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_costumer');
            $table->foreign('id_costumer')->references('id_costumer')->on('tb_costumer');
            $table->unsignedInteger('id_perlengkapan');
            $table->foreign('id_perlengkapan')->references('id_perlengkapan')->on('tb_perlengkapan');
            $table->string('nama_perlengkapan', 15);
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
        Schema::dropIfExists('tb_penjualan_perlengkapan');
    }
}
