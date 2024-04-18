
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
                <?php $__currentLoopData = $class_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: rgb(103, 235, 217);"><?php echo e($class_schedule['subject_name']); ?></h3>
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
                                <?php $__currentLoopData = $class_schedule['week']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.getClass').change(function(e) {
                e.preventDefault();
                var class_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('admin.class_timetable.get_subject')); ?>",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        class_id: class_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.getSubject').html(response.html);
                    },

                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/student/my_timetable.blade.php ENDPATH**/ ?>