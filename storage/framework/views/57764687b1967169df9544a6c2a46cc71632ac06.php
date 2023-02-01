
<?php $__env->startSection('title', 'All Meetings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('All Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Zoom Live Meetings')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu3'); ?>
   <?php echo e(__('All Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
<a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i>Delete Selected</a>
                                
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
              <form method="post" action="<?php echo e(action('BulkdeleteController@ZoommeetingdeleteAll')); ?>

                      " id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>


              
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(__("Yes")); ?></button>
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
                    <h5 class="box-title"><?php echo e(__('All Meetings')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                                <label for="checkboxAll" class="material-checkbox"></label> 
                                #</th>
                              <th><?php echo e(__('adminstaticword.User')); ?></th>
                              <th><?php echo e(__('adminstaticword.Meeting')); ?></th>
                              <th><?php echo e(__('adminstaticword.Url')); ?></th>
                              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
              <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr>
                <td> <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($meeting->id); ?>" id="checkbox<?php echo e($meeting->id); ?>">
                  <label for="checkbox<?php echo e($meeting->id); ?>" class="material-checkbox"></label>
                  <?php echo $i;?>
                  
                  </td>
              
                <td><?php echo e($meeting->user['fname']); ?></td>

                <td>
                  <p><b><?php echo e(__('adminstaticword.MeetingID')); ?>:</b> <?php echo e($meeting['meeting_id']); ?></p>
                  <p><b><?php echo e(__('adminstaticword.OwnerID')); ?>:</b> <?php echo e($meeting['owner_id']); ?></p>
                  <p><b><?php echo e(__('adminstaticword.MeetingTopic')); ?>:</b> <?php echo e($meeting['meeting_title']); ?></p>
                  <p><b><?php echo e(__('adminstaticword.StartTime')); ?>:</b> <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></p>

                  <?php if(isset($meeting->course_id)): ?>

                  <p><b><?php echo e(__('adminstaticword.Meetingoncourse')); ?>:</b> <?php echo e($meeting->courses['title']); ?></p>

                  <?php endif; ?>

                </td>
                
                <td>
                  <a href="<?php echo e($meeting->zoom_url); ?>" target="_blank" class="btn btn-primary-rgba"><?php echo e(__('adminstaticword.JoinMeeting')); ?></a>
                </td>
                    <td>
                      <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-trash"></i></a>
                      
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
                                    <form  method="post" action="<?php echo e(route('zoom.destroy',$meeting->id)); ?>

                                      "data-parsley-validate class="form-horizontal form-label-left">
                                      <?php echo e(csrf_field()); ?>

                                      <?php echo e(method_field('DELETE')); ?>

                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                                      <button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
                                  </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
    
                               
                              
                
                               
                              
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\zoom\meeting.blade.php ENDPATH**/ ?>