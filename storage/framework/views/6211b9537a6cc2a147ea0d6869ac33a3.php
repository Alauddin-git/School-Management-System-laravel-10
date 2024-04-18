
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Student</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.student.update', $student->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">First Name</label><span style="color:red;">*</span>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo e(old('name', $student->name)); ?>" placeholder="Enter First Name" required>
                                <div style="color: red"><?php echo e($errors->first('name')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label><span style="color:red;">*</span>
                                <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo e(old('last_name', $student->last_name)); ?>" placeholder="Enter Last Name" required>
                                <div style="color: red"><?php echo e($errors->first('last_name')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="admission_number">Admission Number</label><span style="color:red;">*</span>
                                <input type="text" id="admission_number" class="form-control" name="admission_number" value="<?php echo e(old('admission_number', $student->admission_number)); ?>" placeholder="Enter Admission Number" required>
                                <div style="color: red"><?php echo e($errors->first('admission_number')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="roll_number">Roll Number</label><span style="color:red;">*</span>
                                <input type="text" id="roll_number" class="form-control" name="roll_number" value="<?php echo e(old('roll_number', $student->roll_number)); ?>" placeholder="Enter Roll Number" required>
                                <div style="color: red"><?php echo e($errors->first('roll_number')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="class_id">Class</label><span style="color:red;">*</span>
                                <select name="classe_id" id="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e((old('classe_id', $student->classe_id) == $classe->id)?'selected':''); ?> value="<?php echo e($classe->id); ?>"><?php echo e($classe->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('classe_id')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label><span style="color:red;">*</span>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option <?php echo e((old('gender', $student->gender) == 'Male')?'selected':''); ?> value="Male">Male</option>
                                    <option <?php echo e((old('gender', $student->gender) == 'Female')?'selected':''); ?> value="Female">Female</option>
                                    <option <?php echo e((old('gender', $student->gender) == 'Other')?'selected':''); ?> value="Other">Other</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('gender')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date of Birth</label><span style="color:red;">*</span>
                                <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="<?php echo e(old('date_of_birth', $student->date_of_birth)); ?>" required>
                                <div style="color: red"><?php echo e($errors->first('date_of_birth')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="caste">Caste</label><span style="color:red;">*</span>
                                <input type="text" id="caste" class="form-control" name="caste" value="<?php echo e(old('caste', $student->caste)); ?>" placeholder="Enter Caste" required>
                                <div style="color: red"><?php echo e($errors->first('caste')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="religion">Religion</label><span style="color:red;">*</span>
                                <input type="text" id="religion" class="form-control" name="religion" value="<?php echo e(old('religion', $student->religion)); ?>" placeholder="Enter Religion" required>
                                <div style="color: red"><?php echo e($errors->first('religion')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number">Mobile Number</label><span style="color:red;">*</span>
                                <input type="text" id="mobile_number" class="form-control" name="mobile_number" value="<?php echo e(old('mobile_number', $student->mobile_number)); ?>" placeholder="Enter Mobile Number" required>
                                <div style="color: red"><?php echo e($errors->first('mobile_number')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="admission_date">Admission Date</label><span style="color:red;">*</span>
                                <input type="date" id="admission_date" class="form-control" name="admission_date" value="<?php echo e(old('admission_date', $student->admission_date)); ?>" placeholder="Enter Admission Date" required>
                                <div style="color: red"><?php echo e($errors->first('admission_date')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="profile_pic">Profile Pic</label><span style="color:red;">*</span>
                                <input type="file" id="profile_pic" class="form-control" name="profile_pic" >
                                <div style="color: red"><?php echo e($errors->first('profile_pic')); ?></div>
                                <?php if(!empty($student->getProfile())): ?>
                                <img src="<?php echo e($student->getProfile()); ?>" style="width:100px">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Blood_group">Blood group</label><span style="color:red;">*</span>
                                <input type="text" id="Blood_group" class="form-control" name="blood_group" value="<?php echo e(old('blood_group', $student->blood_group)); ?>" placeholder="Enter Blood Group" required>
                                <div style="color: red"><?php echo e($errors->first('blood_group')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="height">Height</label><span style="color:red;">*</span>
                                <input type="text" id="height" class="form-control" name="height" value="<?php echo e(old('height', $student->height)); ?>" placeholder="Enter Height" required>
                                <div style="color: red"><?php echo e($errors->first('height')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="weight">Weight</label><span style="color:red;">*</span>
                                <input type="text" id="weight" class="form-control" name="weight" value="<?php echo e(old('weight', $student->weight)); ?>" placeholder="Enter Weight" required>
                                <div style="color: red"><?php echo e($errors->first('weight')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label><span style="color:red;">*</span>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option <?php echo e((old('status', $student->status) == 0)?'selected':''); ?> value="0">Active</option>
                                    <option <?php echo e((old('status', $student->status) == 1)?'selected':''); ?> value="1">Inactive</option>
                                </select>
                                <div style="color: red"><?php echo e($errors->first('status')); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email address</label><span style="color:red;">*</span>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email', $student->email)); ?>" placeholder="Enter email" required>
                                <div style="color: red"><?php echo e($errors->first('email')); ?></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label><span style="color:red;">*</span>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                <p>Due you want to change Password so please add new Password</p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/student/edit.blade.php ENDPATH**/ ?>