<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPerlengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_perlengkapan', function (Blueprint $table) {
            $table->increments('id_perlengkapan');
            $table->string('nama_perlengkapan', 15);
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori_perlengkapan');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->integer('harga');
            $table->string('sampul', 255);
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
        Schema::dropIfExists('tb_perlengkapan');
    }
}
