
<!-- form start -->
<form action="<?php echo e(route('manifest.update')); ?>" method="POST">
  <?php echo csrf_field(); ?>
      <!-- row start -->
      <div class="row">
          <div class="col-md-12">
              <!-- card start -->
              <div class="card">
                  <!-- card body start -->
                  <div class="card-body">
                      <!-- row start -->
                        <div class="row">
                            
                            <div class="col-md-12">
                                <!-- row start -->
                                <div class="row">
                                  
                                  <!-- AppName -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="text-dark"><?php echo e(__('AppName')); ?>: </label>
                                          <input disabled class="form-control" type="text" name="app_name" value="<?php echo e(config("app.name")); ?>"/>
                                      </div>
                                  </div>

                                  <!-- ThemeColorforheader -->
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="text-dark" ><?php echo e(__('ThemeColorforheader')); ?> : </label>
                                          <input name="pwa_theme" class="form-control" type="color" value="<?php echo e($env_files['PWA_THEME_COLOR']); ?>"/>
                                      </div>
                                  </div>

                                  <!-- BackgroundColor -->
                                  <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="text-dark" for=""><?php echo e(__('BackgroundColor')); ?> :</label>
                                    <input name="pwa_bg" class="form-control" type="color" value="<?php echo e($env_files['PWA_BG_COLOR']); ?>"/>
                                    </div>
                                </div>

                                <!-- pwa_enable -->
                                <div class="form-group col-md-6">
                                    <label class="text-dark" for="exampleInputDetails"><?php echo e(__('PWA Enable')); ?> :</label><br>
                                    <input type="checkbox" class="custom_toggle" name="pwa_enable" <?php echo e($env_files['PWA_ENABLE'] == '1' ? 'checked' : ''); ?> />
                                    <input type="hidden"  name="free" value="0" for="status" id="status">
                                </div>

                                <!-- create and close button -->
                                  <div class="col-md-12">
                                      <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                      <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                      <?php echo e(__("Update")); ?></button>
                                  </div>

                                </div><!-- row end -->
                            </div><!-- col end -->
                        </div><!-- row end -->

                  </div><!-- card body end -->
              </div><!-- card end -->
          </div><!-- col end -->
      </div><!-- row end -->
</form>
                 

<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\pwasetting\manifest.blade.php ENDPATH**/ ?>