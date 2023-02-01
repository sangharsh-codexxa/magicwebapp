
<?php $__env->startSection('title', 'Edit Meeting Recording- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Meeting Recording')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Meeting ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Meeting Recording')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
   <?php echo e(__('Edit Meeting Recording')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('meeting-recordings')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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
      <h5 class="card-title"><?php echo e(__(' Edit Meeting Recording')); ?></h5>
      </div>
      <div class="card-body">
        <form id="demo-form" method="post"  action="<?php echo e(url('meeting-recordings/'.$recording->id)); ?>

          "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field('PUT')); ?>

          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($recording->title); ?>">
            </div>
      
            <div class="col-md-6">
              <label for="exampleInputTit1e"><?php echo e(__('Meeting')); ?> <?php echo e(__('URL')); ?>:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="url" id="exampleInputTitle" value="<?php echo e($recording->url); ?>">
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
              <?php echo e(__('Update')); ?></button>
          </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>

       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\meeting_recording\edit.blade.php ENDPATH**/ ?>