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
        Schema::create('surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kirim');
            $table->string('no_kirim');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('truck_id');
            $table->integer('volume');
            $table->string('kode_prs');
            $table->unsignedBigInteger('customer_id');
            $table->string('kota_tujuan');
            $table->string('seal_a');
            $table->string('seal_b');
            $table->unsignedBigInteger('karyawan_id');
            $table->timestamps();

            //relasi
            $table->foreign('driver_id')->references('id')->on('driver');
            $table->foreign('truck_id')->references('id')->on('truck');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_jalan');
    }
};
