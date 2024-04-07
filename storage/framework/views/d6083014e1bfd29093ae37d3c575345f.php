
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Register</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="<?php echo e(route('admin.examinations.exam.add.show')); ?>" class="btn btn-primary">Add New Exam</a>
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
                        <h3 class="card-title">Search Marks Register</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row p-1">
                                <div class="form-group  col-md-3">
                                    <select class="form-control" name="exam_id" required>
                                        <option value="">Select Exam</option>
                                        <?php $__currentLoopData = $getExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Request('exam_id') == $exam->id ? 'selected' : ''); ?>

                                                value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group  col-md-3">
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class</option>
                                        <?php $__currentLoopData = $getClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Request('class_id') == $class->id ? 'selected' : ''); ?>

                                                value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                                    <a href="<?php echo e(route('admin.examinations.marks_register')); ?>"
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
                        <?php if(!empty($getSubject) && !empty($getSubject->count())): ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Marks Register</h3>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <?php $__currentLoopData = $getSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <th><?php echo e($subject->subject_name); ?><br>
                                                                (<?php echo e($subject->subject_type); ?> :
                                                                <?php echo e($subject->passing_marks); ?> /
                                                                <?php echo e($subject->full_marks); ?>)
                                                            </th>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $getStudentClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <form name="post"  class="submitMarks"> 
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                                                <input type="hidden" name="exam_id" value="<?php echo e(Request('exam_id')); ?>">
                                                                <input type="hidden" name="class_id" value="<?php echo e(Request('class_id')); ?>">
                                                                <td><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></td>
                                                                <?php
                                                                    $i = 1;
                                                                ?>
                                                                <?php $__currentLoopData = $getSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $getMark = $subject->getMark($student->id, Request('exam_id'), Request('class_id'), $subject->subject_id);
                                                                ?>
                                                                    <td>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Class Work
                                                                            <input type="hidden" name="mark[<?php echo e($i); ?>][subject_id]" value="<?php echo e($subject->subject_id); ?>">
                                                                            <input type="text" name="mark[<?php echo e($i); ?>][class_work]"  class="form-control" value="<?php echo e(!empty($getMark->class_work)? $getMark->class_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Home Work
                                                                            <input type="text" name="mark[<?php echo e($i); ?>][home_work]" class="form-control" value="<?php echo e(!empty($getMark->home_work)? $getMark->home_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Test Work
                                                                            <input type="text" name="mark[<?php echo e($i); ?>][test_work]" class="form-control" value="<?php echo e(!empty($getMark->test_work)? $getMark->test_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Exam
                                                                            <input type="text" name="mark[<?php echo e($i); ?>][exam]" class="form-control" value="<?php echo e(!empty($getMark->exam)? $getMark->exam : ''); ?>">
                                                                        </div>
                                                                    </td>
                                                                    <?php
                                                                    $i++;
                                                                ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <td>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Save</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="100%">No students found</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('.submitMarks').submit(function(e){ 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('admin/examinations/submit_marks_register')); ?>",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/marks_register.blade.php ENDPATH**/ ?>