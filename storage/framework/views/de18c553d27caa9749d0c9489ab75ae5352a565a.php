
<?php $__env->startSection('title','Edit QuestionAnswer'); ?>
<?php $__env->startSection('maincontent'); ?>
​
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
​
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Question Answer')); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('course/create/'. $que->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>
​
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Question Answer')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('questionanswer/'.$que->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

<div style="display:none;">
    
  <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
​
  <select name="course_id" class="form-control select2 d-none">
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option class="d-none" value="<?php echo e($cou->id); ?>" <?php echo e($que->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </select>
​
   <select name="user_id" class="form-control col-md-7 col-xs-12 display-none">
     <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <option class="display-none" value="<?php echo e($cu->id); ?>" <?php echo e($que->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cu->fname); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </select>
​
</div>
​
              
                 
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Question')); ?>:<span class="redstar">*</span></label>
                <textarea name="question" rows="3" class="form-control" placeholder="Enter Your Question" required ><?php echo e($que->question); ?></textarea>
              </div>
          
              <div class="col-md-12 mt-3">
                <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label><br>
               
                    <label class="switch">
                      <input class="slider" type="checkbox" name="status" <?php echo e($que->status==1 ? 'checked' : ''); ?> />
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
​
            <div class="clear-both"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
​
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\questionanswer\edit.blade.php ENDPATH**/ ?>