
<?php $__env->startSection('title', 'List all Recordings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('List all Recordings ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Big Blue Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('List all Recordings ')); ?>

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>


  <div class="contentbar">                
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('List all Recordings ')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
								<th>
									#
								</th>
								<th>
									<?php echo e(__('Meeting ID')); ?>

								</th>
								<th>
									<?php echo e(__('Meeting Name')); ?> 
								</th>
								<th>
									<?php echo e(__('Get Recording')); ?> 
								</th>
                            </tr>
                            </thead>
							<tbody>
								<?php $i=0;?>
				
								<?php if(isset($all_recordings['recording'])): ?>
								<?php $__currentLoopData = $all_recordings['recording']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $i++;?>
									<tr>
										<td><?php echo $i;?></td>
										<td><b><?php echo e($meeting->meetingID); ?></b></td>
										<td><b><?php echo e($meeting->name); ?></b></td>
										
				
										<td>
				
											 <a href="<?php echo e($meeting->playback->format->url); ?>" target="_blank" class="btn btn-primary"><?php echo e(__('Play Recording')); ?> </a>
										</td>
										
										
				
				
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>        


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\bbl\recordings.blade.php ENDPATH**/ ?>