
<?php $__env->startSection('title', 'Payment - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('PaytoInstructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Instructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('PaytoInstructor')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('PaytoInstructor')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  <div class="row">
    <div class="col-xs-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h3 class="box-title">  <?php echo e(__('PaytoInstructor')); ?></h3>
        </div>
        <div class="card-body">

          <div class="view-order">
            <div class="row">
              <div class="col-md-12">
                <b><?php echo e(__('Instructor')); ?> </b>:  <?php echo e($user->fname); ?>

                <br>
                <b><?php echo e(__('TotalInstructorRevenue')); ?></b>:  <?php echo e($total); ?>

                <br>
                
              </div>
            </div>
            <br>
          </div>
          
        <?php if($user->prefer_pay_method == "paypal"): ?>
          <form method="post" action="<?php echo e(route('admin.paypal', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="d-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b><?php echo e(__('PayPalEmail')); ?></b>:  <?php echo e($user->paypal_email); ?>

              <br>
              <br>
               
            <button type="submit" class="btn btn-primary"><?php echo e(__('PayWithPaypal')); ?></button>
          </form>
        <?php endif; ?>


        <?php if($user->prefer_pay_method == "banktransfer"): ?>
          <form method="post" action="<?php echo e(route('admin.banktransfer', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="d-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b><?php echo e(__('BankTransfer')); ?></b>: 

              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b><?php echo e(__('AccountHolderName')); ?>:</b>&nbsp;<?php echo e($user['bank_acc_name']); ?></li>
                <li class="list-group-item"><b><?php echo e(__('BankName')); ?>:</b>&nbsp;<?php echo e($user['bank_name']); ?></li>
                <li class="list-group-item"><b><?php echo e(__('IFCSCode')); ?></b>:&nbsp;<?php echo e($user['ifsc_code']); ?></li>
                <li class="list-group-item"><b><?php echo e(__('AccountNumber')); ?>:</b>&nbsp;<?php echo e($user['bank_acc_no']); ?></li>
              </ul>
                 
              <br>
               
            <button type="submit" class="btn btn-primary"><?php echo e(__('PaytoInstructor')); ?></button>
          </form>
        <?php endif; ?>


        <?php if($user->prefer_pay_method == "paytm"): ?>
          <form method="post" action="<?php echo e(route('admin.paytm', $user->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>


              <input type="hidden" value="<?php echo e($total); ?>" name="total" class="form-control">
              
              <div class="d-none">
              <?php $__currentLoopData = $allchecked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label >
                  <input type="hidden" name="checked[]" value="<?php echo e($checked); ?>">
                  <?php echo e($checked); ?>

               </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
             
              <b><?php echo e(__('PaytmMobileNo')); ?></b>:  <?php echo e($user->paytm_mobile); ?>

              <p><?php echo e(__('DoManualpaymentpaytm')); ?></p>
              <br>
              <br>
               
            <button type="submit" class="btn btn-primary"><?php echo e(__('PayWithPaytm')); ?></button>
          </form>
        <?php endif; ?>
          
         
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\revenue\payment.blade.php ENDPATH**/ ?>