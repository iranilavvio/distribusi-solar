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
        Schema::create('control_delivery', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->time('jam_isi');
            $table->time('jam_finish');
            $table->unsignedBigInteger('surat_jalan_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('volume_keluar');
            $table->unsignedBigInteger('truck_id');
            $table->string('keterangan');
            $table->timestamps();

            //relasi
            $table->foreign('surat_jalan_id')->references('id')->on('surat_jalan');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('truck_id')->references('id')->on('truck');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_delivery');
    }
};
