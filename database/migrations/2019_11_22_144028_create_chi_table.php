<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('loaichi');
            $table->date('ngaychi');
            $table->integer('sotien');
            $table->text('ghichu');
            $table->string('chitheu')->nullable();
            $table->string('chibienso')->nullable();
            $table->string('somay')->nullable();
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
        Schema::dropIfExists('chi');
    }
}
