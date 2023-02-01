<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="<?php echo e(asset('vendor/midia/midia.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('vendor/midia/dropzone.css')); ?>">
	</head>
	<body>
		<div id="midia-inline"></div>

		<script src="<?php echo e(asset('vendor/midia/jquery.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/midia/clipboard.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/midia/dropzone.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/midia/midia.js')); ?>"></script>
		<script>
			// default parameters
			var _options = {
				inline: true,
				base_url: '<?php echo e(url('')); ?>',
				editor: '<?php echo e($editor); ?>'
            };

			// parsing querystring to object
            var deparam = function (querystring) {
                querystring = querystring.substring(querystring.indexOf('?')+1).split('&');
                var params = {}, pair, d = decodeURIComponent, i;
                for (i = querystring.length; i > 0;) {
                    pair = querystring[--i].split('=');
                    params[d(pair[0])] = d(pair[1]);
                }
                return params;
            };

			// get query params
            var _qparams = deparam(location.search);

			// initialize inline midia instance
			$("#midia-inline").midia($.extend(true, {}, _options, _qparams));
		</script>
	</body>
</html><?php /**PATH C:\laragon\www\magic\magic.exportica.in\vendor\itskodinger\midia\src\View\app.blade.php ENDPATH**/ ?>