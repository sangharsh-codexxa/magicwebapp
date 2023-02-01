
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
          <form id="demo-form" method="post" action="<?php echo e(url('instructor/announcement/'.$announs->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>



            <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
            
                 
            <div class="row">
              <div class="col-md-9">
                <label for="exampleInputTit1e"><?php echo e(__('Announcement')); ?>:<span class="redstar">*</span></label>
                <textarea name="announsment" rows="3" class="form-control" placeholder="Enter Question"><?php echo e($announs->announsment); ?></textarea>
              </div>
            
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                <input type="checkbox" id="cb77" class="custom_toggle" name="status"
                    <?php echo e($announs->status == '1' ? 'checked' : ''); ?> />
                  
                  <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb77"></label>
                
                <input type="hidden" name="status" value="<?php echo e($announs->status); ?>" id="jp">
              </div>
            </div> 
            <br>
              
            <div class="col-md-6">
              <div class="form-group">
                               <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                 <?php echo e(__('Reset')); ?></button>
                               <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                 <?php echo e(__('Update')); ?></button>
                             </div>
             
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\announcement\edit.blade.php ENDPATH**/ ?>