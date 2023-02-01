
<?php $__env->startSection('title','Create a new admin'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(route('alladmin.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
        class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a> </div>
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
          <h5 class="box-tittle"><?php echo e(__('Add')); ?> <?php echo e(__('Admin')); ?></h5>
        </div>
        <div class="card-body">
          <form action="<?php echo e(route('alladmin.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="text-dark" for="fname">
                    <?php echo e(__('FirstName')); ?>:<sup class="text-danger">*</sup>
                  </label>
                  <input value="<?php echo e(old('fname')); ?>" autofocus required name="fname" type="text" class="form-control"
                    placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('FirstName')); ?>" />
                </div>
                <div class="form-group">
                  <label class="text-dark" for="mobile"><?php echo e(__('Email')); ?>: <sup
                      class="text-danger">*</sup></label>
                  <input value="<?php echo e(old('email')); ?>" required type="email" name="email"
                    placeholder=" <?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Email')); ?>"
                    class="form-control">
                </div>
                <div class="form-group" style="display:none;">
                  <label class="text-dark" for="role"><?php echo e(__('SelectRole')); ?>: <sup
                      class="text-danger">*</sup></label>
                  <select class="form-control select2" name="role" required>
                    <option value="admin" selected></option>
                  
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Address')); ?>:</label>
                  <textarea name="address" rows="1" class="form-control"
                    placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> address"></textarea>
                </div>
               

                <div class="form-group">
                  <label class="text-dark" for="state_id"><?php echo e(__('State')); ?>: </label>
                  <select id="upload_id" class="form-control select2" name="state_id">
                    <option value="
                   "><?php echo e(__('Please')); ?><?php echo e(__('Select an Option')); ?></option>
                  </select>
                </div>

                
                <div class="form-group">
                  <label class="text-dark" for="pin_code"><?php echo e(__('Pincode')); ?>:</sup></label>
                  <input value="<?php echo e(old('pin_code')); ?>" placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> pincode"
                    type="text" name="pin_code" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-dark" for="fb_url">
                    <?php echo e(__('FacebookUrl')); ?>:
                  </label>
                  <input autofocus name="fb_url" type="text" class="form-control" placeholder="https://facebook.com/" />
                </div>
                <div class="form-group">
                  <label class="text-dark" for="youtube_url">
                    <?php echo e(__('YoutubeUrl')); ?>:
                  </label>
                  <input autofocus name="youtube_url" type="text" class="form-control" placeholder="https://youtube.com/" />
                </div>



              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="text-dark" for="lname">
                    <?php echo e(__('LastName')); ?>:<sup class="text-danger">*</sup>
                  </label>
                  <input value="<?php echo e(old('lname')); ?>" required name="lname" type="text" class="form-control"
                    placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('LastName')); ?>" />
                </div>

               
                <div class="form-group">
                  <label class="text-dark" for="mobile"><?php echo e(__('Mobile')); ?>: <sup
                      class="text-danger">*</sup></label>
                  <input value="<?php echo e(old('mobile')); ?>" required type="text" name="mobile"
                    placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Mobile')); ?>"
                    class="form-control">
                </div>
               
                <div class="form-group">
                  <label class="text-dark" for="mobile"><?php echo e(__('Password')); ?>: <sup
                      class="text-danger">*</sup> </label>
                  <input required type="password" name="password"
                    placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Password')); ?>"
                    class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-dark" for="city_id"><?php echo e(__('Country')); ?>: </label>
                  <select id="country_id" class="form-control select2" name="country_id">
                    <option value="none" selected disabled hidden>
                      <?php echo e(__('Please')); ?> <?php echo e(__('SelectanOption')); ?>

                    </option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($coun->country_id); ?>"><?php echo e($coun->nicename); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-dark" for="city_id"><?php echo e(__('City')); ?>: </label>
                  <select id="grand" class="form-control select2" name="city_id">
                    <option value="
                    "><?php echo e(__('Please')); ?> <?php echo e(__('Select an Option')); ?></option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>: </label>
                  <small class="text-muted"><i class="fa fa-question-circle"></i>
                    <?php echo e(__('Recommended-size')); ?> (410 x 410px)</small>

                  <div class="input-group mb-3">

                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                    </div>


                    <div class="custom-file">

                      <input type="file" name="user_img" class="custom-file-input" id="user_img"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark" for="twitter_url">
                      <?php echo e(__('TwitterUrl')); ?>:
                    </label>
                    <input autofocus name="twitter_url" type="text" class="form-control" placeholder="https://twitter.com/" />
                  </div>
                  <div class="form-group">
                    <label class="text-dark" for="linkedin_url">
                      <?php echo e(__('LinkedInUrl')); ?>:
                    </label>
                    <input autofocus name="linkedin_url" type="text" class="form-control" placeholder="https://linkedin.com/" />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Detail')); ?>:</label>
              <textarea id="detail" name="detail" rows="3" class="form-control"
                placeholder="<?php echo e(__('Please')); ?> <?php echo e(__('Enter')); ?> <?php echo e(__('Detail')); ?>"></textarea>
            </div>
            <div class="form-group">


              <label for="exampleInputDetails"><?php echo e(__('Status')); ?></label><br>
              <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked />
            

            </div>
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Create')); ?></button>
            </div>
            <div class="clear-both"></div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  (function ($) {
    "use strict";

    $('#married_status').change(function () {

      if ($(this).val() == 'Married') {
        $('#doaboxxx').show();
      } else {
        $('#doaboxxx').hide();
      }
    });

    $(function () {
      $("#dob,#doa").datepicker({
        changeYear: true,
        yearRange: "-100:+0",
        dateFormat: 'yy/mm/dd',
      });
    });
    $(function () {
      $('#country_id').change(function () {
        var up = $('#upload_id').empty();
        var cat_id = $(this).val();
        
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: <?php echo json_encode(url('country/dropdown'), 15, 512) ?>,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });

    $(function () {

      $('#upload_id').change(function () {
        var up = $('#grand').empty();
        var cat_id = $(this).val();
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: <?php echo json_encode(url('country/gcity'), 15, 512) ?>,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });
  })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\alladmin\adduser.blade.php ENDPATH**/ ?>