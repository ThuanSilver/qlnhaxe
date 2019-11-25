<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKTquatangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KTquatang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quatang_id');
            $table->dateTime('ngaynhan');
            $table->unsignedBigInteger('khachhang_id');
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
        Schema::dropIfExists('KTquatang');
    }
}
