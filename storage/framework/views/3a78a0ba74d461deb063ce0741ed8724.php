
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notice Board</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.communicate.notice_board.add')); ?>" class="btn btn-primary">Add New Notice</a>
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
                                <h3 class="card-title">Notice Board List</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Notice Board</th>
                                            <th>Publish Date</th>
                                            <th>Message To</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $get_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get_notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($get_notice->id); ?></td>
                                                <td><?php echo e($get_notice->title); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($get_notice->notice_date))); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($get_notice->publish_date))); ?></td>
                                                <td><?php echo e($get_notice->createdby); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($get_notice->created_at))); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="100%">Record Not Found</td>
                                            </tr>
                                        <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/communicate/noticeboard/list.blade.php ENDPATH**/ ?>