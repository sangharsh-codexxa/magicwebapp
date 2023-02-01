
<?php $__env->startSection('title','Edit Answer'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Answer')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('instructoranswer')); ?>" class="float-right btn btn-primary mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
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
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Answer')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form action="<?php echo e(url('instructoranswer/'.$answer->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <label class="d-none" for="exampleInputSlug"><?php echo e(__('SelectCourse')); ?></label>
              <input value="<?php echo e($answer->course_id); ?>" autofocus name="course_id" class="d-none" type="text" class="form-control select2" >


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInput"> <?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"><?php echo e($answer->answer); ?></textarea>
                </div>
              </div>
            
            <br>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                <input id="cb10111" type="checkbox" class="custom_toggle" name="status"
                <?php echo e($answer->status==1 ? 'checked' : ''); ?> />
               
                <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb10111"></label>
                
                <input type="hidden" name="status" value="<?php echo e($answer->status); ?>" id="jjjj">
            </div>
           
            
            
            <div class="form-group">
              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                Reset</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                Update</button>
            </div>

            <div class="clear-both"></div>
        </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\answer\edit.blade.php ENDPATH**/ ?>