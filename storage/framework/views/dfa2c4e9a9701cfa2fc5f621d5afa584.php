
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Grade</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.examinations.marks_grade.add')); ?>" class="btn btn-primary">Add New Exam</a>
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
                                        <?php $__currentLoopData = $getMarksGrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getMarksGrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($getMarksGrade->name); ?></td>
                                            <td><?php echo e($getMarksGrade->percent_from); ?></td>
                                            <td><?php echo e($getMarksGrade->percent_to); ?></td>
                                            <td><?php echo e($getMarksGrade->created_name); ?></td>
                                            <td><?php echo e(date('d-m-Y h:i A', strtotime($getMarksGrade->created_at))); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.examinations.marks_grade.edit', $getMarksGrade->id)); ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="<?php echo e(route('admin.examinations.marks_grade.delete', $getMarksGrade->id)); ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/marks_grade/list.blade.php ENDPATH**/ ?>