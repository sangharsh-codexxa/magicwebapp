<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->
<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
<!-- google fonts -->

<style>
  * { font-family: DejaVu Sans, sans-serif; }

.invoiceheading {
  font-size:30px; 
  margin-bottom: 40px;
}
  
.invoice-col {
  text-align: -webkit-left !important;
}
.table {
  width: 100% !important;
  max-width: 100% !important;
  margin-bottom: 1rem;
  background-color: transparent;
}
.view-order {
  margin-bottom: 20px;
  color: #29303B !important;
}
.order-table {
    text-align: left!important;
}

.invoice-col {
  text-align: -webkit-left !important;
}

</style>

<!-- end theme styles -->
</head>


<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<section id="wishlist-home" class="invoice-home-main-block ">
    <div class="container-fluid">
        <h1><?php echo e(__('frontstaticword.Invoice')); ?></h1>
    </div>
</section> 
<!-- about-home end -->
<section id="purchase-block" class="Invoice-main-block">
    <div class="container-fluid">
        <div class="panel-body">
      
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <div class="page-header">
              <?php
                  $setting = App\setting::first();
              ?>
              <div class="download-logo">
                <?php if($setting['logo_type'] == 'L'): ?>
                    <img src="<?php echo e(asset('images/logo/'.$setting['logo'])); ?>" class="img-fluid" alt="logo">
                <?php else: ?>
                    <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($setting['project_title']); ?></div></b></a>
                <?php endif; ?>
              </div>
              <br>
              <small class="purchase-date"><?php echo e(__('frontstaticword.Puchasedon')); ?>: <?php echo e(date('jS F Y', strtotime($payout['created_at']))); ?></small>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="view-order">
         <table class="table table-striped">
            <thead>
              <tr>
              <th class="col-sm-4 invoice-col">
                <?php echo e(__('From')); ?>:
                 
                    <strong><?php echo e($payout->payer['fname']); ?></strong><br>
                    
                   
                    <?php echo e(__('frontstaticword.address')); ?>: <?php echo e($payout->payer['address']); ?><br>
                      <?php if($payout->payer->state_id == !NULL): ?>
                        <?php echo e($payout->payer->state['name']); ?>,
                      <?php endif; ?>
                      <?php if($payout->payer->country_id == !NULL): ?>
                        <?php echo e($payout->payer->country['name']); ?>

                      <?php endif; ?>
                      <br>

                    <?php echo e(__('frontstaticword.Phone')); ?>: <?php echo e($payout->payer['mobile']); ?><br>
                    <?php echo e(__('frontstaticword.Email')); ?>: <?php echo e($payout->payer['email']); ?>

                 
               
              </th>
              <!-- /.col -->
              <th class="col-sm-4 invoice-col">
                <?php echo e(__('To')); ?>:
               
                  <strong><?php echo e($payout->user['fname']); ?></strong><br>
                  <?php echo e(__('frontstaticword.address')); ?>: <?php echo e($payout->user['address']); ?><br>
                    <?php if($payout->user->state_id == !NULL): ?>
                      <?php echo e($payout->user->state['name']); ?>,
                    <?php endif; ?>
                    <?php if($payout->user->country_id == !NULL): ?>
                      <?php echo e($payout->user->country['name']); ?>

                    <?php endif; ?>
                    <br>
                  <?php echo e(__('frontstaticword.Phone')); ?>: <?php echo e($payout->user['mobile']); ?><br>
                  <?php echo e(__('frontstaticword.Email')); ?>: <?php echo e($payout->user['email']); ?>

                
              </th>
              <!-- /.col -->
              <th class="col-sm-4 invoice-col">
                <b><?php echo e(__('frontstaticword.OrderID')); ?>:</b> 
                	<?php $__currentLoopData = $payout->order_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id= App\Order::find($order);
                        ?>
                        <?php echo e($id['order_id']); ?>,
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br>
                <b><?php echo e(__('frontstaticword.PaymentMode')); ?>:</b> <?php echo e($payout['payment_method']); ?><br>
                <b><?php echo e(__('frontstaticword.Currency')); ?>:</b> <?php echo e($payout['currency']); ?></br>
                <b><?php echo e(__('frontstaticword.PaymentStatus')); ?>:</b> 
                <?php if($payout->pay_status ==1): ?>
                  <?php echo e(__('frontstaticword.Recieved')); ?>

                <?php else: ?> 
                  <?php echo e(__('frontstaticword.Pending')); ?>

                <?php endif; ?>
              </th>
            </tr>
          </thead>
      </table>
             
        </div>
        <!-- /.row -->
        <div class="order-table table-responsive">
          <table class="table table-striped">
            <thead>
	            <tr>
	              <th class="invoice-col"><?php echo e(__('Instructor')); ?></th>
	              <th class="invoice-col"><?php echo e(__('Currency')); ?></th>
	             
	              <th class="invoice-col"><?php echo e(__('Total')); ?></th>
	              <th class="invoice-col"><?php echo e(__('PaymentMethod')); ?></th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr class="view-order">
	              <td><?php echo e($payout->user['fname']); ?></td>
	              <td><?php echo e($payout['currency']); ?></td>
	              <td><i class="fa <?php echo e($payout['currency_icon']); ?>"></i><?php echo e($payout['pay_total']); ?></td>
	              <td><?php echo e($payout->payment_method); ?></td>

	            

	              </td>
	            </tr>
	          </tbody>
          </table>

           
        </div>
      </div>

    </div>
    </div>
</section>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
<script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<!-- end jquery -->
</body>
<!-- body end -->
</html> 



<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\revenue\download.blade.php ENDPATH**/ ?>