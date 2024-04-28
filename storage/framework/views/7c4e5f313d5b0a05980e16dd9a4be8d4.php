
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student Attendance(<span style="color: blue">Total: <?php echo e($my_attendances->total()); ?></span>) </h1>
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
                        <h3 class="card-title">Search My Student Attendance </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <form action="" method="get">
                                <div class="row" style="display: flex; flex-wrap: wrap; align-items: center;">
                                    
                                    <div class="form-group col-md-2" style="margin-right: 10px; display: flex;">
                                        <select class="form-control" name="attendance_type">
                                            <option value="">Choose Attendance Type</option>
                                            <option <?php if(Request('attendance_type') == 1): echo 'selected'; endif; ?> value="1">Present</option>
                                            <option <?php if(Request('attendance_type') == 2): echo 'selected'; endif; ?> value="2">Late</option>
                                            <option <?php if(Request('attendance_type') == 3): echo 'selected'; endif; ?> value="3">Absent</option>
                                            <option <?php if(Request('attendance_type') == 4): echo 'selected'; endif; ?> value="4">Half Day</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" style="margin-right: 50px; display: flex; align-items: center;">
                                        <label for="attendance_date" style="margin-right: 10px; white-space: nowrap;">Attendance Date:</label>
                                        <input type="date" class="form-control" name="attendance_date" id="attendance_date"
                                               value="<?php echo e(Request('attendance_date')); ?>" style="flex-grow: 1;">
                                    </div>
                                    <div class="form-group col-md-auto" style="display: flex;">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a href="<?php echo e(route('parent.my_student.attendance', ['student_id' => $my_student->id])); ?>" class="btn btn-success ml-2" role="button">Reset</a>
                                    </div>
                                </div>     
                            </form>
                               
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Student Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Attendance Type</th>
                                    <th>Attendance Date</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/myStudent_attendance.blade.php ENDPATH**/ ?>