
<?php $__env->startSection('title','All Admins'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Admins')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admins')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
            <a href="<?php echo e(route('alladmin.add')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Add Admin')); ?></a>    
            </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
    <div class="row">
         <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('All Admins')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="alladmin" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Image')); ?></th>
                                    <th><?php echo e(__('Users')); ?></th>
                                    <th><?php echo e(__('Login As User')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                       <tbody></tbody>
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
<!-- script for datatable start -->
<script type="text/javascript">
    $(function () {
      
      var table = $('#alladmin').DataTable({
          processing: true,
          serverSide: true,
          responsive:true,
          searchDelay : 1000,
          stateSave : true,
          ajax: '<?php echo e(route('alladmin.index')); ?>',
          columns: [
              {data: 'DT_RowIndex', name: 'users.id'},
              {data: 'image', name: 'image', orderable: false ,searchable: false},
              {data: 'name' ,name: 'users.fname'},
              {data: 'loginasuser', name: 'loginasuser' , orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false ,searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>
<script>
    $(document).on("change", ".user", function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/status',
            data: {
                'status': $(this).is(':checked') ? 1 : 0,
                'id': $(this).data('id')
            },
            success: function(data){
            var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
              });
              warning.get().click(function() {
                warning.remove();
              });
          }
        });
    })
</script>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<!-- script for datatable end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/magic.bizz-manager.com/public_html/resources/views/admin/alladmin/index.blade.php ENDPATH**/ ?>