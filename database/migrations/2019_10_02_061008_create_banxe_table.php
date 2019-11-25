<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanxeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banxe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('giaban');
            $table->integer('duatruoc');
            $table->integer('conlai');
            $table->integer('tinhtrang');
            $table->string('Hovaten');
            $table->dateTime('ngaysinh');
            $table->string('SDT');
            $table->string('ngaymua');
            $table->string('diachi');
            $table->string('phuong');
            $table->string('thanhpho');
            $table->string('tinh');
            $table->unsignedBigInteger('thongtinxe_id');
            $table->unsignedBigInteger('kho_id');
            $table->unsignedBigInteger('tragop_id');
            $table->unsignedBigInteger('nhanvien_id');
            $table->unsignedBigInteger('quatang_id');
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
        Schema::dropIfExists('banxe');
    }
}
