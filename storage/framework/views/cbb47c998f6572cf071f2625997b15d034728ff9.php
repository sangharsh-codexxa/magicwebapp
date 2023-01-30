<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->




<?php
if(Schema::hasTable('color_options')){
  $color = App\ColorOption::first();
}
?>
<?php if(isset($color)): ?>

<style type="text/css">
  
  .cirtificate-border-one { 
     
    border: 15px groove <?php echo e($color['blue_bg']); ?>; 
    padding:20px;
    background-color: var(--background-white-bg-color);

  }
  .cirtificate-border-two {  
    border: 5px double <?php echo e($color['blue_bg']); ?>;
    padding:20px;
  }
</style>

<?php else: ?>

<style type="text/css">
 .cirtificate-border-one { 
    
    border: 15px groove #0284A2;
    padding:20px;
    background-color: var(--background-white-bg-color);

  }
  .cirtificate-border-two {  
    border: 5px double #0284A2;
    padding:20px;
  }

</style>

<?php endif; ?>

<style type="text/css">

  * { font-family: DejaVu Sans, sans-serif; }

  .course-cirtificate {
    text-align: center;
  }

 .cirtificate-heading {
    font-size:50px; 
    font-weight:bold;
    font-style: normal;
    margin-bottom: 20px;
  }
  
  @font-face {
    font-family: 'Great Vibes';
    src: url('<?php echo e(public_path('GreatVibes-Regular.ttf')); ?>') format("ttf");
  }

  .course-cirtificate {
    padding: 10px 0;
    background: #F7F8FA;
  }
  .cirtificate-heading {
    color: #29303B;
  }

  .cirtificate-serial {
    text-align: left!important;
    font-size: 8px;
  }

  

  

</style>


</head>


<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<section id="cirtificate" class="course-cirtificate">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12">
                <div class="cirtificate-border-one text-center">
                    <div class="cirtificate-border-two">
                       <div class="cirtificate-heading" style=""><?php echo e(__('Certificate of Completion')); ?></div>
                        <?php
                            $mytime = Carbon\Carbon::now();
                        ?>
                       <p class="cirtificate-detail" style="font-size:30px"><?php echo e(__('This is to certify that')); ?> <b>&nbsp;<?php echo e($progress->user['fname']); ?>&nbsp;<?php echo e($progress->user['lname']); ?></b> <?php echo e(__('successfully completed')); ?> <b><?php echo e($course['title']); ?></b> <?php echo e(__('online course on')); ?> <br>
                       
                        <span style="font-size:25px"><?php echo e(date('jS F Y', strtotime($progress['updated_at']))); ?></span>
                       
                      </p>

                       <span class="cirtificate-instructor"><?php echo e(($course->user['fname'])); ?> <?php echo e(($course->user['lname'])); ?></span>
                       <br>
                       <span class="cirtificate-one"><?php echo e(($course->user['fname'])); ?> <?php echo e(($course->user['lname'])); ?>, <?php echo e(__('Instructor')); ?></span>
                       <br>
                       <span>&</span>
                       <div class="cirtificate-logo">
                        <?php if($gsetting['logo_type'] == 'L'): ?>
                            <img src="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>" class="img-fluid" alt="<?php echo e(__('logo')); ?>" style="width: 150px">
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($gsetting['project_title']); ?></div></b></a>
                        <?php endif; ?>
                      </div>
                      <br>
                      <br>

                      <div class="cirtificate-serial"><?php echo e(__('Certificate no.')); ?> :<?php echo e($serial_no); ?></div>
                      <div class="cirtificate-serial"><?php echo e(__('Certificate url.')); ?> :<?php echo e(url()->full()); ?></div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
<script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<!-- end jquery -->
</body>
<!-- body end -->
</html> 





<?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/front/certificate/download.blade.php ENDPATH**/ ?>