<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin\Classe;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function studentAttendance()
    {
        $data['getClass'] = Classe::getClass();

        if(!empty(Request('class_id')) && !empty(Request('attendance_date')))
        {
            $data['getStudentClass'] = User::getStudentClass(Request('class_id'));
        }
        $data['header_title'] = 'Student Attendance';
        return view('admin.attendance.student', $data);
    }
}
