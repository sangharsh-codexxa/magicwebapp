
<?php $__env->startSection('title','All Users Activity Logs'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Users Activity Logs')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Users Activity Logs')); ?>

<?php $__env->endSlot(); ?>


<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('All Users Activity Logs')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>
                                <th>#</th>
                                <th><?php echo e(__('User')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th><?php echo e(__('Time')); ?></th>
                                <th><?php echo e(__('Delete')); ?></th>
                              </thead> 
              
                              <tbody>
                                <?php $i=0;?>
              
                                  <?php $__currentLoopData = $lastActivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                                    <?php
                                      $users = App\User::where('id', $user->causer_id)->first();
                                    ?>
                                   
                                    <?php $i++;?>
              
                                    <tr>
                                      <td></td>
                                      <td><?php echo $i;?></td>
                                     
                                      <td><?php if(isset($users)): ?> <?php echo e($users->fname); ?> <?php endif; ?></td>
                                      <td><?php if(isset($users)): ?> <?php echo e($users->email); ?> <?php endif; ?></td>
                                      <td><?php echo e($user->description); ?></td>
                                      <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                                      <td>
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                                <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($user->id); ?>" >
                                                    <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                                </a>
                                            </div>
                                        </div>
    
                                        <!-- delete Modal start -->
                                        <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                                            <p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e($user->fname); ?></b>? <?php echo e(__('This process cannot be undone.')); ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?php echo e(route('activity.delete',$user->id)); ?>" class="pull-right">
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
              
                              </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\user_activity\index.blade.php ENDPATH**/ ?>