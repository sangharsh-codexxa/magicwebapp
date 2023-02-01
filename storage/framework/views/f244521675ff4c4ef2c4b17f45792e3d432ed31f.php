
<?php $__env->startSection('title', 'Instructor Subscription Plan'); ?>
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
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Instructor Plan')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section id="profile-item" class="profile-item-block instructor-subscription-block">
    <div class="container-xl">
        <?php if(isset($subscribed)): ?>
        <h4 class="student-heading"><?php echo e(__('Active Plan')); ?></h4>
        <div class="row">
            <?php $__currentLoopData = $subscribed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscrib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($subscrib->plans->status == '1'): ?>
            
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="view-block btm-10">
                        <div class="view-img">
                            <?php if($subscrib->plans['preview_image'] !== NULL && $subscrib->plans['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/plan/'.$subscrib->plans->preview_image)); ?>" class="img-fluid" alt="<?php echo e(__('course')); ?>">
                            <?php else: ?>
                                <a href=""><img src="<?php echo e(Avatar::create($subscrib->plans->title)->toBase64()); ?>" class="img-fluid" alt="<?php echo e(__('course')); ?>">
                            <?php endif; ?>
                            </a>
                        </div>
                    
                        <div class="view-dtl">
                            <div class="row no-gutters">
                                <div class="col-lg-7">
                                    <div class="plan-name">Plan</div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="view-heading"><a href=""><?php echo e(str_limit($subscrib->plans->title, $limit = 35, $end = '...')); ?></a></div>
                                </div>
                            </div>
                            
                            <div class="row no-gutters mb-3">
                                <div class="col-lg-7">
                                    <div class="inst-duration-course-name"><?php echo e(__('Duration')); ?>:</div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="inst-duration-course">
                                        <ul>
                                            <?php if($subscrib->plans->duration == 'm'): ?>

                                                <?php if($subscrib->plans->discount_price == !NULL): ?>

                                                <li class="rate-r"><s><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?> /<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></s></li>

                                                <li><b><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->discount_price); ?>/<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></b></li>

                                                <?php else: ?>

                                                <li class="rate-r"><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?> /<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></li>

                                                <?php endif; ?>
                                                
                                                <?php else: ?>

                                                <?php if($subscrib->plans->discount_price == !NULL): ?>
                                                <li class="rate-r"><s><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?> /<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></s></li>

                                                <li><b><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->discount_price); ?>/<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></b></li>

                                                <?php else: ?>

                                                <li class="rate-r"><?php if($subscrib->plans->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?> /<?php endif; ?> <?php echo e($subscrib->plans->duration); ?> <?php echo e(__('Month')); ?></li>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-lg-7">
                                    <div class="inst-allowed-courses-name"><?php echo e(__('Allowed Courses')); ?>:</div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="inst-allowed-courses"><?php echo e($subscrib->plans->courses_allowed); ?></div>
                                </div>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <?php if($subscrib->plans->type == 1): ?>
                                        <div class="rate text-right">
                                            <ul>
                                                

                                                <?php if($subscrib->plans->discount_price == !NULL): ?>
                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($subscrib->plans->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a></li>
                                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($subscrib->plans->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strike></b></a></li>
                                                    <!-- <li class="rate-r"><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?></s></li> -->
                                                    <!-- <li><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->discount_price); ?></b></li> -->
                                                <?php else: ?>
                                                <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($subscrib->plans->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) )); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a></li>
                                                    <!-- <li><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($subscrib->plans->price); ?></b></li> -->
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <?php else: ?>
                                        <div class="rate text-right">
                                            <ul>
                                            <li><b><?php echo e(__('Free')); ?></b></li>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>  
                            </div>  
                        </div>
                    </div>
                    <div class="plan-subs-btn">
                        <button type="submit" class="btn btn-primary" title="Add To Cart"><?php echo e(__('Subscribed')); ?></button>
                    </div>      
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php endif; ?>
        
    </div>
