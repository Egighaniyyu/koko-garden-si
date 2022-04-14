<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAdministratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_administrator', function (Blueprint $table) {
            $table->increments('id_administrator');
            $table->string('nama', 25);
            $table->string('username', 15);
            $table->string('email', 25);
            $table->string('password', 8);
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
        Schema::dropIfExists('tb_administrator');
    }
}
