
<?php $__env->startSection('title', 'View Instructor - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('View Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('All Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
   <?php echo e(__('View Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('View Instructor')); ?></h5>
                </div>
                <div class="card-body">
					<div class="form-group col-md-12">
						<ul class="instructor">
							<li><img src="<?php echo e(asset('images/instructor/'.$show->image)); ?>" class="img-circle"/></li>
							<li><span class="text-color"><?php echo e(__('Name')); ?>:</span> <?php echo e($show->fname); ?> <?php echo e($show['lname']); ?></li>
							<li><span class="text-color"><?php echo e(__('Role')); ?>:</span> <?php echo e($show->role); ?></li>
							<li><span class="text-color"><?php echo e(__('Phone')); ?>:</span> <?php echo e($show->mobile); ?></li>
							<li><span class="text-color"><?php echo e(__('Email')); ?>:</span> <?php echo e($show->email); ?></li>
							<li><span class="text-color"><?php echo e(__('Detail')); ?>:</span> <?php echo e($show->detail); ?></li>
							<li><span class="text-color"><?php echo e(__('Resume')); ?>:</span> <a href="<?php echo e(asset('files/instructor/'.$show->file)); ?>" download="<?php echo e($show->file); ?>"><?php echo e(__('Download')); ?> <i class="fa fa-download"></i></a></li>

						</ul>
					</div>
					
					<form action="<?php echo e(route('requestinstructor.update',$show->id)); ?>" method="POST" enctype="multipart/form-data">
						  <?php echo e(csrf_field()); ?>

						  <?php echo e(method_field('PUT')); ?>

					<div class="form-group col-md-12">
						<input type="hidden" value="<?php echo e($show->user_id); ?>" name="user_id" class="form-control">
						   <input type="hidden" value="<?php echo e($show->role); ?>" name="role" class="form-control">
						  <input type="hidden" value="<?php echo e($show->mobile); ?>" name="mobile" class="form-control">
						  <input type="hidden" value="<?php echo e($show->detail); ?>" name="detail" class="form-control">
						  <input type="hidden" value="<?php echo e($show->image); ?>" name="image" class="form-control">
					</div>
                  
						
							
						
					  
					<div class="row ml-3">
						<div class="form-group ml-4 col-md-6">
							<label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
							<br>
							<input  type="checkbox" name="search_enable"  class="custom_toggle"   <?php echo e($show->status==1 ? 'checked' : ''); ?> />
							<input type="hidden" name="status" value="<?php echo e($show->status); ?>" id="c33">
						  </div>
					</div>
						
					
						    
								
								
								
					<div class="row ml-3">
							<div class="form-group ml-4  col-md-6">
								<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
								<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
								<?php echo e(__("Update")); ?></button>
							</div>
						</div>
			
						  </form>
					  </div>
					</div>
				  </div>
				  <!-- End col -->
			  </div>
			  <!-- End row -->
			</div>     
			
<?php $__env->stopSection(); ?>
					
                             
                            
                         
                  



				  
				 
				 

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\instructor_request\view.blade.php ENDPATH**/ ?>