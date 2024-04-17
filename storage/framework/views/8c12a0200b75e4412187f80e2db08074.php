
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Class & Subject</h1>
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
                                <h3 class="card-title">My Class & Subject</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                            <th>My Class Today Timetable</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $myClassSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myClassSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($myClassSubject->id); ?></td>
                                                <td><?php echo e($myClassSubject->class_name); ?></td>
                                                <td><?php echo e($myClassSubject->subject_name); ?></td>
                                                <td><?php echo e($myClassSubject->subject_type); ?></td>
                                                <td>
                                                    <?php
                                                        $class_subject = $myClassSubject->getMyTimeTable(
                                                            $myClassSubject->classe_id,
                                                            $myClassSubject->subject_id,
                                                        );
                                                    ?>
                                                    <?php if(!empty($class_subject)): ?>
                                                        <?php echo e(date('h:i A', strtotime($class_subject->start_time))); ?> to
                                                        <?php echo e(date('h:i A', strtotime($class_subject->end_time))); ?>

                                                        <br>
                                                        Room number: <?php echo e($class_subject->room_number); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($myClassSubject->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('teacher.my_class_subject.class_timetable', [
                                                        'classe_id' => $myClassSubject->classe_id,
                                                        'subject_id' => $myClassSubject->subject_id,
                                                    ])); ?>"
                                                        class="btn btn-primary">My Class Timetable</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/teacher/my_class_subject.blade.php ENDPATH**/ ?>