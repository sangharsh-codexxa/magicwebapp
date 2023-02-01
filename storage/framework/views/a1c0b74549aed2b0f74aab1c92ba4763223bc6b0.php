
<?php $__env->startSection('title','View Assignment'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Assignment')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Assignment')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('View Assignment')); ?></h5>
              </div>
              <div class="card-body">
                <div class="view-instructor">
                  <div class="instructor-detail">
                    
                      
                        <?php if($assign->user->user_img != null || $assign->user->user_img !=''): ?>
                        <img src="<?php echo e(asset('images/user_img/'.$assign->user->user_img)); ?>" class="img-circle" />
                      <?php else: ?>
                      <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">
                      <?php endif; ?>
                      <div class="mt-3">
                      <h4><?php echo e(__('User')); ?> : <?php echo e($assign->user->fname); ?> <?php echo e($assign->user->lname); ?></h4>
                    </div>
                    <div>
                     <h4>  <?php echo e(__('Course')); ?> : <?php echo e($assign->courses->title); ?></h4>
                    </div>
                    <div>
<h4>                      <?php echo e(__('CourseChapter')); ?> : <?php echo e($assign->chapter->chapter_name); ?>


  </h4>                    </div>
                    <div> 
                      <h4>
                        <?php echo e(__('AssignmentTitle')); ?> : <?php echo e($assign->title); ?>


                      </h4>
                    </div>
                    <div>
                      <h4>
                        <?php echo e(__('Assignment')); ?>: <a href="<?php echo e(asset('files/assignment/'.$assign->assignment)); ?>"
                          download="<?php echo e($assign->assignment); ?>"><?php echo e(__('Download')); ?> <i class="fa fa-download"></i></a>
                      </h4>
                        </div>
              
                    
                  </div>
                </div>
              
              <br>
              <br>
                <form action="<?php echo e(route('assignment.update',$assign->id)); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PUT')); ?>

              
                  <input type="hidden" value="<?php echo e($assign->user_id); ?>" name="user_id" class="form-control">
              
                  <input type="hidden" value="<?php echo e($assign->course_id); ?>" name="course_id" class="form-control">
              
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputTit1e"><?php echo e(__('ReviewAssignment')); ?>:</label>
                      <br>
                      <input id="assign_accept" type="checkbox" class="custom_toggle" name="type"
                      <?php echo e($assign->type == 1 ? 'checked' : ''); ?> />
                        
                        <label class="tgl-btn" data-tg-off="Unchecked" data-tg-on="Checked" for="assign_accept"></label>
                      
                    </div>
                  </div>
                  <br>
              
                  <div class="row" style="<?php echo e($assign['type'] == '1' ? '' : 'display:none'); ?>" id="sec1_one">
                    <div class="col-md-12">
                      <label for="exampleInputDetails"><?php echo e(__('Give scores to assignment')); ?> (1 to 10):</label>
                      <input min="1" max="10" class="form-control" name="rating" type="number" id="rating"
                        value="<?php echo e($assign->rating); ?>" placeholder="Enter Duration in months">
                    </div>
                  </div>
                  <br>
              
              
                  <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                      <?php echo e(__('Reset')); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                      <?php echo e(__('Update')); ?></button>
                  </div>
  
                  <div class="clear-both"></div>
              
                </form>
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

      $('#assign_accept').change(function () {
        if ($('#assign_accept').is(':checked')) {
          $('#sec1_one').show('fast');
          $('#sec_one').hide('fast');
        } else {
          $('#sec1_one').hide('fast');
          $('#sec_one').show('fast');
        }

      });

    });
  })(jQuery);
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\course\assignment\view.blade.php ENDPATH**/ ?>