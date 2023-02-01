
<?php $__env->startSection('title', 'Plan Checkout'); ?>
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
                        <h1 class="wishlist-home-heading"><?php echo e(__('Plan')); ?> <?php echo e(__('Checkout')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- about-home end -->
<section id="checkout-block" class="checkout-main-block">
	<div class="container-xl">
		<div class="plans-items btm-30">
	        <div class="row">
	        	<div class="col-lg-4 col-sm-4">
	        		
	            	<div class="checkout-items">
	            		
		            	<div class="row btm-10">
		            		<div class="col-lg-3 col-4">
		            			
		            		</div>
		            		<div class="col-lg-9 col-8">
		            			<ul>
		            				
		            				<li class="checkout-course-title"><?php echo e(str_limit($plans->title, $limit =35 , $end = '...')); ?></li>
		            				
		            				
		            				
	                                <?php if($plans->discount_price == !NULL): ?>

	                                	<li class="checkout-course-price"><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->price); ?></b>  <s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->discount_price); ?></s></li>

		                                
		                            <?php else: ?>
		                                <li class="checkout-course-price"><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->price); ?></b></li>
		                            <?php endif; ?>
		            			</ul>
		            		</div>
		            	</div>
	            		
	            	</div>
                </div>
	            <div class="col-lg-8 col-sm-8">
	            	<div class="checkout-pricelist">
		            	<ul>
		            		<?php if($plans->discount_price == !NULL): ?>

                               <li><h1 class="checkout-total"><?php echo e(__('Total')); ?>: <i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->price); ?></h1></li>
		            			<li><div class="checkout-price"><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->discount_price); ?></s></div></li>

                                
                            <?php else: ?>
                               <li><h1 class="checkout-total"><?php echo e(__('Total')); ?>: <?php echo e($plans->price); ?><i class="<?php echo e($currency->icon); ?>"></i></h1></li>
		            			<li><div class="checkout-price"><s><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($plans->price); ?></s></div></li>
                            <?php endif; ?>
		            		

		            		<?php
		            			if(($plans->discount_price == !NULL)){
		            				$mainpay = round($plans->discount_price,2);
		            			}else{
		            				$mainpay = round($plans->price,2);
		            			}
		            		?>
		            		
		            	</ul>
	            	</div>
	            	<?php  			
        				$secureamount = Crypt::encrypt($mainpay);
        			?>
	            	<div class="payment-gateways">
	            		<div id="accordion" class="second-accordion">


	            			<?php if($gsetting->paypal_enable == 1): ?>
						    <div class="card">
	                            <div class="card-header" id="headingOne">
							        <div class="panel-title">
							            <label for='r11'>
								            <input type='radio' id='r11' name='occupation' value='Working' required />
								            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
								              
								            <img src="<?php echo e(url('images/payment/paypal2.png')); ?>" class="img-fluid" alt="<?php echo e(__('course')); ?>">
							            </label>
							        </div>
						    	</div>
							    <div id="collapseOne" class="panel-collapse collapse in">
							        <div class="card-body">
		                            
		                            	<div class="payment-proceed-btn">
		                            		<form action="<?php echo e(route('subscribewithpaypal')); ?>" method="POST" autocomplete="off">
		                            			<?php echo csrf_field(); ?>

		                            			<input type="hidden" name="plan_id" value="<?php echo e($plans->id); ?>"/>
		                            			
		                         				<input type="hidden" name="amount" value="<?php echo e($secureamount); ?>"/>
		                            			<button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('Proceed')); ?></button>
		                            		</form>
		                            		
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>
						


							<?php if($gsetting->paytm_enable == 1): ?>
							<div class="card">
	                            <div class="card-header" id="headingFour">
							        <div class="panel-title">
							            <label for='r17'>
							              <input type='radio' id='r17' name='occupation' value='Working' required />
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"></a>
							              <img src="<?php echo e(url('images/payment/paytm.png')); ?>"  class="img-fluid" alt="course"> 
							            </label>
							        </div>
						    	</div>
							    <div id="collapseFour" class="panel-collapse collapse in">
							        <div class="card-body">
		                            	<div class="payment-proceed-btn">
		                            		<form method="post" action="<?php echo e(url('/plan/subscribe/paytm')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
		                            			<?php echo csrf_field(); ?>

										            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>"/>
										            <input type="hidden" name="plan_id" value="<?php echo e($plans->id); ?>"/>

										          
												    <div class="row">
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Name</strong>
											                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo e(Auth::User()->fname); ?>" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Mobile Number</strong>
											                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="<?php echo e(Auth::User()->mobile); ?>" required autocomplete="off">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <strong>Email Id</strong>
											                <input type="email" name="email" class="form-control" value="<?php echo e(Auth::User()->email); ?>" placeholder="Enter Email id" required>
											            </div>
											        </div>
											        <div class="col-md-12">
											            <div class="form-group">
											                <input type="hidden" name="amount" class="form-control" placeholder="" value="<?php echo e($mainpay); ?>" readonly="">
											            </div>
											        </div>
											        <div class="col-md-12">
											            <button class="btn btn-primary" title="checkout" type="submit"><?php echo e(__('Proceed')); ?></button>
											        </div>
											    </div>
										          
											</form>
		                            	</div>
							        </div>
							    </div>
							</div>
							<?php endif; ?>

							

							





                        </div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\plan\plan_checkout.blade.php ENDPATH**/ ?>