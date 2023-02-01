
<?php $__env->startSection('title', 'Subscribed Instructors - Admin'); ?>
<?php $__env->startSection('body'); ?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-bsubscrib">
                        <h3 class="box-title"> <?php echo e(__('SubscribedInstructors')); ?></h3>
                       
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bsubscribed table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('User')); ?></th>
                                        <th><?php echo e(__('Plan')); ?></th>
                                        <th><?php echo e(__('TransactionId')); ?></th>
                                        <th><?php echo e(__('PaymentMethod')); ?></th>
                                        <th><?php echo e(__('TotalAmount')); ?></th>
                                        <th><?php echo e(__('View')); ?></th>
                                        <th><?php echo e(__('Delete')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $subscribed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscrib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               
                                                <?php if(isset($subscrib->user)): ?>
                                                <?php echo e($subscrib->user['fname']); ?> <?php echo e($subscrib->user['lname']); ?>

                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>

                                                <?php if($subscrib->plan_id != null): ?>
                                                    <?php echo e($subscrib->plans['title']); ?>

                                                <?php else: ?>
                                                    <?php echo e($subscrib->plans['title']); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($subscrib->transaction_id); ?></td>
                                            <td><?php echo e($subscrib->payment_method); ?></td>

                                            <td><?php echo e($subscrib->total_amount); ?></td>


                                            

                                            
                                            <td><a class="btn btn-primary btn-sm"
                                                    href="<?php echo e(url('orders/subscription', $subscrib->id)); ?>"><?php echo e(__('View')); ?></a>
                                            </td>
                                            
                                            <td>
                                                <form method="post" action="<?php echo e(url('orders/subscription/' . $subscrib->id)); ?>"
                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm">
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\subscribed\index.blade.php ENDPATH**/ ?>