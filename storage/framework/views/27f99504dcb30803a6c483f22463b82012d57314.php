
<?php $__env->startSection('title','Edit Child-category'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Child-category')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('courseanswer/'. $show->courses->id)); ?>" class="float-right btn btn-primary mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
 
<div class="contentbar">
   	<div class="row">
	    <div class="col-md-12">
	    	<div class="card m-b-30">
	           	<div class="card-header">
	          	<h3 class="card-box"> <?php echo e(__('Edit')); ?> <?php echo e(__('Answer')); ?></h3>
	       		</div>
	          	<div class="card-body ml-2">
	          		<form action="<?php echo e(route('courseanswer.update',$show->id)); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

						

						<input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
						
		              
	                    <input type="hidden" value="<?php echo e($show->course_id); ?>" autofocus name="course_id" type="text" class="form-control d-none" >


	                    <div class="row">
	                    	<div class="col-md-12">
	                    		<label for="exampleInput"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
	                  			<textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer" required><?php echo e($show->answer); ?></textarea>
	                    	</div>
	                    </div>
		              	
		              	<br>


		              	<div class="form-group col-md-12">
                          <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label><br>
                          <label class="switch">
                            <input class="slider" type="checkbox" name="status" <?php echo e($show->status == '1' ? 'checked' : ''); ?> />
                            <span class="knob"></span>
                          </label>
                        </div>
		              	<br>
		              	<br>
		              	<br>
		              	
						<div class="box-footer">
		              		<button value="" type="submit"  class="btn btn-md col-md-2 btn-primary-rgba"><?php echo e(__('Save')); ?></button>
		              	</div>

		          	</form>
	          	</div>
	      	</div>
	  	</div>
  	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\answer\edit.blade.php ENDPATH**/ ?>