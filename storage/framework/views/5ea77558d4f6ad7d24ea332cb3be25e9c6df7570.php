
<?php $__env->startSection('title', 'All Pending Payout - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('All Pending Payout')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Instructor Payout')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('All Pending Payout')); ?>

<?php $__env->endSlot(); ?>


<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(' instructor-pending-payout.manage')): ?>
    <button type="button" class="float-right btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> <?php echo e(__('PaySelected')); ?></button>
<?php endif; ?>
  
  </div>

  <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="delete-icon"></div>
        </div>
        <div class="modal-body text-center">
          <h4 class="modal-heading"><?php echo e(__('AreYouSure')); ?></h4>
          <p><?php echo e(__('Do you really want to pay to selected payouts ? This process
                                                    cannot be undone')); ?>.</p>
        </div>
        <div class="modal-footer text-center">

          <form  method="post" action="<?php echo e(action('AdminPayoutController@bulk_payout', $id)); ?>" id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
          <?php echo e(csrf_field()); ?>


            <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
           
            <input type="submit" value="Yes"  class="btn btn-sm btn-danger"/>
          </form>
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
                    <h5 class="box-title"><?php echo e(__('Pending Payout')); ?></h5>
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
                              <th><?php echo e(__('User')); ?></th>
                              <th><?php echo e(__('Course')); ?></th>
                              <th><?php echo e(__('OrderId')); ?></th>
                              <th><?php echo e(__('PayoutDeatil')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                              <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <?php $i++;?>
                                <td>
                                    <div class="inline">
                                      <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($pay->id); ?>" id="checkbox<?php echo e($pay->id); ?>">
                                      <label for="checkbox<?php echo e($pay->id); ?>" class="material-checkbox"></label>
                                    </div>
                                    <?php echo $i;?>
                                  </td>
                               
                                  <td><?php if(isset($pay->user)): ?><?php echo e($pay->user->fname); ?><?php endif; ?></td>
                                  <td><?php if(isset($pay->courses)): ?><?php echo e($pay->courses->title); ?><?php endif; ?></td>
                                  <td><?php if(isset($pay->order)): ?><?php echo e($pay->order->order_id); ?><?php endif; ?></td> 
                                  <td>
                                    <b><?php echo e(__('TotalAmount')); ?></b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i><?php echo e($pay->total_amount); ?>

                                    <br>
                      
                                    <b><?php echo e(__('InstructorRevenue')); ?></b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i> <?php echo e($pay->instructor_revenue); ?>

                                  </td>
                                
                      
                                
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
  $(function(){
    $('#checkboxAll').on('change', function(){
      if($(this).prop("checked") == true){
        $('.material-checkbox-input').attr('checked', true);
      }
      else if($(this).prop("checked") == false){
        $('.material-checkbox-input').attr('checked', false);
      }
    });
  });
</script>

<script>
  $(function() {
    $('#cb3').change(function() {
      $('#status').val(+ $(this).prop('checked'))
    })
  })
</script>


<?php $__env->stopSection(); ?>                                  
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\revenue\pending.blade.php ENDPATH**/ ?>