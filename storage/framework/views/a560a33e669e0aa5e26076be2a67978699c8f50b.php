
<?php $__env->startSection('title', 'Import Demo - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Import Demo')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Import Demo')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
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
                    <h5 class="card-box"><?php echo e(__('Demo Import')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                
                    <div class="card-body bg-success-rgba">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <small class="text-success process-fonts"><i class="fa fa-info-circle"></i> <?php echo e(__('ImportantNote')); ?>

                                    <ul class="process-font">
                                        <li>
                                            <?php echo e(__('ON Click of import data your existing data will remove (except users &amp; settings)')); ?>

                                        </li>
                                        <li>
                                           <?php echo e(__(' ON Click of reset data will reset your site (which you see after fresh install).')); ?>

                                        </li>
                                    </ul>
                                
                            </div>
                        </div>
                    </div>
                
                <!-- ========== DemoImport and reset start ===================== -->
                <div class="row">
                    <!-- DemoImport start -->
                    <div class="col-6">
                        <!-- ========== DemoImport start ===================== -->
                        <!-- form start -->
                        <form action="<?php echo e(url('admin/import/demo')); ?>" class="form" method="POST">
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
                                                            <!-- DemoImport -->
                                                            <div class="col-md-12">
                                                                <label class="text-dark"><?php echo e(__('DemoImport')); ?> :<span class="text-danger">*</span></label>
                                                                <button type="submit" class="btn btn-danger-rgba btn-lg btn-block">
                                                                    <?php echo e(__('DemoImport')); ?>

                                                                </button>
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
                    <!-- DemoImport end -->
                    <!-- reset start -->
                    <div class="col-6">
                          <!-- form start -->
                        <form action="<?php echo e(url('admin/reset/demo')); ?>" class="form" method="POST">
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
                                                        <!-- ResetDemo -->
                                                        <div class="col-md-12">
                                                                <label class="text-dark"><?php echo e(__('ResetDemo')); ?> :<span class="text-danger">*</span></label>
                                                                <button type="submit" class="btn btn-warning-rgba btn-lg btn-block">
                                                                    <?php echo e(__('ResetDemo')); ?>

                                                                </button>
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
                     <!-- reset end -->
                </div>
                <!-- ========== DemoImport and reset end ===================== -->
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
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\database\demo.blade.php ENDPATH**/ ?>