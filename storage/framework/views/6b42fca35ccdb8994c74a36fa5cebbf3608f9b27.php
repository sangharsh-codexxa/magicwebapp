<!DOCTYPE html>

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html class="no-js" lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  
  <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($gsetting->project_title); ?></title>
  <!-- Tell the browser to be to screen width -->

 
    <meta name="description" content="<?php echo e($gsetting->meta_data_desc); ?>">
    <meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($gsetting->google_ana); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo e($gsetting->google_ana); ?>');
    </script>
    <!-- Facebook Pixel Code -->

    <?php if(isset($gsetting->fb_pixel)): ?>
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '<?php echo e($gsetting->fb_pixel); ?>');
      fbq('track', 'PageView');
    </script>

    <?php endif; ?>

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <noscript>
      <img style="display:none" src="https://www.facebook.com/tr?id=<?php echo e($gsetting->fb_pixel); ?>&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
 

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>"> <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(url('css/datepicker.css')); ?>">
  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>"> <!-- favicon-icon -->
  <link rel="stylesheet" href="<?php echo e(url('admin/css/select2.min.css')); ?>"> <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/fontawesome-iconpicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('admin/css/jquery-ui.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>"> <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
  <?php
  $language = Session::get('changed_language'); //or 'english' //set the system language
  $rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
  ?>
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/AdminLTE-rtl.min.css')); ?>">  <!-- adminLTE RTL  style -->
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/AdminLTE.min.css')); ?>">
  <?php endif; ?>
  
  <link rel="stylesheet" href="<?php echo e(url('css/toggle.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/component.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/normalize.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(URL::asset('admin/plugins/pace/pace.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('admin/dist/css/skins/_all-skins.min.css')); ?>">
  <link href="<?php echo e(url('admin/css/bootstrap-toggle.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/animate.min.css')); ?>"><!-- Custom Css -->
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/css/admin-rtl.css')); ?>">
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('admin/css/admin.css')); ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/custom-style.css')); ?>"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo e(url('admin/font/font/flaticon.css')); ?>" /> <!-- fontawesome css -->

  

  <?php echo $__env->yieldContent('stylesheets'); ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img title="<?php echo e($gsetting->project_title); ?>" width="20px" src="<?php echo e(url('images/favicon/'.$gsetting->favicon)); ?>" alt=""/>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <img title="<?php echo e($gsetting->project_title); ?>" width="100px" src="<?php echo e(url('images/logo/'.$gsetting->logo)); ?>" alt=""/></span>
    </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only"><?php echo e(__('Toggle navigation')); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Notifications: style can be found in dropdown.less -->
            <?php if(Auth()->user()->role == "admin"): ?>
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label bg-red"><?php echo e(Auth()->user()->unreadNotifications->where('type', 'App\Notifications\AdminOrder')->count()); ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?php echo e(__('You have')); ?> <?php echo e(Auth()->user()->unreadNotifications->where('type', 'App\Notifications\AdminOrder')->count()); ?> notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <?php $__currentLoopData = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\AdminOrder'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>

                     
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> <?php echo e($notification->data['data']); ?>

                      </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  </ul>
                </li>
                <li class="footer"><a href="<?php echo e(route('deleteNotification')); ?>"><?php echo e(__('Clear all')); ?></a></li>
              </ul>
            </li>
            <?php endif; ?>
          <!-- Tasks: style can be found in dropdown.less -->
            <!-- Messages: style can be found in dropdown.less-->
            <?php
                $languages = App\Language::all(); 
            ?>
            <li class="dropdown admin-nav language">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></button>

              <ul class="dropdown-menu animated flipInX">
                <?php if(isset($languages) && count($languages) > 0): ?>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><?php echo e($language->name); ?> (<?php echo e($language->local); ?>) </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
              
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li><a href="<?php echo e(url('/')); ?>" target="_blank" class="visit site" ><?php echo e(__('VisitSite')); ?></a></li>


            

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                  <img src="<?php echo e(asset('images/user_img/'.Auth()->User()['user_img'])); ?>" class="user-image" alt="">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="user-image" alt="">
                <?php endif; ?>
                <span class="hidden-xs">Hi ! <?php echo e(Auth()->User()['fname']); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                   <?php if(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth()->user()['user_img'])): ?>
                    <img src="<?php echo e(asset('images/user_img/'.Auth()->User()['user_img'])); ?>" class="img-circle" alt="User Image">
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="">
                  <?php endif; ?>
                  </br>
                  <p>
                   <?php echo e(Auth()->User()['fname']); ?>

                    <small><?php echo e(__('MemberSince')); ?>: <?php echo e(date('jS F Y',strtotime( Auth()->User()['created_at']))); ?></small>
                  </p>
                  
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo e(url('user/edit/'.Auth()->User()->id)); ?>" class="btn btn-default btn-flat"><?php echo e(__('Profile')); ?></a>
                  </div>
                  <div class="pull-right">

                    <a class="btn btn-default btn-flat" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form-1').submit();">
                    <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form-1" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    </form>
                  </div>
                </li>
              </ul>

            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                 <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form-2').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form-2" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <?php if(Auth::User()->role == "admin"): ?>
      <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(Auth::User()->role == "instructor"): ?>
      <?php echo $__env->make('instructor.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <?php echo $__env->yieldContent('body'); ?>
      <!-- Main content end-->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <?php echo e($gsetting->project_title); ?> <?php if(Auth()->user()->role == "admin"): ?> (version <?php echo e(env('APP_VERSION')); ?>) <?php endif; ?>
      </div>
     <?php echo e($gsetting->cpy_txt); ?> 
    </footer>
    <!-- /.control-sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo e(url('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/select2.min.js')); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo e(url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script> <!-- DataTables -->
  <script src="<?php echo e(url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script> <!-- SlimScroll -->
  <script src="<?php echo e(url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script> <!-- FastClick -->
  <script src="<?php echo e(url('admin/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('admin/dist/js/adminlte.min.js')); ?>"></script> <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(url('admin/dist/js/demo.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('admin/bower_components/PACE/pace.min.js')); ?>"></script> 
  <!-- PACE -->
  <script src="<?php echo e(URL::asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script> <!-- bootstrap datepicker -->
  <script src="<?php echo e(url('admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-toggle.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-file-input.js')); ?>"></script>
  <script src="<?php echo e(url('js/fontawesome-iconpicker.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/courseclass.js')); ?>"></script>
   
  <script src="<?php echo e(url('admin/js/tinymce.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/bower_components/moment/moment.js')); ?>"></script>
  <script src="<?php echo e(url('js/datepicker.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-js.js')); ?>"></script>

  <script src="<?php echo e(url('admin/js/dataTables.buttons.min.js')); ?>"></script> 
  <script src="<?php echo e(url('admin/js/buttons.flash.min.js')); ?>"></script> 
  <script src="<?php echo e(url('admin/js/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/vfs_fonts.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(url('admin/js/buttons.print.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="<?php echo e(url('js/subscription-pricing.js')); ?>"></script>



<script>var youtubekey = <?php echo json_encode(env('YOUTUBE_API_KEY'), 15, 512) ?>;</script>
<?php if($gsetting->youtube_enable == 1): ?>
<script src="<?php echo e(url('js/youtube.js')); ?>"></script>
<?php endif; ?>

<script>var vimeokey = <?php echo json_encode(env('VIMEO_ACCESS'), 15, 512) ?>;</script>

<?php if($gsetting->vimeo_enable == 1): ?>
<script src="<?php echo e(url('js/vimeo.js')); ?>"></script>

<?php endif; ?>

  
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    }) 
  </script>

  <script>
    $(document).ready(function() {
      $('#example2').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
      });
    });
  </script>

  
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

  <?php if(in_array($language,$rtl)): ?>
    <script type="text/javascript">
      
      tinymce.init({   
        selector: 'textarea#detail, textarea#detail2, textarea#detail3',    
        rtl_ui:true,
        directionality :"rtl",
        height: 250,
        menubar: 'edit view insert format tools table tc',
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        image_dimensions: false,
        image_class_list: [
            {title: 'Responsive', value: 'img-fluid'}
        ],
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks fullscreen',
          'insertdatetime media table paste wordcount',
          'textcolor',
        ],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        content_css: '//www.tiny.cloud/css/codepen.min.css'  
          });
    </script>

  <?php else: ?>

    <script type="text/javascript">
      
      tinymce.init({   
        selector: 'textarea#detail, textarea#detail2, textarea#detail3', 
        height: 250,
        menubar: 'edit view insert format tools table tc',
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        image_dimensions: false,
        image_class_list: [
            {title: 'Responsive', value: 'img-fluid'}
        ],
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks fullscreen',
          'insertdatetime media table paste wordcount',
          'textcolor',
        ],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        content_css: '//www.tiny.cloud/css/codepen.min.css'  
          });
    </script>
  <?php endif; ?>

  
 
  

  <script>
    window.setTimeout(function(){
      $(".alert").fadeTo(300,0).slideUp(500, function(){
        $(this).remove();
      });
    },2000);
  </script>

  <script>
 
    $(function () {
      
      $('.action-destroy').on('click', function () {
        $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
      });

      $(document).on('click', '.action-placement', function (e) {
        $('.action-placement').removeClass('active');
        $(this).addClass('active');
        $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
        e.preventDefault();
        return false;
      });

    });

  </script>
  
  <script>
    $('#datepicker').datepicker({
      autoclose: true,
      changeYear: true,
    })
  </script>




  <script>
    $(function(){
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
          $('#nav-tab a[href="' + activeTab + '"]').tab('show');
      }
    });
  </script>

  <script>
    $(function() {
        $('form').attr('autocomplete','off');
    });
  </script>

  <script>
    $(function() {
      $('.js-example-basic-single').select2(
        {
          tags: true,
          tokenSeparators: [',', ' ']
        });
    });
  </script>

  <script >
    
      $(".toggle-password").on('click', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if(input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
      });
  </script>

  <?php if($gsetting->rightclick=='1'): ?>
    <script>
      (function($) {
        "use strict";
          $(function() {
            $(document).on("contextmenu",function(e) {
               return false;
            });
        });
      })(jQuery);
    </script>
  <?php endif; ?>
  <?php if($gsetting->inspect=='1'): ?>
    <script>
      (function($) {
      "use strict";
           document.onkeydown = function(e) {
          if(event.keyCode == 123) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
             return false;
          }
        }
      })(jQuery);
    </script>
  <?php endif; ?>

<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\layoutsold\master.blade.php ENDPATH**/ ?>