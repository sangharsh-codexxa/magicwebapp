
<?php $__env->startSection('title','Edit Batch'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Batch')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <a href="<?php echo e(url('batch')); ?>" class="float-right btn btn-primary mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('Edit')); ?> <?php echo e(__('Batch')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form action="<?php echo e(route('batch.update',$cor->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cor->title); ?>">
                </div>
                <div class="form-group col-md-6">
                  <?php if(Auth::User()->role == "admin"): ?>
                  <label for="exampleInputTit1e"><?php echo e(__('Status')); ?></label>
                  <input type="checkbox" class="custom_toggle" name="status"  <?php echo e($cor->status==1 ? 'checked' : ''); ?>/>
                 
                <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                  <label><?php echo e(__('SelectCourse')); ?>: <span class="redstar">*</span></label>
                  <select id="course_id" class="form-control js-example-basic-single" name="allowed_courses"
                    size="5" row="5" placeholder="<?php echo e(__('Select')); ?> Courses">


                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat->status == 1): ?>
                    <option value="<?php echo e($cat->id); ?>"
                      <?php echo e($cat->allowed_courses == $cat->allowed_courses ? 'selected' : ''); ?>>
                      <?php echo e($cat->title); ?>

                    </option>
                 
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>


                <div class="form-group col-md-6">
                  <label><?php echo e(__('Select')); ?> <?php echo e(__('Users')); ?>: <span
                      class="redstar">*</span></label>
                  <select id="upload_id" class="form-control js-example-basic-single" name="allowed_users[]" multiple="multiple"
                    size="5" row="5" placeholder="<?php echo e(__('Select')); ?> <?php echo e(__('Users')); ?>">



                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->status == 1): ?>
                    <option value="<?php echo e($user->id); ?>"
                      <?php echo e(in_array($user->id, $cor['allowed_users'] ?: []) ? "selected": ""); ?>><?php echo e($user->fname); ?>

                    </option>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>



            </div>


                <div class="form-group">
                  <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:<sup
                      class="redstar">*</sup></label>
                  <textarea name="detail" rows="3" class="form-control"><?php echo $cor->detail; ?></textarea>
                </div>

              
                  <br>
<div class="row">
                <div class="form-group col-md-6">
                  <label><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                  <small class="text-muted"><i class="fa fa-question-circle"></i>
                    <?php echo e(__('Recommended-size')); ?> (1375 x 409px)</small>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <?php if($cor['preview_image'] !== NULL && $cor['preview_image'] !== ''): ?>
                  <img src="<?php echo e(url('/images/batch/'.$cor->preview_image)); ?>" class="image_size"/>
                  <?php else: ?>
                  <img src="<?php echo e(Avatar::create($cor->title)->toBase64()); ?>" alt="course" class="img-fluid">
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
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  //  $(document).on('change','#course_id',function(){
    $(document.body).on('change','#course_id',function(){
  
          var up = $('#upload_id').empty();
          var cat_id = jQuery('#course_id').val();
  
          
         
          if (cat_id) {
            //alert(cat_id);
            $.ajax({
              type: "GET",
              url: <?php echo json_encode(url('dropdowns'), 15, 512) ?>,
              data: {
                catId: cat_id
              },
              success: function (data) {
                // up.append('<option value="0">Please Choose</option>');
                  $.each(data, function(key,value) {
                    console.log(value);
  
                    $('#upload_id')
                      .append($("<option></option>")
                      .attr("value", value.id)
                      .text(value.user.fname)); 
  
                  // up.append($('<option>', {
                  //   value: value.id
                  //   text: 'hello'
                  // }));
                    // $.each( value, function( index2, sub_record ) {
                      
                    // });
                  }); 
  
                // var data = JSON.parse(data);
                // console.log(data);
          //       up.append('<option value="0">Please Choose</option>');
          //       $.each(data, function (key,val) {
          //         console.log(val);
          //         up.append($('<option>', {
          //           value: '1'
          //           text: 'hello'
          //         }));
          //       });
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
              }
            });
          }
        });
  
  </script>
<script>
  (function ($) {
    "use strict";


    $(function () {
      $('.js-example-basic-single').select2();
    });

    $(function () {
      $('#cb1').change(function () {
        $('#f').val(+$(this).prop('checked'))
      })
    })

    $(function () {
      $('#cb3').change(function () {
        $('#test').val(+$(this).prop('checked'))
      })
    })

    $(function () {

      $('#murl').change(function () {
        if ($('#murl').val() == 'yes') {
          $('#doab').show();
        } else {
          $('#doab').hide();
        }
      });

    });

    $(function () {

      $('#murll').change(function () {
        if ($('#murll').val() == 'yes') {
          $('#doabb').show();
        } else {
          $('#doab').hide();
        }
      });

    });

    $('#preview').on('change', function () {

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\batch\edit.blade.php ENDPATH**/ ?>