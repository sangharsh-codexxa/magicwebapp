
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="student-view-slider-main-block view-more-pages">
    <div class="container-xl">
        <?php if(count($bundles) > 0): ?>
        <div class="row">
            <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($bundle->status == 1): ?>
            <div class="col-lg-3">
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>"
                    data-pt-placement="outside" data-pt-interactive="false"
                    data-pt-title="#prime-next-item-description-block-4<?php echo e($bundle->id); ?>">
                    <div class="view-block">
                        <div class="view-img">
                            <?php if($bundle['preview_image'] !== NULL && $bundle['preview_image'] !== ''): ?>
                            <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img
                                    src="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            <?php else: ?>
                            <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img
                                    src="<?php echo e(Avatar::create($bundle->title)->toBase64()); ?>" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            <?php endif; ?>
                        </div>
                        <div class="view-user-img">
                            <a href="" title=""><img src="http://eclass.test/images/user_img/159116548431.jpg"
                                    class="img-fluid user-img-one" alt=""></a>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a
                                    href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><?php echo e(str_limit($bundle->title, $limit = 30, $end = '...')); ?></a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><?php echo e(optional($bundle->user)['fname']); ?></span></h6>
                            </div>
                            <!-- <p class="btm-10"><a herf="#"><?php echo e(__('by')); ?> <?php if(isset($bundle->user)): ?> <?php echo e($bundle->user['fname']); ?> <?php echo e($bundle->user['lname']); ?> <?php endif; ?></a></p> -->

                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                <?php echo e($bundle->order->count()); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <?php if($bundle->type == 1 && $bundle->price != null): ?>
                                        <div class="rate text-right">
                                            <ul>

                                                <?php if($bundle->discount_price == !NULL): ?>

                                                <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                                </li>

                                                <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strike></b></a>
                                                </li>


                                                <?php else: ?>
                                                <li><a><b>
                                                    <?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <?php else: ?>
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a
                                                href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($bundle['title']); ?>"
                                                target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        <?php if(Auth::check()): ?>

                                        <li class="protip-wish-btn"><a class="compare" data-id="<?php echo e(filter_var($bundle->id)); ?>"
                                                title="compare"><i data-feather="bar-chart"></i></a></li>

                                        <?php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $bundle->id)->first();
                                        ?>
                                        <?php if($wish == NULL): ?>
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post"
                                                action="<?php echo e(url('show/wishlist', $bundle->id)); ?>" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>


                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                <input type="hidden" name="course_id" value="<?php echo e($bundle->id); ?>" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                        data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        <?php else: ?>
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post"
                                                action="<?php echo e(url('remove/wishlist', $bundle->id)); ?>" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>


                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                <input type="hidden" name="course_id" value="<?php echo e($bundle->id); ?>" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                    type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i
                                                    data-feather="heart"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div id="prime-next-item-description-block-4<?php echo e($bundle->id); ?>" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading"><?php echo e($bundle['title']); ?></h5>

                            <div class="product-main-des">
                                <p><?php echo e(strip_tags(str_limit($bundle['detail'], $limit = 200, $end = '...'))); ?></p>
                            </div>
                            <div>
                                <div class="product-learn-dtl">
                                    <ul>

                                        <?php $__currentLoopData = $bundle->course_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                        $course = App\Course::where('id', $bundles)->first();
                                        ?>
                                        <?php if(isset($course)): ?>
                                        <li><i data-feather="check-circle"></i>
                                            <a href="#"><?php echo e($course['title']); ?></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($bundle->type == 1): ?>
                                        <?php if(Auth::check()): ?>
                                        <?php if(Auth::User()->role == "admin"): ?>
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary"
                                                title="course"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                        <?php else: ?>
                                        <?php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        ?>
                                        <?php if(!empty($order) && $order->status == 1): ?>
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary"
                                                title="course"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                        <?php else: ?>
                                        <?php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        ?>
                                        <?php if(!empty($cart)): ?>
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary"><?php echo e(__('Remove From Cart')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <?php else: ?>
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="<?php echo e(route('bundlecart', $bundle->id)); ?>" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>


                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                <input type="hidden" name="bundle_id" value="<?php echo e($bundle->id); ?>" />

                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary"><i data-feather="shopping-cart"></i><?php echo e(__('Add To Cart')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <div class="protip-btn">
                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php if(Auth::check()): ?>
                                        <?php if(Auth::User()->role == "admin"): ?>
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary"
                                                title="course"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                        <?php else: ?>
                                        <?php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        ?>
                                        <?php if($enroll == NULL): ?>
                                        <div class="protip-btn">
                                            <a href="<?php echo e(url('enroll/show',$bundle->id)); ?>" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i><?php echo e(__('Enroll Now')); ?></a>
                                        </div>
                                        <?php else: ?>
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary"
                                                title="Cart"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <div class="protip-btn">
                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i><?php echo e(__('Enroll Now')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>    
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('custom-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\viewmore\bundle.blade.php ENDPATH**/ ?>