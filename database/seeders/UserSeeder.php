<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => '木下',
            'email' => 'test@test.com',
            'job' => 'エンジニア',
            'password' => Hash::make('password'),
            'created_at' => '2023/1/1 11:11:11'
        ],
        [
            'name' => '山田',
            'email' => 'tst@tst.com',
            'job' => 'エンジニア',
            'password' => Hash::make('password'),
            'created_at' => '2023/1/1 11:11:11'
            ]
        ]);
    }
}
