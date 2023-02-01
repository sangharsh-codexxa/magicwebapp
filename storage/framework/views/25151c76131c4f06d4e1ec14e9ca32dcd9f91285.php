
<?php $__env->startSection('title', 'Create Advertise - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Create Advertise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Player Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Advertise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Create Advertise')); ?>

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
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Create Advertise')); ?></h5>
        </div>
        <div class="card-body">
          
			<form style="margin-top:-15px;" enctype="multipart/form-data" method="POST" action="<?php echo e(route('ad.store')); ?> ">
				<br>
					<?php echo e(csrf_field()); ?>

          
          <div class="row">
            <div class="form-group col-md-12">
				<label for="ad_location"><?php echo e(__("Ad Location:")); ?></label>
				<select name="ad_location" id="test" class="select2-single form-control">
					<option value="popup"><?php echo e(__("Popup")); ?></option>
					<option value="onpause"><?php echo e(__("Onpause")); ?></option>
					<option id="skipad" value="skip"><?php echo e(__("SkipAd")); ?></option>
				</select>
            </div>
            <div id="s_img" class="form-group<?php echo e($errors->has('ad_image') ? ' has-error' : ''); ?> col-md-6">
				<label for="ad_image"><?php echo e(__("Ad Image")); ?></label><br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
					</div>
					<div class="custom-file">
					  <input type="file" name="ad_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
					</div>
				  </div>
				  
				
				<span class="help-block">
				  <strong><?php echo e($errors->first('ad_image')); ?></strong>
				</span>
            </div>

            <div  class="form-group col-md-12" style="display: none;"  id="type">
				<input  type="radio" value="upload" checked name="checkType" id="ch1"> <?php echo e(__("Upload")); ?>

				<input  type="radio" value="url" name="checkType" id="ch2"> <?php echo e(__("URL")); ?>

				<br>
			</div>

			<div  class="form-group col-md-12">

				<input class="form-control" style="display: none;" placeholder="http://" type="text" name="ad_url" id="ad_url">
			</div>
			
			
            

			
			<div id="s_video" style="display: none;" class="form-group col-md-6">
				<div class="form-group<?php echo e($errors->has('ad_video') ? ' has-error' : ''); ?>">
				<label for="ad_image"><?php echo e(__("Ad Video")); ?></label><br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
					</div>
					<div class="custom-file">
					  <input type="file" name="ad_video" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
					</div>
				  </div>
				  
				
				<span class="help-block">
					<strong><?php echo e($errors->first('ad_video')); ?></strong>
				</span>
			</div>
		
			</div>
		

            <div class="form-group col-md-6">
				<label for=""><?php echo e(__("Enter Ad Target :")); ?><sup class="redstar">*</sup></label>
				<input type="text" class="form-control" placeholder="Enter Ad Target URL: http://" name="ad_target" required>
            </div>
          
            <div class="form-group col-md-6"  id="forpopup1">
				<label for=""><?php echo e(__("Enter Start Time :")); ?></label>
				<input type="text" class="form-control" name="time" placeholder="ex. 00:00:10" name="time">
              
            </div>

			<div class="form-group col-md-6">

				<div style="display: none;" id="ad_hold_time">

					<label for="ad_hold"><?php echo e(__("Ad Hold Time:")); ?></label>
					<input type="text" class="form-control" placeholder="eg. 5" name="ad_hold">
				</div>

			</div>

            <div class="form-group col-md-12">
				<div id="forpopup">
             <label for="">Enter End Time :</label>
					<input type="text" class="form-control" name="endtime" placeholder="ex. 00:00:20" name="end_time">
            </div>
            </div>

             
            
           
          </div>
        

		<div class="form-group">
			<button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
			<?php echo e(__("Create")); ?></button>
		</div>

          </form>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\advertise\create.blade.php ENDPATH**/ ?>