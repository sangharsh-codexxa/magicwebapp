
<?php $__env->startSection('title','All Workshops'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Workshops')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Workshop Bookings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">

  </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('All Workshops')); ?></h5>
          <div class="row"><div class="col-md-12">
              <select calss="form-control" id="selected-workshop">
                  <option value="0">All</option>
                  <?php $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($workshop->id); ?>"><?php echo e($workshop->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-server" class="table table-striped table-bordered">
              <thead>
                <tr>
                  
                  <th><?php echo e(__('User Name')); ?></th>
                  <th><?php echo e(__('Workshop Name')); ?></th>
                  <th><?php echo e(__('Start Date Time')); ?></th>
                </tr>
              </thead>
              <tbody>
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End col -->
  </div>
  <!-- End row -->
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script>
var tableServer = null;
  $(document).ready(() => {
    tableServer = $('#datatable-server').DataTable({
      processing: true,
      serverSide: true,
      ajax: '<?php echo e(url('list/bookings')); ?>',
    });
    
    $('#selected-workshop').select2()
    $('#selected-workshop').on('change', (e) => {
        var url = `<?php echo e(url('list/bookings')); ?>?workshop_id=${e.target.value}`;
        console.log(url);
        tableServer.ajax.reload(url)
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\workshop\booking.blade.php ENDPATH**/ ?>