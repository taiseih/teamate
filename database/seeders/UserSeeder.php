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
            [
                'name' => '山田太郎',
                'email' => 'test@test.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11'
            ],
            [
                'name' => '鈴木花子',
                'email' => 'hanako.suzuki@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11'
            ],
            [
                'name' => '田中健太',
                'email' => 'kenta.tanaka@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11'
            ],
            [
                'name' => '高橋佳子',
                'email' => 'yoshiko.takahashi@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11'
            ],
            [
                'name' => '渡辺裕樹',
                'email' => 'yuki.watanabe@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'created_at' => '2023/1/1 11:11:11'
            ],
        ]);
    }
}
