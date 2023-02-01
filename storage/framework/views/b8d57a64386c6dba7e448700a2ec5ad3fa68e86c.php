
<?php $__env->startSection('title', 'Edit Appointment - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Edit Appointment')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Appointment')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Edit Appointment')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Appointment')); ?></h5>
        </div>
        <div class="card-body appoint-view-page">
          <div class="view-instructor">
            <div class="instructor-detail">
              <div class="row">
                <div class="col-lg-3">
                  <?php if($appoint->user->user_img != null || $appoint->user->user_img !=''): ?>
                    <img src="<?php echo e(asset('images/user_img/'.$appoint->user->user_img)); ?>" class="img-circle"/>
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">
                  <?php endif; ?>
                </div>
                <div class="col-lg-6">
                  <div class="appoint-view-dtl">
                    <div class="row mb-3">
                      <div class="col-lg-2">
                        <span class="text-dark appoint-title"><?php echo e(__('User')); ?>: </span>
                      </div>
                      <div class="col-lg-10">
                        <?php echo e($appoint->user->fname); ?> <?php echo e($appoint->user->lname); ?>

                      </div>
                    </div>
                  </div>
                  <div class="appoint-view-dtl">
                    <div class="row mb-3">
                      <div class="col-lg-2">
                        <span class="text-dark appoint-title"><?php echo e(__('Course')); ?>: </span>
                      </div>
                      <div class="col-lg-10">
                        <?php echo e($appoint->courses->title); ?>

                      </div>
                    </div>
                  </div>
                  <div class="appoint-view-dtl">
                    <div class="row mb-3">
                      <div class="col-lg-2">
                        <span class="text-dark appoint-title"><?php echo e(__('Title')); ?>:</span> 
                      </div>
                      <div class="col-lg-10">
                        <?php echo e($appoint->title); ?>

                      </div>
                    </div>
                  </div>
                  <div class="appoint-view-dtl">
                    <div class="row mb-3">
                      <div class="col-lg-2">
                        <span class="text-dark appoint-title"><?php echo e(__('Detail')); ?>:</span> 
                      </div>
                      <div class="col-lg-10">
                        <?php echo e($appoint->detail); ?>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 text-center">
                  <form action="<?php echo e(route('appointment.update',$appoint->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="">
                      <div class=" form-group">
                        <label for="exampleInputTit1e"><?php echo e(__('Accept')); ?>:</label><br>
                        <label class="switch">
                          <input class="slider" type="checkbox" name="search_enable" <?php echo e($appoint->accept == 1 ? 'checked' : ''); ?>  />
                          <span class="knob"></span>
                        </label>
                          <!--<input  type="checkbox" name="search_enable"  id="appoint_accept" <?php echo e($appoint->accept == 1 ? 'checked' : ''); ?>  class="custom_toggle"/>           -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- <ul style="list-style-type:none;" class="mt-3">
                <li>
                  <?php if($appoint->user->user_img != null || $appoint->user->user_img !=''): ?>
                    <img src="<?php echo e(asset('images/user_img/'.$appoint->user->user_img)); ?>" class="img-circle"/>
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">
                  <?php endif; ?>
                </li>
                <li><span class="text-dark"><?php echo e(__('User')); ?>: </span><?php echo e($appoint->user->fname); ?> <?php echo e($appoint->user->lname); ?></li>
                <li><span class="text-dark"><?php echo e(__('Course')); ?>: </span><?php echo e($appoint->courses->title); ?></li>
                <li><span class="text-dark"><?php echo e(__('Title')); ?>:</span> <?php echo e($appoint->title); ?></li>
                <li><span class="text-dark"><?php echo e(__('Detail')); ?>:</span> <?php echo e($appoint->detail); ?></li>
              </ul> -->
            </div>
          </div>
          <form action="<?php echo e(route('appointment.update',$appoint->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <input type="hidden" value="<?php echo e($appoint->user_id); ?>" name="user_id" class="form-control">
            <input type="hidden" value="<?php echo e($appoint->course_id); ?>" name="course_id" class="form-control">
            <!-- <div class="row "> -->
              <!-- <div class=" form-group col-md-6"> -->
                <!-- <label for="exampleInputTit1e"><?php echo e(__('Accept')); ?>:</label><br>
                <label class="switch">
                  <input class="slider" type="checkbox" name="search_enable" <?php echo e($appoint->accept == 1 ? 'checked' : ''); ?>  />
                  <span class="knob"></span>
                </label> -->
                  <!--<input  type="checkbox" name="search_enable"  id="appoint_accept" <?php echo e($appoint->accept == 1 ? 'checked' : ''); ?>  class="custom_toggle"/>           -->
              <!-- </div> -->
            <!-- </div> -->
            <!-- <br> -->
            <div class="row" style="<?php echo e($appoint['accept'] == '1' ? '' : 'display:none'); ?>" id="sec1_one">
              <div class="col-md-12">
                <label for="exampleInputDetails" class="appoint-title"><?php echo e(__('Reply')); ?>:</label>
                <textarea id="reply" name="reply" rows="1" class="form-control" placeholder="Enter class detail"><?php echo e($appoint['reply']); ?></textarea>
              </div>
            </div>
            <br>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!--courseclass.js is included -->
<script>
 tinymce.init({selector:'textarea#reply'});
</script>
<script>
(function($) {
  "use strict";
  $(function(){
      $('#appoint_accept').change(function(){
        if($('#appoint_accept').is(':checked')){
          $('#sec1_one').show('fast');
          $('#sec_one').hide('fast');
        }else{
          $('#sec1_one').hide('fast');
          $('#sec_one').show('fast');
        }
      });
  });
})(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\appointment\view.blade.php ENDPATH**/ ?>