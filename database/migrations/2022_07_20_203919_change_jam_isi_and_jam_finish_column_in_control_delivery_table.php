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
        Schema::table('control_delivery', function (Blueprint $table) {
            $table->renameColumn('jam_isi', 'jam_pengiriman');
            $table->renameColumn('jam_finish', 'jam_kembali');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('control_delivery', function (Blueprint $table) {
            //
        });
    }
};
