
<?php $__env->startSection('title','Add currency'); ?>
<?php $__env->startSection('breadcum'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Currency')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Currency')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-body">
          <div class="content-main-block mrg-t-40">
            <div class="content-block box-body content-block-two" style="padding:5px">
                <form action="<?php echo e(route('currency.exchanges.save')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <small>
                      <a target="__blank" title="Get your keys from here" class="text-info pull-right"
                        href="https://openexchangerates.org/signup/free"><i class="fa fa-key"></i><?php echo e(__('Get Your OPEN EXCHANGE RATE
                        KEY From
                        Here')); ?> </a>
                    </small>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label><?php echo e(__('OPEN EXCHANGE RATE KEY')); ?> : <span class="required">*</span></label>
                      <input required id="OPEN_EXCHANGE_RATE_KEY" value="<?php echo e(env('OPEN_EXCHANGE_RATE_KEY')); ?>"
                        name="OPEN_EXCHANGE_RATE_KEY" type="text" class="form-control"
                        placeholder="enter OPEN EXCHANGE RATE KEY">

                        <small class="text-info">
                          <i class="fa fa-question-circle"></i> <?php echo e(__("It will be used to fetch exchange rates of currenies.")); ?>

                        </small>
                    </div>
                    <div class="form-group col-md-6">
                      <button type="submit"  class="btn btn-md btn-primary-rgba">
                            <i class="fa fa-save"></i> <?php echo e(__('Save')); ?>

                      </button>
                    </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-body"> 


            <div class="widgetbar">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency.create')): ?>
                <a href="" data-toggle="modal" data-target="#addcurrency" class="float-right btn btn-primary-rgba mr-2"> <i class="feather icon-plus mr-2"></i><?php echo e(__('Add new currency')); ?></button>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency.edit')): ?>
                <a href="" class="float-right btn btn-success-rgba mr-2 updateRateBtn"><span id="buttontext"><?php echo e(__('Update Currency Rate')); ?></span></a>
                <?php endif; ?>
            </div> 

            <div style="display:none;" class="alert alert-success" id="msg_div">
                  <center><span id="res_message"></span></center>
            </div>
            <div class="content-block box-body content-block-two">
                <table id="currency" class="table table-hover db">
                    <thead>
                      <tr class="table-heading-row">
                        <th>
                         #
                          
                        </th>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Code')); ?></th>
                        <th><?php echo e(__('Symbol')); ?></th>
                        <th><?php echo e(__('Position')); ?></th>
                        <th><?php echo e(__('Exchange rate')); ?></th>
                        <th><?php echo e(__("Created at")); ?></th>
                        <th><?php echo e(__("Action")); ?></th>
                        <th><?php echo e(__("Update")); ?></th>
                        <th><?php echo e(__("Default")); ?></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
          </div>


          <div id="addcurrency" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="my-modal-title"><?php echo e(__("Add new currency")); ?></h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo e(route("currency.store")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="my-input"><?php echo e(__('Currency')); ?> (ISO code 3): <span class="text-danger">*</span> </label>
                            <input required class="form-control" type="text" name="code">
                        </div>
     
                      
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i><?php echo e(__('Create')); ?> </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>


      </div>

    </div>
  </div>


    



    

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    
    <script>
    

        $(document).ready(function() {
           var table = $('#currency').DataTable({
                lengthChange: false,
                responsive: true,
                serverSide: true,
                ajax: '<?php echo e(route('currency.index')); ?>',
                columns: [

                   {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false, orderable : false},
                  {data : 'name', name : 'currencies.name'},
                  {data : 'code', name : 'currencies.code'},
                  {data : 'symbol', name : 'currencies.symbol'},
                  {data : 'position', name : 'position', searchable : false, orderable : false},
                  {data : 'exchange_rate', name : 'currencies.exchange_rate'},
                  {data : 'created_at', name : 'currencies.created_at'},
                  {data : 'action', name : 'action', searchable : false, orderable : false},
                  {data : 'update', name : 'update', searchable : false, orderable : false},
                  {data : 'default', name : 'default', searchable : false, orderable : false},
                  
                 
                ],
                dom : 'lBfrtip',
                buttons : [
                    'csv','excel','pdf','print'
                ],
                order : [[0,'desc']]
            });

            table.buttons().container().appendTo('#userstable .col-md-3:eq(0)');
        


            $('.updateRateBtn').on('click',function(){
              $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: '<?php echo e(route("auto.update.rates")); ?>',
                  beforeSend: function() {
                    $('#buttontext').html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
                  },
                  success: function(data) {
                    table.draw();
                    console.log(data);
                    $('#msg_div').show();
                    $('#res_message').html('');
                    $('#res_message').append(data.msg);
                    $('#buttontext').html('Update Currency Rate');
                    setTimeout(function(){
                        $('#res_message').hide();
                        $('#msg_div').hide();

                    },2000);
                  
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                  }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\currency\manage\index.blade.php ENDPATH**/ ?>