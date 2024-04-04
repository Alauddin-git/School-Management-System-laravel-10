
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Teacher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.teacher.update', $teacher->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">First Name</label><span style="color:red;">*</span>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name', $teacher->name)); ?>" placeholder="Enter First Name" required>
                                <div style="color: red"><?php echo e($errors->first('name')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label><span style="color:red;">*</span>
                                <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo e(old('last_name', $teacher->last_name)); ?>" placeholder="Enter Last Name" required>
                                <div style="color: red"><?php echo e($errors->first('last_name')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Current Address</label><span style="color:red;">*</span>
                                <input type="text" id="address" class="form-control" name="address" value="<?php echo e(old('address', $teacher->address)); ?>" placeholder="Enter Admission Number" required>
                                <div style="color: red"><?php echo e($errors->first('address')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="permanent_address">Permanent Address</label><span style="color:red;">*</span>
                                <input type="text" id="permanent_address" class="form-control" name="permanent_address" value="<?php echo e(old('permanent_address', $teacher->permanent_address)); ?>" placeholder="Enter Roll Number" required>
                                <div style="color: red"><?php echo e($errors->first('permanent_address')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date of Birth</label><span style="color:red;">*</span>
                                <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="<?php echo e(old('date_of_birth', $teacher->date_of_birth)); ?>" required>
                                <div style="color: red"><?php echo e($errors->first('date_of_birth')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label><span style="color:red;">*</span>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option <?php echo e((old('gender', $teacher->gender) == 'Male')?'selected':''); ?> value="Male">Male</option>
                                    <option <?php echo e((old('gender', $teacher->gender) == 'Female')?'selected':''); ?> value="Female">Female</option>
                                    <option <?php echo e((old('gender', $teacher->gender) == 'Other')?'selected':''); ?> value="Other">Other</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('gender')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="marital_status">Marital Status</label><span style="color:red;">*</span>
                                <input type="text" id="marital_status" class="form-control" name="marital_status" value="<?php echo e(old('marital_status', $teacher->marital_status)); ?>" placeholder="Enter marital_status" required>
                                <div style="color: red"><?php echo e($errors->first('marital_status')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number">Mobile Number</label><span style="color:red;">*</span>
                                <input type="text" id="mobile_number" class="form-control" name="mobile_number" value="<?php echo e(old('mobile_number', $teacher->mobile_number)); ?>" placeholder="Enter Mobile Number" required>
                                <div style="color: red"><?php echo e($errors->first('mobile_number')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="admission_date">Joining Date</label><span style="color:red;">*</span>
                                <input type="date" id="admission_date" class="form-control" name="admission_date" value="<?php echo e(old('admission_date', $teacher->admission_date)); ?>" placeholder="Enter Admission Date" required>
                                <div style="color: red"><?php echo e($errors->first('admission_date')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="profile_pic">Profile Pic</label><span style="color:red;">*</span>
                                <input type="file" id="profile_pic" class="form-control" name="profile_pic">
                                <div style="color: red"><?php echo e($errors->first('profile_pic')); ?></div>
                                <?php if(!empty($teacher->getProfile())): ?>
                                <img src="<?php echo e($teacher->getProfile()); ?>" style="width:100px">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="work_experience">Work Exprience</label><span style="color:red;">*</span>
                                <input type="text" id="work_experience" class="form-control" name="work_experience" value="<?php echo e(old('work_experience', $teacher->work_experience)); ?>" placeholder="Enter Blood Group" required>
                                <div style="color: red"><?php echo e($errors->first('work_experience')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="qualification">Qualification</label><span style="color:red;">*</span>
                                <input type="text" id="qualification" class="form-control" name="qualification" value="<?php echo e(old('qualification', $teacher->qualification)); ?>" placeholder="Enter qualification" required>
                                <div style="color: red"><?php echo e($errors->first('qualification')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="note">Note</label><span style="color:red;">*</span>
                                <input type="text" id="note" class="form-control" name="note" value="<?php echo e(old('note', $teacher->note)); ?>" placeholder="Enter Note" required>
                                <div style="color: red"><?php echo e($errors->first('note')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label><span style="color:red;">*</span>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option <?php echo e((old('status', $teacher->status) == 0)?'selected':''); ?> value="0">Active</option>
                                    <option <?php echo e((old('status', $teacher->status) == 1)?'selected':''); ?> value="1">Inactive</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('status')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email address</label><span style="color:red;">*</span>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $teacher->email)); ?>" placeholder="Enter email" required>
                                <div style="color: red"><?php echo e($errors->first('email')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label><span style="color:red;">*</span>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                <div style="color: red"><?php echo e($errors->first('password')); ?></div>
                            </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/teacher/edit.blade.php ENDPATH**/ ?>