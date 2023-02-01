
<?php $__env->startSection('title','Create a new private_course'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Private Course')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Private Course')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('private-course')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
        class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Add')); ?> <?php echo e(__('Private Course')); ?></h5>
        </div>
        <div class="card-body">
          <form action="<?php echo e(url('private-course/')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label><?php echo e(__('Select')); ?> <?php echo e(__('Course')); ?>: <span
                      class="text-danger">*</span></label>
                  <select class="form-control js-example-basic-single" name="course_id" size="5" row="5"
                    placeholder="<?php echo e(__('Select')); ?> <?php echo e(__('Course')); ?>">


                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat->status == 1): ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?>

                    </option>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>
              </div>
              

                <div class="form-group col-md-12">
                  <label><?php echo e(__('Hide from ')); ?> <?php echo e(__('Users')); ?>: <span
                      class="text-danger">*</span></label>
                  <select class="form-control js-example-basic-single" name="user_id[]" multiple="multiple" size="5"
                    row="5" placeholder="<?php echo e(__('Select')); ?> <?php echo e(__('Users')); ?>">


                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->status == 1): ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname); ?>

                    </option>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>
             


             


                  <div class="form-group col-md-12">
                    <?php if(Auth::User()->role == "admin"): ?>
                    <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>

                    <input class="custom_toggle" type="checkbox" name="status" id="cb3" checked />
                   


                   
                    <?php endif; ?>
                  </div>


              
                
                <div class="form-group col-md-12">
                  <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Create')); ?></button>
                </div>

                <div class="clear-both"></div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script>
  (function ($) {
    "use strict";


    $(function () {
      $('.js-example-basic-single').select2();
    });


  })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\private_course\create.blade.php ENDPATH**/ ?>