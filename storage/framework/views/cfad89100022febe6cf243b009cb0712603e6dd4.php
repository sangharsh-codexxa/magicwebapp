<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2019.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass - Learning Management System
Version: 1.0.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<meta charset="utf-8" />
<title><?php echo e($gsetting->project_title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo e($gsetting->meta_data_desc); ?>" />
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
<link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>"> <!-- favicon-icon -->
<!-- theme styles -->
<link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet"> <!--  google fonts -->
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap:400,500,600,700" rel="stylesheet"><!-- google fonts -->
<link rel="stylesheet" href="<?php echo e(url('vendor/fontawesome/css/all.css')); ?>" /> <!--  fontawesome css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/font/flaticon.css')); ?>" /> <!--  fontawesome css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/navigation/menumaker.css')); ?>" /> <!-- navigation css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/owl/css/owl.carousel.min.css')); ?>" /> <!-- owl carousel css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/protip/protip.css')); ?>" /> <!-- menu css -->
<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet"/> <!-- custom css -->
<!-- end theme styles -->
</head>
<!-- end head -->
<!-- body start-->
<body>
<!-- top-nav bar start-->
<section id="error" class="error-page-main-block">
    <div class="container-xl">
        <div class="error-block text-center "> 
            <h1 class="error-heading"><span>404 </span></br><?php echo e(__('page not found!')); ?></h1>
            <p><?php echo e(__("This page isn't available. sorry about that.")); ?></p>
            <p class="btm-40"><?php echo e(__('Try searching for something else.')); ?></p>
            <div class="nav-bar-btn btm-20">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary" title="home">
                    <i class="fa fa-chevron-left"></i> <?php echo e(__('Back to Home')); ?>

                </a>
            </div>
        </div>
    </div>
</section>
<!-- top-nav bar end-->
<!-- jquery -->
<script src="<?php echo e(url('js/jquery-2.min.js')); ?>"></script> <!-- jquery library js -->
<script src="<?php echo e(url('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<script src="<?php echo e(url('vendor/owl/js/owl.carousel.min.js')); ?>"></script> <!-- owl carousel js --> 
<script src="<?php echo e(url('vendor/smoothscroll/smooth-scroll.js')); ?>"></script> <!-- smooth scroll js -->
<script src="<?php echo e(url('vendor/popup/jquery.magnific-popup.min.js')); ?>"></script> <!-- popup js-->
<script src="<?php echo e(url('vendor/protip/protip.js')); ?>"></script> <!-- bootstrap js -->
<script src="<?php echo e(url('vendor/navigation/menumaker.js')); ?>"></script> <!-- navigation js--> 
<script src="<?php echo e(url('vendor/mailchimp/jquery.ajaxchimp.js')); ?>"></script> <!-- mail chimp js --> 
<script src="<?php echo e(url('vendor/counter/waypoints.min.js')); ?>"></script> <!-- facts count js required for jquery.counterup.js file -->
<script src="<?php echo e(url('vendor/counter/jquery.counterup.js')); ?>"></script> <!-- facts count js-->
<script src="<?php echo e(url('js/theme.js')); ?>"></script> <!-- custom js -->
<!-- end jquery -->
</body>
<!-- body end -->
</html> <?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\error_page\404.blade.php ENDPATH**/ ?>