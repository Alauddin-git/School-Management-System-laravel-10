@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Attendance</h1>
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
                        <h3 class="card-title">Search Student Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row p-1">
                                <div class="form-group  col-md-3">
                                    <select class="form-control" name="class_id" id="getClass" required>
                                        <option value="">Select Class</option>
                                        @foreach ($getClass as $class)
                                            <option {{ Request('class_id') == $class->classe_id ? 'selected' : '' }}
                                                value="{{ $class->classe_id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-3">
                                    <input type="date" class="form-control" id="getAttendanceDate" name="attendance_date"
                                        value="{{ Request('attendance_date') }}" required>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="{{ route('teacher.attendance.student') }}" class="btn btn-success btn-outlook"
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
                @if (!empty($getStudentClass) && !empty($getStudentClass->count()))
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
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getStudentClass as $student)
                                        @php
                                            $attendance_type = '';
                                            $getAttendance = $student->getAttendance(
                                                $student->id,
                                                Request('class_id'),
                                                Request('attendance_date'),
                                            );
                                            if (!empty($getAttendance->attendance_type)) {
                                                $attendance_type = $getAttendance->attendance_type;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->name }} {{ $student->last_name }}</td>
                                            <td>
                                                <label style="margin-right: 10px"><input type="radio"
                                                        id="{{ $student->id }}" class="saveAttendance" value="1"
                                                        name="attendance{{ $student->id }}"
                                                        @checked($attendance_type == 1)>Present</label>
                                                <label style="margin-right: 10px"><input type="radio"
                                                        id="{{ $student->id }}" class="saveAttendance" value="2"
                                                        name="attendance{{ $student->id }}"
                                                        @checked($attendance_type == 2)>Late</label>
                                                <label style="margin-right: 10px"><input type="radio"
                                                        id="{{ $student->id }}" class="saveAttendance" value="3"
                                                        name="attendance{{ $student->id }}"
                                                        @checked($attendance_type == 3)>Absent</label>
                                                <label style="margin-right: 10px"><input type="radio"
                                                        id="{{ $student->id }}" class="saveAttendance" value="4"
                                                        name="attendance{{ $student->id }}"
                                                        @checked($attendance_type == 4)>Half Day</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.saveAttendance').change(function(e) {
            e.preventDefault();
            var student_id = $(this).attr('id');
            var attendance_type = $(this).val();
            var class_id = $('#getClass').val();
            var attendance_date = $('#getAttendanceDate').val();

            $.ajax({
                type: "POST",
                url: "{{ route('teacher.attendance.student.save') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    student_id: student_id,
                    attendance_type: attendance_type,
                    class_id: class_id,
                    attendance_date: attendance_date
                },
                dataType: "json",
                success: function(response) {
                    toastr.options.closeButton = true;
                    if (response.status == 200) {
                        toastr.success(response.message);
                    }
                }
            });
        });
    </script>
@endsection

