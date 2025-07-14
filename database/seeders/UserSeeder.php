<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRoleId = DB::table('Roles')->where('role_name', 'Superadmin')->value('id_role');
        $adminRoleId = DB::table('Roles')->where('role_name', 'Admin')->value('id_role');
        $userRoleId = DB::table('Roles')->where('role_name', 'User')->value('id_role');

        DB::table('users')->insert([
            [
                'id_user' => Str::uuid(),
                'role_id' => $superadminRoleId,
                'username' => 'superadmin',
                'password' => bcrypt('supersuper'),
                'fullname' => 'Superadmin User',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => Str::uuid(),
                'role_id' => $adminRoleId,
                'username' => 'admin',
                'password' => bcrypt('adminadmin'),
                'fullname' => 'Admin User',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => Str::uuid(),
                'role_id' => $userRoleId,
                'username' => 'user',
                'password' => bcrypt('useruser'),
                'fullname' => 'Ordinary User',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
