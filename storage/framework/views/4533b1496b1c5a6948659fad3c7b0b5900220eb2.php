
<?php $__env->startSection('title', 'All deals'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('meta_tags'); ?>

<link rel="canonical" href="<?php echo e(url()->full()); ?>" />
<meta name="robots" content="all">
<meta property="og:title" content="<?php echo e(__("All deals")); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo e(url()->full()); ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
<?php $__env->stopSection(); ?>
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
                        <h1 class="wishlist-home-heading text-white"><?php echo e(__('Home')); ?> / <a href="<?php echo e(route('flash.deals')); ?>"><?php echo e(__('Flash deals')); ?></a> / <a href="<?php echo e(url()->full()); ?>"><?php echo e($deal->title); ?></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<section id="flash-home" class="flash-home-main-block">
<div class="container-xl">
    <div class="test">


        <?php
            $mytime = Carbon\Carbon::now();
        ?>

        <?php if($mytime <= $deal->end_date): ?>

            <div class="flash-countdown bg_image_deal">

            

                <div class="countdown-deal">
                    <p class="text-center"><?php echo e(__("Sale ends in ")); ?></p>
                    <div id="countdown">
                        <ul>
                            <li class="text-shadow"><span class="text-white" id="days"></span><span class="text-white text-20">days</span></li>
                            <li class="text-shadow"><span class="text-white" id="hours"></span><span class="text-white text-20"> hours</span></li>
                            <li class="text-shadow"><span class="text-white" id="minutes"></span><span class="text-white text-20"> minutes</span></li>
                            <li class="text-shadow"><span class="text-white" id="seconds"></span><span class="text-white text-20">seconds</span></li>
                        </ul>
                    </div>
                </div>


                
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $deal->saleitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="mt-2 col-xl-3 col-lg-4 col-md-6">
                        <div class="h-100 card">
                            <?php if(isset($item->courses)): ?>
                                
                                <center>
                                    <?php if(isset($item->courses->preview_image)): ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $item->courses->id, 'slug' => $item->courses->slug ])); ?>">

                                        <img src="<?php echo e(asset('images/course/'.$item->courses['preview_image'])); ?>" class="img-fluid owl-lazy" alt="...">
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $item->courses->id, 'slug' => $item->courses->slug ])); ?>">

                                        <img src="<?php echo e(Avatar::create($item->courses->title)->toBase64()); ?>" class="img-fluid owl-lazy" alt="..." style="width: 100%">
                                    </a>

                                    <?php endif; ?>
                                </center>
                                <div class="card-body">
                                   
                                        <div class="card-title">
                                            <a class="text-dark" href="<?php echo e(route('user.course.show',['id' => $item->courses->id, 'slug' => $item->courses->slug ])); ?>">
                                                <?php echo e($item->courses->title); ?>

                                            </a>
                                        </div>

                                        
                                        <p class="details">
                                            <?php echo e(substr(strip_tags($item->courses->detail), 0, 90)); ?><?php echo e(strlen(strip_tags($item->courses->detail))>90 ? '...' : ""); ?>

                                        </p>

                                        <h5>Discount : <?php echo e($item->discount); ?>% (<?php echo e($item->discount_type); ?>)</h5>
                                        <hr>
                                        <div class="flash-deal-price">
                                            <?php

                                                $mainprice = 0;

                                            

                                                if($item->courses->discount_price != '0'){
                                                    
                                                
                                                    echo sprintf("%.2f",$item->courses->discount_price);

                                                }else{
                                                    
                                                
                                                    echo sprintf("%.2f",$item->courses->price);

                                                }

                                                $sellprice = $item->courses->discount_price != 0 ? $item->courses->discount_price : $item->courses->price;

                                                $discount = $item->discount;

                                                $discount_type = $item->discount_type;

                                                $discounted_amount = 0;

                                                if($discount_type == 'upto'){

                                                    $random_no = rand(0,$discount);
                                                    
                                                    $discounted_amount = $sellprice * $random_no / 100;

                                                }else{

                                                    $discounted_amount = $sellprice * $discount / 100;

                                                }

                                                $deal_price = $sellprice - $discounted_amount;

                                            ?>
                                        </div>
                                        <form action="<?php echo e(route('addtocart',['course_id' => $item->courses->id, 'price' => $sellprice, 'discount_price' => $deal_price ])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-md btn-primary">
                                                <i data-feather="shopping-cart"></i> <?php echo e(__("Add to cart")); ?>

                                            </button>
                                        </form>
                                </div>
                            <?php else: ?>
                                <center>
                                    <a href="<?php echo e(route('user.course.show',['id' => $item->courses->id, 'slug' => $item->courses->slug ])); ?>">

                                        <img width="100px" src="<?php echo e(asset('images/course/'.$item->courses['preview_image'])); ?>" class="mt-2" alt="...">
                                    </a>
                                </center>
                                <div class="card-body">
                                    <div class="card-title">
                                        <a class="text-dark" href="<?php echo e(route('user.course.show',['id' => $item->courses->id, 'slug' => $item->courses->slug ])); ?>"></a>
                                    </div>

                                    <p>
                                        <?php echo e(substr(strip_tags($item->courses->detail), 0, 100)); ?><?php echo e(strlen(strip_tags($item->courses->detail))>100 ? '...' : ""); ?>

                                    </p>

                                    <h5>Discount : <?php echo e($item->discount); ?>% (<?php echo e($item->discount_type); ?>)</h5>
                                    <hr>
                                        <?php

                                            $mainprice = 0;


                                            if($item->courses->discount_price != '0'){
                                              
                                                echo sprintf("%.2f",$item->courses->discount_price);

                                            }else{
                                               
                                                echo sprintf("%.2f",$item->courses->price);

                                            }

                                            $sellprice = $item->courses->discount_price != 0 ? $item->courses->discount_price : $item->courses->price;

                                            $discount = $item->discount;

                                            $discount_type = $item->discount_type;

                                            $discounted_amount = 0;

                                            if($discount_type == 'upto'){

                                                $random_no = rand(0,$discount);
                                                
                                                $discounted_amount = $sellprice * $random_no / 100;

                                            }else{

                                                $discounted_amount = $sellprice * $discount / 100;

                                            }

                                            $deal_price = $sellprice - $discounted_amount;

                                        ?>
                                        
                                        <div class="card-body">
                                            <form action="<?php echo e(route('addtocart',['course_id' => $item->courses->id, 'price' => $sellprice, 'discount_price' => $deal_price ])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                             
                                                <button class="btn btn-md btn-primary">
                                                    <i class="fa fa-cart-plus"></i> <?php echo e(__("Add to cart")); ?>

                                                </button>
                                            </form>
                                        </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="col-md-12">
                        <h4 class="text-center">
                            <?php echo e(__("No products found !")); ?>

                        </h4>
                    </div>
                        
                    <?php endif; ?>
                   
                </div>
                <div>
                    <div class="flash-deals-details">
                        <?php echo $deal->detail; ?>

                    </div>
                </div>


            </div>

        <?php else: ?>
        
            <section id="search-block" class="search-main-block search-block-no-result text-center">
                <div class="container-xl">
                    <div class="no-result-courses btm-10"><?php echo e(__('Flash Deal Ends')); ?></div>
                    <div class="recommendation-btn text-white text-center">
                        <a href="<?php echo e(route('flash.deals')); ?>" class="btn btn-primary" title="search"><b><?php echo e(__('Browse More Deals')); ?></b></a>
                    </div> 
                </div>
            </section>

        <?php endif; ?>
        
    </div>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
    (function () {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let birthday = "<?php echo e(date('M d, Y h:i:s',strtotime($deal->end_date))); ?>",
            countDown = new Date(birthday).getTime(),
            x = setInterval(function () {

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                    let headline = document.getElementById("headline"),
                        countdown = document.getElementById("countdown"),
                        content = document.getElementById("content");

                    headline.innerText = "It's my birthday!";
                    countdown.style.display = "none";
                    content.style.display = "block";

                    clearInterval(x);
                }
                //seconds
            }, 0)
    }());
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\flashdeal\viewdeal.blade.php ENDPATH**/ ?>