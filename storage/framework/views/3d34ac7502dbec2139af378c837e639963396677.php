<?php $__env->startComponent('mail::message'); ?>

<?php echo e($content); ?>


**Platform:** <?php echo e($browser); ?> on <?php echo e($platform); ?>

**IP Address:** <?php echo e($ipAddress); ?><br>
**Time:** <?php echo e($time->toCookieString()); ?><br>

If this was you, you can ignore this alert. If you suspect any suspicious activity on your account, please change your password.

Regards,<br><?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\vendor\samuelnitsche\laravel-auth-log\resources\views\emails\new.blade.php ENDPATH**/ ?>