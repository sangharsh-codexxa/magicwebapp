
<?php $__env->startSection('title', 'Add Institute - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Add Institute')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Institute')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Institute')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('institute')); ?>" class="btn btn-primary-rgba"><i
        class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
          <h5 class="card-title"><?php echo e(__('Add Institute')); ?></h5>
        </div>
        <div class="card-body">
           <form id="demo-form2" method="post" action="<?php echo e(route('institute.save')); ?>" data-parsley-validate
            class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Institute Name')); ?>:<sup
                    class="redstar text-danger">*</sup></label>
                <input class="form-control" type="text" name="title" placeholder="<?php echo e(__('Enter Institute Name')); ?>">

              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputSlug"> <?php echo e(__('Logo')); ?>:<sup class="redstar text-danger">*</sup></label><br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Address')); ?>:</label>
                <textarea name="address" rows="1" class="form-control"
                  placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> address"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label class="text-dark" for="mobile"><?php echo e(__('Email')); ?>: <sup
                    class="text-danger">*</sup></label>
                <input value="<?php echo e(old('email')); ?>" required type="email" name="email"
                  placeholder=" <?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Email')); ?>"
                  class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label class="text-dark" for="mobile"><?php echo e(__('Mobile')); ?>: <sup
                    class="text-danger">*</sup></label>
                <input value="<?php echo e(old('mobile')); ?>" required type="number" name="mobile"
                  placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Mobile')); ?>"
                  class="form-control">
              </div>
             
              <div class="col-md-6 form-group">
                <label for="exampleInputSlug"><?php echo e(__('Skills')); ?>:<sup class="redstar text-danger">*</sup></label>
                <input type="text" name="skill" id="tagsinput-default" class="form-control"  data-role="tagsinput" />
            </div>  

           
              <div class="col-md-6 form-group">
                <label for="exampleInputSlug"><?php echo e(__('Affilated By')); ?>:</label>
                <input type="text" name="affilated_by"  class="form-control"
                  data-role="tagsinput" />
              </div>
              <div class="form-group col-md-6">
                <label class="text-dark" for="slug"><?php echo e(__('Slug')); ?>: <sup
                    class="text-danger">*</sup></label>
                <input value="<?php echo e(old('slug')); ?>"  name="slug"
                  placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Slug')); ?>"
                  class="form-control">
              </div>
             
                 <div class="form-group col-md-12">
                <label for="exampleInputSlug"><?php echo e(__('About')); ?>:<sup class="redstar text-danger">*</sup></label>
                <textarea name="detail" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group col-md-12">
                <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                  <?php echo e(__("Reset")); ?></button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__("Create")); ?></button>
              </div>
             </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/admin/Institute/create.blade.php ENDPATH**/ ?>