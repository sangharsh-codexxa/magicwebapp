
<?php $__env->startSection('title', 'View Google Meet Meeting : '.$response['id']); ?>
<?php $__env->startSection('body'); ?>
<section class="content">
	<div class="box">
		
		<div class="box-header with-border">
			<div class="box-title" style="color:black">
					<?php echo e(__('View Meeting')); ?> : <?php echo e($response['id']); ?>

			</div>

			<div class="pull-right tools">
				<a title="Back" href="<?php echo e(route('zoom.index')); ?>" class="btn btn-sm btn-default">
					<i class="fa fa-reply"></i>
				</a>

				<a title="Edit Meeting" href="<?php echo e(route('zoom.edit',$response['id'])); ?>" class="btn btn-sm btn-success">
								<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<a title="Delete Meeting" data-toggle="modal" data-target="#delete<?php echo e($response['id']); ?>" class="btn btn-sm btn-primary">
								<i class="fa fa-trash-o"></i>
				</a>

				<a title="Start Meeting" target="_blank" href="<?php echo e($response['start_url']); ?>" class="btn btn-sm btn-success">
					<i class="fa fa-camera"></i>
				</a>
			</div>

			 <div id="delete<?php echo e($response['id']); ?>" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading">Are You Sure ?</h4>
                      <p>Do you really want to delete this meeting? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                   <form method="post" action="<?php echo e(route('zoom.delete',$response['id'])); ?>" class="pull-right">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field("DELETE")); ?>

                                      
                    
                        <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
		</div>

		<div class="box-body">
			<h3>Meeting ID : <?php echo e($response['id']); ?></h3>
			<hr>
			<h3>Meeting Type :<?php if($response['type'] == '2'): ?> Scheduled Meeting <?php elseif($response['type'] == '3'): ?> Recurring Meeting with no fixed time <?php else: ?> Recurring Meeting with fixed time <?php endif; ?></h3>
			<hr>
			<h3>Meeting Topic : <?php echo e($response['topic']); ?></h3>
			<hr>
			<h3>Meeting Agenda :<?php echo e(isset($response['agenda']) ? $response['agenda'] : ""); ?></h3>
			<hr>
			<h3>Start Time :<?php echo e(isset($response['start_time']) ? date('d-m-Y | h:i:s A',strtotime($response['start_time'])) : ""); ?></h3>
			<hr>
			<h3>Meeting Contact Name : <?php echo e(isset($response['settings']['contact_name']) ? $response['settings']['contact_name'] : $response['host_email']); ?></h3>
			<hr>
			<h3>Invite URL : <a href="<?php echo e(isset($response['join_url'])); ?>"><?php echo e($response['join_url']); ?></a></h3>
			<hr>
			<h3>Meeting Duration : <?php echo e(isset($response['duration']) ? $response['duration'] : ""); ?> min.</h3>
			<hr>
			<h3>Other Meeting Settings :</h3>
			<hr>
			<h5><i class="fa fa-microphone" aria-hidden="true"></i> Audio : <?php echo e(isset($response['settings']['audio']) == 'both' ? "Computer and Internet call" : isset($response['settings']['audio'])); ?></h5>
			<h5><i class="fa fa-camera" aria-hidden="true"></i> Host Video : <?php echo e(isset($response['settings']['host_video']) == true ? "Enabled" : "Disabled"); ?></h5>
			<h5><i class="fa fa-group" aria-hidden="true"></i> Join before Host : <?php echo e(isset($response['settings']['join_before_host']) == true ? "Yes" : "No"); ?></h5>
			<h5><i class="fa fa-group" aria-hidden="true"></i> Join before Host : <?php echo e(isset($response['settings']['join_before_host']) == true ? "Yes" : "No"); ?></h5>
			<h5><i class="fa fa-group" aria-hidden="true"></i> Participant Video : <?php echo e(isset($response['settings']['participant_video']['join_before_host']) == true ? "Enabled" : "Disabled"); ?></h5>
		</div>

		
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\googlemeet\show.blade.php ENDPATH**/ ?>