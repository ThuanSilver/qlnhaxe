<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('ngaymua');
            $table->integer('giaban');
            $table->integer('tienno');
            $table->integer('tratruoc');
            $table->date('date1')->nullable();
            $table->integer('tralan1')->nullable();
            $table->integer('conlai');
            $table->integer('tientra');
            $table->date('date2')->nullable();
            $table->integer('ngaytra2')->nullable();
            $table->unsignedBigInteger('thongtinxe_id');
            $table->unsignedBigInteger('khachhang_id');
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
        Schema::dropIfExists('congno');
    }
}
