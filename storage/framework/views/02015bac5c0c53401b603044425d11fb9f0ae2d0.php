
<?php $__env->startSection('title', "$zoom->meeting_title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('meta_tags'); ?>

<?php
    $url =  URL::current();
?>

<meta name="title" content="<?php echo e($zoom['meeting_title']); ?>">
<meta name="description" content="<?php echo e($zoom['agenda']); ?> ">
<meta name="author" content="elsecolor">
<meta property="og:title" content="<?php echo e($zoom['meeting_title']); ?> ">
<meta property="og:url" content="<?php echo e($url); ?>">
<meta property="og:description" content="<?php echo e($zoom['agenda']); ?>">
<meta property="og:image" content="<?php echo e(asset('images/zoom/'.$zoom['image'])); ?>">
<meta itemprop="image" content="<?php echo e(asset('images/zoom/'.$zoom['image'])); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(asset('images/zoom/'.$zoom['image'])); ?>">
<meta property="twitter:title" content="<?php echo e($zoom['meeting_title']); ?> ">
<meta property="twitter:description" content="<?php echo e($zoom['agenda']); ?>">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
<link rel="canonical" href="<?php echo e(url()->full()); ?>"/>
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
    

<?php $__env->stopSection(); ?>
<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white"><?php echo e($zoom['meeting_title']); ?></h1>
                    <ul>
                       
                    <ul>
                        <li><a href="#" title="about"><?php echo e(__('Created')); ?>: <?php echo e($zoom->user['fname']); ?> </a></li>

                        <?php if($zoom->type != '3'): ?>
                        <li><a href="#" title="about"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($zoom['start_time']))); ?></a></li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4">
                
                
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                       
                        <div class="video-device">
                            <?php if($zoom['image'] !== NULL && $zoom['image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/zoom/'.$zoom['image'])); ?>" class="bg_img img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($zoom['meeting_title'])->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                            <?php endif; ?>
                        </div>
                    </div>
               
                     
                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                        
                            <div class="about-home-btn btm-20">
                                <a href="<?php echo e($zoom->zoom_url); ?>" class="iframe btn btn-secondary"><?php echo e(__('Join Meeting')); ?></a>
                            </div>

                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- course header end -->
<!-- course detail start -->
<section id="about-product" class="about-product-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="requirements">
                    <h3><?php echo e(__('Agenda')); ?></h3>
                    <ul>
                        <li class="comment more">
                           
                           <?php echo $zoom->agenda; ?>

                           
                        </li>
                       
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script src="<?php echo e(url('js/colorbox-script.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\zoom_detail.blade.php ENDPATH**/ ?>