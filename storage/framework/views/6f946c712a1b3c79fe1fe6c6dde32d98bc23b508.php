
<?php $__env->startSection('title','All Rejected'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Rejected')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Rejected')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('Course Review')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th><?php echo e(__('Image')); ?></th>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Instructor')); ?></th>
                            <th><?php echo e(__('Slug')); ?></th>
                            <th><?php echo e(__('View')); ?></th>
                          </tr>
                        </thead>
        
                        <tbody>
                          <?php $i=0;?>
        
                            <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->status == 0): ?>
                              <?php $i++;?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td>
                                  <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== ''): ?>
                                    <img src="<?php echo e(asset('images/course/'.$cat['preview_image'])); ?>" class="img-responsive img-circle" >
                                  <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive img-circle" >
                                  <?php endif; ?>
                                </td>
                                <td><?php echo e($cat->title); ?></td>
                                <td><?php echo e($cat->user->fname); ?></td>
                                <td><?php echo e($cat->slug); ?></td>
                               
        
                                <td>
                                  <div class="dropdown">
                                    <button class="btn btn-round btn-outline-primary" type="button"
                                        id="CustomdropdownMenuButton1" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i
                                            class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                        <a class="dropdown-item" href="<?php echo e(url('rejected/view/'.$cat->id)); ?>"><i
                                                class="feather icon-eye mr-2"></i><?php echo e(__('View')); ?></a>
                                      
                                    </div>
                                </div>
                                  
                                </td>
        
                               
                              </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/instructor/rejected/index.blade.php ENDPATH**/ ?>