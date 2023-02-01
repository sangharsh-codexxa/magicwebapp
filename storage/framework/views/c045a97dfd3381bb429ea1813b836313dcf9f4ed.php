
<?php $__env->startSection('title','All Flashdeals'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('All Flashdeals')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Flashdeals')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('flash-deals.create')): ?>
        <a  href=" <?php echo e(route('flash-sales.create')); ?> " class="btn btn-primary-rgba mr-2">
            <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add new flash sale")); ?>

        </a>
        <?php endif; ?>
    </div>                        
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo e(__("All flashdeals")); ?>

                    </h3>
                </div>

                <div class="card-body">
                    <table id="flashdeals" class="table table-striped">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Deal title")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Start date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("End date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Banner")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                        </thead>

                        <tbody id="sortable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $( function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );
  
     $("#sortable").sortable({
     update: function (e, u) {
      var data = $(this).sortable('serialize');
    //   $(".sortable").attr("id", )
     console.log("ID is ", data);
      $.ajax({
          url: "<?php echo e(route('flash_reposition')); ?>",
          type: 'get',
          data: data,
          dataType: 'json',
          success: function (result) {
            console.log(data);
          }
      });
  
    }
  
  });
</script>
    <script>
            $(function () {
                "use strict";
                var table = $('#flashdeals').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: <?php echo json_encode(route("flash-sales.index"), 15, 512) ?>,
                    language: {
                        searchPlaceholder: "Search deals..."
                    },
                        //$(nRow).attr('id', aData[0]);
                    // $(".sortable").attr("id", 'flashsales.id');

                    columns: [
                        {data: 'DT_RowIndex', name: 'flashsales.position', searchable : false},
                        {data : 'title', name : 'flashsales.title'},
                        {data : 'start_date', name : 'flashsales.start_date'},
                        {data : 'end_date', name : 'flashsales.end_date'},
                        {data : 'background_image', name : 'background_image',searchable : false, orderable : false},
                        {data : 'action', name : 'action',searchable : false, orderable : false},
                    ],
                    dom : 'lBfrtip',
                    buttons : [
                        'csv','excel','pdf','print','colvis'
                    ],
                    order : [[0,'DESC']]
                });

                var myInterval = setInterval(getSortableRow, 1000);

                function getSortableRow(){
                    var allTableData = $("#sortable tr");
                    if(allTableData.length > 0){
                        clearInterval(myInterval);
                        allTableData.each(function(){
                            var ID = $(this).children(".sorting_1").html();
                            $(this).attr("id", "id-"+ID);
                            $(this).addClass("sortable");
                        });
                    }
                    
                }

                // var allTableData = $("#sortable tr td");
                // console.log("lll Td are ", allTableData);
                
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\flashsale\index.blade.php ENDPATH**/ ?>