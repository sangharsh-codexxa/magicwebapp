
<?php $__env->startSection('title',__('Admin Dashboard')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo e(__('Home')); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo e(__('Dashboard')); ?></li>
                </ol>
            </div>
        </div>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-12">
           <h3> <?php echo e(auth()->user()->getRoleNames()[0]); ?> <?php echo e(__('Dashboard')); ?> </h3>
        </div>
        <div class="col-md-12">
        <div class="card bg-primary-rgba m-b-30">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h5 class="card-title text-primary mb-1">Welcome, <?php echo e(Auth::user()->fname); ?>

                        </h5>
                        <p class="mb-0 text-primary font-14">"May the sun shine brightest, Today"</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\customrole-dashboard.blade.php ENDPATH**/ ?>