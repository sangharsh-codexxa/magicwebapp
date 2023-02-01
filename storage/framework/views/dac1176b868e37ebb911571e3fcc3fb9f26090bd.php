<!DOCTYPE html>
<html>
 <head>
  <meta charset=utf-8>
  <title>Create newsletter in laravel 5.7</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
 </head>
 <body>
  <div >
  <?php if(\Session::has('success')): ?>
   <div >
    <p><?php echo e(\Session::get('success')); ?></p>
   </div><br />
   <?php endif; ?>
   <?php if(\Session::has('failure')): ?>
   <div >
    <p><?php echo e(\Session::get('failure')); ?></p>
   </div><br />
   <?php endif; ?>
   <h2><?php echo e(__('Laravel Newsletter Tutorial With Example')); ?></h2><br/>
   <form method="post" action="<?php echo e(url('store-newsletter')); ?>">
    <?php echo csrf_field(); ?>
    </div>
    <div >
     <div ></div>
      <div >
       <label for="Email"><?php echo e(__('Email')); ?>:</label>
       <input type=text name=subscribed_email>
      </div>
     </div>
    <div >
     <div ></div>
     <div >
      <button type=submit ><?php echo e(__('Subscribe')); ?></button>
     </div>
    </div>
   </form>
  </div>
 </body>
</html><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\newsletter.blade.php ENDPATH**/ ?>