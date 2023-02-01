<form action="<?php echo e(route('bbl.api.join')); ?>" method="POST">
	<?php echo csrf_field(); ?>
<input type="text" name="name" value="" placeholder="Enter your name">
<input type="text" value="<?php echo e($m->meetingid); ?>" readonly="">
<input type="hidden" name="meetingid" value="<?php echo e($m->meetingid); ?>">
<input type="password" name="password">
<input type="submit" value="Join">
</form><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\bbl\joinmeeting.blade.php ENDPATH**/ ?>