
<?php $__env->startSection('title', 'Report Course - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Report Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Report')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Report Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    
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
                    <form method="post" action="<?php echo e(action('BulkdeleteController@reportedcoursedeleteAll')); ?>

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
                    <h5 class="box-title"><?php echo e(__('Report Course')); ?></h5>
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
                              
                              <th><?php echo e(__('adminstaticword.Title')); ?></th>
                              <th><?php echo e(__('adminstaticword.Email')); ?></th>
                              <th><?php echo e(__('adminstaticword.Detail')); ?></th>
                              <th><?php echo e(__('adminstaticword.Course')); ?></th>
                              <th><?php echo e(__('adminstaticword.Action')); ?></th>
                            
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++;?>
                                <tr>
                              <td> <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($item->id); ?>" id="checkbox<?php echo e($item->id); ?>">
                                <label for="checkbox<?php echo e($item->id); ?>" class="material-checkbox"></label>
                                <?php echo $i;?></td>
                              <td><?php echo e($item->user['fname']); ?></td>
                              
                              <td><?php echo e($item->title); ?></td>
                              <td><?php echo e($item->email); ?></td>
                              <td><?php echo e(str_limit($item->detail, $limit=50, $end="...")); ?></td>
                              <td><?php echo e($item->courses['title']); ?></td>
                              <td>
                                <div class="dropdown">
                                    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reported-course.edit')): ?>
                                        <a class="dropdown-item"   href="<?php echo e(url('admin/report/view/'.$item->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reported-course.delete')): ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                              </td>
                               <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                          </div>
                                          <div class="modal-footer">
                                            <form  method="post" action="<?php echo e(url('admin/report/view/'. $item->id)); ?>

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
                                
                        
                      
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\report_course\index.blade.php ENDPATH**/ ?>