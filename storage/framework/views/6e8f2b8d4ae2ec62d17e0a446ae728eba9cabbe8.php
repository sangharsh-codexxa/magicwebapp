
<?php $__env->startSection('title','Edit Course'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Course')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('category')); ?>" class="float-right btn btn-primary mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Categories')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('category/'.$cate->id)); ?>

            " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off"
            enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputTit1e"><?php echo e(__('Category')); ?>:<sup
                      class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
                </div>

                <div class="form-group">
                  <label for="slug"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
                  <input pattern="[/^\S*$/]+" placeholder="Enter slug" type="text" class="form-control" name="slug"
                    required value="<?php echo e($cate->slug); ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:<sup class="redstar"></sup></label>
                 <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="<?php echo e($cate->icon); ?>">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
                  
               
             
                </div>
                
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                      class="redstar text-danger">*</sup></label><br>
                  <input id="status" type="checkbox" class="custom_toggle" <?php echo e($cate->status == '1' ? 'checked' : ''); ?>  name="status" />
                
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('Featured')); ?>:<sup
                      class="redstar text-danger">*</sup></label><br>
                  <input id="featured" type="checkbox" class="custom_toggle" <?php echo e($cate->featured == '1' ? 'checked' : ''); ?> name="featured" />
                
                </div>
              </div>

                <div class="form-group">
                  <label><?php echo e(__('PreviewImage')); ?>:</label> - <p class="inline info">size: 255x200</p>
                  <br>
                     <label><?php echo e(__('Image')); ?>:<sup class="redstar"></sup></label>
                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommended size')); ?> (1375 x 409px)</small>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                   
                      <?php if(isset($cate['cat_image'])): ?>
                      <img src="<?php echo e(url('/images/category/'.$cate['cat_image'])); ?>" class="image_size" />
                      <?php endif; ?> 
                    </div>
                </div>
                 
               
                <div class="form-group">
                  <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                    <?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Update')); ?></button>

                </div>
                <div class="clear-both"></div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>

  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\category\update.blade.php ENDPATH**/ ?>