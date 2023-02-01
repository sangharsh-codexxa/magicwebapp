
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
                        <h1 class="wishlist-home-heading"><?php echo e(__('User Profile')); ?></h1>
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
    	<form action="<?php echo e(route('verifaction.store')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo e(csrf_field()); ?>

	        <div class="row">
	            <div class="col-xl-3 col-lg-4 col-md-4">
	                <div class="dashboard-author-block text-center">
	                    <div class="author-image">
						    <div class="avatar-upload">
						        <div class="avatar-edit">
						            <!-- <input type='file' id="imageUpload" name="user_img" accept=".png, .jpg, .jpeg" /> -->
						            <!-- <label for="imageUpload"><i class="fa fa-pencil"></i></label> -->
						        </div>
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
	                </div>
	                <div class="dashboard-items">
	                    <ul>
	                        <li>
								<i class="fa fa-bookmark"></i>
								<a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><?php echo e(__('My Courses')); ?></a>
							</li>
	                        <li>
								<i class="fa fa-heart"></i>
								<a href="<?php echo e(route('wishlist.show')); ?>" title="<?php echo e(__('My wishlist')); ?>"><?php echo e(__('My Wishlist')); ?></a>
							</li>
	                        <li>
								<i class="fa fa-history"></i>
								<a href="<?php echo e(route('purchase.show')); ?>" title="<?php echo e(__('Purchase History')); ?>"><?php echo e(__('Purchase History')); ?></a>
							</li>
	                        <li>
								<i class="fa fa-user"></i>
								<a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('User Profile')); ?>"><?php echo e(__('User Profile')); ?></a>
							</li>
	                        <?php if(Auth::User()->role == "user"): ?>
	                        <li>
								<i class="fas fa-chalkboard-teacher"></i>
								<a href="#" data-toggle="modal" data-target="#myModalinstructor" title="<?php echo e(__('Become An Instructor')); ?>"><?php echo e(__('Become An Instructor')); ?></a>
							</li>
	                        <?php endif; ?>
	                        <li>
								<i class="fa fa-bank"></i>
								<a href="<?php echo e(url('bankdetail')); ?>" title="<?php echo e(__('My Bank Details')); ?>"><?php echo e(__('My Bank Details')); ?></a>
							</li>

	                        <li>
								<i class="fa fa-check"></i>
								<a href="<?php echo e(route('2fa.show')); ?>" title="<?php echo e(__('2 Factor Auth')); ?>"><?php echo e(__('2 Factor Auth')); ?></a>
							</li>

							<li>
								<i class="fa fa-check"></i>
								<a href="<?php echo e(route('verifaction')); ?>" title="<?php echo e(__('Verifaction')); ?>"><?php echo e(__('Verifaction')); ?></a>
							</li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-xl-9 col-lg-8 col-md-8">

	                <div class="social-profile-block">
	                    <div class="social-profile-heading"><?php echo e(__('Verification')); ?></div>
                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="document_detail"><?php echo e(__('Document Details')); ?>:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="document_detail" value="<?php echo e($users->document_detail?$users->document_detail:''); ?>" id="title" placeholder="<?php echo e(__('Document Details')); ?>"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="bank_name"><?php echo e(__('Document File')); ?>:<sup class="redstar">*</sup></label>
                                <input type="file" class="form-control" name="document_file" id="title" required>
                                </div>
                            </div>
                            </div>
	                </div>

	                <div class="upload-items text-right">
	                    <button type="submit" class="btn btn-primary" title="upload items"><?php echo e(__('Verify')); ?></button>
	                </div>
	                
	            </div>
	        </div>

        </form>
    </div>
</section>
<!-- profile update end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
(function($) {
  "use strict";
  $(function() {
    var urlLike = '<?php echo e(url('country/dropdown')); ?>';
    $('#country_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });
  })(jQuery);

</script>

<script>
(function($) {
  "use strict";
  $(function() {
    var urlLike = '<?php echo e(url('country/gcity')); ?>';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });
  })(jQuery);

</script>

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

<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("update-password");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
       text.style.display = "none";
    }
  }
</script>

<script>
(function($) {
  "use strict";
	$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
	    $('#message').html('Password Match').css('color', 'green');
	  } else 
	    $('#message').html('Password Do Not Match').css('color', 'red');
	});
})(jQuery);

</script>

<script>
(function($) {
  "use strict";
	tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\user_profile\verification.blade.php ENDPATH**/ ?>