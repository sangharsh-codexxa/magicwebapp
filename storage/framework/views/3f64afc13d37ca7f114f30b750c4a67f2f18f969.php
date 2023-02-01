
<?php $__env->startSection('title', 'Add Instructorskill - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Add Instructorskill')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Add Instructorskill')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <a href="<?php echo e(url('instructor/skills')); ?>" class="btn btn-primary-rgba"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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
                    <h5 class="card-box"> <?php echo e(__('Add')); ?> <?php echo e(__('Instructorskill')); ?></h5>
                </div>

                <!-- card body started -->
                <div class="card-body">

                    <!-- form start -->
                    <form action="<?php echo e(action('InstructorskillController@store')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            
                                                    <!-- Title -->
                                                    <div class="form-group col-md-12">
                                                        <label><?php echo e(__("Select Instructor:")); ?> <span
                                                                class="text-danger">*</span></label>
                                                        <select required="" class="form-control select2"
                                                            name="instructor_id">
                                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($datas->id); ?>"><?php echo e($datas->fname); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <!-- Description -->

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Skills')); ?>: <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea id="detail" name="skills"
                                                                class="<?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                placeholder="Please Enter Skills"
                                                                required=""><?php echo e(old('skills')); ?></textarea>
                                                            <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <!-- create and close button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba mr-1"><i
                                                                    class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba"><i
                                                                    class="fa fa-check-circle"></i>
                                                                <?php echo e(__("Create")); ?></button>
                                                        </div>
                                                    </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\instructorskill\create.blade.php ENDPATH**/ ?>