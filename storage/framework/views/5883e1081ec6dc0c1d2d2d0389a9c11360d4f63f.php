
<?php $__env->startSection('title', "$jitsimeet->meeting_title"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white"><?php echo e($jitsimeet['meeting_title']); ?></h1>
                    <ul>
                       
                    <ul>
                    <li><a href="#" title="about"></a></li>

                    
                    <li><a href="#" title="about"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($jitsimeet['start_time']))); ?></a></li>
                    
                    </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4">
                
                
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                       
                        <div class="video-device">
                                <?php if($jitsimeet['image'] !== NULL && $jitsimeet['image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/jitsimeet/'.$jitsimeet['image'])); ?>" class="bg_img img-fluid" alt="Background">
                                <?php else: ?>
                                <img src="<?php echo e(Avatar::create($jitsimeet['meeting_title'])->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                                <?php endif; ?>
                        </div>
                    </div>
               
                     
                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                        
                            <div class="about-home-btn btm-20">
                                <a href="<?php echo e(url('meetup-conferencing/'.$jitsimeet->meeting_id)); ?>" target="_blank" class="btn btn-secondary"><?php echo e(__('Join Meeting')); ?></a>
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
                        <?php echo $jitsimeet->agenda; ?> 
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\jitsimeet_detail.blade.php ENDPATH**/ ?>