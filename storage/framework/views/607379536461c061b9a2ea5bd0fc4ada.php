
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>My Student Exam Timetable(Name- <span style="color: rgb(48, 168, 32);"><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></span> , Class- <span style="color: rgb(48, 168, 32);"><?php echo e($getClassName->name); ?></span> )</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php $__currentLoopData = $exam_timetables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_timetable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: rgb(103, 235, 217);"><?php echo e($exam_timetable['exam_name']); ?></h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Exam Day</th>
                                    <th>Exam Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                    <th>Full Marks</th>
                                    <th>Passing Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $exam_timetable['exam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($exam['subject_name']); ?></td>
                                        <td><?php echo e(date('l', strtotime($exam['exam_date']))); ?></td>
                                        <td><?php echo e(date('d-m-Y', strtotime($exam['exam_date']))); ?></td>
                                        <td><?php echo e(date('h:i A', strtotime($exam['start_time']))); ?></td>
                                        <td><?php echo e(date('h:i A', strtotime($exam['end_time']))); ?></td>
                                        <td><?php echo e($exam['room_number']); ?></td>
                                        <td><?php echo e($exam['full_marks']); ?></td>
                                        <td><?php echo e($exam['passing_marks']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/myStudent_exam_timetable.blade.php ENDPATH**/ ?>