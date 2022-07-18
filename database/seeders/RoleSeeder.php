<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = ['super admin', 'admin distribusi', 'head distribusi'];

        foreach ($attr as $value) {
            Role::create([
                'name' => $value,
            ]);
        }
    }
}
