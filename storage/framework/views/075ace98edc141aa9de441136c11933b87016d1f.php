
<?php $__env->startSection('title', 'Add States - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Add States')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Location')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('State')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Add States')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('admin/state')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
          <h5 class="card-title"> <?php echo e(__('Add')); ?> <?php echo e(__('State')); ?></h5>
        </div>
        <div class="card-body">

          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/state')); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputTit1e">  <?php echo e(__('Add')); ?> <?php echo e(__('State')); ?>:<sup class="redstar">*</sup></label>
                <select class="select2-single form-control"name="country_id" required>
                  <option value=""><?php echo e(__('ChooseCountry')); ?>:</option>

                      <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->nicename); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
              </select>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\country\state\add.blade.php ENDPATH**/ ?>