
<?php $__env->startSection('title', 'Feature Course - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Pay to Feature a Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Feature Course')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
  <a href="<?php echo e(route('featurecourse.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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

                <div class="row">
               <!-- first start -->
                <div class="col-lg-4">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="accordion accordion-outline" id="accordionoutline1">
                        <div class="card">
                        <div class="card-header" id="headingOneoutline">
                          <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOneoutline1" aria-expanded="false" aria-controls="collapseOneoutline"><?php echo e(__('View Course Detail')); ?></button>
                          </h2>
                        </div>
                        <div id="collapseOneoutline1" class="collapse" aria-labelledby="headingOneoutline" data-parent="#accordionoutline1" style="">
                          <div class="card-body">
                        <!-- ==================== -->
                         <!-- ====================== -->
                         <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                <img style="width: 140px;" src="images/course/<?php echo $course['preview_image'];  ?>" class="img-fluid sun-img" />
                            <?php else: ?>
                                <img style="width: 140px;" src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" class="img-fluid sun-img" >
                            <?php endif; ?>
                            <br><br>
                            <?php echo e($course->title); ?>

                            <br><br>
                            
                            
                            <label for="total_amount"><?php echo e(__('Amount to be paid to feature a course:')); ?></sup></label>&nbsp;
                            <b><i class="<?php echo e($currency->icon); ?>"></i>&nbsp;<?php echo e($gsetting->feature_amount); ?></b>
                            <!-- ======================= -->
                        <!-- ====================== -->
                          </div>
                        </div>
                        </div>
                        
                      </div> 
                    </div>
                  </div>
                </div>
                <!-- first end -->
                <!-- =========== second start================== -->
                <div class="col-lg-4">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="accordion accordion-outline" id="accordionoutline2">
                        <div class="card">
                        <div class="card-header" id="headingOneoutline">
                          <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOneoutline2" aria-expanded="false" aria-controls="collapseOneoutline"><?php echo e(__('Pay With Paytm')); ?></button>
                          </h2>
                        </div>
                        <div id="collapseOneoutline2" class="collapse" aria-labelledby="headingOneoutline" data-parent="#accordionoutline2" style="">
                          <div class="card-body">
                            <!-- form start -->
                            <form action="<?php echo e(url('/paywithpaytm')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
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
                                                                            
                                                                            <!-- Name -->
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="text-dark"><?php echo e(__('Name :')); ?></label>
                                                                                    <input type="text" name="name" class="form-control" value="<?php echo e(Auth::User()->fname); ?>" required>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Mobile Number -->
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="text-dark"><?php echo e(__('Mobile Number :')); ?></label>
                                                                                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="<?php echo e(Auth::User()->mobile); ?>" required autocomplete="off">
                                                                                </div>
                                                                            </div>

                                                                            <!-- Email Id -->
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="text-dark"><?php echo e(__('Email Id :')); ?></label>
                                                                                    <input type="email" name="email" class="form-control" value="<?php echo e(Auth::User()->email); ?>" placeholder="Enter Email id" required>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Amount to pay -->
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="text-dark"><?php echo e(__('Amount to pay :')); ?></label>
                                                                                    <input type="text" name="amount" class="form-control" placeholder="" value="<?php echo e($payment->total_amount); ?>" readonly="">
                                                                                </div>
                                                                            </div>
                          
                                                                            <!-- create and close button -->
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                                                                    <?php echo e(__("Pay")); ?></button>
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
                          </div>
                        </div>
                        </div>
                        
                      </div> 
                    </div>
                  </div>
                </div>
                <!-- =========== second end================== -->

                <!-- =========== three start================== -->
                <div class="col-lg-4">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="accordion accordion-outline" id="accordionoutline3">
                        <div class="card">
                        <div class="card-header" id="headingOneoutline">
                          <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOneoutline3" aria-expanded="false" aria-controls="collapseOneoutline"><?php echo e(__('Pay with Paypal')); ?></button>
                          </h2>
                        </div>
                        <div id="collapseOneoutline3" class="collapse" aria-labelledby="headingOneoutline" data-parent="#accordionoutline3" style="">
                          <div class="card-body">
                                  <?php        
                                      $secureamount = Crypt::encrypt($payment->total_amount);
                                  ?>
                                  <!-- form start -->
                                  <form action="<?php echo e(route('featuredWithpaypal')); ?>" method="POST" autocomplete="off">
                                    <?php echo csrf_field(); ?>
                                                    
                                  <input type="hidden" name="amount" value="<?php echo e($secureamount); ?>"/>
                                  
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Proceed")); ?></button>
                                    </div>
                                    
                                  </form>
                                  <!-- form end -->
                          </div>
                        </div>
                        </div>
                        
                      </div> 
                    </div>
                  </div>
                </div>
                <!-- =========== three end================== -->
                </div>

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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\featurecourse\pay.blade.php ENDPATH**/ ?>