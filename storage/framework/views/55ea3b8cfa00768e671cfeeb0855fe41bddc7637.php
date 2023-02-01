
<?php $__env->startSection('title', 'View Message - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Message')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Message')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
  <a href="<?php echo e(url('usermessage')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"> <?php echo e(__('Message')); ?></h5>
                </div> 
                <!-- card body started -->
                <div class="card-body">
					<div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 text-center">
                            <h4 class="btm-20"><?php echo e($show->fname); ?></h4>
                            <div class="card card-contact text-left">
                                <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="p-1"><?php echo e(__('Email Id. :')); ?> </th>
                                                    <td class="p-1 text-black"><?php echo e($show->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1"><?php echo e(__('Contact No. :')); ?> </th>
                                                    <td class="p-1 text-black"> <?php echo e($show->mobile); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1"><?php echo e(__('Date :')); ?></th>
                                                    <td class="p-1 text-black"><?php echo e(date('jS F Y', strtotime($show->created_at))); ?></td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center">
                                <h4 class="btm-20"><?php echo e(__('Message :')); ?></h4>
                                <div class="card card-contact">
                                    <p class="text-black"><?php echo e($show->message); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center">
                                <h4 class="btm-20"><?php echo e(__('Reason :')); ?></h4>
                                <div class="card card-contact">
                                    <p class="text-black"><?php echo e($show->reason); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<!-- <script src="<?php echo e(url('admin_assets/assets/js/popper.min.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\contact\view.blade.php ENDPATH**/ ?>