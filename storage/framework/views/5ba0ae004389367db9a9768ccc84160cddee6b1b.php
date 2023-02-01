
<?php $__env->startSection('title', 'Edit Advertisement - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Advertisement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Front Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Advertisement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
   <?php echo e(__('Edit Advertisement')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('advertisement')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>

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
          <h5 class="card-title"><?php echo e(__('Edit')); ?> <?php echo e(__('Advertisement')); ?></h5>
        </div>
        <div class="card-body">

          <form id="demo-form" method="post" action="<?php echo e(url('advertisement/'.$advs->id)); ?>

            "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

                    
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label><br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image1" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Back')); ?><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
                
               
                <img src="<?php echo e(url('/images/advertisement/'.$advs->image1)); ?>" class="image_size"/><br>

                <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('RecommnadedSize')); ?> (1375 x 409px)</small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('EnterURL')); ?>:</label>
                <input type="title" class="form-control" name="url1" id="exampleInputTitle" value="<?php echo e($advs->url1); ?>" placeholder="<?php echo e(__('EnterURL')); ?>" >

              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Position')); ?>:<sup class="redstar">*</sup></label>
                          <select class="select2-single form-control"  name="position">
                          </option>
                          <option <?php echo e($advs->position == 'belowslider' ? 'selected' : ''); ?> value="belowslider"><?php echo e(__('Below Slider')); ?></option>

                          <option <?php echo e($advs->position == 'belowrecent' ? 'selected' : ''); ?> value="belowrecent"><?php echo e(__('Below Recent Courses')); ?></option>
      
                          <option <?php echo e($advs->position == 'belowbundle' ? 'selected' : ''); ?> value="belowbundle"><?php echo e(__('Below Bundle Courses')); ?></option>
      
                          <option <?php echo e($advs->position == 'belowtestimonial' ? 'selected' : ''); ?> value="belowtestimonial"><?php echo e(__('Below Testimonial')); ?></option>
                        </select>
                      </div>
                      
             
              <div class="form-group col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                
                <input type="hidden"  name="free" value="0" for="status" id="status">
                <input id="status" type="checkbox" name="status" <?php echo e($advs->status == '1' ? 'checked' : ''); ?> class="custom_toggle" />
              </div>
                
            </div>
          
          <div class="form-group">
            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Update")); ?></button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
            

<?php $__env->stopSection(); ?>

      
      
      

              




<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\advertisement\edit.blade.php ENDPATH**/ ?>