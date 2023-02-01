<?php $__env->startComponent('mail::message'); ?>
# User Enrolled

<?php echo e($order->user->fname); ?> <?php echo e($order->user->lname); ?> Enrolled in <?php echo e($order->courses->title); ?>


<?php $__env->startComponent('mail::button', ['url' => route('view.order', $order_id)]); ?>
See Order
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\email\AdminMailOnOrder.blade.php ENDPATH**/ ?>