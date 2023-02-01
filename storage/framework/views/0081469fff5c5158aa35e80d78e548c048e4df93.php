
<?php $__env->startSection('title', __('Wallet Transactions - Admin')); ?>
<?php $__env->startSection('maincontent'); ?>

  <?php $__env->startComponent('components.breadcumb',['secondactive' => 'active']); ?>

    <?php $__env->slot('heading'); ?>
      <?php echo e(__('Wallet Transactions')); ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->slot('menu1'); ?>
      <?php echo e(__('Wallet Transactions')); ?>

    <?php $__env->endSlot(); ?>

  <?php echo $__env->renderComponent(); ?>

<!-- Content bar start -->
  <div class="contentbar">


    <div class="row">

      <div class="col-lg-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-title"><?php echo e(__('Wallet Transactions')); ?></h5>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr>

                    <th><?php echo e(__("#")); ?></th>
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Type')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('PaymentMethod')); ?></th>
                    <th><?php echo e(__('Detail')); ?></th>
                  </tr>
                </thead>
                <tbody>
                 

                  <?php $__currentLoopData = $wallet_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <tr>
                    <td><?php echo e(++$key); ?></td>
                    <td>
                      <?php if(isset($wallet->user)): ?>
                        <?php echo e(strip_tags($wallet->user->fname)); ?>

                      <?php endif; ?>
                    </td>

                    <td><?php echo e(strip_tags($wallet->type)); ?></td>

                    <td>

                      <?php if($gsetting['currency_swipe'] == 1): ?>

                      <i class="<?php echo e($wallet->currency_icon); ?>"></i><?php echo e(strip_tags($wallet->total_amount)); ?>


                      <?php else: ?>
                      <?php echo e(strip_tags($wallet->total_amount)); ?>


                      <i class="<?php echo e($wallet->currency_icon); ?>"></i>

                      <?php endif; ?>

                    </td>

                    <td><?php echo e(strip_tags($wallet->payment_method)); ?></td>

                    <td><?php echo e(strip_tags($wallet->detail)); ?></td>

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
<!-- Content bar end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\workshop\transactions.blade.php ENDPATH**/ ?>