
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

                <div class="row align-items-center">
                            <div class="col-9">
                                
                                <p class="mb-0 text-primary font-14"><?php echo e(__('Course :')); ?> <?php echo e($featured->courses->title); ?> </p>
                                <p class="mb-0 text-primary font-14"><?php echo e(__('User :')); ?> <?php echo e($featured->user->fname); ?></p>
                                <p class="mb-0 text-primary font-14"><?php echo e(__('Transaction id :')); ?> <?php echo e($featured->transaction_id); ?></p>
                                <p class="mb-0 text-primary font-14"><?php echo e(__('PaymentMethod :')); ?> <?php echo e($featured->payment_method); ?></p>
                                <p class="mb-0 text-primary font-14"><?php echo e(__('Amount :')); ?> <i class="fa <?php echo e($currency->icon); ?>"></i> <?php echo e($featured->total_amount); ?></p>
                                <p class="mb-0 text-primary font-14"><?php echo e(__('Currency :')); ?> <?php echo e($featured->currency); ?></p>
                                
                            </div>
                            <div class="col-3">
                            <img style="width: 162px;" src="<?php echo e(asset('images/course/'.$featured->courses->preview_image)); ?>" class="img-fluid sun-img" alt="sun">
                            </div>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\instructor\featurecourse\view.blade.php ENDPATH**/ ?>