</section>
<!-- profile update start -->
<section id="profile-item" class="profile-item-block instructor-subscription-block">
    <div class="container-xl">
        <h4 class="student-heading"><?php echo e(__('All Plans Available')); ?></h4>
    	<div class="row">
    		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($plan->status == '1'): ?>
        	
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="genre-slide-image <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($plan->id); ?>">
                        <div class="view-block btm-10">
                            <div class="view-img">
                                <?php if($plan['preview_image'] !== NULL && $plan['preview_image'] !== ''): ?>
                                    <a href=""><img src="<?php echo e(asset('images/plan/'.$plan->preview_image)); ?>" class="img-fluid" alt="course">
                                <?php else: ?>
                                    <a href=""><img src="<?php echo e(Avatar::create($plan->title)->toBase64()); ?>" class="img-fluid" alt="course">
                                <?php endif; ?>
                                </a>
                            </div>
                        
                            <div class="view-dtl">
                                <div class="row no-gutters">
                                    <div class="col-lg-7">
                                        <div class="plan-name">Plan</div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="view-heading"><a href=""><?php echo e(str_limit($plan->title, $limit = 35, $end = '...')); ?></a></div>
                                    </div>
                                </div>
                                
                                <div class="row no-gutters mb-3">
                                    <div class="col-lg-7">
                                        <div class="inst-duration-course-name"><?php echo e(__('Duration')); ?>:</div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="inst-duration-course">
                                            <ul>
                                                <?php if($plan->duration == 'm'): ?>

                                                    <?php if($plan->discount_price == !NULL): ?>

                                                    <li class="rate-r"><s><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->price); ?> /<?php endif; ?> <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></s></li>

                                                    <li><b><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->discount_price); ?> /<?php endif; ?> <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></b></li>

                                                    <?php else: ?>

                                                    <li class="rate-r"><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->price); ?> /<?php endif; ?> <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></li>

                                                    <?php endif; ?>
                                                    
                                                    <?php else: ?>

                                                    <?php if($plan->discount_price == !NULL): ?>
                                                    <li class="rate-r"><s><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->price); ?> <?php endif; ?> / <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></s></li>

                                                    <li><b><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->discount_price); ?> / <?php endif; ?> <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></b></li>

                                                    <?php else: ?>

                                                    <li class="rate-r"><?php if($plan->type == 1): ?><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plan->price); ?> / <?php endif; ?> <?php echo e($plan->duration); ?> <?php echo e(__('Month')); ?></li>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-7">
                                        <div class="inst-allowed-courses-name"><?php echo e(__('Allowed Courses')); ?>:</div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="inst-allowed-courses"><?php echo e($plan->courses_allowed); ?></div>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block<?php echo e($plan->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($plan['title']); ?></h5>
                                

                                <div class="main-des">
                                    <p><?php echo $plan->detail; ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="planlist-action">
                        <div class="row">
                        	<div class="col-md-12 col-12">
                               
                                <?php if($plan->type == 1): ?>
                                <div class="plan-enroll-btn btm-10">
                                    <form id="demo-form2" method="post" action="<?php echo e(route('plan.checkout')); ?>"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            
                                            <input type="hidden" name="plan_id"  value="<?php echo e($plan->id); ?>" />
                                        
                                         <button type="submit" class="btn btn-primary"  title="<?php echo e(__('Add To Cart')); ?>">
                                            <?php echo e(__('Subscribe Now')); ?>

                                        </button>
                                    </form>
                                </div>
                                <?php else: ?>

                                <div class="plan-enroll-btn btm-10">
                                    <form id="demo-form2" method="post" action="<?php echo e(route('free.plan.checkout')); ?>"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            
                                            <input type="hidden" name="plan_id"  value="<?php echo e($plan->id); ?>" />
                                        
                                         <button type="submit" class="btn btn-primary"  title="Add To Cart">
                                            <?php echo e(__('Subscribe Now')); ?>

                                        </button>
                                    </form>
                                </div>

                                <?php endif; ?>
                        	</div>
                        	
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    	
    </div>
</section>
<!-- profile update end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\plan\view.blade.php ENDPATH**/ ?>