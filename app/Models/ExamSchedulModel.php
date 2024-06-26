<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedulModel extends Model
{
    use HasFactory;
    
    protected $table = 'exam_schedule';
    protected $fillable = [
        'exam_id', 
        'class_id',
        'subject_id',
        'exam_date',
        'start_time',
        'end_time',
        'room_number',
        'full_marks',
        'passing_marks',
        'created_by'
    ];

    static public function getRecordSingle($exam_id, $class_id, $subject_id)
    {
        return self::where('exam_id', $exam_id)->where('class_id', $class_id)->where('subject_id', $subject_id)->first();
    }

    static public function deleteRecord($exam_id, $class_id)
    {
        self::where('exam_id', $exam_id)->where('class_id', $class_id)->delete();
    }

    static public function getExamTeacher($teacher_id)
    {
        return self::select('exam_schedule.*', 'exam.name as exam_name')
                 ->join('exam', 'exam.id', 'exam_schedule.exam_id')
                 ->join('assign_class_teachers', 'assign_class_teachers.classe_id', 'exam_schedule.class_id')
                 ->where('assign_class_teachers.teacher_id', $teacher_id)
                 ->groupBy('exam_schedule.exam_id')
                 ->orderBy('exam_schedule.id', 'desc')
                 ->get();
    }

    static public function getExam($class_id)
    {
        return self::select('exam_schedule.*', 'exam.name as exam_name')
                 ->join('exam', 'exam.id', 'exam_schedule.exam_id')
                 ->where('exam_schedule.class_id', $class_id)
                 ->groupBy('exam_id')
                 ->orderBy('exam_schedule.id', 'desc')
                 ->get();
    }

    static public function getExamTimetable($exam_id, $class_id)
    {
        return self::select('exam_schedule.*', 'subjects.name as subject_name', 'subjects.type as subject_type')
                 ->join('subjects', 'subjects.id', 'exam_schedule.subject_id')
                 ->where('exam_schedule.class_id', $class_id)
                 ->where('exam_schedule.exam_id', $exam_id)
                 ->get();
    }

    static public function getSubejct($exam_id, $class_id)
    {
        return self::select('exam_schedule.*', 'subjects.name as subject_name', 'subjects.type as subject_type')
                 ->join('subjects', 'subjects.id', 'exam_schedule.subject_id')
                 ->where('exam_schedule.class_id', $class_id)
                 ->where('exam_schedule.exam_id', $exam_id)
                 ->get();
    }

    static public function getExamTimetableTeacher($teacher_id)
    {
        return self::select('exam_schedule.*', 'classes.name as class_name', 'subjects.name as subject_name', 'exam.name as exam_name')
                ->join('assign_class_teachers', 'assign_class_teachers.classe_id', 'exam_schedule.class_id')
                ->join('classes', 'classes.id', 'exam_schedule.class_id')
                ->join('subjects', 'subjects.id', 'exam_schedule.subject_id')
                ->join('exam', 'exam.id', 'exam_schedule.exam_id')
                ->where('assign_class_teachers.teacher_id', $teacher_id)
                ->get();
    }

    static public function getMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return Marks_register::checkAlreadyMark($student_id, $exam_id, $class_id, $subject_id); 
    }
}
