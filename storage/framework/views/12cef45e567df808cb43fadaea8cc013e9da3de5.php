
<?php $__env->startSection('title', 'Profile & Setting'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="<?php echo e(__('course')); ?>" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Dashboard')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- profile update start -->
<section id="profile-item" class="profile-item-block">
    <div class="container-xl">
    	

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="dashboard-author-block text-center">
                    <div class="author-image">
					    <div class="avatar-upload">
					        
					        <div class="avatar-preview">
					        	<?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
						            <div class="avatar-preview-img" id="imagePreview" style="background-image: url(<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>);">
						            </div>
						        <?php else: ?>
						        	<div class="avatar-preview-img" id="imagePreview" style="background-image: url(<?php echo e(asset('images/default/user.jpg')); ?>);">
						            </div>
						        <?php endif; ?>
					        </div>
					    </div>
                    </div>
                    <div class="author-name"><?php echo e(Auth::User()->fname); ?>&nbsp;<?php echo e(Auth::User()->lname); ?></div>

                    <?php

            		$followers = App\Followers::where('user_id', '!=', $user->id)->where('follower_id', $user->id)->count();

            		$followings = App\Followers::where('user_id', $user->id)->where('follower_id','!=', $user->id)->count();

            		?>

                    <div class="instructor-follower">
                		<div class="followers-status">
                            <span class="followers-value"><?php echo e($followers); ?></span>
                            <span class="followers-heading">Followers</span>
                        </div>
                		<div class="following-status">
                            <span class="followers-value"><?php echo e($followings); ?></span>
                            <span class="followers-heading"><?php echo e(__('Following')); ?></span>
                        </div>
                    </div>

                </div>
                <div class="dashboard-items">
                    <ul>

                        <?php
                        $fullname = isset($user['fname']) . ' ' . isset($user['lname']);
                        $fullname = preg_replace('/\s+/', '', $fullname);
                        ?>

                        <li>
                            <i class="fa fa-bookmark"></i><a href="<?php echo e(route('instructor.profile', ['id' => $user->id, 'name' => $fullname] )); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('My Profile')); ?></a>
                        </li>

                        <li>
                            <i class="fa fa-bookmark"></i><a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><?php echo e(__('MyCourses')); ?></a>
                        </li>
                        
                        <li>
                            <i class="fa fa-heart"></i><a href="<?php echo e(route('get.affiliate')); ?>" title="<?php echo e(__('Marketing')); ?>"><?php echo e(__('Marketing')); ?></a>
                        </li>
                        
                        <li>
                            <i class="fa fa-bank"></i><a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('Settings')); ?>"><?php echo e(__('Settings')); ?></a>
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                    <?php echo csrf_field(); ?>
                                </form>   
                            </a>
                        </li>

                         
                    </ul>
                </div>
            </div>
            
            <div class="col-xl-9 col-lg-8">

            </div>
        </div>

    </div>
</section>
<!-- profile update end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
(function($) {
  "use strict";
	function readURL(input) {
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
	        $('#imagePreview').hide();
	        $('#imagePreview').fadeIn(650);
	    }
	    reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload").change(function() {
	    readURL(this);
	});
})(jQuery);
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\user_profile\dashboard.blade.php ENDPATH**/ ?>