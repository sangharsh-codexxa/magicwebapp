
<!-- /.box-header -->
<div class="box-body">

  <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
     
      <tr>
        <th>#</th>                  
        <th><?php echo e(__('User')); ?></th>
        <th><?php echo e(__('Course')); ?></th>
        <th><?php echo e(__('OrderId')); ?></th>
        <th><?php echo e(__('PaymentMethod')); ?></th>
        <th><?php echo e(__('Status')); ?></th>
        <th><?php echo e(__('View')); ?></th>
        <th><?php echo e(__('Delete')); ?></th>
      </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php if($refund->status == 1): ?>
      <tr>
        <td><?php echo e($key+1); ?></td>
        <td><?php echo e($refund->user['fname']); ?></td>
        <td><?php echo e($refund->courses->title); ?></td>
        <td><?php echo e($refund->order->order_id); ?></td>
        <td><?php echo e($refund->payment_method); ?></td>
        <td>
           
            <?php if($refund->status ==1): ?>
            <?php echo e(__('Refunded')); ?>

            <?php else: ?>
            <?php echo e(__('Pending')); ?>

            <?php endif; ?>
             
        </td>
        
        <td><a class="btn btn-success btn-sm" href="<?php echo e(url('refundorder/'.$refund->id.'/edit')); ?>">
          <?php echo e(__('view')); ?></a>
        </td>

        <td><form  method="post" action="<?php echo e(url('refundorder/'.$refund->id)); ?>

              "data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('DELETE')); ?>

            <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
          </form>
        </td>

        <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tr>
      </tfoot>
    </table>
  </div>
</div>
<!-- /.box-body --><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\refund_order\refunded.blade.php ENDPATH**/ ?>