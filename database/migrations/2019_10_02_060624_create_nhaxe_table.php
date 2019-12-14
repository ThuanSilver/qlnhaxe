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
            $table->string('loaixe');
            $table->string('tenxe');
            $table->string('doixe');
            $table->string('mauxe');
            $table->string('sokhung');
            $table->string('somay');
            $table->string('dangkiem');
            $table->string('nguoinhan');
            $table->string('khonhan');


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
