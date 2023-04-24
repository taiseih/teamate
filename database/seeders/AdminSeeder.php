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
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11',
            ]
            ]);
    }
}
