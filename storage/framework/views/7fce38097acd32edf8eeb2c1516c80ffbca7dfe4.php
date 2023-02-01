
<?php $__env->startSection('title', 'Advertise Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Advertise Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Player Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Advertise Settings')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

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
           
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__("Advertise Settings")); ?></h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><?php echo e(__("Skip AD Setting")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><?php echo e(__("Pop Up Ad Setting")); ?></a>
                        </li>
                      
                    </ul>
                    <div class="tab-content" id="defaultTabContentLine">
                        <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                        	<form action="<?php echo e(route('ad.update')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>



                            <div class="form-group col-md-6">
                              <label for="exampleInputTit1e"><?php echo e(__('Skip AD Timer')); ?></label>
                              <select name="timer_check" id="timer" class="select2-single form-control">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                              </select>
                            </div>

                            <div class="form-group col-md-6"  style="display: none;" id="t">
                              <label for="exampleInputTit1e"><?php echo e(__('Time : ( Please Ensure that its not conflict with popup ad start time )')); ?></label>
                              <input type="text" placeholder="00:00:10" name="ad_timer" class="form-control">
                              <br>
                              <label for=""><?php echo e(__("Ad Hold Time:")); ?> </label>
                              <input type="number" name="ad_hold" min="0" max="10" placeholder="eg. 5" class="form-control">                            
                            </div>
                            <div class="form-group col-md-12">
                              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Update")); ?></button>
                            </div>
                          </form>
                        </div>
                                
                              
                                
                                
                              
                            
                        <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                          <form action="<?php echo e(route('ad.pop.update')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                           

                            <div class="form-group col-md-6">
                              <label for=""><?php echo e(__("Start Time:")); ?> <br><span class="help-block"><?php echo e(__("( Please Ensure that its not conflict with video ad start time )")); ?></span></label>
                              <input type="text" name="time" placeholder="00:00:10" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                              <label for=""><?php echo e(__("End Time:")); ?> </label>
                              <input type="text" name="endtime" placeholder="00:00:30" class="form-control">                        
                            </div>
                            
                            
                            <div class="form-group col-md-12">
                              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Update")); ?></button>
                            </div>
                          </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
	
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$('#timer').change(function(){
			if($(this).val() == 'no')
			{
				$('#t').hide();
			}else
			{
				$('#t').show();
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\advertise\adsetting.blade.php ENDPATH**/ ?>