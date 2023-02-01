
<?php $__env->startSection('title','Edit ReviewReport - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Edit Review Report')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
<a href="<?php echo e(url('course/create/'. $show->courses->id)); ?>" class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Edit Review Report')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <!-- =================== -->
		  <form action="<?php echo e(action('ReportReviewController@update',$show->id)); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>


						<input type="hidden" value="<?php echo e($show->course_id); ?>" autofocus required name="course" class="form-control" placeholder="Enter Title"/>

						<input type="hidden" value="<?php echo e($show->review_id); ?>" autofocus required name="course" class="form-control" placeholder="Enter Title"/>

		                <div class="row">
		                  <div class="col-md-6">
		                    <label for="title"><?php echo e(__('Title')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show->title); ?>" autofocus required name="title" type="text" class="form-control" placeholder="Enter Title"/>
		                  </div>
		                  <div class="col-md-6">
		                    <label for="email"><?php echo e(__('Email')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show->email); ?>" autofocus required name="email" type="email" class="form-control" placeholder="Enter Email"/>
		                  </div>
		              	</div>
		              	<br>

		              	<div class="row">
		                  <div class="col-md-12">
		                    <label for="detail"><?php echo e(__('Detail')); ?><sup class="redstar">*</sup></label>
		                    <textarea name="detail" value="" rows="4"  class="form-control" placeholder=""><?php echo e($show->detail); ?></textarea>
		                  </div>
		              	</div>
		              	<br>

		              	<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
								<?php echo e(__('Reset')); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
								<?php echo e(__('Update')); ?></button>
						</div>

		          	</form>
		  <!-- =================== -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\reviewreport\edit.blade.php ENDPATH**/ ?>