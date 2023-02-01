
<?php $__env->startSection('title', 'List all meetings- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('List all meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Big Blue Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('List all meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
      <a href="<?php echo e(route('bbl.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add")); ?></a>
	  <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
                                
      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                  </div>
                  <div class="modal-footer">
					<form method="post" action="<?php echo e(action('BulkdeleteController@bblmeetingdeleteAll')); ?>

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
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('List all meetings')); ?></h5>
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
									 <?php echo e(__('Meeting')); ?> <?php echo e(__('Detail')); ?>

								</th>
								<th>
									<?php echo e(__('Password')); ?>

								</th>
								<th>
									<?php echo e(__('Action')); ?>

								</th>
                            </tr>
                            </thead>
                            <tbody>
								<?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($meeting->id); ?>" id="checkbox<?php echo e($meeting->id); ?>">
											<label for="checkbox<?php echo e($meeting->id); ?>" class="material-checkbox"></label>
											<?php echo e($key+1); ?></td>
										<td><b><?php echo e($meeting->meetingid); ?></b></td>
										<td>
											<p><b><?php echo e(__('Meeting')); ?> <?php echo e(__('Name')); ?> :</b> <?php echo e($meeting->meetingname); ?></p>
											<p><b><?php echo e(__('Meeting')); ?>  Participant:</b> <?php echo e($meeting->setMaxParticipants == -1 ? "Unlimited" : $meeting->setMaxParticipants); ?></p>
											<p><b><?php echo e(__('Duration')); ?>:</b> <?php echo e($meeting->duration); ?>min</p>
											<p><b>Welcome Message:</b> <?php echo e($meeting->welcomemsg == '' ? "Not set" : $meeting->welcomemsg); ?></p>
											<p><b>Mute on start:</b> <?php echo e($meeting->setMuteOnStart == 1 ? "Yes" : "No"); ?></p>
											<?php if($meeting->link_by == 'course'): ?>
											<p><b>Link on course:</b> <?php echo e($meeting->course['title'] ?? '-'); ?></p>
											<?php endif; ?>
											<p><b>Start Time:</b> <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></p>
										</td>
										<td>
											<p><b>Moderator <?php echo e(__('Password')); ?>:</b> <?php echo e($meeting->modpw); ?></p>
											<p><b>Attendee <?php echo e(__('Password')); ?>:</b> <?php echo e($meeting->attendeepw); ?></p>
										</td>

										<td>
											<div class="dropdown">
												<button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
												<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
													<a class="dropdown-item" href="<?php echo e(route('bbl.edit',$meeting->id)); ?>" ><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
													<a href="page-product-detail.html"  class="dropdown-item"  data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
													<a class="dropdown-item"href="<?php echo e(route('api.create.meeting',$meeting->id)); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__("View")); ?></a>
													
												</div>
											</div>
										</td>
								
			                          	
										<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("Delete")); ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
													</div>
													<div class="modal-footer">
														<form method="post" action="<?php echo e(route('bbl.delete',$meeting['id'])); ?>" class="pull-right">
															<?php echo e(csrf_field()); ?>

															<?php echo e(method_field("DELETE")); ?>

														<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
														<button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
													</form>
													</div>
												</div>
											</div>
										</div>
				
				
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\bbl\index.blade.php ENDPATH**/ ?>