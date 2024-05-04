@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notice Board</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.communicate.notice_board.add') }}" class="btn btn-primary">Add New Notice</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="" method="get">
                        <div class="row p-1">
                            <div class="form-group  col-md-3">
                                <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group  col-md-3">
                                <input type="text" class="form-control" name="email"
                                    value="{{ Request::get('email') }}" placeholder="Enter Email">
                            </div>
                            <div class="form-group  col-md-3">
                                <input type="date" class="form-control" name="date"
                                    value="{{ Request::get('date') }}">
                            </div>
                            <div class="form-group col-md-3 d-flex align-items-center">
                                <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                <a href="{{ route('admin.admin.list') }}" class="btn btn-success btn-outlook"
                                    role="button">Reset</a>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
                </div> --}}
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Notice Board List</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Notice Board</th>
                                            <th>Publish Date</th>
                                            <th>Message To</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($get_notices as $get_notice)
                                            <tr>
                                                <td>{{ $get_notice->id }}</td>
                                                <td>{{ $get_notice->title }}</td>
                                                <td>{{ date('d-m-Y', strtotime($get_notice->notice_date)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($get_notice->publish_date)) }}</td>
                                                <td>{{ $get_notice->createdby }}</td>
                                                <td>{{ date('d-m-Y', strtotime($get_notice->created_at)) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">Record Not Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div style="padding: 10px; float:right">
                                    {!! $admins->appends(Request::except('page'))->links() !!}
                                </div> --}}
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
