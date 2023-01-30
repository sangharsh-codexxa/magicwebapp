
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(! $bestselling->isEmpty() && $hsetting->bestselling_enable && isset($bestselling) && count($bestselling) > 0 ): ?>
<div class="student-view-slider-main-block view-more-pages">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = $bestselling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            <?php if($best->courses->status == 1 ): ?>
            <div class="col-lg-3">
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>"
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block<?php echo e($best->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <?php if($best->courses['preview_image'] !== NULL && $best->courses['preview_image'] !== ''): ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$best->courses['preview_image'])); ?>" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                <?php else: ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"><img
                                        src="<?php echo e(Avatar::create($best->title)->toBase64()); ?>" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                <?php endif; ?>
                            </div>
                            <div class="advance-badge">
                                <?php if($best->courses['level_tags'] == !NULL): ?>
                                <span class="badge bg-primary"><?php echo e($best->courses['level_tags']); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="view-user-img">
                                <?php if($best->courses->user['user_img'] !== NULL && $best->courses->user['user_img'] !== ''): ?>
                                <a href="" title=""><img src="<?php echo e(asset('images/user_img/'.$best->courses->user['user_img'])); ?>" class="img-fluid user-img-one" alt=""></a>
                                <?php else: ?>
                                <a href="" title=""><img src="<?php echo e(asset('images/default/user.png')); ?>" class="img-fluid user-img-one" alt=""></a>
                                <?php endif; ?>
                                
                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="<?php echo e(route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"><?php echo e(str_limit($best->courses->title, $limit = 30, $end = '...')); ?></a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><?php echo e(optional($best->courses->user)['fname']); ?></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <?php 
                                                $learn = 0;
                                                $price = 0;
                                                $value = 0;
                                                $sub_total = 0;
                                                $sub_total = 0;
                                                $reviews = App\ReviewRating::where('course_id',$best->courses->id)->get();
                                                ?>
                                            <?php if(!empty($reviews[0])): ?>
                                            <?php
                                                $count =  App\ReviewRating::where('course_id',$best->courses->id)->count();

                                                foreach($reviews as $review){
                                                    $learn = $review->price*5;
                                                    $price = $review->price*5;
                                                    $value = $review->value*5;
                                                    $sub_total = $sub_total + $learn + $price + $value;
                                                }

                                                $count = ($count*3) * 5;
                                                $rat = $sub_total/$count;
                                                $ratings_var = ($rat*100)/5;
                                                ?>

                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span
                                                        style="width:<?php echo $ratings_var; ?>%"
                                                        class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>


                                            <?php else: ?>
                                            <div class="pull-left"><?php echo e(__('No Rating')); ?></div>
                                            <?php endif; ?>
                                        </li>
                                        <!-- overall rating-->
                                        <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $count =  count($reviews);
                                            $onlyrev = array();

                                            $reviewcount = App\ReviewRating::where('course_id', $best->courses->id)->WhereNotNull('review')->get();

                                            foreach($reviews as $review){

                                                $learn = $review->learn*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                                
                                            if($count != "")
                                            {
                                                $rat = $sub_total/$count;
                                            
                                                $ratings_var = ($rat*100)/5;
                                        
                                                $overallrating = ($ratings_var/2)/10;
                                            }
                                                
                                            ?>

                                        <?php
                                        $reviewsrating = App\ReviewRating::where('course_id', $best->courses->id)->first();
                                        ?>
                                        <?php if(!empty($reviewsrating)): ?>
                                        <!-- <li>
                                                <b><?php echo e(round($overallrating, 1)); ?></b>
                                            </li> -->
                                        <?php endif; ?>
                                        <li class="reviews">
                                            (<?php
                                            $data = App\ReviewRating::where('course_id', $best->courses->id)->count();
                                            if($data>0){

                                            echo $data;
                                            }
                                            else{

                                            echo "0";
                                            }
                                            ?> Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    <?php
                                                    $data = App\Order::where('course_id', $best->courses->id)->count();
                                                    if(($data)>0){

                                                    echo $data;
                                                    }
                                                    else{

                                                    echo "0";
                                                    }
                                                    ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <?php if( $best->courses->type == 1): ?>
                                            <div class="rate text-right">
                                                <ul>

                                                    <?php if($best->courses->discount_price == !NULL): ?>

                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($best->courses['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                                    </li>

                                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($best->courses['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) )); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strike></b></a>
                                                    </li>


                                                    <?php else: ?>

                                                    <?php if($c->price == !NULL): ?>
                                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($best->courses['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) )); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                                    </li>
                                                    <?php endif; ?>

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
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($best['title']); ?>"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                            <?php if(Auth::check()): ?>

                                            <li class="protip-wish-btn"><a class="compare" data-id="<?php echo e(filter_var($best->id)); ?>"
                                                    title="compare"><i data-feather="bar-chart"></i></a></li>

                                            <?php
                                            $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',$best->courses->id)->first();
                                            ?>
                                            <?php if($wish == NULL): ?>
                                            <li class="protip-wish-btn">
                                                <form id="demo-form2" method="post"
                                                    action="<?php echo e(url('show/wishlist', $best->courses->id)); ?>" data-parsley-validate
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id" value="<?php echo e($best->courses->id); ?>" />

                                                    <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                            data-feather="heart"></i></button>
                                                </form>
                                            </li>
                                            <?php else: ?>
                                            <li class="protip-wish-btn-two">
                                                <form id="demo-form2" method="post"
                                                    action="<?php echo e(url('remove/wishlist', $best->courses->id)); ?>" data-parsley-validate
                                                    class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                    <input type="hidden" name="course_id" value="<?php echo e($best->courses->id); ?>" />

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
                    <div id="prime-next-item-description-block<?php echo e($best->courses->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($best->courses['title']); ?></h5>
                                <div class="main-des">
                                    <p>Last Updated: <?php echo e(date('jS F Y', strtotime($best->courses->updated_at))); ?></p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            <?php echo e(__('Classes')); ?>:
                                            <?php
                                            $data = App\CourseClass::where('course_id', $best->courses->id)->count();
                                            if($data > 0){

                                            echo $data;
                                            }
                                            else{

                                            echo "0";
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                    <?php

                                                    $classtwo = App\CourseClass::where('course_id',
                                                    $best->courses->id)->sum("duration");

                                                    ?>
                                                    <?php echo e($classtwo); ?> <?php echo e(__('Minutes')); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                            <?php if($best->courses['language_id'] == !NULL): ?>
                                            <?php if(isset($best->courses->language)): ?>
                                            <i data-feather="globe"></i> <?php echo e($best->courses->language['name']); ?>

                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                </ul>

                                <div class="product-main-des">
                                    <p><?php echo e($best->courses->short_detail); ?></p>
                                </div>
                                <div>
                                    <?php if($best->courses->whatlearns->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $best->courses->whatlearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($wl->status ==1): ?>
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i><?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?>

                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php if($best->courses->type == 1): ?>
                                            <?php if(Auth::check()): ?>
                                            <?php if(Auth::User()->role == "admin"): ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"
                                                    class="btn btn-secondary"
                                                    title="course"><?php echo e(__('Go To Course')); ?></a>
                                            </div>
                                            <?php else: ?>
                                            <?php
                                            $order = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                            $best->courses->id)->first();
                                            ?>
                                            <?php if(!empty($order) && $order->status == 1): ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"
                                                    class="btn btn-secondary"
                                                    title="course"><?php echo e(__('Go To Course')); ?></a>
                                            </div>
                                            <?php else: ?>
                                            <?php
                                            $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id',
                                            $best->courses->id)->first();
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
                                                    action="<?php echo e(route('addtocart',['course_id' => $best->courses->id, 'price' => $best->courses->price, 'discount_price' => $best->courses->discount_price ])); ?>"
                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="category_id"
                                                        value="<?php echo e($best->category['id'] ?? '-'); ?>" />

                                                    <div class="box-footer">
                                                        <button type="submit"
                                                            class="btn btn-primary"><?php echo e(__('Add To Cart')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <?php if($gsetting->guest_enable == 1): ?>
                                            <form id="demo-form2" method="post" action="<?php echo e(route('guest.addtocart', $best->courses->id)); ?>" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></button>
                                                </div>
                                            </form>
                                            <?php else: ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <?php if(Auth::check()): ?>
                                            <?php if(Auth::User()->role == "admin"): ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"
                                                    class="btn btn-secondary"
                                                    title="course"><?php echo e(__('Go To Course')); ?></a>
                                            </div>
                                            <?php else: ?>
                                            <?php
                                            $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                            $best->courses->id)->first();
                                            ?>
                                            <?php if($enroll == NULL): ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(url('enroll/show',$best->courses->id)); ?>" class="btn btn-primary"
                                                    title="Enroll Now"><i data-feather="shopping-cart"></i><?php echo e(__('Enroll Now')); ?></a>
                                            </div>
                                            <?php else: ?>
                                            <div class="protip-btn">
                                                <a href="<?php echo e(route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ])); ?>"
                                                    class="btn btn-secondary"
                                                    title="Cart"><?php echo e(__('Go To Course')); ?></a>
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
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                        <?php if(Auth::check()): ?>

                                                        <?php
                                                        $wish = App\Wishlist::where('user_id',
                                                        Auth::User()->id)->where('course_id', $best->courses->id)->first();
                                                        ?>
                                                        <?php if($wish == NULL): ?>
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('show/wishlist', $best->courses->id)); ?>"
                                                                data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($best->courses->id); ?>" />

                                                                <button class="wishlisht-btn" title="Add to wishlist"
                                                                    type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        <?php else: ?>
                                                        <li class="protip-wish-btn-two">
                                                            <form id="demo-form2" method="post"
                                                                action="<?php echo e(url('remove/wishlist', $best->id)); ?>"
                                                                data-parsley-validate
                                                                class="form-horizontal form-label-left">
                                                                <?php echo e(csrf_field()); ?>


                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e(Auth::User()->id); ?>" />
                                                                <input type="hidden" name="course_id" value="<?php echo e($best->courses->id); ?>" />

                                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                                    type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                        <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>"
                                                                title="heart"><i data-feather="heart"></i></a></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
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
    </div>    
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('custom-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/front/viewmore/bestselling.blade.php ENDPATH**/ ?>