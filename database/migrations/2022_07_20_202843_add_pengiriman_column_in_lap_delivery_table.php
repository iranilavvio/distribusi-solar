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
        Schema::table('lap_delivery', function (Blueprint $table) {
            //pengiriman after surat_jalan_id
            $table->string('pengiriman')->nullable()->after('surat_jalan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lap_delivery', function (Blueprint $table) {
            //
        });
    }
};
