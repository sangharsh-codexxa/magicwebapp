<?php $__env->startComponent('mail::message'); ?>
# Receive user message
<?php echo e($contact->fname); ?>, <?php echo e($contact->email); ?> !!
<br>
mobile: <?php echo e($contact->mobile); ?>

<br>
Sends you message.
<br>
<?php echo e($contact->message); ?> 
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\email\ContactMail.blade.php ENDPATH**/ ?>