
<?php $__env->startSection('title', 'Instructor Subscription Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Instructor Subscription Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Instructor Subscription Settings')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
    <div class="row">
      <div class="col-lg-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-title"><?php echo e(__("Instructor Subscription Settings")); ?> </h5>
          </div>
          <div class="card-body">
            
            <form action="<?php echo e(action('SubscriptionEnableController@settings')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>

            
            <div class="row">
              <div class="form-group col-md-6">
               
                <label for=""><?php echo e(__('InstructorSubscription')); ?>: </label>
                <input  class="custom_toggle" <?php echo e(old('purchase_code') ? "checked" : ""); ?> type="checkbox"  id="subscription" name="ENABLE_INSTRUCTOR_SUBS_SYSTEM" <?php echo e(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1 ? 'checked' : ''); ?> />
              
                <div>
                <small>(<?php echo e(__('Enable Instructor subcription plans')); ?>)</small>
                     
            </div>
               
           

              <div class="<?php echo e(!old('purchase_code') ? "d-none" : ""); ?> form-group mt-4" id="code">
                
                    <label for="validationCustom02"><?php echo e(__('Purchase Code')); ?>:<sup class="redstar">*</sup></label>
                    <input name="purchase_code" type="password" class="form-control" id="validationCustom02" placeholder="<?php echo e(__('Enter envanto purchase code')); ?>" value="<?php echo e(old('purchase_code')); ?>" autocomplete="off" required>
                    
                    <br>

                  <small class="text-muted"><i class="fa fa-question-circle"></i><?php echo e(__('Enter envanto purchase code')); ?> .</small>
                
             </div>

                  <?php if($errors->any()): ?>
                  <h6 class="text-danger alert alert-error"><?php echo e($errors->first()); ?></h6>
                <?php endif; ?>
              <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="invalid-feedback">
                <?php echo e($message); ?>

              </div> 
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 

             
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
<?php $__env->startSection('scripts'); ?>
<script>
 "use strict";
    $('#subscription').on('change',function(){
      if($('#subscription').is(':checked')){
        $('#code').addClass('d-block').removeClass('d-none');
      }else{
        $('#code').addClass('d-none').removeClass('d-block');
      }
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\plan\settings.blade.php ENDPATH**/ ?>