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
                'project' => '自社業務',
                'project_info' => '',
                'project_attend' => '10:00',
                'company' => '社内',
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '鈴木花子',
                'email' => 'hanako.suzuki@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'project' => '受託企業での保守・運用業務',
                'project_info' => 'Laravelフレームワークを使用したWebアプリケーションの運用・保守を行います。システムの安定稼働を確保するために、定期的なバグ修正やパフォーマンスチューニングを実施します。',
                'project_attend' => '10:00',
                'company' => '株式会社〇〇',
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '田中健太',
                'email' => 'kenta.tanaka@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'project' => 'WordPressを使用したLP制作',
                'project_info' => 'WordPressを使用して、ランディングページ（LP）のレイアウト設計とデザインを行います。HTML/CSSやPHPの知識を活用して、見た目や機能の変更を実施します。',
                'project_attend' => '11:00',
                'company' => '株式会社〇〇',
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '高橋佳子',
                'email' => 'yoshiko.takahashi@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'project' => '受託企業でのアプリ開発業務',
                'project_info' => 'アプリケーションのアーキテクチャやデータモデルを設計・開発。選定された言語を使用して、APIの実装やフロントエンドの実装を行います。',
                'project_attend' => '09:30',
                'company' => '株式会社〇〇',
                'created_at' => '2023/1/1 11:11:11',
            ],
            [
                'name' => '渡辺裕樹',
                'email' => 'yuki.watanabe@example.com',
                'job' => 'エンジニア',
                'password' => Hash::make('password'),
                'project' => '',
                'project_info' => '',
                'project_attend' => '10:00',
                'company' => '',
                'created_at' => '2023/1/1 11:11:11'
            ],
        ]);
    }
}
