
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="student-view-slider-main-block view-more-pages">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <div class="student-view-block student-view-block-1">
                    <div class="genre-slide-image ">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(url('workshop') . '/' . $shop->id); ?>/details"><img src="<?php echo e(asset('images/workshop/'.$shop->image)); ?>" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading"><a href="<?php echo e(url('workshop') . '/' . $shop->id); ?>/details"><?php echo e(str_limit($shop->title, $limit = 30, $end = '...')); ?></a>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/front/viewmore/shops.blade.php ENDPATH**/ ?>