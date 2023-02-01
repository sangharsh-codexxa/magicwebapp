
<?php $__env->startSection('title', 'Course Text - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
 
<section class="content">
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
	           	<div class="box-header with-border">
              	<h3 class="box-title"><?php echo e(__('CourseText')); ?></h3>
           		</div>
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('CoursetextController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading"><?php echo e(__('Heading')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show['heading']); ?>" autofocus required name="heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Heading')); ?>"/>
		                  </div>
		              	
		                  <div class="col-md-6">
		                    <label for="sub_heading"><?php echo e(__('SubHeading')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show['sub_heading']); ?>" autofocus required name="sub_heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('SubHeading')); ?>"/>
		                  </div>
		              	</div>
		              	<br>
						<div class="box-footer">
		              		<button value="" type="submit" class="btn btn-md col-md-2 btn-primary-rgba"><?php echo e(__('Save')); ?></button>
		              	</div>
		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course_text\edit.blade.php ENDPATH**/ ?>