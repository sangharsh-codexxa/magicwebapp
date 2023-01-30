
<?php $__env->startSection('title',__('Device History')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>

    <?php $__env->slot('heading'); ?>
        <?php echo e(__('Device History')); ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->slot('menu1'); ?>
        <?php echo e(__("Reports")); ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->slot('menu2'); ?>
        <?php echo e(__('Device History')); ?>

    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
   
    <div class="row">
       
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Device History')); ?></h5>
                </div>
                <div class="card-body">
                   
                    <table id="device_reports" class="text-dark w-100 table table-striped table-bordered">
                        <thead>
                            <th><?php echo e(__("#")); ?></th>
                            <th><?php echo e(__("User name")); ?></th>
                            <th><?php echo e(__("IP Address")); ?></th>
                            <th><?php echo e(__("Platform")); ?></th>
                            <th><?php echo e(__("Browser")); ?></th>
                            <th><?php echo e(__("Logged in at")); ?></th>
                            <th><?php echo e(__("Logged out at")); ?></th>
                        </thead>
                    </table>
                       
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(function () {
        "use strict";
        var table = $('#device_reports').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 50,
            searchDelay: 450,
            ajax: '<?php echo e(route("device.logs")); ?>',
            language: {
                searchPlaceholder: "Search in device reports..."
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'username',
                    name: 'users.name'
                },
                {
                    data: 'ip_address',
                    name: 'auth_log.ip_address'
                },
                {
                    data: 'platform',
                    name: 'auth_log.platform'
                },
                {
                    data: 'browser',
                    name: 'auth_log.browser'
                },
                {
                    data: 'login_at',
                    name: 'auth_log.login_at'
                },
                {
                    data: 'logout_at',
                    name: 'auth_log.logout_at'
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [0, 'DESC']
            ]
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/admin/report/history.blade.php ENDPATH**/ ?>