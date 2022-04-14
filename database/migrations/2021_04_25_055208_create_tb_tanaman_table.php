<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tanaman', function (Blueprint $table) {
            $table->increments('id_tanaman');
            $table->string('nama_tanaman', 15);
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori_tanaman');
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
        Schema::dropIfExists('tb_tanaman');
    }
}
