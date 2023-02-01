
<?php $__env->startSection('title', 'Blizzard Settings - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
   <?php echo e(__('Blizzard Settings')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Blizzard Settings')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(route('themesettings.index')); ?>" class="btn btn-primary-rgba">
        <i class="feather icon-arrow-left mr-2"></i>
        <?php echo e(__("Back")); ?>

    </a>
  </div>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <div class="row">

    <!-- row started -->
    <div class="col-lg-12">

        
        <?php if($errors->any()): ?> 
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
        <?php endif; ?>
    
        <div class="card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Blizzard settings')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <!-- form start -->
				<form action="<?php echo e(route('configuration.update','Blizzard')); ?>" method="POST" enctype="multipart/form-data">
		               <?php echo csrf_field(); ?>
                       <div class="row">
                            <!-- Mix Theme Folder -->
                           <div class="col-md-6">
                                <div class="form-group">
                                <span class="float-right">
                                        <a 
                                        href="https://mediacitydocs.gitbook.io/skillify-eclass-lms-vue-theme/installation/domain-configuration"
                                        target="_blank">
                                            <i class="feather icon-alert-octagon"></i>
                                            <?php echo e(__('For more information click here')); ?>

                                        </a>
                                    </span>
                                    
                                <label for="mix_theme">
                                    <?php echo e(__('Mix Theme Folder')); ?>

                                </label>
                                <input value="<?php echo e(env('MIX_THEME_FOLDER')); ?>" type="text" class="form-control" placeholder="Please enter value according to your domain configuration" name="mix_theme" required>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group col-md-6">
                                <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> :</label>
                                <br>
                                <input type="checkbox" class="custom_toggle" name="status" <?php echo e($module->isStatus(1) ? 'checked' : ''); ?> />
                            </div>
                        
                            <!-- Client Secret KEY -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Client Secret KEY :')); ?></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input readonly value="<?php echo e($key ? $key->secret_key : ""); ?>" type="text" name="apikey" class="form-control keyupdate" placeholder="API KEY For Blizzard Theme" aria-label="Username" aria-describedby="basic-addon1">
                                        
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary re-gen-key" type="button">
                                                <i class="re_icon fa fa-refresh"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <span class="alert alert-danger">
                                        <i class="feather icon-alert-triangle mr-2"></i>
                                        <b>Important:</b>
                                        <a href="<?php echo e(url('/getsecretkey')); ?>" class="text-danger" target="_blank">
                                            <u> <?php echo e(__('Please generate API key first.')); ?> </u>
                                        </a>
                                    </span>
                                    
                                </div>
                            </div>
                            
                            <!-- Purcahse Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Purchase Code :')); ?></label>
                                    <input id="pass_log_id6" type="password" placeholder="Please enter valid purchase code" class="form-control"  name="purchase_code" value="<?php echo e(old('purchase_code')); ?>" >
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password6"></span>
                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> 
                                        <?php echo e(__('Enter envanto purchase code.')); ?>

                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->

						<!-- Update Button -->
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Update")); ?>

                            </button>
                        </div>

		          	</form>
                  <!-- form end -->
                </div>
				<!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->

<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
    <script>
        "use Strict";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.toggle-password6', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#pass_log_id6");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });

        $('.re-gen-key').on('click',function(){
            $.ajax({
                method : 'POST',
                datatype : 'json',
                url    : <?php echo json_encode(route('regen.key'), 15, 512) ?>,
                beforeSend : function(){
                    $('.re_icon').addClass('fa-spin fa-fw');
                },
                success : function(data){

                    $('.re_icon').removeClass('fa-spin fa-fw');
                
                    if(data.status != 'success'){
                        alert(data.msg);
                        return false;
                    }else{

                        $('.keyupdate').val(data.key);

                    }

                },
                error : function(jqXHR, err){
                    alert(err);
                    $('.re_icon').removeClass('fa-spin fa-fw');
                    return false;
                }
                })
        });
    </script>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\configuration.blade.php ENDPATH**/ ?>