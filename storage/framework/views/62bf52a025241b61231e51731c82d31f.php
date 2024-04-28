
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Attendance(<span style="color: blue">Total: <?php echo e($my_attendances->total()); ?></span>) </h1>
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
                        <h3 class="card-title">Search My Attendance </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <form action="" method="get">
                                <div class="row" style="display: flex; flex-wrap: wrap; align-items: center;">
                                    <div class="form-group col-md-3" style="margin-right: 10px; display: flex;">
                                        <select class="form-control" name="class_id">
                                            <option value="">Select Class</option>
                                            <?php $__currentLoopData = $my_attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->class_id); ?>" <?php echo e(Request('class_id') == $class->id ? 'selected' : ''); ?>>
                                                    <?php echo e($class->class_name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" style="margin-right: 10px; display: flex;">
                                        <select class="form-control" name="attendance_type">
                                            <option value="">Choose Attendance Type</option>
                                            <option <?php if(Request('attendance_type') == 1): echo 'selected'; endif; ?> value="1">Present</option>
                                            <option <?php if(Request('attendance_type') == 2): echo 'selected'; endif; ?> value="2">Late</option>
                                            <option <?php if(Request('attendance_type') == 3): echo 'selected'; endif; ?> value="3">Absent</option>
                                            <option <?php if(Request('attendance_type') == 4): echo 'selected'; endif; ?> value="4">Half Day</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" style="display: flex; align-items: center; margin-right: 90px;">
                                        <label for="start_attendance_date" style="margin-right: 10px; white-space: nowrap;">Start Attendance Date:</label>
                                        <input type="date" class="form-control" id="start_attendance_date" name="start_attendance_date" 
                                               value="<?php echo e(Request('start_attendance_date')); ?>" style="flex-grow: 1;">
                                    </div>
                                    <div class="form-group col-md-3" style="display: flex; align-items: center; margin-right: 90px;">
                                        <label for="end_attendance_date" style="margin-right: 10px; white-space: nowrap;">End Attendance Date:</label>
                                        <input type="date" class="form-control" id="end_attendance_date" name="end_attendance_date" 
                                               value="<?php echo e(Request('end_attendance_date')); ?>" style="flex-grow: 1;">
                                    </div>
                                    <div class="form-group col-md-auto" style="display: flex;">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a href="<?php echo e(route('student.my_attendance')); ?>" class="btn btn-success ml-2"
                                           role="button">Reset</a>
                                    </div>
                                </div>     
                            </form>
                               
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Attendance Type</th>
                                    <th>Attendance Date</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($my_attendances)): ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $my_attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($my_attendance->class_name); ?></td>
                                            </td>
                                            <td>
                                                <?php if($my_attendance->attendance_type == 1): ?>
                                                    Present
                                                <?php elseif($my_attendance->attendance_type == 2): ?>
                                                    Late
                                                <?php elseif($my_attendance->attendance_type == 3): ?>
                                                    Absent
                                                <?php elseif($my_attendance->attendance_type == 4): ?>
                                                    Half Day
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date('d-m-Y', strtotime($my_attendance->attendance_date))); ?></td>
                                            <td><?php echo e(date('d-m-Y H:i A', strtotime($my_attendance->created_at))); ?></td>
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
                        <?php if(!empty($my_attendances)): ?>
                        <div style="padding: 10px; float:right">
                            <?php echo $my_attendances->appends(Request::except('page'))->links(); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/student/my_attendance.blade.php ENDPATH**/ ?>