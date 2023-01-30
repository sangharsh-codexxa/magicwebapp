
<?php $__env->startSection('title', 'Payment Settings - Instructor'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['secondactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Payment Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Payment Settings')); ?>

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
          <h5 class="card-title"><?php echo e(__('Setup payment informations')); ?></h5>
        </div>
        <div class="card-body">
          
			<form action="<?php echo e(route('instructor.payout', $user->id)); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('POST')); ?>


          
        <div class="row col-6">
            <div class="form-group col-md-12">
				
				<label for="type"><?php echo e(__('Type')); ?>:<sup class="redstar">*</sup></label>
				<select class="select2-single form-control"  name="type" id="paytype" required>
					<option value="none" selected disabled hidden ><?php echo e(__('ChoosePaymentType')); ?></option>
					
					<?php
					
					?>

					<?php if($isetting['paytm_enable'] == 1): ?>
						<option <?php echo e($user->prefer_pay_method == 'paytm' ? 'selected' : ''); ?> value="paytm"><?php echo e(__('Paytm')); ?></option>
					<?php endif; ?>
					<?php if($isetting['paypal_enable'] == 1): ?>
					<option <?php echo e($user->prefer_pay_method == 'paypal' ? 'selected' : ''); ?> value="paypal"><?php echo e(__('Paypal')); ?></option>
					<?php endif; ?>
					<?php if($isetting['bank_enable'] == 1): ?>
					<option <?php echo e($user->prefer_pay_method == 'banktransfer' ? 'selected' : ''); ?> value="bank"><?php echo e(__('BankTransfer')); ?></option>
					<?php endif; ?>
				</select>
            </div>
       
            
              

			
				<div class="form-group col-md-12" id="paypalpayment"  style="d-none;">
					<?php if($isetting['paypal_enable'] == 1): ?>
					<div id="paypalpayment" <?php if($user['prefer_pay_method'] == "banktransfer" || $user['prefer_pay_method'] == "paytm" ): ?> class="display-none" <?php endif; ?>>
						<h5 class="box-title"><?php echo e(__('PAYPALPAYMENT')); ?></h5>
						<label for="pay_cid"><?php echo e(__('PaypalEmail')); ?><sup class="redstar">*</sup></label>
						<input value="<?php echo e($user['paypal_email']); ?>" autofocus name="paypal_email" type="text" class="form-control" placeholder="Enter Paypal Email"/>
						<?php endif; ?>
					</div>
				</div>
		

            
			
		             

		
            <div class="form-group col-md-12" id="paytmpayment" >
				<?php if($isetting['paytm_enable'] == 1): ?>
				<div id="paytmpayment" <?php if($user['prefer_pay_method'] == "banktransfer" || $user['prefer_pay_method'] == "paypal" ): ?> class="display-none" <?php endif; ?>>
					<h5 class="box-title"><?php echo e(__('PAYTMPAYMENT')); ?></h5>
					<label for="pay_cid"><?php echo e(__('PaytmMobileNo')); ?><sup class="redstar">*</sup></label>
					<input value="<?php echo e($user['paytm_mobile']); ?>" autofocus name="paytm_mobile" type="text" class="form-control" placeholder="Enter Paytm Mobile No"/>
               </div>
			   <?php endif; ?>
			</div>



            <div class="form-group col-md-12" id="bankpayment"   style="d-none;">
				<?php if($isetting['bank_enable'] == 1): ?>
				<div id="bankpayment" <?php if($user['prefer_pay_method'] == "paypal" || $user['prefer_pay_method'] == "paytm" ): ?> class="display-none" <?php endif; ?>>
					<h5 class="box-title"><?php echo e(__('BankTransfer')); ?></h5>
					<div class="col-md-12 mb-2">

						<label for="pay_cid"><?php echo e(__('AccountHolderName')); ?><sup class="redstar">*</sup></label>
						<input value="<?php echo e($user->bank_acc_name); ?>" autofocus name="bank_acc_name" type="text" class="form-control" placeholder="Enter Account Holder Name"/>
						
					</div>

					<div class="col-md-12 mb-2">
						<label for="pay_cid"><?php echo e(__('BankName')); ?><sup class="redstar">*</sup></label>
						<input value="<?php echo e($user->bank_acc_no); ?>" autofocus name="bank_acc_no" type="text" class="form-control" placeholder="Enter Bank Name"/>
						
					</div>

					<div class="col-md-12 mb-2">
						<label for="pay_cid"><?php echo e(__('IFCSCode')); ?><sup class="redstar">*</sup></label>
						<input value="<?php echo e($user->ifsc_code); ?>" autofocus name="ifsc_code" type="text" class="form-control" placeholder="Enter IFCS Code"/>
						
					</div>

					<div class="col-md-12 mb-2">
						<label for="pay_cid"><?php echo e(__('AccountNumber')); ?><sup class="redstar">*</sup></label>
						<input value="<?php echo e($user->bank_name); ?>" autofocus name="bank_name" type="text" class="form-control" placeholder="Enter Account Number"/>
						
					</div>
               </div>
			   <?php endif; ?>
			</div>


			
              
             
              
           
            
             
            
            
          </div>
          <div class="form-group col-md-6">
            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Create")); ?></button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script type="text/javascript">
	 $('#paytype').change(function() {
      
    if($(this).val() == 'paytm')
    {
      $('#paytmpayment').show();
      $('#paypalpayment').hide();
      $('#bankpayment').hide();
     
    }
    else if($(this).val() == 'paypal')
    { 
      $('#paytmpayment').hide();
      $('#paypalpayment').show();
      $('#bankpayment').hide();
    
    }
    else if($(this).val() == 'bank')
    {
    	$('#bankpayment').show();
      $('#paypalpayment').hide();
      $('#paytmpayment').hide();
      
    }
  });

    
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/instructor/settings/pay_settings.blade.php ENDPATH**/ ?>