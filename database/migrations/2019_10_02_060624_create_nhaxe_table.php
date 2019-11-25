<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaxeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('nhapxe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nhacc');
            $table->date('ngaynhan');
            $table->string('mahd');
            $table->date('ngayhd');
            $table->integer('maID');
            $table->integer('gianhap');
            $table->unsignedBigInteger('kho_id');
            $table->unsignedBigInteger('nhanvien_id');
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
        Schema::dropIfExists('nhaxe');
    }
}
