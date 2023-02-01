
<?php $__env->startSection('title', 'Create a new meeting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('List all meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Big Blue Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__(' List all meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url("bigblue/meetings")); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

  </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
         
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Create a new meeting')); ?></h5>
        </div>
        <div class="card-body">

          <form action="<?php echo e(route('bbl.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

           <div class="row">
              <div class="form-group col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('LinkByCourse')); ?>:</label>
                    

                    <input type="checkbox" id="myCheck" name="link_by" class="custom_toggle" onclick="myFunction()">
                    

              </div>


              <div class="form-group col-md-12">
               <div style="display: none" id="update-password">
                <label><?php echo e(__('Courses')); ?>:<span class="redstar">*</span></label>
                <select name="course_id" id="course_id" class="select2-single form-control">
                  <?php
                    $course = App\Course::where('status', '1')->where('user_id', Auth::user()->id)->get();
                  ?>
                  <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              </div>

              <div class="form-group col-md-6">
                <label  for="exampleInputDetails"><?php echo e(__('Presenter Name')); ?>: <sup class="redstar">*</sup></label>
                <input value="<?php echo e(old('presen_name')); ?>" type="text" name="presen_name" class="form-control" required="" placeholder="enter presenter name">
              </div>

              <div class="form-group col-md-6">
                <label><?php echo e(__('MeetingID')); ?>: <sup class="redstar">*</sup></label>
                <input value="<?php echo e(old('meetingid')); ?>" type="text" name="meetingid" class="form-control" required="" placeholder="enter meeting id">
               
              </div>
              <div class="form-group col-md-6">
                <label> <?php echo e(__('Meeting')); ?> <?php echo e(__('Name')); ?>: <sup class="redstar">*</sup></label>
                <input value="<?php echo e(old('meetingname')); ?>" type="text" name="meetingname" class="form-control" required="" placeholder="enter meeting name">
              </div>

              <div class="form-group col-md-6">
                <label><?php echo e(__('Meeting')); ?> <?php echo e(__('Duration')); ?>: <sup class="redstar">*</sup>   <small class="text-muted">It will be count in minutes</small> </label>
                <input value="<?php echo e(old('duration')); ?>" type="text" name="duration" class="form-control" required="" placeholder="enter meeting duration eg. 40">
                
              </div>


              <div class="form-group col-md-12">
                <label>
                  <?php echo e(__('StartTime')); ?>:<sup class="redstar">*</sup>
                </label>

                <div class="input-group" id='datetimepicker1'>
                  <input type="text"  name="start_time"   id="time-format" class="form-control" placeholder="dd/mm/yyyy - hh:ii aa" aria-describedby="basic-addon5" />
                  <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
                  </div>
                </div>
              </div>


              <div class="form-group col-md-6">
                <label> <?php echo e(__('Moderator Password')); ?>:</label>
                <div class="input-group mb-3">
                  
                  <input id="password-field"  type="password"  name="modpw" class="form-control" placeholder="enter moderator password">
                  <div class="input-group-prepend text-center">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></i></span>
                  </div>
                </div>
               
              </div>


              <div class="form-group col-md-6">
                <label><?php echo e(__('Attandee Password')); ?>: <small class="text-muted"><br>
                  (<b>Tip !</b> Share your attendee password to students using social handling networks.)</small></label>
                
                <input required id="attendeepw" value="" type="password" name="attendeepw" class="form-control" placeholder="enter attandee password">
                
                 <small class="text-muted"><?php echo e(__('Should be diffrent from')); ?> <b><?php echo e(__('Moderator')); ?></b> <?php echo e(__('password')); ?></small>

              </div>

              <div class="form-group col-md-6">
                <label><?php echo e(__('Set Welcome Message:')); ?></label>
                <input value="<?php echo e(old('welcomemsg')); ?>" type="text" class="form-control" name="welcomemsg" placeholder="enter welcome message">

              </div>
              <div class="form-group col-md-6">
                <label><?php echo e(__('Set Max Participants:')); ?></label>
              <input value="<?php echo e(old('setMaxParticipants')); ?>" type="number" min="-1" class="form-control" name="setMaxParticipants" placeholder="enter maximum participant no., leave blank if want unlimited participant"/>

              </div>
              <div class="form-group col-md-6">
                <label><?php echo e(__('Set Mute on Start:')); ?></label>
                <input class="custom_toggle" type="checkbox" name="setMuteOnStart" />

              </div>
              <div class="form-group col-md-6">
                <label><?php echo e(__('Allow Record:')); ?></label>
                <input  class="custom_toggle" type="checkbox" ame="allow_record" />

              </div>
            </div>
            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
              <?php echo e(__('Create')); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck').change(function(){
          if($('#myCheck').is(':checked')){
            $('#update-password').show('fast');
          }else{
            $('#update-password').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\bbl\create.blade.php ENDPATH**/ ?>