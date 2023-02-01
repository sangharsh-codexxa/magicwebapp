
<?php $__env->startSection('title','Edit Subcategories'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Subcategories')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('subcategory')); ?>" class="float-right btn btn-primary mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Subcategories')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('subcategory/'.$cate->id)); ?>

            " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>


        <div class="row">

          <div class="col-md-6">
            <label for="exampleInputSlug"><?php echo e(__('SelectCategory')); ?></label>
            <select name="category_id" class="form-control select2">
  
              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->category_id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        
          <div class="col-md-6">
            <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?>:<span class="redstar">*</span></label>
            <input type="title" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
          </div>
        </div>
        <br>
        <div class="row">

          <div class="col-md-6">
          <label for="exampleInputTit1e"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
          <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" placeholder="Enter slug" value="<?php echo e($cate->slug); ?>">
        </div>


          <div class="col-md-6">
            <label for="icon"><?php echo e(__('Icon')); ?>:<span class="redstar"></span></label>
            
            <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="<?php echo e($cate->icon); ?>">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
          </div>
          
          
         
        </div>
        <br>

         <div class="row">

          <div class="col-md-6">
            <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
              class="redstar text-danger">*</sup></label><br>
          <input id="status" type="checkbox" class="custom_toggle" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> name="status" />
          
          </div>
        </div>
        <br>



        <div class="form-group">
          <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
            <?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
            <?php echo e(__('Update')); ?></button>
        </div>
   
  <div class="clear-both"></div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\category\subcategory\update.blade.php ENDPATH**/ ?>