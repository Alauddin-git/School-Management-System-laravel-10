
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Marks Grade</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.examinations.marks_grade.update', $marks_grade->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Grade Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $marks_grade->name)); ?>" required>
                            <div style="color: red"><?php echo e($errors->first('name')); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="percent_from">Percent From</label>
                            <input type="text" class="form-control" name="percent_from" value="<?php echo e(old('percent_from', $marks_grade->percent_from)); ?>" required>
                            <div style="color: red"><?php echo e($errors->first('percent_from')); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="percent_to">Percent To</label>
                            <input type="text" class="form-control" name="percent_to" value="<?php echo e(old('percent_to', $marks_grade->percent_to)); ?>" required>
                            <div style="color: red"><?php echo e($errors->first('percent_to')); ?></div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/marks_grade/edit.blade.php ENDPATH**/ ?>