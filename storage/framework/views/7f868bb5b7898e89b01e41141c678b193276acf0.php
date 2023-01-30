
<?php $__env->startSection('title','All Coupons'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Coupon')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Coupon')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.delete')): ?>
  <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
    class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.create')): ?>
  <a href="<?php echo e(route('coupon.create')); ?>"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Coupon')); ?></a>
<?php endif; ?>
</div> 
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar"> 
  <div class="row">
      
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-box"><?php echo e(__('All Coupons')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          
                                 
                             
                    <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                      value="all" /> <?php echo e(__('ID')); ?>  </th>
                  <label for="checkboxAll" class="material-checkbox"></label></th>
                    <th><?php echo e(__('CODE')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('MaxUsage')); ?></th>
                    <th><?php echo e(__('Detail')); ?></th>
                    <th><?php echo e(__('Action')); ?></th>
                  </thead>
  
                  <tbody>
                    <?php $__currentLoopData = $coupans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                         
                              <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                  name='checked[]' value='<?php echo e($cpn->id); ?>' id='checkbox<?php echo e($cpn->id); ?>'>
                              <label for='checkbox<?php echo e($cpn->id); ?>' class='material-checkbox'></label>
                        
                          <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                              <div class="modal-dialog modal-sm">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <div class="delete-icon"></div>
                                      </div>
                                      <div class="modal-body text-center">
                                          <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                          <p><?php echo e(__('Do you really want to delete selected item names here? This process
                                              cannot be undone')); ?>.</p>
                                      </div>
                                      <div class="modal-footer">
                                          <form id="bulk_delete_form" method="post"
                                              action="<?php echo e(route('coupon.bulk_delete')); ?>">
                                              <?php echo csrf_field(); ?>
                                              <?php echo method_field('POST'); ?>
                                              <button type="reset" class="btn btn-gray translate-y-3"
                                                  data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                              <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php echo e($key+1); ?>

                      </td>
                       
                        <td><?php echo e($cpn->code); ?></td>
                        
                        <td><?php if($cpn->distype == 'fix'): ?> <i class="fa <?php echo e($currency->icon); ?>"></i> <?php endif; ?> <?php echo e($cpn->amount); ?><?php if($cpn->distype == 'per'): ?>% <?php endif; ?> </td>
                        <td><?php echo e($cpn->maxusage); ?></td>
                        <td>
                          <p><?php echo e(__('Linkedto')); ?>: <b><?php echo e(ucfirst($cpn->link_by)); ?></b></p>
                          <p><?php echo e(__('ExpiryDate')); ?>: <b><?php echo e(date('d-M-Y',strtotime($cpn->expirydate))); ?></b></p>
                          <p><?php echo e(__('DiscountType')); ?>: <b><?php echo e($cpn->distype == 'per' ? "Percentage" : "Fixed Amount"); ?></b></p>
                           <p><?php echo e(__('Coupon Code display on front')); ?>: <b> 
                             <?php if($cpn->show_to_users == '1'): ?>
                                <?php echo e(__('Yes')); ?>

                              <?php else: ?>
                                <?php echo e(__('No')); ?>

                              <?php endif; ?>
    
                           </b></p>
                        </td>
                        <td>
                            <?php if(isset($cpn->stripe_coupon_id)): ?>
                            -
                        <?php else: ?>
                        <div class="btn-group mr-2">
                          <div class="dropdown">
                              <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.edit')): ?>
                                  <a class="dropdown-item" href="<?php echo e(route('coupon.edit',$cpn->id)); ?>" class="btn btn-xs btn-success-rgba"><i class="feather icon-edit-2"></i><?php echo e(__('Edit')); ?></a>
                                  <?php endif; ?>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.delete')): ?>
                                  <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($cpn->id); ?>" >
                                    <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                </a>
                                <?php endif; ?>
                 
                          </div>
                      </div>
                          <?php endif; ?>
                        </td>
                        
    
                        <div id="delete<?php echo e($cpn->id); ?>" class="delete-modal modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <div class="delete-icon"></div>
                                </div>
                                <div class="modal-body text-center">
                                  <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                  <p><?php echo e(__('Do you really want to delete this Coupon ? This process cannot be undone')); ?>.</p>
                                </div>
                                <div class="modal-footer">
                                     <form method="post" action="<?php echo e(route('coupon.destroy',$cpn->id)); ?>" class="pull-right">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("DELETE")); ?>

    
                                     <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                    <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
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
      $("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codingwa/magic.codingwala.com/resources/views/admin/coupan/index.blade.php ENDPATH**/ ?>