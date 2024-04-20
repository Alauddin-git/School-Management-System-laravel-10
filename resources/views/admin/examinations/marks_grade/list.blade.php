@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Grade</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.examinations.marks_grade.add') }}" class="btn btn-primary">Add New Exam</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Marks Grade list</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Grade Name</th>
                                            <th>Percent From</th>
                                            <th>Percent To</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getMarksGrades as $getMarksGrade)
                                        <tr>
                                            <td>{{ $getMarksGrade->name }}</td>
                                            <td>{{ $getMarksGrade->percent_from }}</td>
                                            <td>{{ $getMarksGrade->percent_to }}</td>
                                            <td>{{ $getMarksGrade->created_name }}</td>
                                            <td>{{ date('d-m-Y h:i A', strtotime($getMarksGrade->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.examinations.marks_grade.edit', $getMarksGrade->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin.examinations.marks_grade.delete', $getMarksGrade->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
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
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
