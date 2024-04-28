
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attendance Report(<span style="color: blue">Total: <?php echo e($studentAtttendances->total()); ?></span>)</h1>
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
                                        value="<?php echo e(Request('student_id')); ?>">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="student_name" placeholder="Student Name"
                                        value="<?php echo e(Request('student_name')); ?>">
                                </div>
                                <div class="form-group  col-md-2">
                                    <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        <?php $__currentLoopData = $getClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"
                                                <?php echo e(Request('class_id') == $class->id ? 'selected' : ''); ?>>
                                                <?php echo e($class->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="date" class="form-control" name="attendance_date"
                                        value="<?php echo e(Request('attendance_date')); ?>">
                                </div>
                                <div class="form-group  col-md-2">
                                    <select class="form-control" name="attendance_type">
                                        <option value="">Choose Attendance Type</option>
                                        <option <?php if(Request('attendance_type') == 1): echo 'selected'; endif; ?> value="1">Present</option>
                                        <option <?php if(Request('attendance_type') == 2): echo 'selected'; endif; ?> value="2">Late</option>
                                        <option <?php if(Request('attendance_type') == 3): echo 'selected'; endif; ?> value="3">Absent</option>
                                        <option <?php if(Request('attendance_type') == 4): echo 'selected'; endif; ?> value="4">Half Day</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('admin.attendance.report')); ?>" class="btn btn-success btn-outlook"
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
                            <?php $__empty_1 = true; $__currentLoopData = $studentAtttendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentAtttendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($studentAtttendance->student_id); ?></td>
                                    <td><?php echo e($studentAtttendance->student_name); ?> <?php echo e($studentAtttendance->student_last_name); ?>

                                    <td><?php echo e($studentAtttendance->class_name); ?></td>
                                    </td>
                                    <td>
                                        <?php if($studentAtttendance->attendance_type == 1): ?>
                                            Present
                                        <?php elseif($studentAtttendance->attendance_type == 2): ?>
                                            Late
                                        <?php elseif($studentAtttendance->attendance_type == 3): ?>
                                            Absent
                                        <?php elseif($studentAtttendance->attendance_type == 4): ?>
                                            Half Day
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date('d-m-Y', strtotime($studentAtttendance->attendance_date))); ?></td>
                                    <td><?php echo e($studentAtttendance->created_name); ?></td>
                                    <td><?php echo e(date('d-m-Y H:i A', strtotime($studentAtttendance->created_at))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="100%">Record Not found</td>
                                </tr>
                            <?php endif; ?>
                            <tbody>
                            </tbody>
                        </table>
                        <div style="padding: 10px; float:right">
                            <?php echo $studentAtttendances->appends(Request::except('page'))->links(); ?>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/attendance/report.blade.php ENDPATH**/ ?>