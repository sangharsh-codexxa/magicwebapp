
<?php $__env->startSection('title', 'Setting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Google Calendar Notification Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Google Calendar')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Google Calendar Notification Settings')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Add Google Calendar Setting')); ?></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form action="<?php echo e(route('googlecalendar.notification')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label><?php echo e(__('Google Calendar Id :')); ?></label>
                    <!-- ---------- -->
                    <input id="google_cal_id"  placeholder="Please Enter Google Calendar Id" class="form-control" type="password" name="GOOGLE_CALENDAR_ID" value="<?php echo e($env_files['GOOGLE_CALENDAR_ID']); ?>">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                    <!-- ---------- -->
                    <!-- <input type="text"  name="GOOGLE_CALENDAR_ID" value="<?php echo e($env_files['GOOGLE_CALENDAR_ID']); ?>" class="form-control"> -->
                </div>
                <!-- Status -->
                <div class="form-group">
                    <label for="exampleInputDetails"><?php echo e(__('Status :')); ?></label><br>
                    <input type="checkbox" class="custom_toggle" name="notification_enable" <?php echo e($setting->notification_enable == '1' ? 'checked' : ''); ?> />
                    <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
    
                <div class="form-group">
                  <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__("Update")); ?></button>
                </div>
    
              </form>
            </div>
    
            <div class="col-md-6">
              <h4 style="color: black"><i class="fa fa-question-circle"></i> <?php echo e(__('How to obtain the Google Calendar Id :')); ?></h4>
              <hr>
              <div class="panel panel-default">
                <div class="panel-body">
                  <ul>
                    <li><?php echo e(__("Sign in to the")); ?> <b><?php echo e(__("Google account")); ?></b> <?php echo e(__("that is associated with the calendar. From the G-mail interface, click the Apps icon.")); ?></li>
                    <li><?php echo e(__("Click on the")); ?> <b><?php echo e(__("Calendar")); ?></b> <?php echo e(__("option.")); ?></li>
                    <li><?php echo e(__("Click on")); ?> <b><?php echo e(__("Settings.")); ?></b></li>
                    <li><?php echo e(__("Click on")); ?> <b><?php echo e(__("Add Calendar")); ?></b> <?php echo e(__("dropdown form the left menu.")); ?></li>
                    <li><?php echo e(__("Click on")); ?> <b><?php echo e(__("Create New Calendar.")); ?></b> <?php echo e(__("Once you get one form after clicking on it just enter your calendar name and click on")); ?> <b><?php echo e(__("Create Calendar.")); ?></b></li>
                    <li><?php echo e(__("Once you have created your calendar successfully. You calendar will be visible in the left menu.")); ?> </li>
                    <li><?php echo e(__("Click on your")); ?> <b><?php echo e(__("calendar")); ?></b> <?php echo e(__("which you have create and which is visible on the left menu and scroll down will get your")); ?>  <b><?php echo e(__("google calendar id.")); ?></b></li>
                    <li><?php echo e(__("Enter your")); ?> <b><?php echo e(__("google calendar id.")); ?></b></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).on('click', '.toggle-password', function() {

$(this).toggleClass("fa-eye fa-eye-slash");

var input = $("#google_cal_id");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\google_calendar_notification\index.blade.php ENDPATH**/ ?>