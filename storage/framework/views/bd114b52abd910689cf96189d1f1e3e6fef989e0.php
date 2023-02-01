
<?php $__env->startSection('title', 'Edit Zoom meeting'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Zoom meeting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Zoom Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Edit  Zoom meeting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('slider')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

  </div>
</div>

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
            <h5 class="card-title">	Edit Zoom Meeting : <b><?php echo e($response['id']); ?></b>
				<h5>Meeting Type : <?php if($response['type'] == '2'): ?> Scheduled Meeting <?php elseif($response['type'] == '3'): ?> Recurring Meeting with no fixed time <?php else: ?> Recurring Meeting with fixed time <?php endif; ?> </h5>
          </div>
          <div class="card-body">
            
            <form autocomplete="off" action="<?php echo e(route('zoom.update',$response['id'])); ?>" method="POST" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				
            
            <div class="row">
				<div class="form-group col-md-6">
					<label for="image"><?php echo e(__('adminstaticword.Image')); ?>:</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
					  </div>
					  <div class="custom-file">
						<input type="file" name="image" id="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					  </div>

					</div>
					<?php if(isset($meeting->image)): ?>
                	<img src="<?php echo e(url('/images/zoom/'.$meeting->image)); ?>" class="img-responsive image_size"/>
                	<?php endif; ?>
                	
				    </div>
				</div>


               <div class="form-group">
				<label for="exampleInputDetails"><?php echo e(__('adminstaticword.LinkByCourse')); ?>:</label>
				<input   id="link_by" type="checkbox"  class="custom_toggle"   name="link_by" <?php echo e(isset($meeting['link_by']) == 'course' ? 'checked' : ''); ?> />
				
				<input type="hidden" name="free" value="0" for="opp" id="link_by">
			</div>
				
				

              <div class="form-group" style="<?php echo e(isset($meeting['link_by']) == 'course' ? '' : 'display:none'); ?>" id="sec1_one">
                <label><?php echo e(__('adminstaticword.Courses')); ?>:<span class="redstar">*</span></label>
                <select  name="course_id" id="course_id" class="form-control select2">
				<?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option <?php echo e(optional($meeting)['course_id'] == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>
              </div>


              <div class="form-group">
				<label>
					Meeting Topic:<span class="redstar">*</span>
				</label>

				<input value="<?php echo e($response['topic']); ?>" type="text" name="topic" placeholder="Ex. My Meeting" class="form-control" required>
              </div>

              <div class="form-group col-md-6 custom-control custom-checkbox">
				<input name="recurring" type="checkbox" class="custom-control-input" id="recurring_meeting" <?php if($response['type'] == '3' ): ?> checked <?php endif; ?> >
				<label class="custom-control-label" for="recurring_meeting" value="<?php echo e($response['topic']); ?>">Recurring Metting (with no fixed time) </label>
                </div>
            
              
				<?php if($response['type'] == '2' && $response['type'] == '8'): ?>

				<div class="form-group">
					<label>
						Meeting Start Time:<sup class="redstar">*</sup>
					</label>

                    <div class='input-group date' id='datetimepicker1'>
                      <input value="<?php echo e(isset($response['start_time']) ? date('d-m-Y | h:i:s A',strtotime($response['start_time'])) : ""); ?>" name="start_time" type='text' class="form-control" required />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
				</div>

				<?php endif; ?>

				<input type="hidden" name="timezone" value="<?php echo e($response['timezone']); ?>">


				<?php if($response['type'] == '2' && $response['type'] == '8'): ?>

				<div class="form-group">
					<label>
						Duration:<sup class="redstar">*</sup>
					</label>

					<input value="<?php echo e($response['duration']); ?>" placeholder="enter in mins eg 60" type="number" min="1" name="duration" class="form-control" required>
				</div>

				<?php endif; ?>

				<div class="form-group">
					
						<label>
							Meeting Password: (Optional)
						</label>
						<div class="input-group mb-3">
							<input id="password-field" value="<?php echo e(isset($response['password']) ? $response['password'] : ""); ?> type="password"  name="password" class="form-control" placeholder="user@example.com">
							<div class="input-group-prepend text-center">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></i></span>
							</div>
							
				
					
				</div>

				<div class="form-group">
					<label>
						Meeting Agenda:<sup class="redstar">*</sup>
					</label>

					

					<textarea name="agenda" class="form-control" rows="3" required placeholder="Meeting Agenda" value="<?php echo e($response['agenda']); ?>"><?php echo e($response['agenda']); ?></textarea>
				</div>

				<div class="panel panel-default">
					<div class="panel-body">
						<h5 class="panel-title">Meeting Setting :</h5>
						<hr>
						<div class="custom-control custom-checkbox">
						  <input <?php echo e($response['settings']['host_video'] == true ? "checked" : ""); ?> name="host_video" type="checkbox" class="custom-control-input" id="host_video">
						  <label class="custom-control-label" for="host_video">Enable Host Video</label>
						</div>

						<div class="custom-control custom-checkbox">
						  <input <?php echo e($response['settings']['participant_video'] == true ? "checked" : ""); ?> name="participant_video" type="checkbox" class="custom-control-input" id="participant_video">
						  <label class="custom-control-label" for="participant_video">Enable Participant Video</label>
						</div>

						<div class="custom-control custom-checkbox">
						  <input <?php echo e($response['settings']['join_before_host'] == true ? "checked" : ""); ?> name="join_before_host" type="checkbox" class="custom-control-input" id="join_before_host">
						  <label class="custom-control-label" for="join_before_host">Join before host?</label>
						</div>

						<div class="custom-control custom-checkbox">
						  <input <?php echo e($response['settings']['mute_upon_entry'] == true ? "checked" : ""); ?> name="mute_upon_entry" type="checkbox" class="custom-control-input" id="mute_upon_entry">
						  <label class="custom-control-label" for="mute_upon_entry">Mute Upon Entry?</label>
						</div>

						<div class="custom-control custom-checkbox">
						  <input <?php echo e($response['settings']['registrants_email_notification'] == true ? "checked" : ""); ?> name="registrants_email_notification" type="checkbox" class="custom-control-input" id="registrants_email_notification">
						  <label class="custom-control-label" for="registrants_email_notification">Registrants email notification?</label>
						</div>
					</div>
                 </div>
            <div class="form-group mt-3">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Update")); ?></button>
						</div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
            
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('script'); ?>
	<script>
		 $('#datetimepicker1').datetimepicker({
		    format: 'YYYY-MM-DD HH:mm:ss',
		  });

		  
	</script>

	<script>
	(function($) {
	  "use strict";

	  $(function(){

	      $('#link_by').change(function(){
	        if($('#link_by').is(':checked')){
	          $('#sec1_one').show('fast');
	        }else{
	          $('#sec1_one').hide('fast');
	        }

	      });
	   
	  });
	})(jQuery);
	
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\zoom\edit.blade.php ENDPATH**/ ?>