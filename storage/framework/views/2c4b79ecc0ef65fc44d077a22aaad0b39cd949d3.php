
<?php $__env->startSection('title', 'ADD User - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
      <div class="content">
        <div class="col-md-12">
        	<div class="box box-primary">
	           	<div class="box-header with-border">
              	<h3 class="box-title"><?php echo e(__('Review')); ?></h3>
           		</div>
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('ReviewratingController@update')); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>


		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
			                <li class="tg-list-item">
				                <input class="tgl tgl-skewed" id="cb10111" type="checkbox" <?php echo e($show->status==1 ? 'checked' : ''); ?>>
				                <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb10111"></label>
				            </li>
			                <input type="hidden" name="status" value="<?php echo e($show->status); ?>" id="jjjj">
		                  </div>
		                  <div class="col-md-6">
		                    <label for="detail"><?php echo e(__('Approved')); ?>:</label>
		                    <li class="tg-list-item">
				                <input class="tgl tgl-skewed" id="cb10112" type="checkbox" <?php echo e($show->approved==1 ? 'checked' : ''); ?>>
				                <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb10112"></label>
				            </li>
				            <input type="hidden" name="status" value="<?php echo e($show->approved); ?>" id="jjjj">
		                  </div>
		              	</div>
		              	<br>

		              	<button value="" type="submit"  class="btn btn-lg col-md-4 btn-primary-rgba"><?php echo e(__('Save')); ?></button>

		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\review\edit.blade.php ENDPATH**/ ?>