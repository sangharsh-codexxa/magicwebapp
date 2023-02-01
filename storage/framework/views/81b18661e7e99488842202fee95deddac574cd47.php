
<?php $__env->startSection('title', 'Batch'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-fluid">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Batch')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="batch" class="batch-main-block">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <div class="student-view-block student-view-block-1">
                    <div class="genre-slide-image">
                        <div class="view-block">
                            <div class="view-img">
                                <a href=""><img src="<?php echo e(asset('images/batch/'.$datas->preview_image)); ?>" class="img-fluid" alt=""></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading"><a href=""><?php echo e($datas->title); ?></a>
                                </div>
                                <div class="batch-dtl mb-3">
                                    <p><?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($datas->detail))), 0, 120)); ?>...</p>
                                </div>
                                <div class="batch-btn mb-2">
                                    <a href="<?php echo e(route('batch.frontdetail',$datas->id)); ?>" type="button" class="btn btn-primary"><?php echo e(__('view more')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\batch\view.blade.php ENDPATH**/ ?>