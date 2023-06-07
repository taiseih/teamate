<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceError extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'attendance',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
