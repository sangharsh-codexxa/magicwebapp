
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
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1 class="wishlist-home-heading"><?php echo e($datas->title); ?></h1>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="batch-dtl" class="batch-dtl-main-block">
    <div class="container">
        <div class="batch-dtl-block">
            <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="batch-dtl-img">
                        <img src="<?php echo e(asset('images/batch/'.$datas->preview_image)); ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="batch-detail-block">
                        <h4 class="batch-dtl-title mb-3"><?php echo e($datas->courses->title); ?></h4>
                        <div class="user-name mb-2">
                            <div class="user-title"><?php echo e(__('Enrolled User ')); ?></div>
                            <ul>
                               
                                <?php $__currentLoopData = $datas['allowed_users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Uid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <li> <a href ="<?php echo e(route('all/profile',$Uid)); ?>"><?php echo e(App\User::whereId($Uid)->value('fname')); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                              

                            </ul>
                        </div>
                        <p><?php echo e($datas->detail); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\batch\detail.blade.php ENDPATH**/ ?>