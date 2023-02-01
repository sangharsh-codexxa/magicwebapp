
<?php $__env->startSection('title','All ProgressView'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Progress View')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Progress View')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-box"><?php echo e(__('All Progress View')); ?></h5>
              </div>
              <div class="card-body">
              
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                 <label for="checkboxAll" class="material-checkbox"></label></th>
                 <th><?php echo e(__('User')); ?></th>
                 <th><?php echo e(__('Course')); ?></th>
                    <th><?php echo e(__('Progress')); ?></th>
                  </thead>
                   <tbody>
                    <?php $__currentLoopData = $progress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(!is_null($progres->user) && !is_null($progres->courses)): ?>
                   
                      <?php
                        if(Auth::user()->role == "instructor") 
                        {
                          $check = $progres->courses->user_id == Auth::user()->id;
                        }
                        else{
                          $check = $progres->courses;
                        }

                      ?>

                      <?php if($check): ?> 
                      <?php
                           $total_class = $progres->all_chapter_id;
                            $total_count = count($total_class);
                            $total_per = 100;
                            $read_class = $progres->mark_chapter_id;
                            $read_count =  count($read_class);
                            $progres_total = ($read_count/$total_count) * 100;
                                    
                        ?>

                        <tr>
                          <td>
                              <?php echo e(optional($progres->user)->fname); ?>

                            </td>
                            <td>
                              <?php echo e(optional($progres->courses)->title); ?>

                            </td>
                          <td>
                              <div class="progressbar-list">
                                  <div class="progress">
                                      <div class="progress-bar" role="progressbar" style="width: <?php echo $progres_total; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo e($progres_total); ?>%</div>
                                  </div>
                              </div>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php endif; ?>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\report\progressview.blade.php ENDPATH**/ ?>