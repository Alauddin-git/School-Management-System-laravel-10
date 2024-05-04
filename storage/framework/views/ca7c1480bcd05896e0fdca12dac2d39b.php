
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Notice</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="notice_date">Notice Date</label>
                            <input type="date" id="notice_date" class="form-control" name="notice_date" value="<?php echo e(old('notice_date')); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="publish_date">Publish Date</label>
                            <input type="date" id="publish_date" class="form-control" name="publish_date" value="<?php echo e(old('publish_date')); ?>" required>
                        </div>
                        <div class="form-group">
                            <label style="display: block">Message To</label>
                            <label style="margin-right: 50px"><input type="checkbox" value="3" name="message_to[]">Student</label>
                            <label style="margin-right: 50px"><input type="checkbox" value="4" name="message_to[]">Parent</label>
                            <label style="margin-right: 50px"><input type="checkbox" value="2" name="message_to[]">Teacher</label>
                        </div>
                        <textarea id="compose-textarea" class="form-control" style="height: 300px" name="message">

                          </textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(function () {
      //Add text editor
      $('#compose-textarea').summernote({
        height:200
      })
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sms\resources\views/admin/communicate/noticeboard/add.blade.php ENDPATH**/ ?>