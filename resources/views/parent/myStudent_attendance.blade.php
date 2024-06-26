@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>My Student Attendance(Name- <span style="color: rgb(48, 168, 32);">{{ $my_student->name }} {{ $my_student->last_name }}</span>, Total Attendance: <span style="color: rgb(48, 168, 32);">{{ $my_attendances->total() }}</span> )</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search My Student Attendance </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <form action="" method="get">
                                <div class="row" style="display: flex; flex-wrap: wrap; align-items: center;">
                                    <div class="form-group col-md-2" style="margin-right: 1px; display: flex;">
                                        <select class="form-control" name="class_id">
                                            <option value="">Select Class</option>
                                            @foreach ($get_class as $class)
                                                <option value="{{ $class->class_id }}" {{ Request('class_id') == $class->id ? 'selected' : '' }}>
                                                    {{ $class->class_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2" style="margin-right: 1px; display: flex;">
                                        <select class="form-control" name="attendance_type">
                                            <option value="">Choose Attendance Type</option>
                                            <option @selected(Request('attendance_type') == 1) value="1">Present</option>
                                            <option @selected(Request('attendance_type') == 2) value="2">Late</option>
                                            <option @selected(Request('attendance_type') == 3) value="3">Absent</option>
                                            <option @selected(Request('attendance_type') == 4) value="4">Half Day</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" style="margin-right: 50px; display: flex; align-items: center;">
                                        <label for="start_attendance_date" style="margin-right: 1px; white-space: ;">Start Attendance Date:</label>
                                        <input type="date" class="form-control" name="start_attendance_date" id="start_attendance_date"
                                               value="{{ Request('start_attendance_date') }}" style="flex-grow: 1;">
                                    </div>
                                    <div class="form-group col-md-3" style="margin-right: 1px; display: flex; align-items: center;">
                                        <label for="end_attendance_date" style="margin-right: 1px; white-space: ;">End Attendance Date:</label>
                                        <input type="date" class="form-control" name="end_attendance_date" id="end_attendance_date"
                                               value="{{ Request('end_attendance_date') }}" style="flex-grow: 1;">
                                    </div>
                                    <div class="form-group col-md-auto" style="display: flex;">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a href="{{ route('parent.my_student.attendance', ['student_id' => $my_student->id]) }}" class="btn btn-success ml-2" role="button">Reset</a>
                                    </div>
                                </div>     
                            </form>
                               
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Student Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Attendance Type</th>
                                    <th>Attendance Date</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($my_attendances))
                                    @forelse ($my_attendances as $my_attendance)
                                        <tr>
                                            <td>{{ $my_attendance->class_name }}</td>
                                            </td>
                                            <td>
                                                @if ($my_attendance->attendance_type == 1)
                                                    Present
                                                @elseif ($my_attendance->attendance_type == 2)
                                                    Late
                                                @elseif ($my_attendance->attendance_type == 3)
                                                    Absent
                                                @elseif ($my_attendance->attendance_type == 4)
                                                    Half Day
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($my_attendance->attendance_date)) }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($my_attendance->created_at)) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">Record Not found</td>
                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="100%">Record Not found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if (!empty($my_attendances))
                        <div style="padding: 10px; float:right">
                            {!! $my_attendances->appends(Request::except('page'))->links() !!}
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
