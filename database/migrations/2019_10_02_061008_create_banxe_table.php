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
            $table->string('sohd');
            $table->integer('giaban');
            $table->integer('duatruoc');
            $table->integer('conlai');
            $table->string('tinhtrang');
            $table->unsignedBigInteger('khachhang_id');
            $table->string('ngaymua');
            $table->string('baohiem');
            $table->string('uyquyen');
            $table->string('lamvang');
            $table->integer('muabh');
            $table->integer('aomua');
            $table->integer('mockhoa');
            $table->integer('aotrumxe');
            $table->integer('balo');
            $table->integer('tiengop');
            $table->unsignedBigInteger('thongtinxe_id');
            $table->unsignedBigInteger('kho_id');
            $table->unsignedBigInteger('tragop_id');
            $table->unsignedBigInteger('nhanvien_id');

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
