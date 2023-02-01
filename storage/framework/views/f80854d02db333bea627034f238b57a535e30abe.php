
<?php $__env->startSection('title','Create a new childcategory'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Childcategory')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Childcategory')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('childcategory')); ?>" class="float-right btn btn-dark-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>                        
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Add')); ?> <?php echo e(__('Child category')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('childcategory/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
            <?php echo e(csrf_field()); ?>

              
            <div class="row">
              <div class="col-md-5">
                <label for="exampleInputTit1e"><?php echo e(__('Category')); ?></label>
                <select name="category_id" id="category_id" class="form-control select2">
                  <option value="0"><?php echo e(__('Please Select Categories')); ?></option>
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="col-md-5">
                <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?></label>
                <select name="subcategories" id="upload_id" class="form-control select2">
                </select>
              </div>

              <div class="col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?></label>
                <br>
                <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary"><?php echo e(__('Add')); ?></button>
              </div>
            </div>
            <br>       
                   
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter your childcategory" value="">
              </div>


              <div class="col-md-12">
                <label for="exampleInputTit1e"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" placeholder="Enter slug" value="">
              </div>
         
            
             
            </div>
            <br>

            <div class="row">

               <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:</label>
                
                <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="Choose icon">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
              </div>


              <div class="col-md-6">
                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                <br>
                <input  class="custom_toggle"  type="checkbox" name="status"  checked />

                   
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                
                <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>
            </div>
            <br>

            <div class="box-footer">
              <button type="submit" class="btn btn-lg col-md-3 btn-primary-rgba"><?php echo e(__('Save')); ?></button>
            </div>
       
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('admin.category.childcategory.child', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\category\childcategory\insert.blade.php ENDPATH**/ ?>