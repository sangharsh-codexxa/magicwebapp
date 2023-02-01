
<?php $__env->startSection('title','View Refund Request'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Refund Order')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('View Refund Request')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar"> 
  <div class="row">
      
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"> <?php echo e(__('OrderId')); ?> - <?php echo $refunds->order->order_id; ?></h5>
              </div>
              <div class="card-body">
                <div class="card-body py-5">
                  <div class="row">
                      <div class="col-lg-3 text-center">
                        <img src="<?php echo e(asset('images/course/'.$refunds->courses->preview_image)); ?>" class="img-circle"/>
                      </div>
                      <div class="col-lg-9">
                          <h4><?php echo e($refunds->user->fname); ?> <?php echo e($refunds->user->lname); ?></h4>
                          <p><?php echo e($refunds->user->email); ?></p>
                         
                          <div class="table-responsive">
                              <table class="table table-borderless mb-0">
                                  <tbody>
                                      <tr>
                                          <th scope="row" class="p-1"><?php echo e(__('OrderId')); ?> :</th>
                                          <td class="p-1"><?php echo e($refunds->order->order_id); ?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row" class="p-1"><?php echo e(__('Course')); ?> :</th>
                                          <td class="p-1"><?php echo e($refunds->courses->title); ?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row" class="p-1"><?php echo e(__('PaymentMethod')); ?> :</th>
                                          <td class="p-1"><?php echo e($refunds->payment_method); ?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row" class="p-1"><?php echo e(__('TotalAmount')); ?> :</th>
                                          <td class="p-1"><?php echo e($refunds->total_amount); ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row" class="p-1"><?php echo e(__('Reason')); ?> :</th>
                                        <td class="p-1"><?php echo e($refunds->reason); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row" class="p-1"><?php echo e(__('Detail')); ?> :</th>
                                      <td class="p-1"><?php echo e($refunds->detail); ?></td>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                          <?php if($refunds->bank_id == !NULL): ?>
                          <?php
              
                          $user_detail = App\UserBankDetail::where('id', $refunds->bank_id)->first()
              
                          ?>
              
                          <h3 class="box-title"> <?php echo e(__('BankDetail')); ?></h3>
              
                          <div class="view-instructor">
                            <div class="instructor-detail">
                              <ul>
                                <li><?php echo e(__('User')); ?>: <?php echo e($user_detail->user->fname); ?> </li>
                                <li><?php echo e(__('AccountHolderName')); ?>: <?php echo e($user_detail->account_holder_name); ?> </li>
                                <li><?php echo e(__('BankName')); ?>: <?php echo e($user_detail->bank_name); ?></li>
                                <li><?php echo e(__('IFCSCode')); ?>: <?php echo e($user_detail->ifcs_code); ?></li>
                                <li><?php echo e(__('AccountNumber')); ?>: <?php echo e($user_detail->account_number); ?></li>
              
                              </ul>
                            </div>
                          </div>
                        <?php endif; ?>
              <div class="form-group">              
                          <form id="demo-form2" method="post" action="<?php echo e(url('refundorder/'.$refunds->id)); ?>" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>

              
              
                            <?php if( $refunds->status==0): ?>
              
                            <div class="row">
                             
                              <div class="col-md-12">
                                 <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                                 <input type="checkbox" class="custom_toggle" name="status"
                                 value="<?php echo e($refunds->status); ?>"  id="j"/>
                               <input type="hidden" name="status" value="<?php echo e($refunds->status); ?>" id="j">
                              </div>
                              
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                              <?php echo e(__('ProceedRefund')); ?></button>
                            <?php endif; ?>
                          </form>
                      </div>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

 <script>
tinymce.init({
  selector: '#editor1,#editor2,.editor',
  height: 350,
  menubar: 'edit view insert format tools table tc',
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks fullscreen',
    'insertdatetime media table paste wordcount'
  ],
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\refund_order\view.blade.php ENDPATH**/ ?>