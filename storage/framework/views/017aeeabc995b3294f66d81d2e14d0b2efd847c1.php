<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">

$(window).on('unload', function() {
	// Asynchronous AJAX
	$.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { ajax_data : 22 }
    });
})
</script>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\test.blade.php ENDPATH**/ ?>