
<?php $__env->startSection('title', 'Edit Reported Questions - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Reported Questions ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Report')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Reported Questions ')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu3'); ?>
   <?php echo e(__('Edit Reported Questions ')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('user/question/report')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
					<h5 class="card-title"><?php echo e(__("Reported Questions")); ?> </h5>
				</div>
				<div class="card-body">
					
					<form action="<?php echo e(url('user/question/report/'.$show->id)); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

					
					<div class="row">
						<div class="form-group col-md-6">
							<label for="title" class="text-dark"><?php echo e(__('Title')); ?><sup class="redstar text-danger">*</sup></label>
		                    <input value="<?php echo e($show->title); ?>" autofocus required name="title" type="text" class="form-control" placeholder="Enter Title"/>
							
						</div>
						<div class="form-group col-md-6">
							<label for="email"  class="text-dark"><?php echo e(__('Email')); ?><sup class="redstar text-danger">*</sup></label>
		                    <input value="<?php echo e($show->email); ?>" autofocus required name="email" type="email" class="form-control" placeholder="Enter Email"/>
						</div>
						<div class="form-group col-md-12">
							<label for="detail"  class="text-dark"><?php echo e(__('Detail')); ?><sup class="redstar text-danger">*</sup></label>
		                    <textarea name="detail" value="" rows="4"  class="form-control" placeholder=""><?php echo e($show->detail); ?></textarea>
						</div>
					</div>
					
						<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Update")); ?></button>
						</div>
	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

					
					
		


						
						
		   
		   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\question_report\edit.blade.php ENDPATH**/ ?>