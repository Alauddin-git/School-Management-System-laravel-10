
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent List (Total: <?php echo e($parents->total()); ?>)</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.parent.add.show')); ?>" class="btn btn-primary">Add New parent</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Assign Subject</h3>
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
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="occupation"
                                        value="<?php echo e(Request::get('occupation')); ?>" placeholder="Occupation">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="address"
                                        value="<?php echo e(Request::get('address')); ?>" placeholder="Address">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input type="text" class="form-control" name="mobile_number"
                                        value="<?php echo e(Request::get('mobile_number')); ?>" placeholder="Mobile Number">
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
                                    <label for="date" style="margin-right: 10px; font-weight: normal;"> Created Date:</label>
                                    <input type="date" class="form-control" name="date" value="<?php echo e(Request::get('date')); ?>">
                                </div>
                                

                                <div class="form-group col-md-2 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('admin.parent.list')); ?>"
                                        class="btn btn-success btn-outlook" role="button">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
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
                                <h3 class="card-title">Parent list</h3>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Mobile Number</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php if($parent->getProfile()): ?>
                                                        <img src="<?php echo e($parent->getProfile()); ?>"
                                                            style="height: 50px; width:50px; border-radius:50px;">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($parent->name); ?> <?php echo e($parent->last_name); ?></td>
                                                <td><?php echo e($parent->email); ?></td>
                                                <td><?php echo e($parent->gender); ?></td>
                                                <td><?php echo e($parent->mobile_number); ?></td>
                                                <td><?php echo e($parent->occupation); ?></td>
                                                <td><?php echo e($parent->address); ?></td>
                                                <td><?php echo e(($parent->status==0)?'Active':'Inactive'); ?></td>
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($parent->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.parent.edit', $parent->id)); ?>"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?php echo e(route('admin.parent.delete', $parent->id)); ?>"
                                                        class="btn btn-sm btn-danger">Delete</a>
                                                    <a href="<?php echo e(route('admin.parent.my-student', $parent->id)); ?>"
                                                        class="btn btn-sm btn-primary">My Student</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    <?php echo $parents->appends(Request::except('page'))->links(); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/parent/list.blade.php ENDPATH**/ ?>