<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(url('installer/css/shards.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('installer/css/custom.css')); ?>">
    
    <title><?php echo e(__('-|| Updater ||-')); ?></title>

</head>

<body>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="m-3 text-center text-dark ">
                    <?php echo e(__('Welcome To Update Wizard')); ?>

                </h3>
            </div>
            <div class="card-body" id="stepbox">
                <form autocomplete="off" action="<?php echo e(route('update.proccess')); ?>" id="updaterform" method="POST"
                    class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <blockquote class="text-justify text-dark font-weight-normal">
                        <p class="font-weight-bold text-primary"><i class="fa fa-check-circle"></i> <?php echo e(__('Before update make
                            sure you take your database backup and script backup from server so in case if anything goes
                            wrong you can restore it.')); ?></p>
                        <hr>
                        
                        <p><?php echo e(__('Before update make sure you read this')); ?> <b><?php echo e(__('FAQ.')); ?></b></p>
                        <ul>
                            <li><b><?php echo e(__('Q.')); ?></b> <?php echo e(__('Will This Update affect my existing data eg. product data, orders?')); ?>

                                <br>
                                <b><?php echo e(__('Answer:')); ?></b> <?php echo e(__('No it will not affect your existing .')); ?>

                            </li>
                            <br>
                            
                            <li><b><?php echo e(__('Q.')); ?></b> <?php echo e(__('Will This Update affect my customization eg. in ')); ?><b><?php echo e(__('CSS,JS or in Core code')); ?></b>
                                ?
                                <br>
                                <b><?php echo e(__('Answer:')); ?></b> <?php echo e(__('Yes it will affect your changes if you did changes in code files')); ?> <br> <?php echo e(__('If you customize')); ?> <B><?php echo e(__('CSS or JS')); ?></B> <?php echo e(__('using')); ?> <b><?php echo e(__('Admin -> Custom Style Setting')); ?></b> <?php echo e(__('Than all your change will not affect else it will affect.')); ?>

                            </li>
                        </ul>


                    </blockquote>
                    <hr>

                     <h3><?php echo e(__('Domain Detail')); ?></h3>
                  <hr/>
                  <div class="row">

                    <div class="eyeCy col-md-6 mb-3">
                      <label for="validationCustom02"><?php echo e(__('Domain Name:')); ?></label>
                      <input name="domain" type="text" class="form-control <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="" required>
                     
                      <div class="valid-feedback">
                        <?php echo e(__('Looks good!')); ?>

                      </div>
                      <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback">
                        <?php echo e($message); ?>

                      </div>                          
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                         
                    </div>           

                    <div class="eyeCy col-md-6 mb-3">
                      <label for="validationCustom02"><?php echo e(__('Purchase Code:')); ?></label>
                      <input name="code" type="password" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom02" placeholder="<?php echo e(__('Please enter valid purchase code')); ?>" value="" required>
                      <span toggle="#validationCustom02" class="eye fa fa-fw fa-eye field-icon toggle-password"></span>
                      <div class="valid-feedback">
                        <?php echo e(__('Looks good!')); ?>

                      </div>

                        <?php if($errors->any()): ?>
                          <h6 class="text-danger alert alert-error"><?php echo e($errors->first()); ?></h6>
                        <?php endif; ?>
                      <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback">
                        <?php echo e($message); ?>

                      </div> 
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                         
                        

                        <small class="text-muted font-weight-bold">
                          <i class="fa fa-question-circle"></i> <a title="<?php echo e(__('Click to know')); ?>" class="text-muted" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code" target="_blank"><?php echo e(__('Where Is My Purchase Code')); ?> ?</a>
                        </small>
                    </div>            
                  </div>
                    <div class="custom-control custom-checkbox">
                        <input required="" type="checkbox" class="custom-control-input" id="customCheck1" name="eula" />
                        <label class="custom-control-label"
                            for="customCheck1"><b><?php echo e(__('I read the update procedure carefully and I take backup already.')); ?></b></label>
                    </div>
                    <small class="font-weight-normal text-center">
                        <a target="__blank"
                            href="https://codecanyon.net/item/eclass-learning-management-system/25613271"><?php echo e(__('Read
                            complete changelog of update by clicking here.')); ?></a>
                    </small>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button class="updatebtn btn btn-primary" type="submit"><?php echo e(__('Update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center m-3 text-white">&copy;<?php echo e(date('Y')); ?> | <?php echo e(__('eclass Updater')); ?> | <a class="text-white"
                href="http://mediacity.co.in"><?php echo e(__('Mediacity')); ?></a></p>
    </div>

    <div class="corner-ribbon bottom-right sticky green shadow"><?php echo e(__('Updater')); ?> </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(url('installer/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(url('installer/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(url('installer/js/additional-methods.min.js')); ?>"></script>
    <!-- Essential JS UI widget -->
    <script src="<?php echo e(url('installer/js/ej.web.all.min.js')); ?>"></script>
    <script src="<?php echo e(url('installer/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('installer/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('installer/js/shards.min.js')); ?>"></script>
    <script>
        var baseUrl = "<?= url('/') ?>";
    </script>
    <script src="<?php echo e(url('js/minstaller.js')); ?>"></script>
    <script>
        $("#updaterform").on('submit', function () {

            if ($(this).valid()) {
                $('.updatebtn').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i><span class="sr-only">Loading...</span> Updating...');
            }

        });
    </script>


    <script>
      
     

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
</body>

</html><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\ota\update.blade.php ENDPATH**/ ?>