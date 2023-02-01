
<?php $__env->startSection('title', 'API Setting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('App Setting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('App Setting')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  
    <!-- row started -->
    <div class="col-lg-12">
    
        <div class="card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('APPSetting')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                  <!-- form start -->
                  <form action="<?php echo e(route('appsettings.update')); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('POST')); ?>



                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="text-dark" for="s_enable"><?php echo e(__('GOOGLE PAYMENT')); ?></label><br>
                        <input type="checkbox" class="custom_toggle" id="customSwitch1" name="googlepay_enable" <?php echo e($gsetting->googlepay_enable==1 ? 'checked' : ''); ?> />
                        <input type="hidden" name="free" value="0" for="status" id="customSwitch1">
                      </div>
                    </div>
                    <div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
								<?php echo e(__("Update")); ?></button>
						</div>

		          	</form>
                  <!-- form end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\app_settings\edit.blade.php ENDPATH**/ ?>