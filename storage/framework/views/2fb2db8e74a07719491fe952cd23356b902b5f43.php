
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- breadcumb start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="<?php echo e(__('course')); ?>" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('All Instructors')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>  
<!-- breadcumb end -->
<!-- instructor start -->
<?php if(isset($instructors)): ?>
<section id="instructor-home" class="instructor-home-main-block instructor-page">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<div class="col-lg-3 col-md-6">
                <div class="instructor-home-block text-center">
                    <div class="instructor-home-block-one">
                        <?php if($inst['user_img'] !== NULL && $inst['user_img'] !== ''): ?>
                        <a href="#" title=""><img src="<?php echo e(url('/images/user_img/'.$inst->user_img)); ?>"  class="img-fluid" /></a>
                        <?php else: ?>
                        <a href="#" title=""><img src="<?php echo e(Avatar::create($inst->fname)->toBase64()); ?>" alt="course"
                            class="img-fluid"></a>
                        <?php endif; ?>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="<?php echo e($inst->fb_url); ?>"><i data-feather="facebook"></i></a></li>
                                        <li><a href="<?php echo e($inst->twitter_url); ?>"><i data-feather="twitter"></i></a></li>
                                        <li><a href="<?php echo e($inst->youtube_url); ?>"></a><i data-feather="youtube"></i></a></li>
                                        <li><a href="<?php echo e($inst->linkedin_url); ?>"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div> 
                        <div class="instructor-home-dtl">
                            <h4 class="instructor-home-heading"><a href="#" title=""><?php echo e($inst->fname); ?> <?php echo e($inst->lname); ?></a></h4>
                            <p><?php echo e($inst->role); ?></p>
                        
                            <?php

                            $followers = App\Followers::where('user_id', '!=', $inst->id)->where('follower_id', $inst->id)->count();

                            $followings = App\Followers::where('user_id', $inst->id)->where('follower_id','!=', $inst->id)->count();
                            $course = App\Course::where('user_id', $inst->id)->count();

                            ?>
                            <div class="instructor-home-info">
                                <ul>
                                    <li><?php echo e($course); ?> <?php echo e(__('Courses')); ?></li>
                                    <li><?php echo e($followers); ?> <?php echo e(__('Follower')); ?></li>
                                    <li><?php echo e($followings); ?> <?php echo e(__('Following')); ?></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="instructor-home-btn">
                                <a href="<?php echo e(route('allinstructor/profile',$inst->id)); ?>" class="btn btn-primary" title="View Profile"><i data-feather="eye"></i>View Profile</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- instructor end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\instructor\index.blade.php ENDPATH**/ ?>