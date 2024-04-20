@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Marks Grade</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.examinations.marks_grade.add.perform') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Grade Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Grade Name" required>
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="percent_from">Percent From</label>
                            <input type="text" class="form-control" name="percent_from" value="{{ old('percent_from') }}" placeholder="Percent from" required>
                            <div style="color: red">{{ $errors->first('percent_from') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="percent_to">Percent To</label>
                            <input type="text" class="form-control" name="percent_to" value="{{ old('percent_to') }}" placeholder="Percent to" required>
                            <div style="color: red">{{ $errors->first('percent_to') }}</div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
