
<?php $__env->startSection('title', 'Big Blue Settings- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Update Big Blue Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Big Blue Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__(' Update Big Blue Settings')); ?>

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
          <h5 class="card-title"><?php echo e(__('Update BigBlue Button Salt Key and Server URL : ')); ?></h5>
        </div>
        <div class="card-body">

          <form action="<?php echo e(route('bbl.update.setting')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
            

              <div class="form-group col-md-6">
                <label><?php echo e(__('BBL SALT KEY:')); ?><sup
                  class="redstar text-danger">*</sup></label>
                  <div class="input-group mb-3">
                    <input id="password-field" value="<?php echo e(env('BBB_SECURITY_SALT')); ?>" type="password"  name="BBB_SECURITY_SALT" class="form-control" placeholder="enter bigbluebutton salt key">
                    <div class="input-group-prepend text-center">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></i></span>
                    </div>
                  </div>
              </div>


              
                    
                  <div class="form-group col-md-6">
                    <label for="exampleInputSlug"><?php echo e(__('BBB SERVER BASE URL:')); ?><sup
                        class="redstar text-danger">*</sup></label>
                        <input class="form-control" type="text" value="<?php echo e(env('BBB_SERVER_BASE_URL')); ?>" name="BBB_SERVER_BASE_URL" required="" placeholder="enter your BigBlue Button server URL">
                  </div>



              
            </div>
            <div class="form-group">
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\bbl\setting.blade.php ENDPATH**/ ?>