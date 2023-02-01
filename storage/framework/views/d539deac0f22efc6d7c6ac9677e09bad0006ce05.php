
<?php $__env->startSection('title', 'Drop-down  - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Drop-down ')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Drop-down ')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Drop down Setting')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('dropdown.update',$dsetting->id)); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo method_field("PUT"); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="text-dark" for="city_id"><?php echo e(__('Select Role')); ?>: </label>
                            <select  class="form-control select2" name="role_id">
                              <option value="none" selected disabled hidden>
                                <?php echo e(__('Please')); ?> <?php echo e(__('SelectanOption')); ?>

                              </option>
                              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($role->id); ?>" <?php echo e($dsetting->role_id == $role->role_id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Courses')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch1" name="my_courses"
                                    <?php echo e($dsetting->my_courses == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Wishlist ')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch2" name="my_wishlist"
                                    <?php echo e($dsetting->my_wishlist == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Purchased History')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch3" name="purchased_history"
                                    <?php echo e($dsetting->purchased_history == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Profile')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch4" name="my_profile"
                                    <?php echo e($dsetting->my_profile == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Flash Deal ')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch5" name="flash_deal"
                                    <?php echo e($dsetting->flash_deal == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Donation')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch6" name="donation"
                                    <?php echo e($dsetting->donation == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Wallet')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch7" name="my_wallet"
                                    <?php echo e($dsetting->my_wallet == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Affiliate')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch8" name="affilate"
                                    <?php echo e($dsetting->affilate == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Compare')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch9" name="compare"
                                    <?php echo e($dsetting->compare == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Search Job')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch10" name="search_job"
                                    <?php echo e($dsetting->search_job == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Job Portal')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch11" name="job_portal"
                                    <?php echo e($dsetting->job_portal == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Forum and discussion')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch12" name="form_enable"
                                    <?php echo e($dsetting->form_enable == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('My Leadership')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch13" name="my_leadership"
                                    <?php echo e($dsetting->my_leadership == 1 ? 'checked' : ''); ?> />
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-dark"><?php echo e(__('Affiliate Dashboard')); ?> :</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch14" name="affilate_dashboard"
                                    <?php echo e($dsetting->affilate_dashboard == 1 ? 'checked' : ''); ?> />
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                                <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                <?php echo e(__("Update")); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\drop\edit.blade.php ENDPATH**/ ?>