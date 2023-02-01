
<?php $__env->startSection('title', 'Payout - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Invoice')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Invoice')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Invoice')); ?>

<?php $__env->endSlot(); ?>


<?php echo $__env->renderComponent(); ?>
 
<div class="contentbar">
    <div class="row">
      <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-header">
              <h3 class="box-title"><?php echo e(__('Invoice')); ?></h3>
            </div>
            <div class="card-body">
        
            <div id="printableArea">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <?php if($gsetting->logo_type == 'L'): ?>
                        <div class="logo-invoice">
                          <img src="<?php echo e(asset('images/logo/'.$gsetting->logo)); ?>">
                        </div>
                      <?php else: ?>
                          <a href="<?php echo e(url('/')); ?>"><b><div class="logotext" ><?php echo e($gsetting->project_title); ?></div></b></a>
                      <?php endif; ?>
                      <small><?php echo e(__('Date')); ?>:&nbsp;<?php echo e(date('jS F Y', strtotime($payout['created_at']))); ?></small>
                    </h2>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="view-order">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      <?php echo e(__('From')); ?>:
                      <address>
                        <strong><?php echo e($payout->payer['fname']); ?></strong><br>
                        Address: <?php echo e($payout->payer['address']); ?><br>
                        <?php if($payout->payer['state_id'] == !NULL): ?>
                        <?php echo e($payout->payer->state['name']); ?>,
                        <?php endif; ?>
                        <?php if($payout->payer['country_id'] == !NULL): ?>
                          <?php echo e($payout->payer->country['name']); ?>

                        <?php endif; ?>
                        <br>
                        <?php echo e(__('Phone')); ?>:&nbsp;<?php echo e($payout->payer['mobile']); ?><br>
                        <?php echo e(__('Email')); ?>:&nbsp;<?php echo e($payout->payer['email']); ?>

                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <?php echo e(__('To')); ?>:
                      <address>
                        <strong><?php echo e($payout->user['fname']); ?></strong><br>
                          <?php echo e(__('Address')); ?>: <?php echo e($payout->user['address']); ?><br>
                        <?php if($payout->user['state_id'] == !NULL): ?>
                          <?php echo e($payout->user->state['name']); ?>,
                        <?php endif; ?>
                        <?php if($payout->user['country_id'] == !NULL): ?>
                          <?php echo e($payout->user->country['name']); ?><br>
                        <?php endif; ?>
                          <?php echo e(__('Phone')); ?>:&nbsp;<?php echo e($payout->user['mobile']); ?><br>
                          <?php echo e(__('Email')); ?>:&nbsp;<?php echo e($payout->user['email']); ?>

                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <br>
                      <b><?php echo e(__('OrderId')); ?>:</b>&nbsp;

                      <?php $__currentLoopData = $payout->order_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id= App\Order::find($order);
                        ?>
                        <?php echo e($id['order_id']); ?>,
                        
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <br>

                      <b><?php echo e(__('PaymentMethod')); ?>:</b>&nbsp;<?php echo e($payout['payment_method']); ?><br>
                      <b><?php echo e(__('Currency')); ?>:</b>&nbsp;<?php echo e($payout['currency']); ?>

                    </div>
                    <!-- /.col -->
                </div>
              </div>
              <!-- /.row -->
                    
              <div class="order-table">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(__('Instructor')); ?></th>
                      <th><?php echo e(__('Currency')); ?></th>
                     
                      <th><?php echo e(__('Total')); ?></th>
                      <th><?php echo e(__('PaymentMethod')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo e($payout->user['fname']); ?></td>
                      <td><?php echo e($payout['currency']); ?></td>
                      <td><i class="fa <?php echo e($payout['currency_icon']); ?>"></i><?php echo e($payout['pay_total']); ?></td>
                      <td><?php echo e($payout->payment_method); ?></td>

                    

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>


            <div class="form-group">
            
              <input type="button" class="btn btn-danger"  onclick="printDiv('printableArea')" value="Print Invoice" />

              <div class="print-btn" style="display: inline-block;">
                <a href="<?php echo e(route('payout.download',$payout->id)); ?>" target="_blank" class="btn btn-primary"><?php echo e(__('frontstaticword.Download')); ?></a>
              </div>
            </div>

            </div>
        </div>
      </div>
    </div>
</div>

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



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\revenue\view.blade.php ENDPATH**/ ?>