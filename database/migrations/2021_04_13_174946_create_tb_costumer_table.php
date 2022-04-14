<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCostumerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_costumer', function (Blueprint $table) {
            $table->increments('id_costumer');
            $table->string('nama', 25);
            $table->string('username', 15);
            $table->string('password', 8);
            $table->text('alamat');
            $table->string('no_hp', 13);
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
        Schema::dropIfExists('tb_costumer');
    }
}
