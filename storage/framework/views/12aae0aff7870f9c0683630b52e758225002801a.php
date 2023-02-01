
<?php $__env->startSection('title','Edit Child category'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Childcategory')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('childcategory')); ?>" class="float-right btn btn-primary mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Child categories')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form" method="post" action="<?php echo e(url('childcategory/'.$cate->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputSlug"><?php echo e(__('SelectCategory')); ?></label>
                <select name="category_id" id="category_id" class="form-control select2">
                  <?php
                    $category = App\Categories::all();
                  ?>  
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($cate->category_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputSlug"><?php echo e(__('SelectSubCategory')); ?><span class="redstar">*</span></label>
                <select name="subcategory_id" id="upload_id" class="form-control select2">
                  <?php
                    $subcategory = App\SubCategory::all();
                  ?>  
                  <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($cate->subcategory_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="title"><?php echo e(__('Title')); ?>:<span class="redstar">*</span></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="slug"><?php echo e(__('Slug')); ?>:<span class="redstar">*</span></label>
                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" value="<?php echo e($cate->slug); ?>">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <label for="icon"><?php echo e(__('Icon')); ?>:</label>
                <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="<?php echo e($cate->icon); ?>">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                  class="redstar text-danger">*</sup></label><br>
              <input id="status" type="checkbox" class="custom_toggle" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> />
              <input type="hidden" name="free" value="0" for="status" id="status">
                
              </div>
            </div>
            <br>

            
        <div class="form-group">
          <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
            Reset</button>
          <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
            Update</button>
        </div>
   
  <div class="clear-both"></div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";
  
  $(function() {
    var urlLike = '<?php echo e(url('admin/dropdown')); ?>';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

})(jQuery);
</script> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\category\childcategory\edit.blade.php ENDPATH**/ ?>