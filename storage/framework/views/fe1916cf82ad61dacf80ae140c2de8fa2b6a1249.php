
<?php $__env->startSection('title','View Course Review'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('CourseReview')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('CourseReview')); ?>

<?php $__env->endSlot(); ?>


<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-box"><?php echo e(__('CourseReview')); ?></h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 text-center">
                <?php if($course->preview_image != null || $course->preview_image !=''): ?>
                <img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" width="150px" height="100px"
                  class="img-circle" />
                <?php else: ?>
                <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" width="150px" height="100px"
                  class="img-responsive">
                <?php endif; ?>
              </div>
              <div class="col-md-10">
                <h3><?php echo e(__('Name')); ?> :</h3><h4><span class="text-muted"><?php echo e($course->user->fname); ?> <?php echo e($course->user->lname); ?></span></h4>

                <h3><?php echo e(__('Course')); ?> :</h3><h4><span class="text-muted"><?php echo e($course->title); ?></span></h4>
                <h3><?php echo e(__('Title')); ?> :</h3> <h6><span class="text-muted"><?php echo e($course->title); ?></span></h6>
                <h3><?php echo e(__('Detail')); ?> :</h3><p> <span class="text-muted"><?php echo $course->detail; ?></span></p>
              </div>
             
              

             

            </div>

            <form action="<?php echo e(url('coursereview/'.$course->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


              <input type="hidden" value="<?php echo e($course->course_id); ?>" name="course_id" class="form-control">

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">
                    <h5><?php echo e(__('Accept')); ?>:</h5>
                  </label>
                  <input type="checkbox" id="appoint_accept" class="custom_toggle" name="status"
                    <?php echo e($course->status == '1' ? 'checked' : ''); ?> />

                  <label class="tgl-btn" data-tg-off="Reject" data-tg-on="Accept" for="appoint_accept"></label>

                </div>
                <div class="col-md-12">
                  <div style="<?php echo e($course->status == '0' ? '' : 'display:none'); ?>" id="sec1_one">
                    <label for="exampleInputDetails"><?php echo e(__('ReasonforRejection')); ?>:</label>
                    <textarea  name="reject_txt" rows="1" class="form-control"
                      placeholder="Enter class detail"><?php echo e($course['reject_txt']); ?></textarea>

                  </div>
                </div>
              </div>
              <div class="form-group mt-3">
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                  <?php echo e(__('Reset')); ?></button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Update')); ?></button>
              </div>

              <div class="clear-both"></div>


            </form>
          </div>
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

    $(function () {

      $('#appoint_accept').change(function () {
        if ($('#appoint_accept').is(':checked')) {
          $('#sec_one').show('fast');
          $('#sec1_one').hide('fast');
        } else {
          $('#sec_one').hide('fast');
          $('#sec1_one').show('fast');
        }

      });

    });
  })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course_review\view.blade.php ENDPATH**/ ?>