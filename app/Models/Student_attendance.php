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

    static public function getAtttendance()
    {
        $return = self::select('student_attendances.*', 'classes.name as class_name', 'student.name as student_name', 'student.last_name as student_last_name', 'createdby.name as created_name')
                    ->join('classes', 'classes.id', 'student_attendances.class_id')
                    ->join('users as student', 'student.id', 'student_attendances.student_id')
                    ->join('users as createdby', 'createdby.id', 'student_attendances.created_by');

        if(!empty(Request('class_id')))
        {
            $return = $return->where('student_attendances.class_id', Request('class_id')) ;
        }
        if(!empty(Request('student_id')))
        {
            $return = $return->where('student_attendances.student_id', Request('student_id')) ;
        }
        if(!empty(Request('attendance_date')))
        {
            $return = $return->where('student_attendances.attendance_date', Request('attendance_date')) ;
        }
        if(!empty(Request('attendance_type')))
        {
            $return = $return->where('student_attendances.attendance_type', Request('attendance_type')) ;
        }
       return $return->orderBy('student_attendances.id', 'desc')
            ->paginate(2);
    }
}
