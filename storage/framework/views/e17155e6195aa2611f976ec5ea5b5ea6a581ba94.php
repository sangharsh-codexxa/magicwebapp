
<?php $__env->startSection('title', 'Currency - Admin'); ?>

<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Currency')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Currency')); ?>

<?php $__env->endSlot(); ?>



<?php echo $__env->renderComponent(); ?>
	<div class="contentbar">
		<?php if($errors->any()): ?>  
    <div class="alert alert-danger" role="alert">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
    <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="color:red;">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </div>
    <?php endif; ?>             
    
		<div class="row">
			<div class="col-lg-12">
				<div class="card m-b-30">
					<div class="card-header">
						<h5 class="card-title"><?php echo e(__("Currency")); ?> </h5>
					</div>
					<div class="card-body">
						
						<form action="<?php echo e(action('CurrencyController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

						
						<div class="row">
							<div class="form-group col-md-6">
								
								<label for="icon"><?php echo e(__('Icon')); ?>:<sup class="redstar">*</sup></label>
								<div class="input-group">
									<input id="iconvalue" name="icon" type="text" class="form-control" required value="<?php echo e($show['icon']); ?>">
									<span class="input-group-append">
									<button role="iconpicker" id="iconpick" type="button" class="btn btn-outline-secondary"></button>
									</span>
								</div>
								
							</div>
					
							<div class="form-group col-md-6">
								<label class="text-dark"><?php echo e(__("Currency")); ?> <span class="text-danger">*</span></label>
								<input value="<?php echo e($show['currency']); ?>" name="currency" type="text" class="form-control" placeholder="Ex:INR" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<button type="reset" class="btn btn-danger mr-2"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
								<?php echo e(__("Update")); ?></button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>		
							
							

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

	<script>
		

				var iconpickerpresent = $("button").is('#iconpick');

				if (iconpickerpresent) {

				$('#iconpick').iconpicker()
					.iconpicker('setAlign', 'center')
					.iconpicker('setCols', 5)
					.iconpicker('setArrowPrevIconClass', 'fa fa-angle-left')
					.iconpicker('setArrowNextIconClass', 'fa fa-angle-right')
					.iconpicker('setIconset', {
					iconClass: 'fa',
					iconClassFix: 'fa-',
					icons: [

						'inr', 'bitcoin', 'btc', 'cny', 'dollar', 'eur', 'ngn', 'cedi', 'rial', 'dinar', 'tugrik',
						'brazilian-real', 'idr', 'shillings', 'gg-circle', 'gg', 'ils', 'try', 'krw', 'gbp', 'zar', 'rs',
						'pula', 'aud', 'egy', 'taka', 'mal', 'rub', 'brl', 'zwl', 'ngr', 'eutho', 'sgd',
						'lkr', 'mad', 'thai', 'jod', 'tsh', 'da', 'dzd', 'rwf', 'laos', 'tnd', 'bcb', 'aoa'
					]
					})
					.iconpicker('setIcon', '<?php echo e(substr($show["icon"],3)); ?>')
					.iconpicker('setSearch', false)
					.iconpicker('setFooter', true)
					.iconpicker('setHeader', true)
					.iconpicker('setSearchText', 'Type text')
					.iconpicker('setSelectedClass', 'btn-warning')
					.iconpicker('setUnselectedClass', 'btn-primary');

				$('#iconpick').on('change', function (e) {
					$('#iconvalue').val('fa ' + e.icon);
				});
			}

				
	</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\currency\edit.blade.php ENDPATH**/ ?>