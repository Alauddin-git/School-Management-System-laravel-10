
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Student Subject(name: <span style="color: blue"><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></span>, Class-<span style="color: blue"><?php echo e($mySubjects->first()->class_name); ?></span>)</h1>
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
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $mySubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mySubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($mySubject->subject_name); ?></td>
                                                <td><?php echo e($mySubject->subject_type); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('parent.my_student.subject.timetable', ['classe_id' => $mySubject->classe_id, 
                                                        'subject_id' => $mySubject->subject_id, 'student_id' => $student->id])); ?>"   class="btn btn-primary">My Class Timetable</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/my_student_subject.blade.php ENDPATH**/ ?>