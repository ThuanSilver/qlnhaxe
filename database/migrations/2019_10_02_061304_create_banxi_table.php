<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanxiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banxi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('soHD');
            $table->integer('gianhap');
            $table->string('tinhtrang');
            $table->integer('giaban');
            $table->string('noixuat');
            $table->dateTime('ngayxuat');
            $table->unsignedBigInteger('kho_id');
            $table->unsignedBigInteger('thongtinxe_id');
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
        Schema::dropIfExists('banxi');
    }
}
