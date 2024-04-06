
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam Schedule</h1>
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
                        <h3 class="card-title">Search Exam Schedule</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="" method="get">
                        <div class="row p-1">
                            <div class="form-group  col-md-3">
                                <select class="form-control" name="exam_id" required>
                                    <option value="">Select Exam</option>
                                    <?php $__currentLoopData = $getExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e((Request('exam_id') == $exam->id)? 'selected':''); ?> value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group  col-md-3">
                                <select class="form-control" name="class_id" required>
                                    <option value="">Select Class</option>
                                    <?php $__currentLoopData = $getClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e((Request('class_id') == $class->id)? 'selected':''); ?> value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 d-flex align-items-center">
                                <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                <a href="<?php echo e(route('admin.examinations.exam_schedule')); ?>" class="btn btn-success btn-outlook"
                                    role="button">Reset</a>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Small boxes (Stat box) -->
                <?php if(!empty($exam_schedules)): ?>
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo e(route('admin.examinations.exam_schedule.add.perform')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="exam_id" value="<?php echo e(Request('exam_id')); ?>">
                            <input type="hidden" name="class_id" value="<?php echo e(Request('class_id')); ?>">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam Schedule</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>
                                            <th>Full Marks</th>
                                            <th>Passing Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $exam_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($exam_schedule['subject_name']); ?>

                                                    <input type="hidden" class="form-control" value="<?php echo e($exam_schedule['subject_id']); ?>" name="schedule[<?php echo e($i); ?>][subject_id]">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" value="<?php echo e($exam_schedule['exam_date']); ?>" name="schedule[<?php echo e($i); ?>][exam_date]">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="<?php echo e($exam_schedule['start_time']); ?>" name="schedule[<?php echo e($i); ?>][start_time]">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="<?php echo e($exam_schedule['end_time']); ?>" name="schedule[<?php echo e($i); ?>][end_time]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="<?php echo e($exam_schedule['room_number']); ?>" name="schedule[<?php echo e($i); ?>][room_number]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="<?php echo e($exam_schedule['full_marks']); ?>" name="schedule[<?php echo e($i); ?>][full_marks]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="<?php echo e($exam_schedule['passing_marks']); ?>" name="schedule[<?php echo e($i); ?>][passing_marks]">
                                                </td>
                                            </tr>
                                        <?php
                                        $i++;
                                    ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div style="text-align: center; padding: 20px">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        </form>
                        <!-- /.card -->
                    </div>
                </div>
                <?php endif; ?>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/exam_schedule.blade.php ENDPATH**/ ?>