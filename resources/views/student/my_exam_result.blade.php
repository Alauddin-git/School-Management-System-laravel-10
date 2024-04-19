@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Exam Result</h1>
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
                    @foreach ($examResults as $examResult)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">{{ $examResult['exam_name'] }}</div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Class Work</th>
                                            <th>Test Work</th>
                                            <th>Home Work</th>
                                            <th>Exam Marks</th>
                                            <th>Total Score</th>
                                            <th>Full Marks</th>
                                            <th>Passing Marks</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_score = 0;
                                            $full_marks = 0;
                                            $result_validation = 0;
                                        @endphp
                                        @foreach ($examResult['subject'] as $subject)
                                        @php
                                           $total_score = $total_score + $subject['total_score'];
                                           $full_marks = $full_marks + $subject['full_marks'];
                                        @endphp
                                        <tr>
                                            <td>{{ $subject['subject_name'] }}</td>
                                            <td>{{ $subject['class_work'] }}</td>
                                            <td>{{ $subject['test_work'] }}</td>
                                            <td>{{ $subject['home_work'] }}</td>
                                            <td>{{ $subject['exam'] }}</td>
                                            <td>{{ $subject['total_score'] }}</td>
                                            <td>{{ $subject['full_marks'] }}</td>
                                            <td>{{ $subject['passing_marks'] }}</td>
                                            <td>
                                                @if ($subject['total_score'] >= $subject['passing_marks'])
                                                    <span style="color: green; font-weight:bold">Pass</span>
                                                @else
                                                @php
                                                    $result_validation = 1;
                                                @endphp
                                               <span style="color: red; font-weight:bold">Fail</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <b>Grand Total: {{ $total_score }}/{{ $full_marks }}</b>
                                            </td>
                                            <td colspan="3">
                                                <b>Percentage: {{ round(($total_score * 100) / $full_marks, 2) }} %</b>
                                            </td>
                                            <td colspan="5">
                                                <b>Result: 
                                                    @if ($result_validation == 0)
                                                        <span style="color:green;">Pass</span>
                                                    @else
                                                        <span style="color:red;">Fail</span>
                                                    @endif
                                                </b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    @endforeach
                                    
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
