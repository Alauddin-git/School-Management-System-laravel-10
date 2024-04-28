<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin\Classe;
use Illuminate\Http\Request;
use App\Models\Student_attendance;
use App\Models\Assign_class_teacher;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // admin side
    public function studentAttendanceAdmin()
    {
        $data['getClass'] = Classe::getClass();

        if(!empty(Request('class_id')) && !empty(Request('attendance_date')))
        {
            $data['getStudentClass'] = User::getStudentClass(Request('class_id'));
        }
        $data['header_title'] = 'Student Attendance';
        return view('admin.attendance.student', $data);
    }

    public function studentAttendanceSubmit(Request $request)
    {
        $check_attendance = Student_attendance::checkAlreadyAttendance($request->student_id, $request->class_id, $request->attendance_date);
        if(!empty($check_attendance))
        {
            $attendance = $check_attendance;
        }
        else
        {
            $attendance = Student_attendance::make($request->except('created_by', 'attendance_type'));
        }
        $attendance->attendance_type = $request->attendance_type;
        $attendance->created_by = Auth::user()->id;
        $attendance->save();
        return response()->json([
            'status' => 200,
            'message' => 'Attendance Successfully Saved'
        ]);
    }

    public function attendanceReportAdmin(Request $request)
    {
        $data['getClass'] = Classe::getClass();
        $data['studentAtttendances'] = Student_attendance::getAtttendance();
        $data['header_title'] = 'Attendance Report';
        return view('admin.attendance.report', $data);
    }

    public function studentAttendanceTeacher()
    {
        $data['getClass'] = Assign_class_teacher::getMyClassSubjectGroup(Auth::user()->id);  
        if(!empty(Request('class_id')) && !empty(Request('attendance_date')))
        {
            $data['getStudentClass'] = User::getStudentClass(Request('class_id'));
        }
        $data['header_title'] = 'Student Attendance';
        return view('teacher.attendance.student', $data);
    }

    public function attendanceReportTeacher(Request $request)
    {
        $getClass = Assign_class_teacher::getMyClassSubjectGroup(Auth::user()->id);  
        $data['getClass'] = $getClass;
        $classArray = [];
        foreach($getClass as $class)
        {
            $classArray[] = $class->classe_id;
        }
        $data['studentAtttendances'] = Student_attendance::studentAtttendancesTeacher($classArray);
        $data['header_title'] = 'Attendance Report';
        return view('teacher.attendance.report', $data);
    }

    // student side
    public function myAttendaceStudent()
    {
        $data['my_attendances'] = Student_attendance::myAttendance(Auth::user()->id);
        $data['header_title'] = 'Attendance Report';
        return view('student.my_attendance', $data);
    }

    // parent side
    public function myAttendanceParent($student_id)
    {
        $data['my_student']  = User::find($student_id);
        $data['header_title'] = 'My Student Attendance';
        return view('parent.myStudent_attendance', $data); 
    }
}
