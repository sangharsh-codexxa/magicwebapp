<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		@import  url('https://fonts.googleapis.com/css?family=Open+Sans');
		body{
			background: #FFF;
			font-family: 'Open Sans', sans-serif;
		}

		h1{
			font-family: 'Open Sans', sans-serif;
			color: #000;
			text-transform: uppercase;
		}

		.box
		{
			max-width: 50%;
		}

		.wel{
			width: 200px;
			border-radius: 0.5em;
			padding: 10px;
			background-color: #F44A4A;
			border:none;
			color: #FFF;
			font-weight: 600;
			font-size: 18px;
			font-family: 'Open Sans', sans-serif;
		}
	</style>
</head>
<body>
	<center>
	<div style="padding:50px; background-color:#FFF;background-size: cover;width: 100%;height: 100%;" class="box">
		<div align="center" class="logo">
			<img src="<?php echo e(asset('images/logo/'.$logo)); ?>" alt="logo">


			<p style="font-size:18px;font-family: 'Open Sans', sans-serif;text-align: justify;color: #000;">
				<?php echo e(__('Hello,')); ?>

				<br><br>
				<?php echo e(__('Your Password Reset Code is')); ?> 
				<br>

				<h1><?php echo e($code); ?></h1>
				
			</p>
			<p style="font-size:18px;font-family: 'Open Sans', sans-serif;text-align: justify;color: #000;"><?php echo e(__('Use this code in you app and rest your passowrd')); ?>.</p>
			<div align="center">
				<a style="cursor: pointer;" href="<?php echo e(config('app.url')); ?>"><button style="cursor: pointer;" class="wel"><?php echo e(__('Explore Now !')); ?></button></a>
			</div>

			<p style="font-size:18px;font-family: 'Open Sans', sans-serif;text-align: justify;color: #000;">
				<?php echo e(__('Have fun!')); ?>

				<br>
				<?php echo e(config('app.name')); ?>

			</p>

			<div style="width:100%; height:2px;background:linear-gradient(to right top, #44a1c5, #537196, #4b465e, #2e242d, #000000);">
				
			</div>
			
		</div>
	</div>
</center>
</body>
</html><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\forgotemail.blade.php ENDPATH**/ ?>