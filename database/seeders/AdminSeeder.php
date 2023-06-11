<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'name' => '管理者',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'access_level' => 1,
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '人事部',
                'email' => 'hr@example.com',
                'password' => Hash::make('password'),
                'access_level' => 3,
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '営業部',
                'email' => 'sl@example.com',
                'password' => Hash::make('password'),
                'access_level' => 2,
                'created_at' => '2023/1/1 11:11:11',
            ],
            ]);
    }
}
