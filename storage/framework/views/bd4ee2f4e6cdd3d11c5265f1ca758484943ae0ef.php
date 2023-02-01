
<?php $__env->startSection('title','Edit Previouspaper'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Previous Paper')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
<a href="<?php echo e(url('course/create/'. $paper->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Previouspaper')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('previous-paper/'.$paper->id)); ?>"data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


          
            <input type="hidden" name="course_id" value="<?php echo e($paper->course_id); ?>"  />


            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Title')); ?> : <span class="redstar">*</span></label>
                <input type="" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($paper->title); ?>">
                <br>
              </div>

              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Detail')); ?> : <span class="redstar">*</span></label>
                <textarea name="detail" rows="3" class="form-control" ><?php echo e($paper->detail); ?></textarea>
                <br>
              </div>

              <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('PaperUpload')); ?> :</label> - <small><?php echo e(__('eg: zip or pdf files')); ?></small>
                  <!--  -->
                  <div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="inputGroupFile01" name="file" value="<?php echo e($paper->file); ?>" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
                  <!--  -->
                
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?> :</label><br>
                    <label class="switch">
                      <input class="slider" type="checkbox" name="status" <?php echo e($paper->status == '1' ? 'checked' : ''); ?> />
                      <span class="knob"></span>
                    </label>
              </div>
            </div>
            <br>
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\previous_paper\edit.blade.php ENDPATH**/ ?>