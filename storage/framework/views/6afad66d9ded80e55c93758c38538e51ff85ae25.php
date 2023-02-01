
<?php $__env->startSection('title','Edit CourseLanguage'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit CourseLanguage')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('courselang')); ?>" class="float-right btn btn-primary mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Language')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('courselang/'.$language->id)); ?>

            "data-parsley-validate class="form-horizontal form-label-left">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

        
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputSlug"><?php echo e(__('Name')); ?>: <sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" value="<?php echo e($language->name); ?>" id="exampleInputPassword1" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Language')); ?>">
            </div>
           
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
              <input type="checkbox" class="custom_toggle" name="status"
              <?php echo e($language->status==1 ? 'checked' : ''); ?>/>

            </div>
          </div>

        <div class="col-md-6">
          <div class="form-group">
            <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
              <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
              <?php echo e(__('Update')); ?></button>
          </div>

          <div class="clear-both"></div>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course_language\edit.blade.php ENDPATH**/ ?>