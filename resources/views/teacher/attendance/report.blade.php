@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attendance Report(<span style="color: blue">Total: {{ $studentAtttendances->total() }}</span>)</h1>
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
                        <h3 class="card-title">Search Attendance Report</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row p-1">
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="student_id" placeholder="Student Id"
                                        value="{{ Request('student_id') }}">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="student_name" placeholder="Student Name"
                                        value="{{ Request('student_name') }}">
                                </div>
                                <div class="form-group  col-md-2">
                                    <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($getClass as $class)
                                            <option value="{{ $class->id }}"
                                                {{ Request('class_id') == $class->classe_id ? 'selected' : '' }}>
                                                {{ $class->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="date" class="form-control" name="attendance_date"
                                        value="{{ Request('attendance_date') }}">
                                </div>
                                <div class="form-group  col-md-2">
                                    <select class="form-control" name="attendance_type">
                                        <option value="">Choose Attendance Type</option>
                                        <option @selected(Request('attendance_type') == 1) value="1">Present</option>
                                        <option @selected(Request('attendance_type') == 2) value="2">Late</option>
                                        <option @selected(Request('attendance_type') == 3) value="3">Absent</option>
                                        <option @selected(Request('attendance_type') == 4) value="4">Half Day</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="{{ route('admin.attendance.report') }}" class="btn btn-success btn-outlook"
                                        role="button">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Class Name</th>
                                    <th>Attendance</th>
                                    <th>Attendance Date</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            @if (!empty($studentAtttendances))
                            @forelse ($studentAtttendances as $studentAtttendance)
                                <tr>
                                    <td>{{ $studentAtttendance->student_id }}</td>
                                    <td>{{ $studentAtttendance->student_name }} {{ $studentAtttendance->student_last_name }}
                                        <td>{{ $studentAtttendance->class_name }}</td>
                                    </td>
                                    <td>
                                        @if ($studentAtttendance->attendance_type == 1)
                                            Present
                                        @elseif ($studentAtttendance->attendance_type == 2)
                                            Late
                                        @elseif ($studentAtttendance->attendance_type == 3)
                                            Absent
                                        @elseif ($studentAtttendance->attendance_type == 4)
                                            Half Day
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($studentAtttendance->attendance_date)) }}</td>
                                    <td>{{ $studentAtttendance->created_name }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($studentAtttendance->created_at)) }}</td>
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
                            <tbody>
                            </tbody>
                        </table>
                        @if (!empty($studentAtttendances))
                        <div style="padding: 10px; float:right">
                            {!! $studentAtttendances->appends(Request::except('page'))->links() !!}
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
