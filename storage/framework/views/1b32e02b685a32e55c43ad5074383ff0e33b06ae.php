
<?php $__env->startSection('title','Create a new announcement'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Announcement')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Announcement')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Add')); ?> <?php echo e(__('Announcement')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('instructor/announcement/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo e(csrf_field()); ?>

            

            <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />

            <div class="row"> 
              <div class="col-md-12">
                <label for="exampleInputSlug"><?php echo e(__('Course')); ?><span class="redstar">*</span></label>
                <select name="course_id" class="form-control select2" required="">
                  <option value="none" selected disabled hidden> 
                     <?php echo e(__('SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option required value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="row"> 
              <div class="col-md-12">
                <select name="user_id" class="form-control d-none">
                  <option  value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                </select>
              </div>
            </div>
            <br>
            
            <div class="row">  
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Announcement')); ?>:<sup class="redstar">*</sup></label>
                <textarea name="announsment" rows="3" class="form-control" placeholder="Enter Question"></textarea>
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>               
                <input id="c2222" type="checkbox" class="custom_toggle" name="status" checked />
      
                 
                  <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c2222"></label>
               
                <input type="hidden" name="status" value="0" id="t2222">
              </div>
            </div>
            <br>
          
            <div class="form-group">
              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Create')); ?></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/instructor/announcement/create.blade.php ENDPATH**/ ?>