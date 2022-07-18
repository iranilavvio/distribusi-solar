<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // assign super admin
        $superadmin = User::find(1);
        $superadmin->assignRole('super admin');

        // assign admin distribusi
        $admindistribusi = User::find(2);
        $admindistribusi->assignRole('admin distribusi');

        // assign role admin distribusi to permission
        $role = Role::find(2);
        $role->givePermissionTo('karyawan', 'customer', 'truck', 'driver', 'order', 'distribusi', 'delivery', 'control', 'tt', 'show sj', 'create sj', 'update sj', 'delete sj', 'print sj', 'show po', 'print po');

        // assign head distribusi
        $headdistribusi = User::find(3);
        $headdistribusi->assignRole('head distribusi');

        // assign role head distribusi to permission
        $role = Role::find(3);
        $role->givePermissionTo('show sj', 'print sj', 'show po', 'create po', 'update po', 'delete po', 'print po');
    }
}
