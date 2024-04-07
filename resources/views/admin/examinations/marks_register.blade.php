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
                                                    @forelse ($getStudentClass as $student)
                                                        <tr>
                                                            <form name="post"  class="submitMarks"> 
                                                                @csrf
                                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                                <input type="hidden" name="exam_id" value="{{ Request('exam_id') }}">
                                                                <input type="hidden" name="class_id" value="{{ Request('class_id') }}">
                                                                <td>{{ $student->name }} {{ $student->last_name }}</td>
                                                                @php
                                                                    $i = 1;
                                                                @endphp
                                                                @foreach ($getSubject as $subject)
                                                                @php
                                                                    $getMark = $subject->getMark($student->id, Request('exam_id'), Request('class_id'), $subject->subject_id);
                                                                @endphp
                                                                    <td>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Class Work
                                                                            <input type="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                                                            <input type="text" name="mark[{{ $i }}][class_work]"  class="form-control" value="{{ !empty($getMark->class_work)? $getMark->class_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Home Work
                                                                            <input type="text" name="mark[{{ $i }}][home_work]" class="form-control" value="{{ !empty($getMark->home_work)? $getMark->home_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Test Work
                                                                            <input type="text" name="mark[{{ $i }}][test_work]" class="form-control" value="{{ !empty($getMark->test_work)? $getMark->test_work : '' }}">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Exam
                                                                            <input type="text" name="mark[{{ $i }}][exam]" class="form-control" value="{{ !empty($getMark->exam)? $getMark->exam : '' }}">
                                                                        </div>
                                                                    </td>
                                                                    @php
                                                                    $i++;
                                                                @endphp
                                                                @endforeach
                                                                <td>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Save</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="100%">No students found</td>
                                                        </tr>
                                                    @endforelse
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
        $('.submitMarks').submit(function(e){ 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/examinations/submit_marks_register') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                }
            });
        });
    </script>
@endsection
