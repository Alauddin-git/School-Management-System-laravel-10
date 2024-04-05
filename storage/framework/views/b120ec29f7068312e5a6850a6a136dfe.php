
<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .fc-daygrid-event {
            white-space: normal;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Caldendar</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('admin_asset/dist/fullcalendar/index.global.js')); ?>"></script>

    <script type="text/javascript">
        var events = [];
        var eventId = 1;
        <?php $__currentLoopData = $getClassTimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            events.push({
                title: 'Class:<?php echo e($value->class_name); ?>-<?php echo e($value->subject_name); ?>',
                daysOfWeek: [<?php echo e($value->fullcalendar_day); ?>],
                startTime: '<?php echo e($value->start_time); ?>',
                endTime: '<?php echo e($value->end_time); ?>',
            });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $getExamTimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        console.log(<?php echo json_encode($exam, 15, 512) ?>);
            events.push({
                title: 'Exam: <?php echo e($exam->class_name); ?> - <?php echo e($exam->exam_name); ?> - <?php echo e($exam->subject_name); ?> (' +
                    '<?php echo e(date('h:i A', strtotime($exam->start_time))); ?>' + ' to ' +
                    '<?php echo e(date('h:i A', strtotime($exam->end_time))); ?>' + ')',
                start: '<?php echo e($exam->exam_date); ?>',
                end: '<?php echo e($exam->exam_date); ?>',
                color: 'silver',
                url: '<?php echo e(url('teacher/my_exam_timetable')); ?>',
            });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialDate: '<?= date('Y-m-d') ?>',
            navLinks: true,
            editable: false,
            events: events,
            initialView: 'timeGridWeek'
        });

        calendar.render();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/teacher/my_calendar.blade.php ENDPATH**/ ?>