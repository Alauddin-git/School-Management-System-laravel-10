
<?php $__env->startSection('content'); ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Parent</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.parent.update', $parent->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">First Name</label><span style="color:red;">*</span>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name', $parent->name)); ?>" placeholder="Enter First Name" required>
                                <div style="color: red"><?php echo e($errors->first('name')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label><span style="color:red;">*</span>
                                <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo e(old('last_name', $parent->last_name)); ?>" placeholder="Enter Last Name" required>
                                <div style="color: red"><?php echo e($errors->first('last_name')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label><span style="color:red;">*</span>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option <?php echo e((old('gender', $parent->gender) == 'Male')?'selected':''); ?> value="Male">Male</option>
                                    <option <?php echo e((old('gender', $parent->gender) == 'Female')?'selected':''); ?> value="Female">Female</option>
                                    <option <?php echo e((old('gender', $parent->gender) == 'Other')?'selected':''); ?> value="Other">Other</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('gender')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="occupation">Occupation</label><span style="color:red;">*</span>
                                <input type="text" id="occupation" class="form-control" name="occupation" value="<?php echo e(old('occupation', $parent->occupation)); ?>" placeholder="Enter Occupation" required>
                                <div style="color: red"><?php echo e($errors->first('occupation')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="mobile_number">Mobile Number</label><span style="color:red;">*</span>
                                <input type="text" id="mobile_number" class="form-control" name="mobile_number" value="<?php echo e(old('mobile_number', $parent->mobile_number)); ?>" placeholder="Enter Mobile Number" required>
                                <div style="color: red"><?php echo e($errors->first('mobile_number')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="profile_pic">Profile Pic</label><span style="color:red;">*</span>
                                <input type="file" id="profile_pic" class="form-control" name="profile_pic" >
                                <div style="color: red"><?php echo e($errors->first('profile_pic')); ?></div>
                                <?php if(!empty($parent->getProfile())): ?>
                                <img src="<?php echo e($parent->getProfile()); ?>" style="width:100px">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label><span style="color:red;">*</span>
                                <input type="text" id="address" class="form-control" name="address" value="<?php echo e(old('address', $parent->address)); ?>" placeholder="Enter address" required>
                                <div style="color: red"><?php echo e($errors->first('address')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label><span style="color:red;">*</span>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option <?php echo e((old('status', $parent->status) == 0)?'selected':''); ?> value="0">Active</option>
                                    <option <?php echo e((old('status', $parent->status) == 1)?'selected':''); ?> value="1">Inactive</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('status')); ?></div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email address</label><span style="color:red;">*</span>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $parent->email)); ?>" placeholder="Enter email" required>
                                <div style="color: red"><?php echo e($errors->first('email')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label><span style="color:red;">*</span>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                <div style="color: red"><?php echo e($errors->first('password')); ?></div>
                            </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/parent/edit.blade.php ENDPATH**/ ?>