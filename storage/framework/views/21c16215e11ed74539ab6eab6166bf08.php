
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student</h1>
                    </div>
                </div>
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
                                <h3 class="card-title">My Student</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Studen ID</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weigth</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getParentStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($student->id); ?></td>
                                            <td>
                                                <?php if($student->getProfile()): ?>
                                                    <img src="<?php echo e($student->getProfile()); ?>"
                                                        style="height: 50px; width:50px; border-radius:50px;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></td>
                                            <td><?php echo e($student->email); ?></td>
                                            <td><?php echo e($student->admission_number); ?></td>
                                            <td><?php echo e($student->roll_number); ?></td>
                                            <td><?php echo e($student->class_name); ?></td>
                                            <td><?php echo e($student->gender); ?></td>
                                            <td>
                                                <?php if(!@empty($student->date_of_birth)): ?>
                                                    <?php echo e(date('d-m-Y', strtotime($student->date_of_birth))); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($student->caste); ?></td>
                                            <td><?php echo e($student->religion); ?></td>
                                            <td><?php echo e($student->mobile_number); ?></td>
                                            <td>
                                                <?php if(!@empty($student->admission_date)): ?>
                                                    <?php echo e(date('d-m-Y', strtotime($student->admission_date))); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($student->blood_group); ?></td>
                                            <td><?php echo e($student->height); ?></td>
                                            <td><?php echo e($student->weight); ?></td>
                                            <td><?php echo e(date('d-m-Y h:i A', strtotime($student->created_at))); ?></td>
                                            <td>
                                                 <a class="btn btn-success btn-sm" href="<?php echo e(route('parent.my_student.subject', $student->id)); ?>">Subject</a>
                                                 <a class="btn btn-primary btn-sm" href="<?php echo e(route('parent.my_student.exam_timetable', $student->id)); ?>">Exam Timetable</a>
                                                 <a class="btn btn-warning btn-sm" href="<?php echo e(route('parent.my_student.exam_result', $student->id)); ?>">Exam Result</a>
                                                 <a class="btn btn-secondary btn-sm" href="<?php echo e(route('parent.my_student.calendar', $student->id)); ?>">Calendar</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/my_student.blade.php ENDPATH**/ ?>