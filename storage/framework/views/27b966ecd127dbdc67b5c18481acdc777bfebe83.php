
<?php $__env->startSection('title', 'Edit TruestedSlider- Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
 

<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Instructor Plan Edit')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Instructor Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Instructor Plan Edit')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a  href="<?php echo e(url('subscription/plan')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
      
  </div>                        
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<div class="contentbar">

    <div class="row">
        <div class="col-lg-12">
          <div class="card m-b-30">
            <div class="card-header">
              <h5 class="card-title"><?php echo e(__('Instructor Plan Edit')); ?></h5>
            </div>
            <div class="card-body">
          
                <div class="form-group">
                    <form action="<?php echo e(url('subscription/plan', $plans->id)); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>



                        <div class="row">

                            <div class="col-md-6">
                                <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>:<sup
                                        class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="title" id="exampleInputTitle"
                                    value="<?php echo e($plans->title); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputSlug"><?php echo e(__('No. Courses Allowed to create in plan')); ?>:</label>
                                <input min="1" class="form-control" name="courses_allowed" type="number" id="courses_allowed"  placeholder="" value="<?php echo e($plans->courses_allowed); ?>">
                              
                              </div>
  
                             
                        </div>
                        <br>

                        
<div class="row">
    <div class="col-md-6">
  
        <label for="exampleInputSlug"><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label><br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
          </div>
          <div class="custom-file">
            <input type="file" name="preview_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
          </div>
        
        </div>
    </div>
    <div class="col-md-6">
        <?php if($plans['preview_image'] !== null && $plans['preview_image'] !== ''): ?>
            <img src="<?php echo e(url('/images/plan/'.$plans->preview_image)); ?>" class="img-responsive image_size" />
        <?php else: ?>
            <img src="<?php echo e(Avatar::create($plans->title)->toBase64()); ?>" alt="course"
                class="img-fluid">
        <?php endif; ?>
        
    </div>
</div>



                        <div class="row">

                            <div class="col-md-12">
                                <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                                <textarea id="detail" name="detail" rows="3" class="form-control"
                                    required><?php echo $plans->detail; ?></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="col-md-4">
                                <label for="exampleInputDetails"><?php echo e(__('Paid')); ?>:</label><br>  
                                  <label class="switch">
                                    <input class="slider" type="checkbox" id="customSwitch2" name="type" <?php echo e($plans->type == '1' ? 'checked' : ''); ?> />
                                    <span class="knob"></span>
                                  </label>
                                 
                                  <br>     

                                  <div style="<?php echo e($plans->type == 1 ? '' : 'display:none'); ?>" id="doabox">
                                    <label for="exampleInputSlug"><?php echo e(__('Price')); ?>: <sup class="redstar">*</sup></label>
                                    <input step="0.01" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+"  class="form-control" name="price" id="exampleInputPassword1" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Price')); ?>" value="<?php echo e($plans->price); ?>">
                                 
                                  <br>
                                    <label for="exampleInputSlug"><?php echo e(__('DiscountPrice')); ?>: <sup class="redstar">*</sup></label>
                                    <input step="0.01" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" class="form-control" name="discount_price" id="exampleInputPassword1" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('DiscountPrice')); ?>" value="<?php echo e($plans->discount_price); ?>">
                                  </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:</label><br>
                
              
                                <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" <?php echo e($plans->status == '1' ? 'checked' : ''); ?> />
                                <input type="hidden"  name="free" value="0" for="status" id="status">
                            </div>

                           
                       
                            <div class="col-md-4">
                                <label for=""><?php echo e(__('Duration')); ?>: </label><br>
                                <label class="switch">
                                    <input class="slider" type="checkbox" name="duration_type" <?php echo e($plans->duration_type == "m" ? 'checked' : ''); ?> />
                                    <span class="knob"></span>
                                </label>
                                <br>
                                <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled duration can be in months')); ?>.</small><br>
                                <small class="text-info"> <?php echo e(__('when Disabled duration can be in days')); ?>.</small>
                                  
                                <br>
                                <label for="exampleInputSlug"><?php echo e(__('Plan Expire Duration')); ?></label>
                                <input min="1" class="form-control" name="duration" type="number" id="duration" value="<?php echo e($plans->duration); ?>" placeholder="<?php echo e(__('Enter')); ?> <?php echo e(__('Duration')); ?>">


                             
                            </div>
                        </div>

                        <br>

                        <!--Stripe Subscription-->
                        <div class="row">
                          
                          
                            
                        </div>

                        <br>
                        <!--Stripe Subscription-->
                        <div class="box-footer">
                            <button type="submit"
                                class="btn btn-lg col-md-3 btn-primary-rgba"><?php echo e(__('Save')); ?></button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>

    <script>
        (function($) {
            "use strict";

            $('#customSwitch2').change(function(){
                if($('#customSwitch2').is(':checked')){
                  $('#doabox').show('fast');
                }else{
                  $('#doabox').hide('fast');
                }

              });


            $(function() {
                $('.js-example-basic-single').select2();
            });

            $(function() {
                $('#cb1').change(function() {
                    $('#f').val(+$(this).prop('checked'))
                })
            })

            $(function() {
                $('#cb3').change(function() {
                    $('#test').val(+$(this).prop('checked'))
                })
            })

            $(function() {

                $('#murl').change(function() {
                    if ($('#murl').val() == 'yes') {
                        $('#doab').show();
                    } else {
                        $('#doab').hide();
                    }
                });

            });

            $(function() {

                $('#murll').change(function() {
                    if ($('#murll').val() == 'yes') {
                        $('#doabb').show();
                    } else {
                        $('#doab').hide();
                    }
                });

            });

            $('#preview').on('change', function() {

                if ($('#preview').is(':checked')) {
                    $('#document1').show('fast');
                    $('#document2').hide('fast');

                } else {
                    $('#document2').show('fast');
                    $('#document1').hide('fast');
                }

            });

        })(jQuery);

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructor\plan\edit.blade.php ENDPATH**/ ?>