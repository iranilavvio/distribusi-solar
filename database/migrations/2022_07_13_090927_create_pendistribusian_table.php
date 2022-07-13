<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendistribusian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_real_id');
            $table->unsignedBigInteger('surat_jalan_id');
            $table->string('keterangan');
            $table->timestamps();

            //relasi
            $table->foreign('order_real_id')->references('id')->on('order_real');
            $table->foreign('surat_jalan_id')->references('id')->on('surat_jalan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendistribusian');
    }
};
