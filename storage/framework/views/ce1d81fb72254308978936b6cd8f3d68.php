
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
                        <h1>Student Caldendar (name: <span style="color:blue;"><?php echo e($getStudent->name); ?></span>)</h1>
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

        <?php $__currentLoopData = $getMyTimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $value['week']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                events.push({
                    title: '<?php echo e($value['subject_name']); ?>',
                    daysOfWeek: [<?php echo e($week['fullcalendar_day']); ?>],
                    startTime: '<?php echo e($week['start_time']); ?>',
                    endTime: '<?php echo e($week['end_time']); ?>',
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $getExamTimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueE): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $valueE['exam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                events.push({
                    event_id: eventId++,
                    title: '<?php echo e($valueE['exam_name']); ?> - <?php echo e($exam['subject_name']); ?> (<?php echo e(date('h:i A', strtotime($exam['start_time']))); ?> to <?php echo e(date('h:i A', strtotime($exam['end_time']))); ?>)',
                    start: '<?php echo e($exam['exam_date']); ?>',
                    end: '<?php echo e($exam['exam_date']); ?>',
                    color: 'silver',
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        });

        calendar.render();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/parent/my_calendar.blade.php ENDPATH**/ ?>