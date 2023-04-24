<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::insert([
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-01 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-01 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-02 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-02 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-03 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-03 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-04 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-04 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-05 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-05 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-06 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-06 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-07 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-07 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-08 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-08 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-09 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-09 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-10 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-10 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-11 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-11 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-12 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-12 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-13 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-13 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-14 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-14 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-15 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-15 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-16 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-16 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-17 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-17 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '10:00',
                'job_type' => 1,
                'leaving_time' => '2023-02-18 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-18 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '欠勤',
                'job_type' => null,
                'leaving_time' => '',
                'status' => '',
                'created_at' => '2023-02-19 10:00:00'
            ],
            [
                'user_id' => 1,
                'attendance_time' => '欠勤',
                'job_type' => null,
                'leaving_time' => '',
                'status' => '',
                'created_at' => '2023-02-20 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-01 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-01 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-02 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-02 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-03 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-03 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-04 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-04 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-05 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-05 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-06 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-06 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-07 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-07 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-08 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-08 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-09 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-09 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-10 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-10 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-11 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-11 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-12 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-12 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-13 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-13 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-14 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-14 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-15 19:00:00',
                'status' => '良好',
                'created_at' => '2023-02-15 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-16 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-16 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-17 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-17 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '10:00',
                'job_type' => 2,
                'leaving_time' => '2023-02-18 13:00:00',
                'status' => '良好',
                'created_at' => '2023-02-18 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '欠勤',
                'job_type' => null,
                'leaving_time' => '',
                'status' => '',
                'created_at' => '2023-02-19 10:00:00'
            ],
            [
                'user_id' => 2,
                'attendance_time' => '欠勤',
                'job_type' => null,
                'leaving_time' => '',
                'status' => '',
                'created_at' => '2023-02-20 10:00:00'
            ],


        ]);
    }
}
