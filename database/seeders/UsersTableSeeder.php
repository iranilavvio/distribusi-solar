<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Admin Admin',
        //     'email' => 'admin@argon.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('secret'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        DB::table('users')->insert([
            'name' => 'Admin Distribusi',
            'email' => 'admin.distribusi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('gab1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Head Distribusi',
        //     'email' => 'head.distribusi@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('head1234'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
