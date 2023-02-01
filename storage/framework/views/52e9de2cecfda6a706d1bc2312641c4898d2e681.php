
<?php $__env->startSection('title', 'Add Instructor Plan - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Add Instructor Plan')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Instructor Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Instructor Plan')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Add Instructor Plan')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('subscription/plan')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
  </div>
</div>
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
          <h5 class="card-title"><?php echo e(__('Add Instructor Plan')); ?></h5>
        </div>
        <div class="card-body">
          <div class="form-group">
            <form action="<?php echo e(action('InstructorPlanController@store')); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" class="form-control" name="user_id" id="exampleInputTitle" value="<?php echo e(Auth::User()->id); ?>" required>
                <div class ="row">
                <div class="form-group col-md-4">
                  <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>: <sup class="redstar">*</sup></label>
                  <input type="title" class="form-control" name="title" id="exampleInputTitle" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Title')); ?>" value="" required>

                </div>
                <div class="col-md-4">
                  <label for="exampleInputSlug"><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                    </div>
                    <div class="custom-file">
                      <input type="file"name="preview_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="exampleInputSlug"><?php echo e(__('No of Courses allowed in this plan')); ?>:</label>
                  <input min="1" class="form-control" name="courses_allowed" type="number" id="courses_allowed"  placeholder="" value="<?php echo e((old('courses_allowed'))); ?>">
                </div>
              </div>
                </div>
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('Detail')); ?>: <sup class="redstar">*</sup></label>
                  <textarea id="detail" name="detail" rows="5"  class="form-control" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Detail')); ?>"></textarea>
                </div>
                <br>
                <div class="row"> 
                <div class="col-md-4">
                  <label for="exampleInputDetails"><?php echo e(__('Paid')); ?>:</label>                 
                  <input type="checkbox" class="custom_toggle" id="cb111" name="type" />
                  <label class="tgl-btn" data-tg-off="<?php echo e(__('Free')); ?>" data-tg-on="<?php echo e(__('Paid')); ?>" for="cb111"></label>
                  <br>
                  <div style="display: none;" id="pricebox">
                    <label for="exampleInputSlug"><?php echo e(__('Price')); ?>: <sup class="redstar">*</sup></label>
                    <input type="number" step="0.01" class="form-control" name="price" id="priceMain" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Price')); ?>" value="<?php echo e((old('price'))); ?>">
        
                    <label for="exampleInputSlug"><?php echo e(__('DiscountPrice')); ?>: </label>
                    <input type="number" step="0.01" class="form-control" name="discount_price" id="offerPrice" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('DiscountPrice')); ?>" value="<?php echo e((old('discount_price'))); ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <?php if(Auth::User()->role == "admin"): ?>
                   <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label>
                  <input  id="status" type="checkbox" name="status" class="custom_toggle" checked />
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                  <?php endif; ?>
                </div>
                <div class="col-md-4">
                  <label for=""><?php echo e(__('Plan Expire Duration')); ?>: </label>
                    <input id="duration_type" type="checkbox" class="custom_toggle" name="duration_type" checked />
                 <label class="tgl-btn" data-tg-off="<?php echo e(__('Days')); ?>" data-tg-on="<?php echo e(__('Month')); ?>" for="duration_type"></label>
                  <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled duration can be in months')); ?>,</small>
                    <small class="text-muted"> <?php echo e(__('when Disabled duration can be in days')); ?>.</small>
                  <br>   
                  <label for="exampleInputSlug"><?php echo e(__('CourseExpireDuration')); ?></label>
                  <input min="1" class="form-control" name="duration" type="number" id="duration"  placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('CourseExpireDuration')); ?>" value="<?php echo e((old('duration'))); ?>">
                </div>
              </div>
              <br>
             
              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-4 btn-primary-rgba"><?php echo e(__('Submit')); ?></button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
(function($) {
"use strict";
$(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').change(function() {
      $('#j').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })
  $('#cb111').on('change',function(){

    if($('#cb111').is(':checked')){
      $('#pricebox').show('fast');

      $('#priceMain').prop('required','required');

    }else{
      $('#pricebox').hide('fast');

      $('#priceMain').removeAttr('required');
    }

  });

  $('#preview').on('change',function(){

    if($('#preview').is(':checked')){
      $('#document1').show('fast');
      $('#document2').hide('fast');
    }else{
      $('#document2').show('fast');
      $('#document1').hide('fast');
    }

  });

  $("#cb3").on('change', function() {
    if ($(this).is(':checked')) {
      $(this).attr('value', '1');
    }
    else {
      $(this).attr('value', '0');
    }});

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doabox').show();
        }
        else
        {
            $('#doabox').hide();
        }
      });

  });

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doaboxx').show();
        }
        else
        {
            $('#doaboxx').hide();
        }
      });

  });

  $(function(){

      $('#msd').change(function(){
        if($('#msd').val()=='yes')
        {
            $('#doa').show();
        }
        else
        {
            $('#doa').hide();
        }
      });

  });
})(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\plan\create.blade.php ENDPATH**/ ?>