
<?php $__env->startSection('title','All Coursereview'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Coursereview')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Coursereview')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h4 class="box-title"><?php echo e(__('CourseReview')); ?>-><?php echo e($course->title); ?></h4>
        </div>
        <div class="card-body">
          <div class="view-instructor">
            <div class="instructor-detail">
              <ul>


                <?php if($course->preview_image != null || $course->preview_image !=''): ?>
                <img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" class="img-circle" />
                <?php else: ?>
                <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" class="img-responsive">
                <?php endif; ?>

                <li><b><?php echo e(__('Course')); ?></b>: <?php echo e($course->title); ?></li>
                <li><b><?php echo e(__('User')); ?></b>: <?php echo e($course->user->fname); ?> <?php echo e($course->user->lname); ?></li>

                <li><b><?php echo e(__('Title')); ?></b>: <?php echo e($course->title); ?></li>
                <li><b><?php echo e(__('Detail')); ?></b>: <?php echo $course->detail; ?></li>
                <li><b><?php echo e(__('Course Rejected Reason')); ?></b>:<br> <?php echo $course->reject_txt; ?></li>
              </ul>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\rejected\view.blade.php ENDPATH**/ ?>