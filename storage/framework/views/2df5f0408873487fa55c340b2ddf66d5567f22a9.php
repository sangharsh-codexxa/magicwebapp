
<?php $__env->startSection('title', 'Vacation - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['secondactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Vacation')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Vacation')); ?>

<?php $__env->endSlot(); ?>


<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
      <a href="<?php echo e(route('vacation.reset')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Reset")); ?></a>
                                
     
  </div>                        
</div>

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
                          
                        
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Update Vacation Dates')); ?></h5>
        </div>
        <div class="card-body">
          
      <form action="<?php echo e(action('VacationController@update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

          <div class="row">
            <div class="form-group col-md-6">
              
            <label for="icon"><?php echo e(__('Start Time')); ?><sup class="redstar">*</sup></label>
            <div class="input-group">
              <input name="vacation_start" type="text" id="default-date" class="form-control" value="<?php echo e(isset(Auth::user()['vacation_start']) ? date('Y-m-d',strtotime(Auth::user()['vacation_start'])) : ""); ?>" aria-describedby="basic-addon5" />
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
              </div>
            </div>
             
              
            </div>
            <div class="form-group col-md-6">
                <label for="currency"><?php echo e(__('End Time')); ?><sup class="redstar">*</sup></label>
               <div class="input-group">
                <input name="vacation_end" type="text" id="default-date1" class="form-control" value="<?php echo e(isset(Auth::user()['vacation_end']) ? date('Y-m-d',strtotime(Auth::user()['vacation_end'])) : ""); ?>" aria-describedby="basic-addon5" />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
                </div>
              </div>
            </div>

            
          </div>
          <div class="form-group">
            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Update")); ?></button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/instructor/vacation.blade.php ENDPATH**/ ?>