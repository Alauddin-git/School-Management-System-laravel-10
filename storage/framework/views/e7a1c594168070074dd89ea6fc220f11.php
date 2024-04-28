
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>My Student Timetable (<?php echo e($getClass->name); ?> - <?php echo e($getSubject->name); ?>) <span style="color: blue">(<?php echo e($getStudent->name); ?> <?php echo e($getStudent->last_name); ?>)</span></h1>
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
                        <h3 class="card-title">
                            <?php echo e($getClass->name); ?> - <?php echo e($getSubject->name); ?>

                        </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>week</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $class_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($week['week_name']); ?></td>
                                        <td><?php echo e(!empty($week['start_time'])? date('h:i A', strtotime($week['start_time'])): ''); ?></td>
                                        <td><?php echo e(!empty($week['end_time'])? date('h:i A', strtotime($week['end_time'])): ''); ?></td>
                                        <td><?php echo e($week['room_number']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/my_timetable.blade.php ENDPATH**/ ?>