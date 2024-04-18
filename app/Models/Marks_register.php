<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks_register extends Model
{
    use HasFactory;

    static public function checkAlreadyMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return self::where('student_id', $student_id)->where('exam_id', $exam_id)->where('class_id', $class_id)->where('subject_id', $subject_id)->first();
    }

    static public function getExam($student_id)
    {  
        return self::select('marks_registers.*', 'exam.name as exam_name')
                            ->join('exam', 'exam.id', 'marks_registers.exam_id')
                            ->where('marks_registers.student_id', $student_id)
                            ->groupBy('marks_registers.exam_id')
                            ->get();
    }   

    static public function getExamSubject($exam_id ,$student_id)
    {  
        return self::select('marks_registers.*', 'exam.name as exam_name', 'subjects.name as subject_name')
                            ->join('exam', 'exam.id', 'marks_registers.exam_id')
                            ->join('subjects', 'subjects.id', 'marks_registers.subject_id')
                            ->where('marks_registers.exam_id', $exam_id)
                            ->where('marks_registers.student_id', $student_id)
                            ->get();
    }     
}
