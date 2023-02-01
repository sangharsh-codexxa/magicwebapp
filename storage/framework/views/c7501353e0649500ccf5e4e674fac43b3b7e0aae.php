
<?php $__env->startSection('title', 'Edit Menu - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Edit Menu')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Edit Menu')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
  <a href="<?php echo e(url('admin/menu')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
  </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
        <div class="card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Edit Menu')); ?></h5>
                </div>
                <!-- card body started -->
                <div class="card-body">
                    <!-- form start -->
                <form action="<?php echo e(url('admin/menu',$menu->id)); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PATCH')); ?>

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
                                                    
                                                    <!-- Title -->
                                                    <div class="form-group col-md-6">
                                                        <label><?php echo e(__("Menu title:")); ?> <span class="required">*</span></label>
                                                        <input name="title" value="<?php echo e($menu->title); ?>" type="text" class="form-control" required
                                                          placeholder="<?php echo e(__("enter menu title")); ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label><?php echo e(__('Status:')); ?></label>
                                                        <br>
                                                        <label class="switch">
                                                          <input type="checkbox" name="status" <?php echo e($menu->status == 1 ? "checked" : ""); ?>>
                                                          <span class="knob"></span>
                                                        </label>
                                                      </div> 
                                                      <div class="form-group col-md-6">
                                                        <label><?php echo e(__('Link by:')); ?> <span class="required">*</span></label>
                                                        <select required class="form-control select2 link_by_edit" name="link_by" id="link_by_edit">
                                                          <option <?php echo e($menu->link_by == 'page' ? "selected" : ""); ?> value="page"><?php echo e(__('Pages')); ?></option>
                                                          <option <?php echo e($menu->link_by == 'url' ? "selected" : ""); ?> value="url"><?php echo e(__("URL")); ?></option>
                                                        </select>
                                                      </div>
                                            
                                                      <div class="form-group col-md-6 pagebox_edit" id="pagebox_edit" style="<?php echo e($menu->link_by == 'page' ? '' : 'display:none;'); ?>">
                                                        <label><?php echo e(__('Select pages:')); ?> <span class="required">*</span></label>
                                                        <select <?php echo e($menu->link_by == 'page' ? 'required' : ''); ?> class="form-control page_id_edit" name="page_id"
                                                          id="page_id_edit">
                                                          <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <option <?php echo e($menu->page_id == $page->id ? "selected"  : ""); ?> value="<?php echo e($page->id); ?>"><?php echo e($page->title); ?>

                                                          </option>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                      </div>
                                            
                                                      <div id="urlbox_edit" class="urlbox_edit form-group col-md-6" style="<?php echo e($menu->link_by == 'url' ? '' : 'display:none;'); ?>">
                                                        <label><?php echo e(__("URL:")); ?> <span class="required">*</span></label>
                                                        <input value="<?php echo e($menu->url); ?>" class="form-control" type="url" placeholder="<?php echo e(__("enter custom url")); ?>" name="url"
                                                          id="inputurl-edit">
                                                      </div>


                                                      <div class="form-group col-md-6">
                                                        <label><?php echo e(__("Position:")); ?> <span class="text-danger">*</span></label>
                                                        <select required class="form-control select2 link_by_position" name="position_menu" id="link_by_position">
                                                          <option  <?php echo e($menu->position_menu == 'top' ? "selected" : ""); ?> value="top"><?php echo e(__('Top')); ?></option>
                                                          <option  <?php echo e($menu->position_menu == 'footer' ? "selected" : ""); ?> value="footer"><?php echo e(__("Footer")); ?></option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group col-md-6 footerbox_edit" id="footerbox_edit" style="<?php echo e($menu->position_menu == 'footer' ? '' : 'display:none;'); ?>">
                                                        <label><?php echo e(__("Select footer position:")); ?> <span class="text-danger">*</span></label>
                                                        <select required="" class="form-control select2 footer_edit" name="footer" id="footer_edit">
                                                          <option <?php echo e($menu->footer == 'widget2' ? "selected" : ""); ?>  value="widget2"><?php echo e(__("Widget2")); ?></option>
                                                          <option  <?php echo e($menu->footer == 'widget3' ? "selected" : ""); ?>  value="widget3"><?php echo e(__('Widget3')); ?></option>
                                                          <option <?php echo e($menu->footer == 'widget4' ? "selected" : ""); ?>  value="widget4"><?php echo e(__('Widget4')); ?></option>
                                                        </select>
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
                  <!-- form end -->
                  
                
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('js/footermenu.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\menu\edit.blade.php ENDPATH**/ ?>