
<?php $__env->startSection('title','All User'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Roles')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Roles')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
        <a href="<?php echo e(route('roles.create')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Create a new role')); ?> </a>
<?php endif; ?>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">   
    <div class="row">
  
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
               
                 
                    <h5 class="card-title"> <?php echo e(__("Roles")); ?></h5>
                  
                  
              </div>
              
              <div class="card-body">
               
                  <div class="table-responsive">
                    <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Role Name")); ?>

                            </th>
                            <th>
                                <?php echo e(__('Action')); ?>

                            </th>
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

<?php $__env->stopSection(); ?>     
                        
<?php $__env->startSection('script'); ?>
    <script>
       $(document).ready(function () {
        var table = $('#roletable').DataTable({
            lengthChange: false,
            responsive: true,
            serverSide: true,
            autoWidth: true,
            ajax: '<?php echo e(route('roles.index')); ?>',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'name',
                    name: 'roles.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable : false
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf',
                'print'
            ],
            order: [
                [1, 'ASC']
            ]
        });

    });
    </script>
<?php $__env->stopSection(); ?>    
            
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codingwa/magic.codingwala.com/resources/views/roles/index.blade.php ENDPATH**/ ?>