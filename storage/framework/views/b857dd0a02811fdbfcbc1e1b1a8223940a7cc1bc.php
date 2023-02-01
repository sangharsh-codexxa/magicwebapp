
<?php $__env->startSection('title','All Announcement'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Announcement')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Announcement')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        
        <a href="<?php echo e(url('instructor/announcement/create')); ?>"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Announcement')); ?></a>
        
    </div>                        
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('All Announcement')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th><?php echo e(__('Announcement')); ?></th>
                            <th><?php echo e(__('Course')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                          
                          </tr>
                          </thead>
                          <tbody>
                          <?php $i=0;?>
                          <?php $__currentLoopData = $announs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <?php $i++;?>
                            <td><?php echo $i;?></td>
                              <td><?php echo e($announ->announsment); ?></td>
                              <td><?php echo e($announ->courses->title); ?></td>
                            <td>
                              <label class="switch">
                                <input class="user" type="checkbox"  data-id="<?php echo e($announ->id); ?>" name="status" <?php echo e($announ->status == '1' ? 'checked' : ''); ?>>
                                <span class="knob"></span>
                              </label>
                               
                            </td>
                            <td>
                              <div class="dropdown">
                                  <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                      <a class="dropdown-item" href="<?php echo e(url('instructor/announcement/'.$announ->id)); ?>"><i class="feather icon-edit mr-2"></i>Edit</a>
                                      <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($announ->id); ?>" >
                                          <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                      </a>
                                  </div>
                              </div>

                              <!-- delete Modal start -->
                              <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($announ->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                                  <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                                  <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                          </div>
                                          <div class="modal-footer">
                                              <form method="post" action="<?php echo e(url('instructor/announcement/'.$announ->id)); ?>" class="pull-right">
                                                  <?php echo e(csrf_field()); ?>

                                                  <?php echo e(method_field("DELETE")); ?>

                                                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                  <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- delete Model ended -->

                          </td>
                           
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                        </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\announcement\index.blade.php ENDPATH**/ ?>