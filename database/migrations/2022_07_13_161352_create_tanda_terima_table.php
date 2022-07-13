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
        Schema::create('tanda_terima', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('surat_jalan_id');
            $table->string('keterangan');
            $table->timestamps();

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
        Schema::dropIfExists('tanda_terima');
    }
};
