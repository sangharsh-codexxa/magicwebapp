
<?php $__env->startSection('title', 'Slider - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Slider')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
   <?php echo e(__('Front Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
   <?php echo e(__('Slider')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders.create')): ?>
      <a href="<?php echo e(url('slider/create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Slider")); ?></a>
      <?php endif; ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders.delete')): ?>
      <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
      <?php endif; ?>                     
      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5  class="modal-title"><?php echo e(__('Delete')); ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                  </div>
                  <div class="modal-footer">
                    
                    
                      <form method="post" action="<?php echo e(action('BulkdeleteController@sliderdeleteAll')); ?>

                      " id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                    
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                   </form>
                  </div>
              </div>
          </div>
      </div>
  </div>                        
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


  <div class="contentbar">   
    <?php if($errors->any()): ?>  
    <div class="alert alert-danger" role="alert">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
    <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="color:red;">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </div>
    <?php endif; ?>             
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Sliders')); ?></h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              
                            <th>
                              <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                              <label for="checkboxAll" class="material-checkbox"></label>
                               #
                           </th>
                            <th><?php echo e(__('Image')); ?></th>
                            <th><?php echo e(__('Heading')); ?></th>
                            <th><?php echo e(__('SubHeading')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                           
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?>
                              <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $i++;?>
                              <tr>
                                  <td> 
                                  <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($cat->id); ?>" id="checkbox<?php echo e($cat->id); ?>">
                                  <label for="checkbox<?php echo e($cat->id); ?>" class="material-checkbox"></label>
                                   <?php echo $i;?> 
                                   </td> 
                                <td>
                                  <img src="<?php echo e(asset('images/slider/'.$cat->image)); ?>" class="img-responsive img-circle" >
                                </td>
                                <td><?php echo e($cat->heading); ?></td>
                                <td><?php echo e($cat->sub_heading); ?></td> 
                               <td>
                                <button type="button" class="btn btn-rounded <?php echo e($cat->status == '1' ? 'checked' : '' ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>" data-toggle="modal" data-target="#myModal">
                                  <?php if( $cat->status): ?>
                                    <?php echo e(__('Active')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Deactive')); ?>

                                    <?php endif; ?> 
                              </button>
                               </td>
                                
    
                               <td>
                                <div class="dropdown">
                                    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders.edit')): ?>
                                        <a class="dropdown-item"   href="<?php echo e(url('slider/'.$cat->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders.delete')): ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                  </td>
                                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-sm">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form  method="post" action="<?php echo e(url('slider/'.$cat->id)); ?>

                                                      "data-parsley-validate class="form-horizontal form-label-left">
                                                      <?php echo e(csrf_field()); ?>

                                                      <?php echo e(method_field('DELETE')); ?>

                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                  </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                 

                              
                           
                            </tr>   
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
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



<?php $__env->startSection('scripts'); ?>


 
<script>
  "use Strict";

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $(function() {
    $(document).on("change",".slider",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '<?php echo e(url('quickupdate/slider')); ?>',
            data: {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
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

    
  })
</script>


<?php $__env->stopSection(); ?>
                                      
                                    
                                     
                                      
                                    
                                   
                              
                               
                                
    
              
                               
                              
                
                               
                              

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\slider\index.blade.php ENDPATH**/ ?>