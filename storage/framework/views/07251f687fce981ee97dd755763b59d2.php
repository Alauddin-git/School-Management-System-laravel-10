
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Exam</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.examinations.exam.add.perform')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Exam Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Exam Name" required>
                            <div style="color: red"><?php echo e($errors->first('name')); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Note</label>
                            <textarea class="form-control" name="note" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/exam/add.blade.php ENDPATH**/ ?>