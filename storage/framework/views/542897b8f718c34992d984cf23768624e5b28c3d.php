
<?php $__env->startSection('title','Report'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Report')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__(' Quiz Report')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-title"><?php echo e(__('All Quiz Report')); ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('User Name')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                              </tr>
                          </thead>
                          <tbody>
                            
                              <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                                <tr>
                                  <td>
                                    <?php echo e($key+1); ?>

                                  </td>
                                 
                                
                                  <td><?php echo e($u->fname); ?> <?php echo e($u->lname); ?></td>               
                                <td>
                                  <div class="btn-group mr-2">
                                            <a  href="<?php echo e(url('show/quiz/report/'.$u->id)); ?>" class="btn btn-xs btn-primary-rgba"><i class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?></a>
                                </div>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\report\quiz.blade.php ENDPATH**/ ?>