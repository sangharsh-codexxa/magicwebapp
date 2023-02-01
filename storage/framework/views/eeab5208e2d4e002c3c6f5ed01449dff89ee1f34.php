

<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <!-- /.box-header -->
        <div class="box-body">
          <form action="<?php echo e(route('sw.update')); ?>" method="POST">
              <?php echo csrf_field(); ?>
            
              <div class="form-group">
                <label><?php echo e(__('Service Worker Setting:')); ?></label>
                <textarea name="swupdate" class="form-control" id="" cols="30" rows="25"><?php echo e($swjs); ?></textarea>
              </div>
              <div class="box-footer">
              <button type="submit" class="btn btn-md col-md-2 btn-flat btn-primary"><?php echo e(__('Save')); ?>

              </button>
          </form>
        </div>
        <!-- /.box-body -->
     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\pwasetting\sw.blade.php ENDPATH**/ ?>