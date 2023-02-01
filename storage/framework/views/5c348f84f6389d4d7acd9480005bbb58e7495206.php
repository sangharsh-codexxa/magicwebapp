
<?php $__env->startSection('title', 'Purchase History'); ?>
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
		<img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
		<?php endif; ?>
	</div>
	<div class="overlay-bg"></div>
	<div class="container-xl">
		<div class="business-dtl">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="bredcrumb-dtl">
						<h1 class="wishlist-home-heading text-white"><?php echo e(__('Booking History')); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- about-home start -->

<!-- about-home end -->


<section class="purchase-main-block">
	<div class="container-xl">
		<div class="purchase-table table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="purchase-history-heading"><?php echo e(__('Booking History')); ?></th>
						<th class="purchase-text"><?php echo e(__('Booked on')); ?></th>
						<th class="purchase-text"><?php echo e(__('Workshop Start')); ?></th>
						<th class="purchase-text"><?php echo e(__('Workshop End')); ?></th>
						<th class="purchase-text"><?php echo e(__('Payment Mode')); ?></th>
						<th class="purchase-text"><?php echo e(__('Total Price')); ?></th>
						<th class="purchase-text"><?php echo e(__('Payment Status')); ?></th>

					</tr>
				</thead>

				<?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="purchase-history-table">
					<tbody>
						<tr>
							<td>
								<div class="purchase-history-course-img">
									<a href="<?php echo e(url('workshop') . '/' . $booking->workshop_id); ?>/details"><img src="<?php echo e(asset('images/workshop/'.$booking->workshop_image)); ?>" class="img-fluid" alt="<?php echo e($booking->workshop_title); ?>"></a>
								</div>
								<div class="purchase-history-course-title">
									<a href="<?php echo e(url('workshop') . '/' . $booking->workshop_id); ?>/details"><?php echo e($booking->workshop_title); ?></a>
								</div>
							</td>
							<td>
								<div class="purchase-text"><?php echo e(date('jS F Y', strtotime($booking->created_at))); ?></div>
							</td>
							<td>
								<div class="purchase-text">
									<?php echo e(date('jS F Y', strtotime("{$booking->start_date} {$booking->start_time}"))); ?>

								</div>
							</td>
							<td>
								<div class="purchase-text">
									<?php echo e(date('jS F Y', strtotime("{$booking->end_date} {$booking->end_time}"))); ?>

								</div>
							</td>

							<td>
								<div class="purchase-text"><?php echo e($booking->payment_method); ?></div>
							</td>
							<td>
								<div class="purchase-text"><b>

										<?php echo e($booking->currency_icon); ?>


										<?php echo e($booking->total_amount); ?></b>
								</div>

							</td>

							<td>
								<div class="purchase-text">

									<?php echo e(__('Received')); ?>



								</div>
							</td>




						</tr>
					</tbody>
				</div>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\purchase_history\my-bookings.blade.php ENDPATH**/ ?>