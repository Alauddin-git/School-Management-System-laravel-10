<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ExamModel;
use Illuminate\Support\Arr;
use App\Models\admin\Classe;
use Illuminate\Http\Request;
use App\Models\ExamSchedulModel;
use App\Models\admin\Class_subject;
use App\Models\Assign_class_teacher;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\Class_subjectController;
use App\Models\Marks_grade;
use App\Models\Marks_register;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class ExaminationController extends Controller
{
    public function exam_list()
    {
        $data['header_title'] = 'Admin List';
        $data['getExamRecords'] = ExamModel::getExamRecord();
        return view('admin.examinations.exam.list', $data);
    }

    public function exam_create()
    {
        $data['header_title'] = 'Add New Exam';
        return view('admin.examinations.exam.add', $data);
    }

    public function exam_insert(Request $request)
    {
        $exam = new ExamModel();
        $exam->name = $request->name;
        $exam->note = $request->note;
        $exam->created_by = Auth::user()->id;
        $exam->save();

        toastr()->addsuccess('Exam Successfully Created');
        return redirect()->route('admin.examinations.exam.list');
    }

    public function exam_edit($exam_id)
    {
        $data['getExamRecord'] = ExamModel::find($exam_id);
        if (!empty($data['getExamRecord'])) {
            $data['header_title'] = 'Edit Exam';
            return view('admin.examinations.exam.edit', $data);
        } else {
            abort(404);
        }
    }

    public function exam_update(Request $request, $exam_id)
    {
        $exam = ExamModel::find($exam_id);
        $exam->name = $request->name;
        $exam->note = $request->note;
        $exam->save();

        toastr()->addsuccess('Exam Successfully Updated');
        return redirect()->route('admin.examinations.exam.list');
    }


    public function exam_destroy($exam_id)
    {
        $exam = ExamModel::find($exam_id);
        if (!empty($exam)) {
            $exam->is_delete = 1;
            $exam->save();
            toastr()->addsuccess('Exam Successfully Deleted');
            return redirect()->route('admin.examinations.exam.list');
        } else {
            abort(404);
        }
    }

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = Classe::getClass();
        $data['getExam'] = ExamModel::getExam();
        $result = array();
        if (!empty(Request('exam_id')) && !empty(Request('class_id'))) {
            $class_Subjects = Class_subject::mySubjectName(Request('class_id'));
            foreach ($class_Subjects as $class_Subject) {
                $dataS = array();
                $dataS['subject_id'] = $class_Subject->subject_id;
                $dataS['class_id'] = $class_Subject->classe_id;
                $dataS['subject_name'] = $class_Subject->subject_name;
                $dataS['subject_type'] = $class_Subject->subject_type;

                $exam_schedule = ExamSchedulModel::getRecordSingle(Request('exam_id'), Request('class_id'), $class_Subject->subject_id);
                if (!empty($exam_schedule)) {
                    $dataS['exam_date'] = $exam_schedule->exam_date;
                    $dataS['start_time'] = $exam_schedule->start_time;
                    $dataS['end_time'] = $exam_schedule->end_time;
                    $dataS['room_number'] = $exam_schedule->room_number;
                    $dataS['full_marks'] = $exam_schedule->full_marks;
                    $dataS['passing_marks'] = $exam_schedule->passing_marks;
                } else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_marks'] = '';
                }
                $result[] = $dataS;
            }
        }
        $data['exam_schedules'] = $result;
        $data['header_title'] = 'Exam Schedule';
        return view('admin.examinations.exam_schedule', $data);
    }

    public function exam_schedule_insert(Request $request)
    {
        ExamSchedulModel::deleteRecord(Request('exam_id'), Request('class_id'));
        if (!empty($request->schedule)) {
            foreach ($request->schedule as $schedule) {
                if (
                    !empty($schedule['subject_id']) && !empty($schedule['exam_date']) &&
                    !empty($schedule['start_time']) && !empty($schedule['end_time']) &&
                    !empty($schedule['room_number']) && !empty($schedule['full_marks']) &&
                    !empty($schedule['passing_marks'])
                ) {
                    $exam_schedule = ExamSchedulModel::create([
                        'exam_id' => $request->exam_id,
                        'class_id' => $request->class_id,
                        'subject_id' => $schedule['subject_id'],
                        'exam_date' => $schedule['exam_date'],
                        'start_time' => $schedule['start_time'],
                        'end_time' => $schedule['end_time'],
                        'room_number' => $schedule['room_number'],
                        'full_marks' => $schedule['full_marks'],
                        'passing_marks' => $schedule['passing_marks'],
                        'created_by' => Auth::user()->id
                    ]);
                }
            }
            toastr()->addsuccess('Exam Schedule Successfully Saved');
            return redirect()->back();
        }
    }

    // admin side
    public function marks_register_admin()
    {
        $data['getClass'] = Classe::getClass();
        $data['getExam'] = ExamModel::getExam();
        if (!empty(Request('exam_id')) && (!empty(Request('class_id')))) {
            $data['getSubject'] = ExamSchedulModel::getSubejct(Request('exam_id'), Request('class_id'));
            $data['getStudentClass'] = User::getStudentClass(Request('class_id'));
        }
        $data['header_title'] = 'Marks Register';
        return view('admin.examinations.marks_register', $data);
    }

    // teacher side
    public function marks_register_teacher()
    {
        $data['getClass'] = Assign_class_teacher::getMyClassSubjectGroup(Auth::user()->id);  
        $data['getExams'] = ExamSchedulModel::getExamTeacher(Auth::user()->id); 
        if (!empty(Request('exam_id')) && (!empty(Request('class_id')))) {
            $data['getSubject'] = ExamSchedulModel::getSubejct(Request('exam_id'), Request('class_id'));
            $data['getStudentClass'] = User::getStudentClass(Request('class_id'));
        }
        $data['header_title'] = 'Marks Register';
        return view('teacher.marks_register', $data);        
    }

    // admin side
    public function submit_marks_register_admin(Request $request)
    {
        $validation = 0;
        if (!empty($request->mark)) {
            foreach ($request->mark as $mark) {
                $getExamSchedule = ExamSchedulModel::find($mark['id']);
                $fullMarks = $getExamSchedule->full_marks;

                $class_work = !empty($mark['class_work']) ? $mark['class_work'] : 0;
                $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
                $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
                $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

                $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
                $passing_marks = !empty($mark['passing_marks']) ? $mark['passing_marks'] : 0;


                $totalMarks = $class_work = $home_work + $test_work + $exam;
                if ($fullMarks >=  $totalMarks) {
                    $getMark = Marks_register::checkAlreadyMark(Request('student_id'), Request('exam_id'), Request('class_id'), $mark['subject_id']);
                    if (!empty($getMark)) {
                        $mark_register = $getMark;
                    } else {
                        $mark_register = new Marks_register();
                        $mark_register->created_by = Auth::user()->id;
                    }

                    $mark_register->student_id = $request->student_id;
                    $mark_register->exam_id = $request->exam_id;
                    $mark_register->class_id = $request->class_id;
                    $mark_register->subject_id = $mark['subject_id'];
                    $mark_register->class_work = $class_work;
                    $mark_register->home_work = $home_work;
                    $mark_register->test_work = $test_work;
                    $mark_register->exam = $exam;
                    $mark_register->full_marks = $full_marks;
                    $mark_register->passing_marks = $passing_marks;
                    $mark_register->save();
                } else {
                    $validation = 1;
                }
            }
        }
        if ($validation == 0) {
            $json['status'] = 200;
            $json['message'] = "Mark Register Successfully saved";
        } else {
            $json['status'] = 400;
            $json['message'] = "Some Subject Mark Register Successfully saved. But Some Subject mark greater than full mark";
        }
        echo json_encode($json);
    }


    // admin side
    public function single_submit_marks_register_admin(Request $request)
    {
        $id = $request->id;
        $getExamSchedule = ExamSchedulModel::find($id);

        $fullMarks = $getExamSchedule->full_marks;
        $passing_marks = $getExamSchedule->passing_marks;

        $class_work = !empty($request->class_work) ? $request->class_work : 0;
        $home_work = !empty($request->home_work) ? $request->home_work :  0;
        $test_work = !empty($request->test_work) ? $request->test_work : 0;
        $exam = !empty($request->exam) ? $request->exam : 0;

        $totalMarks = $class_work + $home_work + $test_work + $exam;
        if ($fullMarks >=  $totalMarks) {
            $getMark = Marks_register::checkAlreadyMark(Request('student_id'), Request('exam_id'), Request('class_id'), $request->subject_id);
            if (!empty($getMark)) {
                $mark_register = $getMark;
            } else {
                $mark_register = new Marks_register();
                $mark_register->created_by = Auth::user()->id;
            }
            $mark_register->student_id = $request->student_id;
            $mark_register->exam_id = $request->exam_id;
            $mark_register->class_id = $request->class_id;
            $mark_register->subject_id = $request->subject_id;
            $mark_register->class_work = $class_work;
            $mark_register->home_work = $home_work;
            $mark_register->test_work = $test_work;
            $mark_register->exam = $exam;
            $mark_register->full_marks = $fullMarks;
            $mark_register->passing_marks = $passing_marks;
            $mark_register->save();

            $json['status'] = 200;
            $json['message'] = "Mark Register Successfully saved";
        } else {
            $json['status'] = 400;
            $json['message'] = "Your total mark graeter than your full mark";
        }
        echo json_encode($json);
    }

    // admin side mark grade
    public function marks_grade()
    {
        $data['getMarksGrades'] = Marks_grade::getRecord();
        $data['header_title'] = 'Marks Grade';
        return view('admin.examinations.marks_grade.list', $data);
    }

    public function marks_grade_create()
    {
        $data['header_title'] = 'Add New Marks Grade';
        return view('admin.examinations.marks_grade.add', $data);
    }

    public function marks_grade_insert(Request $request)
    {
        $mark = Marks_grade::make($request->except('created_by'));
        $mark->created_by = Auth::user()->id;
        $mark->save();
        toastr()->addsuccess('Mark Grade Successfully Created');
        return redirect()->route('admin.examinations.marks_grade.list');
    }

    public function marks_grade_edit(Marks_grade $marks_grade)
    {  
        $data['marks_grade'] = $marks_grade;
        $data['header_title'] = 'Edit Marks Grade';
        return view('admin.examinations.marks_grade.edit', $data);
    }

    public function marks_grade_update(Request $request, Marks_grade $marks_grade)
    {
        $marks_grade->update($request->all());
        toastr()->addsuccess('Mark Grade Successfully Updated');
        return redirect()->route('admin.examinations.marks_grade.list');
    }

    public Function marks_grade_destroy(Marks_grade $marks_grade)
    {
        $marks_grade->delete();
        toastr()->addsuccess('Mark Grade Successfully Deleted');
        return redirect()->route('admin.examinations.marks_grade.list');
    }


    // student side
    public function MyExamTimetableStudent(Request $request)
    {
        $class_id = Auth::user()->classe_id;
        $getExams = ExamSchedulModel::getExam($class_id);
        $result = array();
        foreach ($getExams as $getExam) {
            $dataE = array();
            $dataE['exam_name'] = $getExam->exam_name;
            $getExamTimetables = ExamSchedulModel::getExamTimetable($getExam->exam_id, $getExam->class_id);
            $resultS = array();
            foreach ($getExamTimetables as $getExamTimetable) {
                $dataS = array();
                $dataS['subject_name'] = $getExamTimetable->subject_name;
                $dataS['exam_date'] = $getExamTimetable->exam_date;
                $dataS['start_time'] = $getExamTimetable->start_time;
                $dataS['end_time'] = $getExamTimetable->end_time;
                $dataS['room_number'] = $getExamTimetable->room_number;
                $dataS['full_marks'] = $getExamTimetable->full_marks;
                $dataS['passing_marks'] = $getExamTimetable->passing_marks;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        $data['exam_timetables'] = $result;
        $data['header_title'] = 'My Exam Timetable';
        return view('student.my_exam_timetable', $data);
    }

    // student side
    public function myExamResult()
    {
        $result = [];
        $getExam = Marks_register::getExam(Auth::user()->id);
        foreach($getExam as $exam)
        { 
            $dataE = [];
            $dataE['exam_name'] = $exam->exam_name;
            $getExamSubject = Marks_register::getExamSubject($exam->exam_id, Auth::user()->id);
            $dataSubject = [];
            foreach($getExamSubject as $examSuject)  
            { 
                $dataS = [];
                $total_score = $examSuject['class_work'] +  $examSuject['test_work'] + $examSuject['home_work'] + $examSuject['exam'] ;
                $dataS['subject_name'] = $examSuject['subject_name'];
                $dataS['class_work'] = $examSuject['class_work'];
                $dataS['test_work'] = $examSuject['test_work'];
                $dataS['home_work'] = $examSuject['home_work'];
                $dataS['exam'] = $examSuject['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $examSuject['full_marks'];
                $dataS['passing_marks'] = $examSuject['passing_marks'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE; 
        } 
        $data['examResults'] = $result;
        $data['header_title'] = 'My Exam Result';
        return view('student.my_exam_result', $data); 
    }

    // teacher side
    public function MyExamTimetableTeacher()
    {
        $result = array();
        $myClassSubjects = Assign_class_teacher::getMyClassSubjectGroup(Auth::user()->id);
        foreach ($myClassSubjects as $class) {
            $dataC = array();
            $dataC['class_name'] = $class->class_name;
            $getExams = ExamSchedulModel::getExam($class->classe_id);
            $examArray = array();
            foreach ($getExams as $exam) {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;
                $getExamTimetables = ExamSchedulModel::getExamTimetable($exam->exam_id, $class->class_id);
                $subjectArray = array();
                foreach ($getExamTimetables as $getExamTimetable) {
                    $dataS = array();
                    $dataS['subject_name'] = $getExamTimetable->subject_name;
                    $dataS['exam_date'] = $getExamTimetable->exam_date;
                    $dataS['start_time'] = $getExamTimetable->start_time;
                    $dataS['end_time'] = $getExamTimetable->end_time;
                    $dataS['room_number'] = $getExamTimetable->room_number;
                    $dataS['full_marks'] = $getExamTimetable->full_marks;
                    $dataS['passing_marks'] = $getExamTimetable->passing_marks;
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;
            $result[] = $dataC;
        }
        $data['class_subject_exams'] = $result;
        $data['header_title'] = 'My Exam Timetable';
        return view('teacher.my_exam_timetable', $data);
    }

    // parent side
    public function myStudentExamTimetableParent($student_id)
    {
        $getStudent = User::find($student_id);
        $class_id = $getStudent->classe_id;
        $getExams = ExamSchedulModel::getExam($class_id);
        $result = array();
        foreach ($getExams as $getExam) {
            $dataE = array();
            $dataE['exam_name'] = $getExam->exam_name;
            $getExamTimetables = ExamSchedulModel::getExamTimetable($getExam->exam_id, $getExam->class_id);
            $resultS = array();
            foreach ($getExamTimetables as $getExamTimetable) {
                $dataS = array();
                $dataS['subject_name'] = $getExamTimetable->subject_name;
                $dataS['exam_date'] = $getExamTimetable->exam_date;
                $dataS['start_time'] = $getExamTimetable->start_time;
                $dataS['end_time'] = $getExamTimetable->end_time;
                $dataS['room_number'] = $getExamTimetable->room_number;
                $dataS['full_marks'] = $getExamTimetable->full_marks;
                $dataS['passing_marks'] = $getExamTimetable->passing_marks;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        $data['student'] = $getStudent;
        $data['getClassName'] = Classe::find($class_id);
        $data['exam_timetables'] = $result;
        $data['header_title'] = ' Exam Timetable';
        return view('parent.myStudent_exam_timetable', $data);
    }

    // parent side
    public function myStudentExamResultParent($student_id)
    {
        $data['getStudent']= User::find($student_id);
        $data['mySubjects'] = Class_subject::mySubjectName(User::find($student_id)->classe_id);
        $result = [];
        $getExam = Marks_register::getExam($student_id);
        foreach($getExam as $exam)
        { 
            $dataE = [];
            $dataE['exam_name'] = $exam->exam_name;
            $getExamSubject = Marks_register::getExamSubject($exam->exam_id, $student_id);
            $dataSubject = [];
            foreach($getExamSubject as $examSuject)  
            { 
                $dataS = [];
                $total_score = $examSuject['class_work'] +  $examSuject['test_work'] + $examSuject['home_work'] + $examSuject['exam'] ;
                $dataS['subject_name'] = $examSuject['subject_name'];
                $dataS['class_work'] = $examSuject['class_work'];
                $dataS['test_work'] = $examSuject['test_work'];
                $dataS['home_work'] = $examSuject['home_work'];
                $dataS['exam'] = $examSuject['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $examSuject['full_marks'];
                $dataS['passing_marks'] = $examSuject['passing_marks'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE; 
        } 
        $data['examResults'] = $result;
        $data['header_title'] = 'My Exam Result';
        return view('parent.myStudent_exam_result', $data); 
    }
}
