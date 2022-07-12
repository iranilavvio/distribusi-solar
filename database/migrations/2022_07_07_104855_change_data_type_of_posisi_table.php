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
        //drop column posisi
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropColumn('posisi');
        });

        //change data type of posisi column in karyawan table
        Schema::table('karyawan', function (Blueprint $table) {
            $table->enum('posisi', ['Karyawan', 'Driver'])->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
