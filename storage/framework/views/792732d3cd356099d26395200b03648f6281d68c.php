
<?php $__env->startSection('title', 'Videosetting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Videosetting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Videosetting')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="text-danger" >&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('VideoSetting')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form" action="<?php echo e(route('videosetting.update')); ?>" method="POST" novalidate
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="text-dark"><?php echo e(__('Url')); ?>:</label>
                            <input name="url" value="<?php echo e($videosetting->url); ?>" autofocus="" type="url"
                                class="<?php echo e($errors->has('url') ? ' is-invalid' : ''); ?> form-control"
                                placeholder="Enter Url" required="">
                            <div class="invalid-feedback">
                                <?php echo e(__('Please enter Url!')); ?>.
                            </div>
                            <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Only applicable on youtube embedded url.</')); ?>small>
                        </div> 
                        <div class="form-group col-md-12">
                            <label class="text-dark"><?php echo e(__('Tittle')); ?>:</label>
                            <input name="tittle" value="<?php echo e($videosetting->tittle); ?>" autofocus="" type="text"
                                class="<?php echo e($errors->has('text') ? ' is-invalid' : ''); ?> form-control"
                                placeholder="Enter Tittle" required="">
                            <div class="invalid-feedback">
                                <?php echo e(__('Please enter tittle!')); ?>.
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-dark"><?php echo e(__('Description')); ?>:</label>
                            <input name="description" value="<?php echo e($videosetting->description); ?>" autofocus="" type="text"
                                class="<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?> form-control"
                                placeholder="Enter description" required="">
                            <div class="invalid-feedback">
                                <?php echo e(__('Please enter description!')); ?>.
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="text-dark" for="exampleInputSlug"><?php echo e(__('Image')); ?>:
                            </label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                </div>
                                <div class="custom-file">

                                    <input type="file" name="image" class="custom-file-input" id="img"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label"
                                        for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                </div>
                            </div>
                            <?php if($videosetting['image'] !== NULL && $videosetting['image'] !== ''): ?>
                            <img src="<?php echo e(url('/images/videosetting/'.$videosetting->image)); ?>" height="100px;" width="100px;" />
                            <?php else: ?>
                            <img src="<?php echo e(Avatar::create($videosetting->tittle)->toBase64()); ?>" alt="course"
                                class="img-fluid">
                            <?php endif; ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\videosetting\index.blade.php ENDPATH**/ ?>