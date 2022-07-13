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
            $table->dropForeign(['driver_id']);
            $table->dropColumn('driver_id');
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
            $table->dropColumn('tujuan');
            $table->dropColumn('volume');
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
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('driver');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->string('tujuan');
            $table->integer('volume');
        });
    }
};
