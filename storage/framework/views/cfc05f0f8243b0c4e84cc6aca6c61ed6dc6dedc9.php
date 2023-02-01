
<?php $__env->startSection('title', 'Add Feature Course - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Feature Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Feature Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
  <a href="<?php echo e(url('featurecourse')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
  </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  
    <!-- row started -->
    <div class="col-lg-12">
    
        <div class="card m-b-30">
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"> <?php echo e(__('Feature Course')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">

                    <!-- form start -->
                    <form action="<?php echo e(route('featurecourse.store')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card start -->
                                <div class="card">
                                    <!-- card body start -->
                                    <div class="card-body">
                                        <!-- row start -->
                                          <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
                                                  <div class="row">
                                                    
                                                    <!-- Select Course -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('SelectCourse')); ?> : <span class="text-danger">*</span></label>
                                                             <select class="select2 form-control" id="course_id" name="course_id" required>
                                                              <option value=""><?php echo e(__('SelectanOption')); ?></option>
                                                              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                      <!-- User -->
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('User')); ?> :</label>
                                                            <select class="select2 form-control" name="user_id">
                                                              <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 display-none"> 
                                                      <label for="total_amount"></sup></label>
                                                      <input value="<?php echo e($gsetting->feature_amount); ?>" type="hidden" name="total_amount" class="form-control" readonly="">
                                                    </div>

                                                     <!-- User -->
                                                   
                                                   
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="text-dark" for="total_amount"><?php echo e(__('Amount to be paid to feature a course:')); ?></sup></label>&nbsp;
                                                    <i class="<?php echo e($currency->icon); ?>"></i>&nbsp;<?php echo e($gsetting->feature_amount); ?>

                                                    </div>
                                                    </div>

                                                    <!-- create and reset button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Pay to feature course")); ?></button>
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div><!-- row end -->

                                    </div><!-- card body end -->
                                </div><!-- card end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </form>
                  <!-- form end -->
                
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\featurecourse\create.blade.php ENDPATH**/ ?>