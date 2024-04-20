
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
                                                    <?php $__currentLoopData = $getStudentClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <form name="post" class="submitMarks">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="student_id"
                                                                    value="<?php echo e($student->id); ?>">
                                                                <input type="hidden" name="exam_id"
                                                                    value="<?php echo e(Request('exam_id')); ?>">
                                                                <input type="hidden" name="class_id"
                                                                    value="<?php echo e(Request('class_id')); ?>">
                                                                <td><?php echo e($student->name); ?> <?php echo e($student->last_name); ?></td>
                                                                <?php
                                                                    $i = 1;
                                                                    $totalStudentMark = 0;
                                                                    $totalFullMark = 0;
                                                                    $totalPassingMark = 0;
                                                                    $pass_fail_vali = 0;
                                                                ?>
                                                                <?php $__currentLoopData = $getSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                    <?php
                                                                        $totalMark = 0;
                                                                        $totalFullMark =
                                                                            $totalFullMark + $subject->full_marks;
                                                                        $totalPassingMark =
                                                                            $totalPassingMark + $subject->passing_marks;

                                                                        $getMark = $subject->getMark(
                                                                            $student->id,
                                                                            Request('exam_id'),
                                                                            Request('class_id'),
                                                                            $subject->subject_id,
                                                                        );
                                                                        if (!empty($getMark)) {
                                                                            $totalMark =
                                                                                $getMark->class_work +
                                                                                $getMark->home_work +
                                                                                $getMark->test_work +
                                                                                $getMark->exam;
                                                                        }
                                                                        $totalStudentMark =
                                                                            $totalStudentMark + $totalMark;
                                                                    ?>
                                                                    <td>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Class Work
                                                                            <input type="hidden"
                                                                                name="mark[<?php echo e($i); ?>][full_marks]"
                                                                                value="<?php echo e($subject->full_marks); ?>">
                                                                            <input type="hidden"
                                                                                name="mark[<?php echo e($i); ?>][passing_marks]"
                                                                                value="<?php echo e($subject->passing_marks); ?>">
                                                                            <input type="hidden"
                                                                                name="mark[<?php echo e($i); ?>][id]"
                                                                                value="<?php echo e($subject->id); ?>">
                                                                            <input type="hidden"
                                                                                name="mark[<?php echo e($i); ?>][subject_id]"
                                                                                value="<?php echo e($subject->subject_id); ?>">
                                                                            <input type="text"
                                                                                name="mark[<?php echo e($i); ?>][class_work]"
                                                                                class="form-control"
                                                                                id="class_work_<?php echo e($student->id); ?><?php echo e($subject->subject_id); ?>"
                                                                                value="<?php echo e(!empty($getMark->class_work) ? $getMark->class_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Home Work
                                                                            <input type="text"
                                                                                name="mark[<?php echo e($i); ?>][home_work]"
                                                                                class="form-control"
                                                                                id="home_work_<?php echo e($student->id); ?><?php echo e($subject->subject_id); ?>"
                                                                                value="<?php echo e(!empty($getMark->home_work) ? $getMark->home_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Test Work
                                                                            <input type="text"
                                                                                name="mark[<?php echo e($i); ?>][test_work]"
                                                                                class="form-control"
                                                                                id="test_work_<?php echo e($student->id); ?><?php echo e($subject->subject_id); ?>"
                                                                                value="<?php echo e(!empty($getMark->test_work) ? $getMark->test_work : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            Exam
                                                                            <input type="text"
                                                                                name="mark[<?php echo e($i); ?>][exam]"
                                                                                class="form-control"
                                                                                id="exam_<?php echo e($student->id); ?><?php echo e($subject->subject_id); ?>"
                                                                                value="<?php echo e(!empty($getMark->exam) ? $getMark->exam : ''); ?>">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            <button type="submit"
                                                                                class="btn btn-primary saveSingleSubject"
                                                                                data-student="<?php echo e($student->id); ?>"
                                                                                data-class = "<?php echo e(Request('class_id')); ?>"
                                                                                data-exam = "<?php echo e(Request('exam_id')); ?>"
                                                                                data-schedule = "<?php echo e($subject->id); ?>"
                                                                                data-subject="<?php echo e($subject->subject_id); ?>">Save</button>
                                                                        </div>
                                                                        <div style="margin-bottom: 10px;">
                                                                            <?php if(!empty($getMark)): ?>
                                                                                <b>Total Mark: <?php echo e($totalMark); ?></b> <br>
                                                                                <b>Passing Mark:
                                                                                    <?php echo e($subject->passing_marks); ?></b> <br>
                                                                                <?php
                                                                                   $getLoopGrade = App\Models\Marks_grade::getGrade($totalMark);
                                                                                ?>
                                                                                <?php if(!empty($getLoopGrade)): ?>
                                                                                    <b>Grade:</b> <?php echo e($getLoopGrade); ?> <br>
                                                                                <?php endif; ?>
                                                                                <?php if($totalMark >= $subject->passing_marks): ?>
                                                                                   Result: <span
                                                                                        style="color:green; font-weight: bold">Pass</span>
                                                                                <?php else: ?>
                                                                                  Result:  <span
                                                                                        style="color:red; font-weight: bold">Fail</span>
                                                                                    <?php
                                                                                        $pass_fail_vali = 1;
                                                                                    ?>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </td>
                                                                    <?php
                                                                        $i++;
                                                                    ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <td>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Save</button> <br>
                                                                    <?php if(!empty($totalStudentMark)): ?>
                                                                        Total Student Mark : <?php echo e($totalStudentMark); ?> <br>
                                                                        Total Full Mark : <?php echo e($totalFullMark); ?> <br>
                                                                        Total Passing Mark : <?php echo e($totalPassingMark); ?> <br>
                                                                        <?php
                                                                            $percentage = ($totalStudentMark * 100) / $totalFullMark;
                                                                            $getGrade = App\Models\Marks_grade::getGrade($percentage);
                                                                        ?>
                                                                        <b>Percentage: </b><?php echo e(round($percentage, 2)); ?>%
                                                                        <br>
                                                                        <?php if(!empty($getGrade)): ?>
                                                                        <b>Grade: </b><?php echo e($getGrade); ?> <br>
                                                                        <?php endif; ?>
                                                                        <?php if($pass_fail_vali == 0): ?>
                                                                           Result: <span
                                                                                style="color:green; font-weight: bold">Pass</span>
                                                                        <?php else: ?>
                                                                           Result: <span
                                                                                style="color:red; font-weight: bold">Fail</span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        $('.submitMarks').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('admin/examinations/submit_marks_register')); ?>",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    toastr.options.closeButton = true;
                    if (response.status == 200) {
                        toastr.success(response.message);
                    } else if (response.status == 400) {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $('.saveSingleSubject').click(function(e) {
            e.preventDefault();
            var student_id = $(this).data('student');
            var class_id = $(this).data('class');
            var exam_id = $(this).data('exam');
            var subject_id = $(this).data('subject');
            var id = $(this).data('schedule');
            var class_work = $('#class_work_' + student_id + subject_id).val();
            var home_work = $('#home_work_' + student_id + subject_id).val();
            var test_work = $('#test_work_' + student_id + subject_id).val();
            var exam = $('#exam_' + student_id + subject_id).val();

            $.ajax({
                type: "POST",
                url: "<?php echo e(url('admin/examinatinos/single_submit_marks_register')); ?>",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: id,
                    student_id: student_id,
                    subject_id: subject_id,
                    exam_id: exam_id,
                    class_id: class_id,
                    class_work: class_work,
                    home_work: home_work,
                    test_work: test_work,
                    exam: exam
                },
                dataType: "json",
                success: function(response) {
                    toastr.options.closeButton = true;
                    if (response.status == 200) {
                        toastr.success(response.message);
                    } else if (response.status == 400) {
                        toastr.error(response.message);
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/examinations/marks_register.blade.php ENDPATH**/ ?>