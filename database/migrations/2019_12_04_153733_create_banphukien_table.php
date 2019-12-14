<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanphukienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khophukien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenkho');
            $table->string('dia_diem');
            $table->string('tenphukien');
            $table->integer('soluongton');
            $table->string('nhap');
            $table->date('ngaynhap');
            $table->integer('conlai');
            $table->unsignedBigInteger('banphukien_id')->unsigned();
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
        Schema::dropIfExists('banphukien');
    }
}
