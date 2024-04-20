
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Exam Result(name: <span style="color: blue"><?php echo e($getStudent->name); ?> <?php echo e($getStudent->last_name); ?></span>, Class-<span style="color: blue"><?php echo e($mySubjects->first()->class_name); ?></span>)</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <?php $__currentLoopData = $examResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title"><?php echo e($examResult['exam_name']); ?></div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Class Work</th>
                                            <th>Test Work</th>
                                            <th>Home Work</th>
                                            <th>Exam Marks</th>
                                            <th>Total Score</th>
                                            <th>Full Marks</th>
                                            <th>Passing Marks</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total_score = 0;
                                            $full_marks = 0;
                                            $result_validation = 0;
                                        ?>
                                        <?php $__currentLoopData = $examResult['subject']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                           $total_score = $total_score + $subject['total_score'];
                                           $full_marks = $full_marks + $subject['full_marks'];
                                        ?>
                                        <tr>
                                            <td><?php echo e($subject['subject_name']); ?></td>
                                            <td><?php echo e($subject['class_work']); ?></td>
                                            <td><?php echo e($subject['test_work']); ?></td>
                                            <td><?php echo e($subject['home_work']); ?></td>
                                            <td><?php echo e($subject['exam']); ?></td>
                                            <td><?php echo e($subject['total_score']); ?></td>
                                            <td><?php echo e($subject['full_marks']); ?></td>
                                            <td><?php echo e($subject['passing_marks']); ?></td>
                                            <td>
                                                <?php if($subject['total_score'] >= $subject['passing_marks']): ?>
                                                    <span style="color: green; font-weight:bold">Pass</span>
                                                <?php else: ?>
                                                <?php
                                                    $result_validation = 1;
                                                ?>
                                               <span style="color: red; font-weight:bold">Fail</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $percentage = ($total_score * 100) / $full_marks ;
                                        $getGrade = App\Models\Marks_grade::getGrade($percentage);
                                         ?>
                                        <tr>
                                            <td colspan="2">
                                                <b>Grand Total: <?php echo e($total_score); ?>/<?php echo e($full_marks); ?></b>
                                            </td>
                                            <td colspan="3">
                                                <b>Percentage: <?php echo e(round($percentage, 2)); ?> %</b>
                                            </td>
                                            <td colspan="2">
                                                <b>Grade: <?php echo e($getGrade); ?> </b>
                                            </td>
                                            <td colspan="3">
                                                <b>Result: 
                                                    <?php if($result_validation == 0): ?>
                                                        <span style="color:green;">Pass</span>
                                                    <?php else: ?>
                                                        <span style="color:red;">Fail</span>
                                                    <?php endif; ?>
                                                </b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/myStudent_exam_result.blade.php ENDPATH**/ ?>