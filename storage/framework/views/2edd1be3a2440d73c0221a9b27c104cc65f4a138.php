
<?php $__env->startSection('title', 'Your Google Meetings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Your Google Meetings ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Your Google Meetings ')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
      <a   title="Create a new meeting" href="<?php echo e(route('googlemeet.meeting.create')); ?>"  class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add")); ?></a>
      
      <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i>Delete Multiple</a>
                                
      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                  </div>
                  <div class="modal-footer">
                    <form method="post" action="<?php echo e(action('BulkdeleteController@googlemeetingdeleteAll')); ?>

                    " id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                  </form>
                  </div>
              </div>
          </div>
      </div>
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
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Your Google Meetings ')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
								<th>
									
                                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                                    <label for="checkboxAll" class="material-checkbox"></label> 
                                     #
									</th>
									<th>
										<?php echo e(__('MeetingID')); ?>

									</th>
									<th>
										<?php echo e(__('Meeting')); ?> <?php echo e(__('URL')); ?>

									</th>
									<th>
										<?php echo e(__('Action')); ?>

									</th>
                           
                            </tr>
                            </thead>
                            <tbody>
								<?php
								$i = 0;
							?>
		  
							<?php $__currentLoopData = $allgooglemeet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  
								<?php
									$i++;
								?>
							  <tr>
								  <td>
                                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($meeting->id); ?>" id="checkbox<?php echo e($meeting->id); ?>">
                                    <label for="checkbox<?php echo e($meeting->id); ?>" class="material-checkbox"></label> <?php echo e($i); ?>

								  </td>
		  
								  <td>
									  <p><b><?php echo e(__('MeetingID')); ?>:</b><?php echo e($meeting['meeting_id']); ?> </p>
									  <p><b><?php echo e(__('MeetingTopic')); ?>:</b><?php echo e($meeting['meeting_title']); ?> </p>
									  <p><b><?php echo e(__('Agenda')); ?>:</b><?php echo e($meeting['agenda']); ?></p>
									  <p><b><?php echo e(__('StartTime')); ?>:</b><?php echo e($meeting['start_time']); ?></p>
									  <p><b><?php echo e(__('EndTime')); ?>:</b><?php echo e($meeting['end_time']); ?></p>
									  <p><b><?php echo e(__('Duration')); ?>:</b><?php echo e($meeting['duration']); ?></p>	
								  </td>
		  
								  <td>
									  <a title="Join Meeting" target="_blank" href="<?php echo e($meeting['meet_url']); ?>">
										  <?php echo e($meeting['meet_url']); ?>

									  </a>
									  </a>
								  </td>
                               <td>
                                <div class="dropdown">
                                    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                        <a class="dropdown-item"  title="Edit Meeting" href="<?php echo e(route('googlemeet.edit',$meeting['meeting_id'])); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                        <a class="dropdown-item"  title="Start Meeting" href="<?php echo e($meeting['meet_url']); ?>"><i class="feather icon-send mr-2"></i><?php echo e(__("Start Meetings")); ?></a>
                                        <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></a>
                                      
                                    </div>
                                </div>
                              </td>

                              <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                          </div>
                                          <div class="modal-footer">
											<form method="post" action="<?php echo e(route('googlemeet.delete',$meeting['meeting_id'])); ?>" class="pull-right">
												<?php echo e(csrf_field()); ?>

												<?php echo e(method_field("DELETE")); ?>

                                              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                              <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                          </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                             
                                    
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            
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
            
                                    
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\googlemeet\index.blade.php ENDPATH**/ ?>