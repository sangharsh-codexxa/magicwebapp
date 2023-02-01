
<?php $__env->startSection('title', 'IP Block Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('IP Block Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('IP Block Settings')); ?>

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
                    <h5 class="card-box"><?php echo e(__('IP Block Settings')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                        <!-- form start -->
				  <form action="<?php echo e(url('admin/ipblock/update')); ?>" method="POST">
			            <?php echo csrf_field(); ?>
			            <div class="form-group">
			            	<label for="url"><?php echo e(__('Enter IP Address to block')); ?> (ex: 172.16.254.1, 506.457.14.512)</label>
							<select class="select2-multi-select form-control" name="ipblock[]" multiple="multiple">
							<?php if(is_array($settings['ipblock']) || is_object($settings['ipblock'])): ?>
		                      <?php $__currentLoopData = $settings['ipblock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        <option value="<?php echo e($cat); ?>" <?php echo e(in_array($cat, $settings['ipblock'] ?: []) ? "selected": ""); ?> ><?php echo e($cat); ?>

		                        </option>
		                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    <?php endif; ?>
		                    </select>
		                </div>

						<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
							<?php echo e(__('Update')); ?></button>
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
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\ipblock\edit.blade.php ENDPATH**/ ?>