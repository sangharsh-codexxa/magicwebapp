
<?php $__env->startSection('title','Order'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Order')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Order')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.manage')): ?>
    <a href="<?php echo e(route('order.create')); ?>" class="btn btn-primary-rgba mr-2"><i
        class="feather icon-plus mr-2"></i><?php echo e(__('Enroll User')); ?></a>
        <a href="<?php echo e(route('order.fileexport')); ?>" class="btn btn-primary-rgba"> <i
          class="feather icon-download"></i>
        <?php echo e(__('Export Offline Payments')); ?></a>
        <?php endif; ?>
  </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-md-12">
      <div class="card m-b-30">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-box"><?php echo e(__('Orders')); ?></h5>
            </div>
          </div>
         </div>
        <div class="card-body">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true"><?php echo e(__('Order')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false"><?php echo e(__('Refund Order')); ?></a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php echo $__env->make('admin.order.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php echo $__env->make('admin.refund_order.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/magic.bizz-manager.com/public_html/resources/views/admin/order/show.blade.php ENDPATH**/ ?>