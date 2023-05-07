<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); //ユーザーのid
            $table->string('attendance_time'); //出勤時刻
            $table->tinyInteger('job_type')->nullable(); //業務種別
            $table->string('leaving_time')->nullable(); //退勤時刻
            $table->string('status')->nullable(); //体調
            $table->string('information')->nullable(); //業務報告
            $table->string('rest_time')->nullable(); //休憩時間
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
