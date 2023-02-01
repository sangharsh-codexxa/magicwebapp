
<?php $__env->startSection('title', 'Edit Directory- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Edit Directory')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Front Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Directory')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Edit Directory')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('directory')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Directory')); ?></h5>
        </div>
        <div class="card-body">

          <form id="demo-form" method="post"  action="<?php echo e(url('directory/'.$show->id)); ?>

            "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('City')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="<?php echo e($show->city); ?>">

              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                <textarea type="text" id="detail" rows="3" class="form-control" name="detail" id="exampleInputTitle"><?php echo e($show->detail); ?></textarea>
              </div>

              <div class="d-none">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                <input  id="status" type="checkbox" name="status" class="custom_toggle" />
                <input type="hidden"  name="free" value="0" for="status" id="status">
                    
              </div>
              
              <div class="form-group col-md-2">
                <label for="exampleInputDetails"><?php echo e(__('SearchonSlider')); ?>:
                    </label>
                <input id="search_toggle" type="checkbox"  name="status" class="custom_toggle"  <?php echo e($show->status == '1' ? 'checked' : ''); ?> />
                <input type="hidden"  name="free" value="0" for="status" id="status">

              </div>
            </div>
            <div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Update")); ?></button>
						</div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\directory\edit.blade.php ENDPATH**/ ?>