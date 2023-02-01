
<?php $__env->startSection('title', '2FA'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?> 

<section id="business-home" class="business-home-main-block" >
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course"
            class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="bredcrumb-dtl">
                        <h1 class=""><?php echo e(__('Two Factor Authentication')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<?php endif; ?>
<!-- profile update start -->
<section id="profile-item" class="profile-item-block factor-page">

    <div class="container-xl">
        
        <div class="row">
            
                <div class="offset-md-2 col-md-8">

                    <h6><p><?php echo e(__('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.')); ?></p></h6>

                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(url('/verify-2fa')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label><?php echo e(__('Enter the pin from Google Authenticator app')); ?>: <span class="text-danger">*</span></label>
                                    <input required type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="password">

                                    <?php if($errors->any()): ?>
                                      <h6 class="text-danger alert alert-error"><?php echo e($errors->first()); ?></h6>
                                    <?php endif; ?>

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<span class="invalid-feedback text-danger" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                   

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">
                                        <?php echo e(__('Login')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\google2fa\verify.blade.php ENDPATH**/ ?>