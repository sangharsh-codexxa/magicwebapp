
<?php $__env->startSection('title','Create a new answer'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Answer')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Answer')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('instructoranswer')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
        class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Add')); ?> <?php echo e(__('Answer')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('instructoranswer/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            

            <input type="hidden" name="instructor_id" value="<?php echo e(Auth::user()->id); ?>" />
            <input type="hidden" name="ans_user_id" value="<?php echo e(Auth::user()->id); ?>" />
       
            <div class="row">
              <div class="col-md-12">
                <label  for="exampleInputTit1e"> <?php echo e(__('Select')); ?> <?php echo e(__('Question')); ?>:<sup class="redstar">*</sup></label>
                <br>
                <select name="question_id" required class="form-control select2">
                  <option value="none" selected disabled hidden> 
                     <?php echo e(__('SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ques->id); ?>"><?php echo e($ques->question); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
              <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInput"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"></textarea>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                <input id="c12" type="checkbox" class="custom_toggle" name="status" checked />

                  <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c12"></label>
               
                <input type="hidden" name="status" value="1" id="t12">
              </div>
            </div>
            <br>
    
            <div class="form-group">
              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Create')); ?></button>
            </div>

            <div class="clear-both"></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/instructor/answer/add.blade.php ENDPATH**/ ?>