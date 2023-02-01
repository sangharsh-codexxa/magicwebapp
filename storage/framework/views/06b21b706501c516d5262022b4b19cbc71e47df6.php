
<?php $__env->startSection('title', 'View Subscription - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View <?php echo e(__('Subscription')); ?></h3>
            </div>
            <div class="panel-body">
        
            <div id="printableArea">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <?php if($setting->logo_type == 'L'): ?>
                        <div class="logo-invoice">
                          <img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>">
                        </div>
                      <?php else: ?>
                          <a href="<?php echo e(url('/')); ?>"><b><div class="logotext" ><?php echo e($setting->project_title); ?></div></b></a>
                      <?php endif; ?>
                      <small><?php echo e(__('Date')); ?>:&nbsp;<?php echo e(date('jS F Y', strtotime($plans['created_at']))); ?></small>
                    </h2>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="view-order">
                <div class="row invoice-info">
                   
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <?php echo e(__('User')); ?>:
                      <address>
                        <strong>
                          <?php if(Auth::user()->role == "admin"): ?>
                          <?php echo e($plans->user['fname']); ?> <?php echo e($plans->user['lname']); ?>

                          <?php else: ?>
                            <?php if($gsetting->hide_identity == 0): ?>
                            <?php echo e($plans->user['fname']); ?> <?php echo e($plans->user['lname']); ?>

                            <?php else: ?>
                              Hidden
                            <?php endif; ?>
                          <?php endif; ?>
                        </strong><br>
                          <?php echo e(__('Address')); ?>: <?php echo e($plans->user['address']); ?><br>
                        <?php if($plans->user['state_id'] == !NULL): ?>
                          <?php echo e($plans->user->state['name']); ?>,
                        <?php endif; ?>
                        <?php if($plans->user['country_id'] == !NULL): ?>
                          <?php echo e($plans->user->country['name']); ?><br>
                        <?php endif; ?>
                          <?php echo e(__('Phone')); ?>:&nbsp;
                          
                          <?php if(Auth::user()->role == "admin"): ?>
                          <?php echo e($plans->user['mobile']); ?>

                          <?php else: ?>
                            <?php if($gsetting->hide_identity == 0): ?>
                            <?php echo e($plans->user['mobile']); ?>

                            <?php else: ?>
                              Hidden
                            <?php endif; ?>
                          <?php endif; ?>
                          <br>
                          <?php echo e(__('Email')); ?>:&nbsp;
                          <?php if(Auth::user()->role == "admin"): ?>
                          <?php echo e($plans->user['email']); ?>

                          <?php else: ?>
                            <?php if($gsetting->hide_identity == 0): ?>
                            <?php echo e($plans->user['email']); ?>

                            <?php else: ?>
                              Hidden
                            <?php endif; ?>
                          <?php endif; ?>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <br>
                      <b><?php echo e(__('OrderID')); ?>:</b> <?php echo e($plans['order_id']); ?><br>
                      <b><?php echo e(__('TransactionId')); ?>:</b>&nbsp;<?php echo e($plans['transaction_id']); ?><br>
                      <b><?php echo e(__('PaymentMethod')); ?>:</b>&nbsp;<?php echo e($plans['payment_method']); ?><br>
                      <b><?php echo e(__('Currency')); ?>:</b>&nbsp;<?php echo e($plans['currency']); ?>

                      
                      </br>
                      <b><?php echo e(__('Enrollon')); ?>:</b> <?php echo e(date('jS F Y', strtotime($plans['created_at']))); ?></br>
                      <b>
                        <?php if($plans->enroll_expire != NULL): ?>
                          <?php echo e(__('EnrollEnd')); ?>:</b> <?php echo e(date('jS F Y', strtotime($plans['enroll_expire']))); ?></br>
                        <?php endif; ?>
                        <br>

                       
                        
                    </div>
                    <!-- /.col -->
                </div>
              </div>
              <!-- /.row -->
                    
              <div class="order-table">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(__('Plan')); ?></th>
                      <th><?php echo e(__('Currency')); ?></th>
                      
                      <th><?php echo e(__('Total')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        
                          <?php echo e($plans->plans['title']); ?>

                        
                      </td>
                      
                      <td><?php echo e($plans['currency']); ?></td>

                      

                      <td>
                        
                            <i class="fa <?php echo e($plans['currency_icon']); ?>"></i><?php echo e($plans['total_amount']); ?>


                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              

            </div>
            
            <input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print Invoice" />

            </div>
        </div>
      </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
</script>

<script lang='javascript'>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
  }
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\subscribed\view.blade.php ENDPATH**/ ?>