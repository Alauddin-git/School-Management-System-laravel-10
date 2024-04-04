
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(url('admin/admin/update/'. $admin->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" name="name" value="<?php echo e(old('name', $admin->name)); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo e(old('$admin->email', $admin->email)); ?>" required>
                            <div style="color: red"><?php echo e($errors->first('email')); ?></div>

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Enter new Password" required>
                            <p>Due you want to change password so please add new password</p>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/admin/edit.blade.php ENDPATH**/ ?>