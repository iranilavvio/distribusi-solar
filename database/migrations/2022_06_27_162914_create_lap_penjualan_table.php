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
        Schema::create('lap_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('truck_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('surat_jalan_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('tujuan');
            $table->integer('volume');
            $table->string('keterangan');
            $table->timestamps();

            //relasi
            $table->foreign('truck_id')->references('id')->on('truck');
            $table->foreign('driver_id')->references('id')->on('driver');
            $table->foreign('surat_jalan_id')->references('id')->on('surat_jalan');
            $table->foreign('customer_id')->references('id')->on('customer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lap_penjualan');
    }
};
