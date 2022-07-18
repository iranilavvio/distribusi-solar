<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = ['karyawan', 'customer', 'truck', 'driver', 'order', 'distribusi', 'delivery', 'control', 'tt', 'show sj', 'create sj', 'update sj', 'delete sj', 'print sj', 'show po', 'create po', 'update po', 'delete po', 'print po'];

        foreach ($attr as $value) {
            Permission::create([
                'name' => $value,
            ]);
        }
    }
}
