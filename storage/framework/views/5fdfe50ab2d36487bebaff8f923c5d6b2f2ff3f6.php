
<?php $__env->startSection('title', "$bbl->meetingname"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('meta_tags'); ?>

<?php
    $url =  URL::current();
?>

<meta name="title" content="<?php echo e($bbl['meetingname']); ?>">
<meta name="description" content="<?php echo e($bbl['detail']); ?> ">
<meta name="author" content="elsecolor">
<meta property="og:title" content="<?php echo e($bbl['meetingname']); ?>">
<meta property="og:url" content="<?php echo e($url); ?>">
<meta property="og:description" content="<?php echo e($bbl['detail']); ?>">
<meta property="og:image" content="<?php echo e(Avatar::create($bbl['meetingname'])->toBase64()); ?>">
<meta itemprop="image" content="<?php echo e(Avatar::create($bbl['meetingname'])->toBase64()); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(Avatar::create($bbl['meetingname'])->toBase64()); ?>">
<meta property="twitter:title" content="<?php echo e($bbl['meetingname']); ?> ">
<meta property="twitter:description" content="<?php echo e($bbl['detail']); ?>">
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
                    <h1 class="about-home-heading text-white"><?php echo e($bbl['meetingname']); ?></h1>
                    <ul>
                       
                    <ul>
                        <li><a href="#" title="about"><?php echo e(__('Created')); ?>: <?php echo e($bbl->user['fname']); ?> </a></li>
                        <li><a href="#" title="about">Start At: <?php echo e(date('d-m-Y | h:i:s A',strtotime($bbl['start_time']))); ?></a></li>
                        
                    </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4">
                
                
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                       
                        <div class="video-device">
                            <img src="<?php echo e(Avatar::create($bbl['meetingname'])->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                        </div>
                    </div>
               
                     
                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">

                            <?php if(Auth::check()): ?>
                        
                                <div class="about-home-btn btm-20">
                                    <a href="" data-toggle="modal" data-target="#myModalBBL" title="join" class="btn btn-secondary" title="course"><?php echo e(__('Join Meeting')); ?></a>
                                </div>


                            <?php else: ?>

                                <div class="about-home-btn btm-20">

                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary"><?php echo e(__('Join Meeting')); ?></a>

                                </div>

                            <?php endif; ?>

                            <div class="modal fade" id="myModalBBL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			                    <div class="modal-dialog modal-lg" role="document">
			                      <div class="modal-content">
			                        <div class="modal-header">

			                          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Join Meeting')); ?></h4>
			                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                        </div>
			                        <div class="box box-primary">
			                          <div class="panel panel-sum">
			                            <div class="modal-body">

                                            
			                                 
                                             <form action="<?php echo e(route('bbl.api.join')); ?>" method="POST">
                                                 <?php echo csrf_field(); ?>

                                                <div class="form-group"> 
                                                    <label><?php echo e(__('Meeting ID')); ?>:</label>
                                                    <input readonly="" type="text" name="meetingid" value="<?php echo e($bbl['meetingid']); ?>" class="form-control">
                                                </div>

                                                <div class="form-group"> 
                                                    <label><?php echo e(__('Your Name')); ?>:</label>
                                                    <input value="<?php echo e(old('name')); ?>" type="text" required="" name="name" placeholder="<?php echo e(__('Enter your name')); ?>" class="form-control">
                                                </div>

                                                <div class="form-group"> 
                                                    <label><?php echo e(__('Meeting Password')); ?>:</label>
                                                    <input type="password" name="password" placeholder="<?php echo e(__('Enter meeting password')); ?>" class="form-control" required="">
                                                </div>

                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    + <?php echo e(__('Start')); ?>

                                                </button>

                                             </form>
			                            
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
                    <h3><?php echo e(__('Detail')); ?></h3>
                    <ul>
                        <li class="comment more">
                           
                           <?php echo $bbl->detail; ?>

                           
                        </li>
                       
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\bbl_detail.blade.php ENDPATH**/ ?>