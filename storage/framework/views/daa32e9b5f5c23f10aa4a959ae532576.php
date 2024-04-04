
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total: <?php echo e($students->total()); ?>)</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.student.add.show')); ?>" class="btn btn-primary">Add New Student</a>
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
                        <h3 class="card-title">Search Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row p-1">
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="name"
                                        value="<?php echo e(Request::get('name')); ?>" placeholder="First Name">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="last_name"
                                        value="<?php echo e(Request::get('last_name')); ?>" placeholder="Last Name">
                                </div>
                                <div class="form-group  col-md-3">
                                    <input type="text" class="form-control" name="email"
                                        value="<?php echo e(Request::get('email')); ?>" placeholder="Email Address">
                                </div>
                                <div class="form-group  col-md-3">
                                    <input type="text" class="form-control" name="admission_number"
                                        value="<?php echo e(Request::get('admission_number')); ?>" placeholder="Admission Number">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="roll_number"
                                        value="<?php echo e(Request::get('roll_number')); ?>" placeholder="Roll Number">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="classe"
                                        value="<?php echo e(Request::get('classe')); ?>" placeholder="Class">
                                </div>
                                <div class="form-group col-md-2">
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option <?php echo e(Request::get('gender') == 'Male' ? 'selected' : ''); ?> value="Male">Male
                                        </option>
                                        <option <?php echo e(Request::get('gender') == 'Female' ? 'selected' : ''); ?> value="Female">
                                            Female</option>
                                        <option <?php echo e(Request::get('gender') == 'Other' ? 'selected' : ''); ?> value="Other">
                                            Other</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="caste"
                                        value="<?php echo e(Request::get('caste')); ?>" placeholder="Caste">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="religion"
                                        value="<?php echo e(Request::get('religion')); ?>" placeholder="Religiion">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="mobile_number"
                                        value="<?php echo e(Request::get('mobile_number')); ?>" placeholder="Mobile Number">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="blood_group"
                                        value="<?php echo e(Request::get('blood_group')); ?>" placeholder="Blood Group">
                                </div>
                                <div class="form-group col-md-2">
                                    <select name="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option <?php echo e(Request::get('status') == '0' ? 'selected' : ''); ?> value="0">Active
                                        </option>
                                        <option <?php echo e(Request::get('status') == '1' ? 'selected' : ''); ?> value="1">
                                            Inactive</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="display: flex; align-items: center;">
                                    <label for="date" style="margin-right: 10px; font-weight: normal;"> Amission Date:</label>
                                    <input type="date" class="form-control" name="admission_date" value="<?php echo e(Request::get('admission_date')); ?>">
                                </div>  
                                <div class="form-group col-md-4" style="display: flex; align-items: center;">
                                    <label for="date" style="margin-right: 10px; font-weight: normal;"> Created Date:</label>
                                    <input type="date" class="form-control" name="date" value="<?php echo e(Request::get('date')); ?>">
                                </div>
                                

                                <div class="form-group col-md-2 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('admin.student.list')); ?>"
                                        class="btn btn-success btn-outlook" role="button">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student list</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weigth</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php if($student->getProfile()): ?>
                                                        <img src="<?php echo e($student->getProfile()); ?>"
                                                            style="height: 50px; width:50px; border-radius:50px;">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></td>
                                                <td><?php echo e($student->parent_name); ?> <?php echo e($student->parent_last_name); ?></td>
                                                <td><?php echo e($student->email); ?></td>
                                                <td><?php echo e($student->admission_number); ?></td>
                                                <td><?php echo e($student->roll_number); ?></td>
                                                <td><?php echo e($student->class_name); ?></td>
                                                <td><?php echo e($student->gender); ?></td>
                                                <td>
                                                    <?php if(!@empty($student->date_of_birth)): ?>
                                                        <?php echo e(date('d-m-Y', strtotime($student->date_of_birth))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($student->caste); ?></td>
                                                <td><?php echo e($student->religion); ?></td>
                                                <td><?php echo e($student->mobile_number); ?></td>
                                                <td>
                                                    <?php if(!@empty($student->admission_date)): ?>
                                                        <?php echo e(date('d-m-Y', strtotime($student->admission_date))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($student->blood_group); ?></td>
                                                <td><?php echo e($student->height); ?></td>
                                                <td><?php echo e($student->weight); ?></td>
                                                <td><?php echo e($student->status == 0 ? 'Active' : 'Inactive'); ?></td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($student->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.student.edit', $student->id)); ?>"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo e(route('admin.student.delete', $student->id)); ?>"
                                                        class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    <?php echo $students->appends(Request::except('page'))->links(); ?>

                                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/student/list.blade.php ENDPATH**/ ?>