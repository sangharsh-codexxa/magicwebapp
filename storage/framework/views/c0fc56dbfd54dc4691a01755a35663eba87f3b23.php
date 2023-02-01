<?php $__env->startSection('title', 'Login'); ?>
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end head -->
<!-- body start-->
<body>
<!-- top-nav bar start-->

<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12">
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
        </div>
    </div>
</section>

<section id="ip-block" class="ip-block-main-block text-center">
	<div class="container-xl">
		<div class="logout-device-block">
			<div class="signup-block">

				<h2>IP BLOCKED</h2>


				<?php
					$ip = $_SERVER['REMOTE_ADDR'];
				?>

				<?php echo e($ip); ?>

                
                          
		    </div>
    	</div>
	</div>
</section>
<!--  Signup end-->
<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 






<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\ipblock.blade.php ENDPATH**/ ?>