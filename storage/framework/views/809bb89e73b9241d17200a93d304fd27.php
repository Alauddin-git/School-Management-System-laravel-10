
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam List (Total: <?php echo e($getExamRecords->total()); ?>)</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.examinations.exam.add.show')); ?>" class="btn btn-primary">Add New Exam</a>
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
                        <h3 class="card-title">Search Exam</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="" method="get">
                        <div class="row p-1">
                            <div class="form-group  col-md-3">
                                <input type="text" class="form-control" name="name" value="<?php echo e(Request::get('name')); ?>"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group  col-md-3">
                                <input type="date" class="form-control" name="date"
                                    value="<?php echo e(Request::get('date')); ?>">
                            </div>
                            <div class="form-group col-md-3 d-flex align-items-center">
                                <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                <a href="<?php echo e(route('admin.examinations.exam.list')); ?>" class="btn btn-success btn-outlook"
                                    role="button">Reset</a>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam list</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Note</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getExamRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getExamRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($getExamRecord->id); ?></td>
                                                <td><?php echo e($getExamRecord->name); ?></td>
                                                <td><?php echo e($getExamRecord->note); ?></td>
                                                <td><?php echo e($getExamRecord->created_name); ?></td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($getExamRecord->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.examinations.exam.edit', $getExamRecord->id)); ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="<?php echo e(route('admin.examinations.exam.delete', $getExamRecord->id)); ?>"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    <?php echo $getExamRecords->appends(Request::except('page'))->links(); ?>

                                </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/exam/list.blade.php ENDPATH**/ ?>