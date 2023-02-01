
<?php $__env->startSection('title', 'Refund'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section id="refund-block" class="refund-main-block">
	<div class="container-xl">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-4">
					<?php if($order->courses['preview_image'] !== NULL && $order->courses['preview_image'] !== ''): ?>
                    	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'. $order->courses->preview_image)); ?>" class="img-fluid" alt="course"></a>
                    <?php else: ?>
                    	<a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($order->courses->title)->toBase64()); ?>" class="img-fluid" alt="course"></a>
                    <?php endif; ?>
                    <br>
                    <br>
                    <div class="purchase-history-course-title">
                        <a href="<?php echo e(route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ])); ?>"><?php echo e($order->courses->title); ?></a>
                    </div>

                    
				</div>
				<div class="col-lg-8">


					<div class="refund-policy">
						<ul>
							<?php if($gsetting['currency_swipe'] == 1): ?>
								<li><b><?php echo e(__('Order price')); ?></b>: <i class="<?php echo e($order['currency_icon']); ?>"></i> <?php echo e($order->total_amount); ?></li>
							<?php else: ?>
								<li><b><?php echo e(__('Order price')); ?></b>: <?php echo e($order->total_amount); ?><i class="<?php echo e($order['currency_icon']); ?>"></i> </li>
							<?php endif; ?>
							
							<li><b><?php echo e(__('Refund Policy')); ?></b>: <?php echo $policy->detail; ?></li>
						</ul>
					</div>
					<br>
					<h5 class=""><?php echo e(__('Refund Request')); ?></h5>


                    <?php
                        $order_id = Crypt::encrypt($order->id);
                    ?>


                    <form action="<?php echo e(route('refund.request',$order_id)); ?>" method="POST" enctype="multipart/form-data">
		        	<?php echo e(csrf_field()); ?>

		            <?php echo e(method_field('POST')); ?>



		            	<input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
					    <input type="hidden" name="course_id"  value="<?php echo e($order->courses->id); ?>" />
					    <input type="hidden" name="course_id"  value="<?php echo e($order->order_id); ?>" />
					    <input type="hidden" name="ammount"  value="<?php echo e($order->total_amount); ?>" />
					    <input type="hidden" name="payment_method"  value="<?php echo e($order->payment_method); ?>" />

	                    <div class="form-group">
	                        <label for="name"><?php echo e(__('Reason')); ?></label>
	                        <input type="text" id="reason" name="reason" class="form-control" placeholder="Enter Reason" required>
	                    </div>

	                    <div class="form-group">
	                        <label for="bio"><?php echo e(__('Detail')); ?></label>
	                        <textarea id="detail" name="detail" rows="4" class="form-control" placeholder="Enter Detail" value="" required></textarea>
	                    </div>


	                    <div class="form-group">
	                        <label for="bio"><?php echo e(__('Refund Mode')); ?></label>
	                        <select id="refund_mode" class="form-control js-example-basic-single" name="refund_mode" required>
		                       	<option value="none" selected disabled hidden> 
			                      <?php echo e(__('SelectanOption')); ?>

			                    </option>
			                    <?php if($order->payment_method == 'PayPal' || $order->payment_method == 'Stripe' ||  $order->payment_method == 'Paystack' || $order->payment_method == 'Instamojo' ||  $order->payment_method == 'PayTM' || $order->payment_method == 'RazorPay' ): ?>
			                    <option value="original"><?php echo e(__('Orginal Source')); ?></option>
			                    <?php endif; ?>
			                    <option value="bank"><?php echo e(__('Bank')); ?></option>
			                </select>
	                    </div>


	                    <?php

	                    $user_bank = App\UserBankDetail::where('user_id', Auth::user()->id)->get();

	                    ?>


	                    <?php if(isset($user_bank)): ?>


	                     <div class="display-none" id="bank_box">

		                    <div class="form-group" style="width: 100%">
		                        <label for="bio"><?php echo e(__('Select Bank')); ?></label>
		                        <select style="width: 100%" id="bank_id" class="form-control js-example-basic-single" name="bank_id">
			                       	<option value="none" selected disabled hidden> 
				                      <?php echo e(__('Select anO ption')); ?>

				                    </option>

				                    <?php $__currentLoopData = $user_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                    
				                    <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bank_name); ?></option>

				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    
				                </select>
		                    </div>
		                </div>

		                <?php else: ?>


		                <div class="alert alert-danger" role="alert">
		                    <?php echo e(__('You have not added your your bank details in your profile')); ?> 
		                </div>


		                <?php endif; ?>

	                    <div class="mark-read-button txt-rgt">
                            <button type="submit" class="btn btn-md btn-primary">
                                <?php echo e(__('Refund Request')); ?>

                            </button>
                        </div>

                    </form>


				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
(function($) {
  "use strict";

  $('#refund_mode').change(function() {
      
    if($(this).val() == 'bank')
    {
      $('#bank_box').show();
    }
    else
    {
      $('#bank_box').hide();
    }
  });

 })(jQuery);

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\purchase_history\refund.blade.php ENDPATH**/ ?>