
<?php $__env->startSection('title', 'Edit Advertise - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Advertise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Player Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Advertise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Edit Advertise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('admin/ads')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
      
          
			<?php if($ad->ad_location == "onpause" || $ad->ad_location=="popup"): ?>
		
			<div class="card-header">
				<h5 class="card-title">Edit AD: <?php echo e($ad->id); ?> | Location: <span class="adl"><?php echo e($ad->ad_location); ?></span></h5>
			</div>
				
			<div class="card-body">
			<form enctype="multipart/form-data" action="<?php echo e(route('ad.update.solo',$ad->id)); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('PUT')); ?>


				<div class="form-group<?php echo e($errors->has('ad_image') ? ' has-error' : ''); ?> col-md-6">
				<label for="ad_image"><?php if($ad->ad_location == 'popup'): ?> <?php echo e(__("Edit Popup Image")); ?> <?php else: ?>
					<?php echo e(__("Edit Image")); ?> <?php endif; ?>
				</label><br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
					</div>
					<div class="custom-file">
					  <input type="file"  name="ad_image"  class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
					</div>
				  </div>
				  
				
				 <span class="help-block">
		                  <strong><?php echo e($errors->first('ad_image')); ?></strong>
		          </span>
				</div>

				<div class="form-group col-md-12">
					<label class="form-group"><?php echo e(__("Current Image:")); ?></label>
					<img src="<?php echo e(asset('adv_upload/image/'.$ad->ad_image)); ?>" alt="" width="100px" class="img-responsive">
					  
					
				  </div>
				  <div class="form-group col-md-12">
					<label for="ad_target"> <?php echo e(__("Edit Ad Target: (Click on ad where to redirect user)")); ?></label>
				    <input class="form-control" type="text" name="ad_target" placeholder="http://" value="<?php echo e($ad->ad_target); ?> ">
					  
					
				  </div>
				
				
				

				<div class="form-group col-md-12">
					<button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
						<?php echo e(__("Update")); ?></button>
				</div>
			</form>
		</div>
		<?php elseif($ad->ad_location == "skip"): ?>
		<div class="card-header">
			<h5 class="card-title">Edit AD: <?php echo e($ad->id); ?> | Location: <span class="adl"><?php echo e($ad->ad_location); ?></span></h5>
		</div>
			
		<div class="card-body">

			
			<form action="<?php echo e(route('ad.update.video',$ad->id)); ?>" enctype="multipart/form-data" method="POST">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('PUT')); ?>

				
					
				<?php if($ad->ad_video !="no"): ?>
				<div class="form-group<?php echo e($errors->has('ad_video') ? ' has-error' : ''); ?> col-md-12">
					<label for="ad_video"><?php echo e(__("Change AD Video :")); ?></label><br>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
						</div>
						<div class="custom-file">
						  <input type="file"   name="ad_video" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
						  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
						</div>
					  </div>
					  
					
					<span class="help-block">
						<strong><?php echo e($errors->first('ad_video')); ?></strong>
					</span>
				</div>

				<div class="form-group col-md-12">
					<label class="form-group"><?php echo e(__("Current Video : ")); ?></label><br>
					<video width="320" height="240" controls>

						<source src="<?php echo e(asset('adv_upload/video/'.$ad->ad_video)); ?>" type="video/mp4">
						
					  </video>
					  
					
				  </div>

				
				
				<?php else: ?>

				<div class="form-group col-md-12">
					<label class="form-group"><?php echo e(__("AD URL :")); ?></label>
					<input class="form-control" type="text" name="ad_url" value="<?php echo e($ad->ad_url); ?>">
				</div>
					  
					
				

				
				
				<?php endif; ?>
				<div class="form-group col-md-12">
					<label for="ad_target">Edit Ad Target: (Click on ad where to redirect user)</label>
					<input class="form-control" type="text" value="<?php echo e($ad->ad_target); ?>" name="ad_target" placeholder="http://">
				</div>
					  
					
				<div class="form-group col-md-12">
				  <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
				  <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
					  <?php echo e(__("Update")); ?></button>
			    </div>

			</form>
		</div>
			
		<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
				

<?php $__env->stopSection(); ?>
				




<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$('#test').change(function() {
    if($(this).val() == 'skip')
    {
    	$('#s_video').show();
    	$('#s_img').hide();
    	$('#type').show();
    	$('#forpopup1').show();
    	$('#forpopup').hide();
    	$('#ad_hold_time').show();
    }

    	else
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#type').hide();
    	$('#ad_hold_time').hide();

    }

    if($(this).val() == 'popup')
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#forpopup1').show();
    	$('#forpopup').show();
    	$('#type').hide();
    	$('#ad_hold_time').hide();
    }

     if($(this).val() == 'onpause')
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#forpopup').hide();
    	$('#forpopup1').hide();
    	$('#type').hide();
    	$('#ad_hold_time').hide();
    }
        
	});

		$('#ch2').click(function(){
			$('#s_video').hide();
			$('#ad_url').show();
		});

		$('#ch1').click(function(){
			$('#s_video').show();
			$('#ad_url').hide();
		});

		
  

	</script>

	<script>
  $(function() {
    $('#toggle-event').change(function() {
      $('#url').val(+ $(this).prop('checked'))
    })
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\advertise\edit.blade.php ENDPATH**/ ?>