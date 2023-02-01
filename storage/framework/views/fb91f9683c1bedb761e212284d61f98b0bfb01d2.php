
<?php $__env->startSection('title', 'View Zoom Meeting : '.$response['id']); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('View Zoom Meeting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Zoom Mettings ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('View Zoom Meeting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a title="Back" href="<?php echo e(route('zoom.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

  </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  
                          
                        
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
			<div class="row">
				<div class="col-md-10 col-9">
					<h5 class="card-title">	<?php echo e(__('View Meeting')); ?> : <?php echo e($response['id']); ?></h5>
				</div>
				<div class="col-md-2 col-3">
					<button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
					<div class="dropdown-menu" aria-h5ledby="CustomdropdownMenuButton3">
						<a class="dropdown-item" title="Edit Meeting" href="<?php echo e(route('zoom.edit',$response['id'])); ?>" ><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
						<a class="dropdown-item"  title="Start Meeting" target="_blank" href="<?php echo e($response['start_url']); ?>"><i class="feather icon-send mr-2"></i><?php echo e(__("Start Mettings")); ?></a>
					
						<a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-trash mr-2"></i><?php echo e(__("Delete Selected")); ?></a>
					</div>
				</div>
			</div>
		</div>
						
		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleSmallModalh5">Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-h5="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
					</div>
					<div class="modal-footer">
					
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
						<button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
					</form>
					</div>
				</div>
			</div>
		</div>
			
         
		  
			
		
		
			
		
		
        <div class="card-body">
          
			
          
          <div class="row">
			  <div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug"><?php echo e(__('adminstaticword.MeetingID')); ?> :</h5>
				<p style="font-size:18px;"><?php echo e($response['id']); ?></p>
			</div>
			
			  <div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug"><?php echo e(__('adminstaticword.Meeting')); ?> Type :</h5>
				<p style="font-size:18px;"><?php if($response['type'] == '2'): ?> Scheduled Meeting <?php elseif($response['type'] == '3'): ?> Recurring Meeting with no fixed time <?php else: ?> Recurring Meeting with fixed time <?php endif; ?></p>
			</div>
				
		
			<div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug"><?php echo e(__('adminstaticword.Meeting')); ?> Topic : </h5>
				<p style="font-size:18px;"><?php echo e($response['topic']); ?></p>
				
			</div>
			
				
			<div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug"><?php echo e(__('adminstaticword.Meeting')); ?> Agenda :</h5>
				<p style="font-size:18px;"><?php echo e(isset($response['agenda']) ? $response['agenda'] : ""); ?></p>
			</div>
			
				
			<div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug">Start Time :</h5>
				

				<?php
				    // create a $dt object with the UTC timezone
                    $dt = new DateTime(optional($response)['start_time'], new DateTimeZone('UTC'));
                    
                    $timezone =  $response['timezone'];
                    
                    // change the timezone of the object without changing its time
                    $dt->setTimezone(new DateTimeZone($timezone));
				?>
				<p style="font-size:18px;"><?php echo e(optional($response)['start_time'] ? $dt->format('d-m-Y | h:i A') : ""); ?></p>
				
			</div>
			
				
			<div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug">Meeting Contact Name : </h5>
				
				<p style="font-size:18px;"><?php echo e(isset($response['settings']['contact_name']) ? $response['settings']['contact_name'] : $response['host_email']); ?></p>
			</div>
			<div class="col-md-4 mt-3">
				<h5 for="exampleInputSlug">Meeting Duration :</h5>
				
				<p style="font-size:18px;"> <?php echo e(isset($response['duration']) ? $response['duration'] : ""); ?> min</p>
			</div>
			<div class="col-md-8 mt-3">
				<h5 for="exampleInputSlug">Invite URL :</h5>
				
				<p style="font-size:18px;"> <a href="<?php echo e(isset($response['join_url'])); ?>"><?php echo e($response['join_url']); ?></a></p>
			</div>
			
			
			<div class="col-md-6 mt-3">
				<h5 for="exampleInputSlug">Other Meeting Settings :</h5>
				
				
			
			<p><i class="feather icon-mic" aria-hidden="true"></i> Audio : <?php echo e(isset($response['settings']['audio']) == 'both' ? "Computer and Internet call" : isset($response['settings']['audio'])); ?></p>
			<p><i class="feather icon-video" aria-hidden="true"></i> Host Video : <?php echo e(isset($response['settings']['host_video']) == true ? "Enabled" : "Disabled"); ?></p>
			<p><i class="feather icon-users" aria-hidden="true"></i> Join before Host : <?php echo e(isset($response['settings']['join_before_host']) == true ? "Yes" : "No"); ?></p>
			
			<p><i class="feather icon-video" aria-hidden="true"></i> participant Video : <?php echo e(isset($response['settings']['participant_video']['join_before_host']) == true ? "Enabled" : "Disabled"); ?></p>
			</div>

			  
			
			
		
			
			
			
			
		
		
		
			
		
			
			
			  </div>

			
            
          
         

          
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\zoom\show.blade.php ENDPATH**/ ?>