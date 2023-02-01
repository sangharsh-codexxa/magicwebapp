<?php $__env->startSection('title', 'Coming Soon'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>

<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4">
               
            </div>
            <div class="col-lg-4">
                <div class="logo text-center btm-10">
                    <?php
                        $logo = App\Setting::first();
                    ?>

                    <?php if($logo->logo_type == 'L'): ?>
                        <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(asset('images/logo/'.$logo->logo)); ?>" class="img-fluid" alt="logo"></a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($logo->project_title); ?></div></b></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(auth()->guard()->guest()): ?>
            <div class="col-lg-4">
                <div class="Login-btn txt-rgt">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary" title="<?php echo e(__('login')); ?>">
                        <?php echo e(__('Login')); ?>

                    </a>
                </div> 
            </div>
            <?php endif; ?>
            
            <?php if(auth()->guard()->check()): ?>
            <div class="col-lg-4">
                <div class="Login-btn txt-rgt">
                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-secondary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    
                        <?php echo e(__('Logout')); ?>

                        
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    
                    </a>
                </div> 
            </div>  
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(isset($data)): ?>
<!-- top-nav bar start-->
<section id="comimg-soon" class="coming-soon-main-block" style="background-image: url('<?php echo e(asset('images/comingsoon/'.$data->bg_image)); ?>')">
    <div class="overlay-bg"></div>
    <div class="container-xl">
      
        <div class="coming-soon-block">
            <h1 class="comming-soon-heading text-white text-center btm-40"> <?php echo e($data->heading); ?> </h1>
            <div class="facts-dtl-block btm-40">
                <div class="row">
                    <div class="offset-lg-2 col-lg-2 col-md-3 col-sm-6 col-6">
                        <div class="facts-block text-center btm-20">
                            <h1 class="facts-heading counter text-white"><?php echo e($data->count_one); ?></h1>
                            <div class="facts-dtl text-white"><?php echo e($data->text_one); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <div class="facts-block text-center btm-20">
                            <h1 class="facts-heading counter text-white"><?php echo e($data->count_two); ?></h1>
                            <div class="facts-dtl text-white"><?php echo e($data->text_two); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <div class="facts-block text-center btm-20">
                            <h1 class="facts-heading counter text-white"><?php echo e($data->count_three); ?></h1>
                            <div class="facts-dtl text-white"><?php echo e($data->text_three); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <div class="facts-block text-center btm-20">
                            <h1 class="facts-heading counter text-white"><?php echo e($data->count_four); ?></h1>
                            <div class="facts-dtl text-white"><?php echo e($data->text_four); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($data->btn_text)): ?>
            <div class="nav-bar-btn btm-20 text-center">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary" title="<?php echo e(__('instructor')); ?>"><?php echo e($data->btn_text); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- top-nav bar end-->
<?php endif; ?>

<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> <?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\coming_soon\show.blade.php ENDPATH**/ ?>