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
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
            $table->dropColumn('volume_keluar');
            $table->dropForeign(['truck_id']);
            $table->dropColumn('truck_id');
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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->integer('volume_keluar');
            $table->unsignedBigInteger('truck_id')->nullable();
            $table->foreign('truck_id')->references('id')->on('truck');
        });
    }
};
