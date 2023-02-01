
<?php $__env->startSection('title', 'All Testimonial - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Testimonial')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Front Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Testimonial')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.testimonial.create')): ?>
      <a href="<?php echo e(url('testimonial/create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Testimonal")); ?></a>
      <?php endif; ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.testimonial.delete')): ?>
      <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
      <?php endif; ?>                          
      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                  </div>
                  <div class="modal-footer">
                    <form method="post" action="<?php echo e(action('BulkdeleteController@testimonaldeleteAll')); ?>

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
  <!-- Start row -->
  <div class="row">
  
      <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="box-title"><?php echo e(__('Testimonial')); ?></h5>
              </div>
              <div class="card-body">
               
                  <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                              <label for="checkboxAll" class="material-checkbox"></label> 
                              #</th>
                            <th><?php echo e(__('Image')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
                          
                            <th><?php echo e(__('Rating')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                           
                          </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td> <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($p->id); ?>" id="checkbox<?php echo e($p->id); ?>">
                              <label for="checkbox<?php echo e($p->id); ?>" class="material-checkbox"></label> 
                              <?php echo e($key+1); ?></td>
                            <td>
                              <img src="images/testimonial/<?php echo $p['image']; ?>" class="img-circle">
                            </td>
                            <td><?php echo e($p->client_name); ?></td>
                           
                          </p></td>
                            <td>
                             
                              <?php for($i = 1; $i <= 5; $i++): ?> <?php if($i<=$p->rating): ?>
                               <i class='fa fa-star' style='color:orange'></i>
                               <?php else: ?>
                               <i class='fa fa-star' style='color:#ccc'></i>
                               <?php endif; ?>
                               <?php endfor; ?>
                       </td>
                            <td>
                              <label class="switch">
                                <input class="testimonial" type="checkbox"  data-id="<?php echo e($p->id); ?>" name="status" <?php echo e($p->status == '1' ? 'checked' : ''); ?>>
                                <span class="knob"></span>
                              </label>
                            </td>
                                
                           
                            <td>
                              <div class="dropdown">
                                  <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.testimonial.edit')): ?>
                                      <a class="dropdown-item" href="<?php echo e(url('testimonial/'.$p->id.'/edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.testimonial.delete')): ?>
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
                                            <form  method="post" action="<?php echo e(url('testimonial/'.$p->id)); ?>

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
           
            
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tr>
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
$(document).on("change",".testimonial",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '<?php echo e(url("quickupdate/testimonial")); ?>',
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
</script>
<?php $__env->stopSection(); ?>
                

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\testimonial\index.blade.php ENDPATH**/ ?>