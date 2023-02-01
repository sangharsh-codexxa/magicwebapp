
<?php $__env->startSection('title', 'Your Zoom Meetings'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['secondactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Your Zoom Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Zoom Meetings')); ?>

<?php $__env->endSlot(); ?>


<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
      <a href="<?php echo e(route('meeting.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add")); ?></a>
      
                                
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
                    
                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                      <button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
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
                    <h5 class="box-title"> <?php echo e(__('adminstaticword.AllMeetings')); ?> (<?php echo e(count($meetings)); ?>)</h5>
                </div>
                <div class="card-body">
					<h6><?php echo e(__('adminstaticword.ZoomProfile')); ?></h6>
					<div class="row">
						
						
						  <div class="col-md-2">
							  <img src="<?php echo e(isset($profile['pic_url']) ? $profile['pic_url'] : Avatar::create($profile['first_name'])); ?>" alt="your_profile_picture" class="img-responsive img-circle">
						  </div>
		  
						  <div class="col-md-4">
							  <p><b><?php echo e(__('adminstaticword.FirstName')); ?>:</b> <?php echo e($profile['first_name']); ?></p>
							  <p><b><?php echo e(__('adminstaticword.LastName')); ?>:</b> <?php echo e($profile['last_name']); ?></p>
							  <p><b><?php echo e(__('adminstaticword.Timezone')); ?>:</b> <?php echo e($profile['timezone']); ?></p> 
						  </div>
		  
						  <div class="col-md-4">
							  <p><b><?php echo e(__('adminstaticword.Status')); ?>:</b> <?php echo e($profile['status']); ?></p>
							  <p><b>Zoom ID:</b> <?php echo e($profile['id']); ?></p>
							  <p><b><?php echo e(__('adminstaticword.Language')); ?>:</b> <?php echo e($profile['language']); ?></p> 
						  </div>
		  
						</div>
					</div>
					
				   
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
								<th>
									#
									</th>
									<th>
										<?php echo e(__('adminstaticword.MeetingID')); ?>

									</th>
									<th>
										<?php echo e(__('adminstaticword.Meeting')); ?> <?php echo e(__('adminstaticword.URL')); ?>

									</th>
									<th>
										<?php echo e(__('adminstaticword.Action')); ?>

									</th>
                           
                            </tr>
                            </thead>
							<tbody>
							<?php
							$i = 0;
						?>
	  
						<?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  
							<?php
								$i++;
							?>
	  
						  <tr>
							  <td>
								  <?php echo e($i); ?>

							  </td>
	  
							  <td>
								  <p><b><?php echo e(__('adminstaticword.MeetingID')); ?>:</b> <?php echo e($meeting['id']); ?></p>
								  <p><b><?php echo e(__('adminstaticword.MeetingTopic')); ?>:</b> <?php echo e($meeting['topic']); ?></p>
								  <p><b><?php echo e(__('adminstaticword.Agenda')); ?>:</b> <?php echo e(isset($meeting['agenda']) ? str_limit($meeting['agenda'], $limit = 10, $end = '...') : ""); ?></p>
								  <p><b><?php echo e(__('adminstaticword.Duration')); ?>:</b> <?php echo e(isset($meeting['duration']) ? $meeting['duration'] : ""); ?> min</p>
								  <p><b><?php echo e(__('adminstaticword.StartTime')); ?>:</b><?php echo e(isset($meeting['start_time']) ? date('d-m-Y | h:i:s A',strtotime($meeting['start_time'])) : ""); ?> </p>
								  <p><b>Meeting Type:</b> <?php if($meeting['type'] == '2'): ?> Scheduled Meeting <?php elseif($meeting['type'] == '3'): ?> Recurring Meeting with no fixed time <?php else: ?> Recurring Meeting with fixed time <?php endif; ?></p>
	  
								  
	  
								  
							  </td>
	  
							  <td>
								  <a title="Join Meeting" target="_blank" href="<?php echo e($meeting['join_url']); ?>">
									  <?php echo e($meeting['join_url']); ?>

								  </a>
							  </td>
	  
							  <td>
	  
								  <?php
									  $curl = curl_init();
									  $token = Auth::user()->jwt_token;
									  $meetingID = $meeting['id'];
										  curl_setopt_array($curl, array(
											CURLOPT_URL => "https://api.zoom.us/v2/meetings/$meetingID",
											CURLOPT_RETURNTRANSFER => true,
											CURLOPT_ENCODING => "",
											CURLOPT_MAXREDIRS => 10,
											CURLOPT_TIMEOUT => 30,
											CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											CURLOPT_CUSTOMREQUEST => "GET",
											CURLOPT_HTTPHEADER => array(
											  "authorization: Bearer $token"
											),
										  ));
	  
										  $url = curl_exec($curl);
										  $err = curl_error($curl);
										  $url = json_decode($url,true);
										  curl_close($curl);
									  ?>
	  
	
									<div class="dropdown">
										<button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
										<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
											<a class="dropdown-item"  title="Edit Meeting" href="<?php echo e(route('zoom.edit',$meeting['id'])); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
											<a class="dropdown-item" title="View Meeting" href="<?php echo e(route('zoom.show',$meeting['id'])); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__("View")); ?></a>
											<a class="dropdown-item"  title="Start Meeting" href="<?php echo e(isset($url['start_url']) ? $url['start_url'] : ""); ?>"><i class="feather icon-send mr-2"></i><?php echo e(__("Share")); ?></a>
											<a class="dropdown-item" title="Delete Meeting" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
										
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
											<form method="post" action="<?php echo e(route('zoom.delete',$meeting['id'])); ?>" class="pull-right">
												<?php echo e(csrf_field()); ?>

												<?php echo e(method_field("DELETE")); ?>

											<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
											<button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
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
<?php $__env->startSection('scripts'); ?>

  <script>
  $(function() {
    $('.custom_toggle').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'quickupdate/slider',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(id)
            }
        });
    })
  })
</script>
<?php $__env->stopSection(); ?>
                                      
                                    
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\zoom\index.blade.php ENDPATH**/ ?>