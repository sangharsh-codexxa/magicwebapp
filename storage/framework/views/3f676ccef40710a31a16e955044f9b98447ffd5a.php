
<?php $__env->startSection('title','Edit Announcement'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Announcement')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
<a href="<?php echo e(url('course/create/'. $annou->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Announcement')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('announsment/'.$annou->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


           
            <select class="d-none" name="course_id">
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="d-none" value="<?php echo e($cou->id); ?>" <?php echo e($annou->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label class="d-none" for="exampleInputSlug"><?php echo e(__('User')); ?></label>
            <select  name="user" class="form-control col-md-7 col-xs-12 display-none">
              <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="d-none" value="<?php echo e($cu->id); ?>" <?php echo e($annou->user->id == $cu->id  ? 'selected' : ''); ?>><?php echo e($cu->fname); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
               
            <div class="row">
              <div class="col-md-9">
                <label for="exampleInputDetails"><?php echo e(__('Announcement')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="announsment" id="editor4" rows="3" class="form-control" ><?php echo e($annou->announsment); ?></textarea>

              </div>
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                <input type="checkbox" class="custom_toggle" name="status" id="status"
                <?php echo e($annou->status == '1' ? 'checked' : ''); ?> />   
                    
                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
               
                <input type="hidden"  name="free" value="0" for="status" id="status">
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



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\announsment\edit.blade.php ENDPATH**/ ?>