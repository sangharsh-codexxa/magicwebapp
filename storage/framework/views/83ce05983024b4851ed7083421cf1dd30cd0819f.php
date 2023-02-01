

<?php $__env->startSection('body'); ?>

<section class="content">
    <div class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e(__('Review')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                  <br>
                  <tr>
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Course')); ?></th>
                    <th><?php echo e(__('Learn')); ?></th>
                    <th><?php echo e(__('Price')); ?></th>
                    <th><?php echo e(__('Value')); ?></th>
                    <th><?php echo e(__('Review')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Approved')); ?></th>
                    <th><?php echo e(__('Edit')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($item->user_id); ?></td>
                    <td><?php echo e($item->course_id); ?></td>
                    <td><?php echo e($item->learn); ?></td>
                    <td><?php echo e($item->price); ?></td>
                    <td><?php echo e($item->value); ?></td>
                    <td><?php echo e($item->review); ?></td>
                    <td>
                      <form action="<?php echo e(route('review.quick',$item->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="Submit" class="btn btn-xs <?php echo e($item->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                          <?php if($item->status ==1): ?>
                          <?php echo e(__('Active')); ?>

                          <?php else: ?>
                          <?php echo e(__('Deactive')); ?>

                          <?php endif; ?>
                        </button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo e(route('approved.quick',$item->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="Submit" class="btn btn-xs <?php echo e($item->approved ==1 ? 'btn-success' : 'btn-danger'); ?>">
                          <?php if($item->approved ==1): ?>
                          <?php echo e(__('Active')); ?>

                          <?php else: ?>
                          <?php echo e(__('Deactive')); ?>

                          <?php endif; ?>
                        </button>
                      </form>
                    </td>
                  
                    <td><a class="btn btn-primary btn-sm" href="<?php echo e(action('ReviewController@show',$item->id)); ?>">
                      <i class="glyphicon glyphicon-pencil"></i></a>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\review\index.blade.php ENDPATH**/ ?>