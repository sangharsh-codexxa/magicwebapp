
<?php $__env->startSection('title', "Guest User"); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- course detail header start -->

<section id="gift-block" class="gift-main-block btm-60">
	<div class="container-xl">
		<div class="panel-body">
			
			<div class="row">
			

				<div class="col-lg-6">
          <h1 class="student-heading text-center top-30 btm-60"><?php echo e(__('Guest User Register')); ?></h1>

					<form id="demo-form2" method="post" action="<?php echo e(route('guest.checkout')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

              
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fname"><?php echo e(__('First Name')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="fname" id="<?php echo e(__('title')); ?>" placeholder="<?php echo e(__('Enter First Name')); ?>" value="<?php echo e(old('fname')); ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lname"><?php echo e(__('LastName')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="lname" id="<?php echo e(__('title')); ?>" placeholder="<?php echo e(__('EnterLastName')); ?>" value="<?php echo e(old('lname')); ?>"  required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email"><?php echo e(__('Email')); ?>:<sup class="redstar">*</sup></label>
                  <input type="email" value="" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" id="title" placeholder="Enter <?php echo e(__('Email')); ?>" value="<?php echo e(old('email')); ?>" required>
                </div>
              </div>
              
            </div>
           
            <br>
            <div class="box-footer">
             <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Guest Checkout')); ?></button>
            </div>
          </form>
          
				</div>



        <div class="col-lg-6">
          <h1 class="student-heading text-center top-30 btm-60"><?php echo e(__('Already registered')); ?></h1>
          <form method="POST" action="<?php echo e(route('guest.login')); ?>">
              <?php echo csrf_field(); ?>
           
              <div class="form-group">
                <label for="fname"><?php echo e(__('Email')); ?>:<sup class="redstar">*</sup></label>
                  <input id="email" type="email" class="form-control" placeholder="<?php echo e(__('Enter Your E-Mail')); ?>"  name="email"  required autofocus>

                  <?php if($errors->has('email')): ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                  <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="fname"><?php echo e(__('Password')); ?>:<sup class="redstar">*</sup></label>
                  <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Enter Your Password')); ?>" name="password" required>

                  <?php if($errors->has('password')): ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                  <?php endif; ?>
              </div>

              <br>
             

              <div class="box-footer">
                  <button type="submit" class="btn btn-lg btn-primary">
                      <?php echo e(__('Login')); ?>

                  </button>
             
              </div>
                      
          </form>
        </div>
			</div>
		</div>
	</div>
</section>

<!-- course detail end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\guest\guest_register.blade.php ENDPATH**/ ?>