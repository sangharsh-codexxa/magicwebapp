
<?php $__env->startSection('title', 'All Order - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo e(__('User')); ?> <?php echo e(__('Order')); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <br>
                <br>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('User')); ?></th>
                  <th><?php echo e(__('Course')); ?></th>
                  <th><?php echo e(__('TransactionId')); ?></th>
                  <th><?php echo e(__('PaymentMethod')); ?></th>
                  <th><?php echo e(__('Currency')); ?></th>
                  <th><?php echo e(__('TotalAmount')); ?></th>
                  <th><?php echo e(__('View')); ?></th>
                  <th><?php echo e(__('Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>
                    <?php if(isset($order->user)): ?> <?php echo e($order->user->fname); ?> <?php echo e($order->user->lname); ?> <?php endif; ?>
                  </td>                 
                  <td><?php if(isset($order->courses)): ?> <?php echo e($order->courses['title']); ?> <?php endif; ?></td>
                  <td><?php echo e($order->transaction_id); ?></td>
                  <td><?php echo e($order->payment_method); ?></td>
                  <td><?php echo e($order->currency); ?></td>

                  <?php if($order->coupon_discount == !NULL): ?>
                    <td><i class="<?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount - $order->coupon_discount); ?></td>
                  <?php else: ?>
                    <td><i class="fa <?php echo e($order->currency_icon); ?>"></i><?php echo e($order->total_amount); ?></td>
                  <?php endif; ?>

                  <td><a class="btn btn-primary btn-sm" href="<?php echo e(route('view.order',$order->id)); ?>"><?php echo e(__('View')); ?></a>
                  </td>
                  
                  <td>
                    <form  method="post" action="<?php echo e(url('order/'.$order->id)); ?>"
                        data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                      <button type="submit" class="btn btn-danger">
                            <i class="fa fa-fw fa-trash-o"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\enroll\index.blade.php ENDPATH**/ ?>