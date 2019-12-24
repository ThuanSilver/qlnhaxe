<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhophukienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banphukien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngayban');
            $table->string('somay');
            $table->integer('soluong');
            $table->integer('gia');
            $table->integer('tongtien');
            $table->string('tenphukien');
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
        Schema::dropIfExists('khophukien');
    }
}
