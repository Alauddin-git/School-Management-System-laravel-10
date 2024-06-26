
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
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="student_id" placeholder="Student Id"
                                        value="<?php echo e(Request('student_id')); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="student_name"
                                        placeholder="Student Name" value="<?php echo e(Request('student_name')); ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        <?php $__currentLoopData = $getClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->class_id); ?>"
                                                <?php echo e(Request('class_id') == $class->class_id ? 'selected' : ''); ?>>
                                                <?php echo e($class->class_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="attendance_type">
                                        <option value="">Choose Attendance Type</option>
                                        <option <?php if(Request('attendance_type') == 1): echo 'selected'; endif; ?> value="1">Present</option>
                                        <option <?php if(Request('attendance_type') == 2): echo 'selected'; endif; ?> value="2">Late</option>
                                        <option <?php if(Request('attendance_type') == 3): echo 'selected'; endif; ?> value="3">Absent</option>
                                        <option <?php if(Request('attendance_type') == 4): echo 'selected'; endif; ?> value="4">Half Day</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-1" style="display: flex; align-items: center; width: 100%;">
                                <div class="form-group col-md-3" style="display: flex; align-items: center; margin-right: 90px;">
                                    <label for="start_attendance_date" style="margin-right: 10px;">Start Attendance Date:</label>
                                    <input type="date" class="form-control" id="start_attendance_date" name="start_attendance_date" 
                                           value="<?php echo e(Request('start_attendance_date')); ?>" style="flex-grow: 1;">
                                </div>
                                <div class="form-group col-md-3" style="display: flex; align-items: center; margin-right: 90px;">
                                    <label for="end_attendance_date" style="margin-right: 10px;">End Attendance Date:</label>
                                    <input type="date" class="form-control" id="end_attendance_date" name="end_attendance_date" 
                                           value="<?php echo e(Request('end_attendance_date')); ?>" style="flex-grow: 1;">
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center" style="display: flex; margin-right: 10px;">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('teacher.attendance.report')); ?>" class="btn btn-success btn-outlook" role="button">Reset</a>
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
                        <h3 class="card-title">Attendance List</h3>
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
                            <tbody>
                            <?php if(!empty($studentAtttendances)): ?>
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
                            <?php else: ?>
                            <tr>
                                <td colspan="100%">Record Not found</td>
                            </tr>             
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php if(!empty($studentAtttendances)): ?>
                        <div style="padding: 10px; float:right">
                            <?php echo $studentAtttendances->appends(Request::except('page'))->links(); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/teacher/attendance/report.blade.php ENDPATH**/ ?>