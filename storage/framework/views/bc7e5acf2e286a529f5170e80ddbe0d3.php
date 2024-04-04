
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Timetable</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php $__currentLoopData = $class_subject_exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <h2>Class - <span style="color: rgb(253, 141, 225);"><?php echo e($class['class_name']); ?></span></h2>  
                <?php $__currentLoopData = $class['exam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
               
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Exam - <span style="color: rgb(103, 235, 217);"><?php echo e($exam['exam_name']); ?></span></h3></h3>
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
                                <?php $__currentLoopData = $exam['subject']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($subject['subject_name']); ?></td>
                                        <td><?php echo e(date('l', strtotime($subject['exam_date']))); ?></td>
                                        <td><?php echo e(date('d-m-Y', strtotime($subject['exam_date']))); ?></td>
                                        <td><?php echo e(date('h:i A', strtotime($subject['start_time']))); ?></td>
                                        <td><?php echo e(date('h:i A', strtotime($subject['end_time']))); ?></td>
                                        <td><?php echo e($subject['room_number']); ?></td>
                                        <td><?php echo e($subject['full_marks']); ?></td>
                                        <td><?php echo e($subject['passing_marks']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/teacher/my_exam_timetable.blade.php ENDPATH**/ ?>