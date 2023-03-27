<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attendance_time',
        'leaving_time',
        'condition',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
