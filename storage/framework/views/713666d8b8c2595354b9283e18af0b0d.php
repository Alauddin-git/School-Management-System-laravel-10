
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>teacher List (Total: <?php echo e($teachers->total()); ?>)</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.teacher.add.show')); ?>" class="btn btn-primary">Add New teacher</a>
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
                        <h3 class="card-title">Search teacher</h3>
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
                                <div class="form-group  col-md-3">
                                    <input type="text" class="form-control" name="mobile_number"
                                        value="<?php echo e(Request::get('mobile_number')); ?>" placeholder="Mobile Number">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="marital_status"
                                        value="<?php echo e(Request::get('marital_status')); ?>" placeholder="Marital Status">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="address"
                                        value="<?php echo e(Request::get('address')); ?>" placeholder="Current Address">
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
                                    <label for="date" style="margin-right: 10px; font-weight: normal;"> Date of Joining:</label>
                                    <input type="date" class="form-control" name="admission_date" value="<?php echo e(Request::get('admission_date')); ?>">
                                </div>  
                                <div class="form-group col-md-4" style="display: flex; align-items: center;">
                                    <label for="date" style="margin-right: 10px; font-weight: normal;"> Created Date:</label>
                                    <input type="date" class="form-control" name="date" value="<?php echo e(Request::get('date')); ?>">
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('admin.teacher.list')); ?>"
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
                                <h3 class="card-title">teacher list</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Profile Pic</th>
                                            <th>Teacher Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Joining</th>
                                            <th>Mobile Number</th>
                                            <th>Marital Status</th>
                                            <th>Current Address</th>
                                            <th>Permanent Address</th>
                                            <th>Qualification</th>
                                            <th>Work Experience</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($teacher->id); ?></td>
                                                <td>
                                                    <?php if($teacher->getProfile()): ?>
                                                        <img src="<?php echo e($teacher->getProfile()); ?>"
                                                            style="height: 50px; width:50px; border-radius:50px;">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($teacher->name); ?> <?php echo e($teacher->last_name); ?></td>
                                                <td><?php echo e($teacher->email); ?></td>
                                                <td><?php echo e($teacher->gender); ?></td>

                                                <td>
                                                    <?php if(!@empty($teacher->date_of_birth)): ?>
                                                        <?php echo e(date('d-m-Y', strtotime($teacher->date_of_birth))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(!@empty($teacher->admission_date)): ?>
                                                        <?php echo e(date('d-m-Y', strtotime($teacher->admission_date))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($teacher->mobile_number); ?></td>
                                                <td><?php echo e($teacher->marital_status); ?></td>
                                                <td><?php echo e($teacher->address); ?></td>
                                                <td><?php echo e($teacher->permanent_address); ?></td>
                                                <td><?php echo e($teacher->qualification); ?></td>
                                                <td><?php echo e($teacher->work_experience); ?></td>
                                                <td><?php echo e($teacher->note); ?></td>
                                                <td><?php echo e($teacher->status == 0 ? 'Active' : 'Inactive'); ?></td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($teacher->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.teacher.edit', $teacher->id)); ?>"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo e(route('admin.teacher.delete', $teacher->id)); ?>"
                                                        class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    <?php echo $teachers->appends(Request::except('page'))->links(); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/teacher/list.blade.php ENDPATH**/ ?>