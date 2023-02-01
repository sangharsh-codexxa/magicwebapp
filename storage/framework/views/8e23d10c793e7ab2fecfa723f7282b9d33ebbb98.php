
<?php $__env->startSection('title', 'Attendance - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  
    <!-- row started -->
    <div class="col-lg-12">
    
        <div class="card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('User')); ?> (<?php echo e($user->fname); ?> <?php echo e($user->lname); ?> )-> <?php echo e(__('Enrolled on')); ?> <?php echo e(date('d-m-Y', strtotime($enrolled['created_at']))); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <div class="table-responsive">
                        <!-- table to display Attendance start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th><?php echo e(__('Users')); ?></th>
                        <th><?php echo e(__('Attendance Date')); ?></th>
                        </thead>
​
                        <tbody>
                        <?php $i=0;?>
                          <?php $__currentLoopData = $attandance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $i++;?>
                          <tr>
                            <td><?php echo $i;?></td>
                          
                            <td>
                              <p><b><?php echo e(__('User')); ?>:</b> <?php echo e($user->fname); ?> <?php echo e($user->lname); ?></p>
                              
                            
                            </td>
                            <td>
                              <p><b><?php echo e(__('Attendance')); ?>: </b><?php echo e(date('d-m-Y', strtotime($attand->date))); ?> </p>
                            </td>
                            

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                          </tr>
                        </tbody>
                        </table>                  
                        <!-- table to display Attendance data end -->                
                    </div><!-- table-responsive div end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\attandance\attandance.blade.php ENDPATH**/ ?>