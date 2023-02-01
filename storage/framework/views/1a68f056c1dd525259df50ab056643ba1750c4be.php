
<?php $__env->startSection('title','Create a new subcategory'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Subcategory')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Subcategory')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('subcategory')); ?>" class="float-right btn btn-dark-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a></div>                        
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
          <h5 class="card-tittle"><?php echo e(__('Add')); ?> <?php echo e(__('Subcategory')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="<?php echo e(url('subcategory/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
              <div class="form-group">
                <form id="demo-form2" method="post" action="<?php echo e(url('subcategory/')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                  <?php echo e(csrf_field()); ?>

    
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('Category')); ?></label>
                      <select name="category_id" class="form-control select2">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('Category')); ?></label>
                      <br>
                      <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal9" title="AddCategory"  class="btn btn-md btn-primary col-md-5"><?php echo e(__('Add')); ?></button>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?>:<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Your subcategory" value="">
                    </div>
    
                     <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
                      <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" placeholder="Enter slug" value="">
                    </div>
                    
                  </div>
                  <br>
    
                  <div class="row">
    
                    <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:</label>
                      <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter Your icon" value="">
                      
                      <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="Choose icon">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
                    </div>
    
                    <div class="col-md-6">
                      <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                    <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked/>
                    <input type="hidden" name="free" value="0" for="status" id="status">
                     
                    </div>
                  </div>
                  <br>
             
                  <div class="form-group">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                        Create</button>
                </div>
            
            <div class="clear-both"></div>
           
               
            </div>
          </form>
          

        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('admin.category.subcategory.cat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\category\subcategory\insert.blade.php ENDPATH**/ ?>