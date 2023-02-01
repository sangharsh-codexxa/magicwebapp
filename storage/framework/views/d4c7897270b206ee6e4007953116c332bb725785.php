
<?php $__env->startSection('title', 'All paid Payout - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('All paid Payout')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Instructor Payout')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('All paid Payout')); ?>

<?php $__env->endSlot(); ?>


<?php echo $__env->renderComponent(); ?>


  <div class="contentbar">                
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('All paid Payout')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th>
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
                                    
                                    <?php echo $i;?>
                                  </td>
                               
                                  <td><?php if(isset($pay->user)): ?><?php echo e($pay->user->fname); ?><?php endif; ?></td>
                                  <td><?php if(isset($pay->courses)): ?><?php echo e($pay->courses->title); ?><?php endif; ?></td>
                                  <td>><?php if(isset($pay->order)): ?><?php echo e($pay->order->order_id); ?><?php endif; ?></td> 
                                  <td>
                                    <b><?php echo e(__('TotalAmount')); ?></b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i><?php echo e($pay->total_amount); ?>

                                    <br>
                      
                                    <b><?php echo e(__('InstructorRevenue')); ?></b>: <i class="fa <?php echo e($pay->currency_icon); ?>"></i> <?php echo e($pay->instructor_revenue); ?>

                                  </td>
                                
                      
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                              </tfoot>
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
                               
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\revenue\paid.blade.php ENDPATH**/ ?>