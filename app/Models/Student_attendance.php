<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'attendance_date',
        'student_id',
        'attendance_type',
    ];

    static public function checkAlreadyAttendance($student_id, $class_id, $attendance_date)
    {   
        return self::where('student_id', $student_id)->where('class_id', $class_id)->whereDate('attendance_date', $attendance_date)->first();
    }
}
