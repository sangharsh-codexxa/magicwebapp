
<?php $__env->startSection('title','Edit Refund Policy'); ?>
<?php $__env->startSection('maincontent'); ?>

<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

<?php $__env->slot('heading'); ?>
<?php echo e(__('Edit Refund Policy')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Refund Policy')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
  <a href="<?php echo e(url('refundpolicy')); ?>" class="btn btn-primary-rgba"><i
      class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
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
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('Edit')); ?> <?php echo e(__('RefundPolicy')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <form id="demo-form2" method="post" action="<?php echo e(url('refundpolicy/'.$return->id)); ?>" data-parsley-validate
            class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PATCH')); ?>


            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputName"><?php echo e(__('Name')); ?>:</label>
                <input type="text" class="form-control" name="name" id="exampleInputTitle" value="<?php echo e($return->name); ?>">
              </div>
              <div class="col-md-6">
                <label for="exampleInputSlug"><?php echo e(__('Days')); ?>:</label>
                <input type="text" class="form-control" name="days" id="exampleInputPassword1"
                  value="<?php echo e($return->days); ?>">
               
              </div>
              <br>
              <br>
              <br>

              
          

            
              <div class="col-md-12 mt-3">
                <label for="exampleInputDetails"><?php echo e(__('Detail')); ?>:</label>
                <textarea name="detail" rows="5" class="form-control"><?php echo e($return->detail); ?></textarea>
              </div>
           
            <br>
            <div class="col-md-6 mt-3">
              <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
              <input id="cb10" type="checkbox" class="custom_toggle" name="status"
                <?php echo e($return->status==1 ? 'checked' : ''); ?> />
            
              
            </div>

          

            <div class="col-md-12 mt-3">
             
                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                  <?php echo e(__('Reset')); ?></button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Update')); ?></button>
              </div>
            </div>
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script>
  tinymce.init({
    selector: '#editor1,#editor2,.editor',
    height: 350,
    menubar: 'edit view insert format tools table tc',
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks fullscreen',
      'insertdatetime media table paste wordcount'
    ],
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\return_policy\edit.blade.php ENDPATH**/ ?>