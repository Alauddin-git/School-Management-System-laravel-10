@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Register</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.examinations.exam.add.show') }}" class="btn btn-primary">Add New Exam</a>
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
                        <h3 class="card-title">Search Marks Register</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row p-1">
                                <div class="form-group  col-md-3">
                                    <select class="form-control" name="exam_id" required>
                                        <option value="">Select Exam</option>
                                        @foreach ($getExam as $exam)
                                            <option {{ Request('exam_id') == $exam->id ? 'selected' : '' }}
                                                value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-3">
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class</option>
                                        @foreach ($getClass as $class)
                                            <option {{ Request('class_id') == $class->id ? 'selected' : '' }}
                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="{{ route('admin.examinations.marks_register') }}"
                                        class="btn btn-success btn-outlook" role="button">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        @if (!empty($getSubject) && !empty($getSubject->count()))
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Marks Register</h3>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        @foreach ($getSubject as $subject)
                                                            <th>{{ $subject->subject_name }}<br>
                                                                ({{ $subject->subject_type }} :
                                                                {{ $subject->passing_marks }} /
                                                                {{ $subject->full_marks }})
                                                            </th>
                                                        @endforeach
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($getStudentClass as $student)
                                                        <tr>
                                                            <form name="post" class="submitMarks">
                                                                @csrf
                                                                <input type="hidden" name="student_id"
                                                                    value="{{ $student->id }}">
                                                                <input type="hidden" name="exam_id"
                                                                    value="{{ Request('exam_id') }}">
                                                                <input type="hidden" name="class_id"
                                                                    value="{{ Request('class_id') }}">
                                                                <td>{{ $student->name }} {{ $student->last_name }}</td>
                                                                @php
                                                                    $i = 1;
                                                                    $totalStudentMark = 0;
                                                                    $totalFullMark = 0;
                                                                    $totalPassingMark = 0;
                                                                    $pass_fail_vali = 0;
                                                                @endphp
                                                                @foreach ($getSubject as $subject) 
                                                                    @php
                                                                        $totalMark = 0;
                                                                        $totalFullMark =
                                                                            $totalFullMark + $subject->full_marks;
                                                                        $totalPassingMark =
                                                                            $totalPassingMark + $subject->passing_marks;

                                                                        $getMark = $subject->getMark(
                                                                            $student->id,
                                                                            Request('exam_id'),
                                                                            Request('class_id'),
                                                                            $subject->subject_id,
                                                                        );
                                                                        if (!empty($getMark)) {
                                                                            $totalMark =
                                                                                $getMark->class_work +
                                                                                $getMark->home_work +
                                                                                $getMark->test_work +
                                                                                $getMark->exam;
                                                                        }
                                                                        $totalStudentMark =
                                                                            $totalStudentMark + $totalMark;
                                                                    @endphp
                                                                    <td>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Class Work
                                                                            <input type="hidden"
                                                                                name="mark[{{ $i }}][full_marks]"
                                                                                value="{{ $subject->full_marks }}">
                                                                            <input type="hidden"
                                                                                name="mark[{{ $i }}][passing_marks]"
                                                                                value="{{ $subject->passing_marks }}">
                                                                            <input type="hidden"
                                                                                name="mark[{{ $i }}][id]"
                                                                                value="{{ $subject->id }}">
                                                                            <input type="hidden"
                                                                                name="mark[{{ $i }}][subject_id]"
                                                                                value="{{ $subject->subject_id }}">
                                                                            <input type="text"
                                                                                name="mark[{{ $i }}][class_work]"
                                                                                class="form-control"
                                                                                id="class_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                value="{{ !empty($getMark->class_work) ? $getMark->class_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Home Work
                                                                            <input type="text"
                                                                                name="mark[{{ $i }}][home_work]"
                                                                                class="form-control"
                                                                                id="home_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                value="{{ !empty($getMark->home_work) ? $getMark->home_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Test Work
                                                                            <input type="text"
                                                                                name="mark[{{ $i }}][test_work]"
                                                                                class="form-control"
                                                                                id="test_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                value="{{ !empty($getMark->test_work) ? $getMark->test_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Exam
                                                                            <input type="text"
                                                                                name="mark[{{ $i }}][exam]"
                                                                                class="form-control"
                                                                                id="exam_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            <button type="submit"
                                                                                class="btn btn-primary saveSingleSubject"
                                                                                data-student="{{ $student->id }}"
                                                                                data-class = "{{ Request('class_id') }}"
                                                                                data-exam = "{{ Request('exam_id') }}"
                                                                                data-schedule = "{{ $subject->id }}"
                                                                                data-subject="{{ $subject->subject_id }}">Save</button>
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            @if (!empty($getMark))
                                                                                <b>Total Mark: {{ $totalMark }}</b> <br>
                                                                                <b>Passing Mark:
                                                                                    {{ $subject->passing_marks }}</b> <br>
                                                                                @if ($totalMark >= $subject->passing_marks)
                                                                                   Result: <span
                                                                                        style="color:green; font-weight: bold">Pass</span>
                                                                                @else
                                                                                  Result:  <span
                                                                                        style="color:red; font-weight: bold">Fail</span>
                                                                                    @php
                                                                                        $pass_fail_vali = 1;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                @endforeach
                                                                <td>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Save</button> <br>
                                                                    @if (!empty($totalStudentMark))
                                                                        Total Student Mark : {{ $totalStudentMark }} <br>
                                                                        Total Full Mark : {{ $totalFullMark }} <br>
                                                                        Total Passing Mark : {{ $totalPassingMark }} <br>
                                                                        @php
                                                                            $percentage = ($totalStudentMark * 100) / $totalFullMark;
                                                                        @endphp
                                                                        <b>Percentage: </b>{{ round($percentage, 2) }}%
                                                                        <br>
                                                                        @if ($pass_fail_vali == 0)
                                                                           Result: <span
                                                                                style="color:green; font-weight: bold">Pass</span>
                                                                        @else
                                                                           Result: <span
                                                                                style="color:red; font-weight: bold">Fail</span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.submitMarks').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/examinations/submit_marks_register') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    toastr.options.closeButton = true;
                    if (response.status == 200) {
                        toastr.success(response.message);
                    } else if (response.status == 400) {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $('.saveSingleSubject').click(function(e) {
            e.preventDefault();
            var student_id = $(this).data('student');
            var class_id = $(this).data('class');
            var exam_id = $(this).data('exam');
            var subject_id = $(this).data('subject');
            var id = $(this).data('schedule');
            var class_work = $('#class_work_' + student_id + subject_id).val();
            var home_work = $('#home_work_' + student_id + subject_id).val();
            var test_work = $('#test_work_' + student_id + subject_id).val();
            var exam = $('#exam_' + student_id + subject_id).val();

            $.ajax({
                type: "POST",
                url: "{{ url('admin/examinatinos/single_submit_marks_register') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    student_id: student_id,
                    subject_id: subject_id,
                    exam_id: exam_id,
                    class_id: class_id,
                    class_work: class_work,
                    home_work: home_work,
                    test_work: test_work,
                    exam: exam
                },
                dataType: "json",
                success: function(response) {
                    toastr.options.closeButton = true;
                    if (response.status == 200) {
                        toastr.success(response.message);
                    } else if (response.status == 400) {
                        toastr.error(response.message);
                    }
                }
            });
        });
    </script>
@endsection
