
<?php $__env->startSection('title', 'Certificate Verification - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Certificate Verification')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Certificate Verification')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
	<div class="widgetbar">
		<button type="reset" class="btn btn-danger-rgba reset-btn"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
	</div>
	<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
	<div class="row mt-5">
		<div class="col-lg-12">
			<?php if(session()->has('fail')): ?>
			<div class="alert alert-danger" role="alert">
				<p><?php echo e(session()->get('fail')); ?><button type="button" class="close" data-dismiss="alert"
						aria-label="Close">
						<span aria-hidden="true">&times;</span></button></p>
			</div>
			<?php endif; ?>
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="card-title"><?php echo e(__('Certificate Verification')); ?></h5>
				</div>
				<div class="card-body">
					<form action="<?php echo e(action('CertificateController@verification')); ?>" method="GET"
						enctype="multipart/form-data">

						<div class="row">
							<div class="form-group col-md-12">
								<label><?php echo e(__('Enter Certificate Serial Number')); ?>:<span
										class="redstar">*</span></label>
								<div class="row">
									<div class="col-lg-6">
										<input type="text" class="form-control" id="skillifyTheme" name="title" value="<?php echo e($posts); ?>" required>
									</div>
									<div class="col-lg-6">
										<button type="submit" class="btn btn-primary-rgba">
											<i class="fa fa-check-circle"></i>
											<?php echo e(__("Verify")); ?>

										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>





				<?php if(isset($posts)): ?>

				<a href="<?php echo e(url('certificate'.'/'.$posts)); ?>" target="blank">
					<h4> <?php echo e($posts); ?> </h4>
				</a>

				<div class="button-list">
					<a href="<?php echo e(url('certificate'.'/'.$posts)); ?>" target="blank"
						class="btn btn-success-rgba btn-lg btn-block"><?php echo e(__('View Certificate')); ?></a>
				</div>

				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>
	$(document).ready(function () {

		$(".reset-btn").click(function () {
			var uri = window.location.toString();

			if (uri.indexOf("?") > 0) {

				var clean_uri = uri.substring(0, uri.indexOf("?"));

				window.history.replaceState({}, document.title, clean_uri);

			}

			// location.reload();
		});
	});
</script>
<!-- script to change status end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\certificate\view.blade.php ENDPATH**/ ?>