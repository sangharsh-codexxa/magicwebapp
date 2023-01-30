
<?php $__env->startSection('title','All Subcategories'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Subcategories')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Subcategories')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategories.delete')): ?>
    <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
      data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
      <?php endif; ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategories.create')): ?>
    <button type="button" class="float-right btn btn-primary-rgba mr-2" data-toggle="modal" data-target="#create">
      <i class="feather icon-plus mr-2"></i><?php echo e(__("Add Subcategory")); ?></button>
<?php endif; ?>

      
    </a>
  </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box"><?php echo e(__('All Subcategories')); ?></h5>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>
                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label>
                    #</th>
                  <th><?php echo e(__('Category')); ?></th>
                  <th><?php echo e(__('SubCategory')); ?></th>
                  <th><?php echo e(__('Icon')); ?></th>
                  <th><?php echo e(__('Slug')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>

              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                      name='checked[]' value='<?php echo e($cat->id); ?>' id='checkbox<?php echo e($cat->id); ?>'>
                    <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>

                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                            <p><?php echo e(__('Do you really want to delete selected item names here? This process
                              cannot be undone')); ?>.</p>
                          </div>
                          <div class="modal-footer">
                            <form id="bulk_delete_form" method="post" action="<?php echo e(route('subcategories.bulk_delete')); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('POST'); ?>
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                              <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> <?php echo $i; ?>
                  </td>

                  <td><?php if(isset($cat->categories)): ?><?php echo e($cat->categories['title']); ?><?php endif; ?></td>

                  <td><?php echo e($cat->title); ?></td>
                  <td>
                    <div class="index-image">
                      <i class="fa <?php echo e($cat->icon); ?>"></i>
                    </div>
                  </td>
                  <td><?php echo e($cat->slug); ?></td>
                  <td>
                    <button type="button" class="btn btn-rounded <?php echo e($cat->status == '1' ? 'checked' : '' ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>" data-toggle="modal" data-target="#myModal">
                      <?php if( $cat->status): ?>
                        <?php echo e(__('Active')); ?>

                        <?php else: ?>
                        <?php echo e(__('De-active')); ?>

                        <?php endif; ?> 
                  </button>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                          class="feather icon-more-vertical-"></i></button>
                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategories.edit')): ?>
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo e($cat->id); ?>"><i
                            class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategories.delete')): ?>
                        <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>">
                          <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                        </a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="modal fade bd-example" id="edit<?php echo e($cat->id); ?>" role="dialog"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Edit Subcategory')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="demo-form" method="post" action="<?php echo e(url('subcategory/'.$cat->id)); ?>

                              " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field('PUT')); ?>

                  
                          <div class="row">
                  
                            <div class="col-md-6">
                              <label for="exampleInputSlug"><?php echo e(__('SelectCategory')); ?></label>
                              <select name="category_id" class="form-control select2">
                    
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($cou->id); ?>" <?php echo e($cat->category_id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          
                            <div class="col-md-6">
                              <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?>:<span class="redstar">*</span></label>
                              <input type="title" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cat->title); ?>">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                  
                            <div class="col-md-6">
                            <label for="exampleInputTit1e"><?php echo e(__('Slug')); ?>:<sup class="redstar">*</sup></label>
                            <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" placeholder=" Please Enter slug" value="<?php echo e($cat->slug); ?>">
                          </div>
                  
                  
                            <div class="col-md-6">
                              <label for="icon"><?php echo e(__('Icon')); ?>:<span class="redstar">*</span></label>
                              
                              <div class="input-group">
                                    <input type="text" class="form-control iconvalue" name="icon" value="<?php echo e($cat->icon); ?>">
                                    <span class="input-group-append">
                                        <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                                    </span>
                                </div>
                            </div>
                            
                            
                           
                          </div>
                          <br>
                  
                           <div class="row">
                  
                            <div class="col-md-6">
                              <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                                class="redstar text-danger">*</sup></label><br>
                            <input id="status" type="checkbox" class="custom_toggle" <?php echo e($cat->status == '1' ? 'checked' : ''); ?> name="status" />
                            
                            </div>
                          </div>
                          <br>
                  
                  
                  
                          <div class="form-group">
                            <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                              <?php echo e(__('Reset')); ?></button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                              <?php echo e(__('Update')); ?></button>
                          </div>
                     
                    <div class="clear-both"></div>
                        </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                    <!-- delete Modal start -->
                    <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" role="dialog"
                      aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                            <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                          </div>
                          <div class="modal-footer">
                            <form method="post" action="<?php echo e(url('subcategory/'.$cat->id)); ?>" class="pull-right">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field("DELETE")); ?>

                              <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                              <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- delete Model ended -->

                  </td>


                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              </tbody>
            </table>



            <div class="modal fade bd-example-modal-sm" id="create" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Add Subcategory')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="demo-form2" method="post" action="<?php echo e(url('subcategory/')); ?>" data-parsley-validate
                      class="form-horizontal form-label-left" autocomplete="off">
                      <?php echo e(csrf_field()); ?>

                      <div class="box-body">
                        <div class="form-group">
                          <form id="demo-form2" method="post" action="<?php echo e(url('subcategory/')); ?>"
                            data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                            <?php echo e(csrf_field()); ?>


                            <div class="row">
                              <div class="col-md-10">
                                <label for="exampleInputTit1e"><?php echo e(__('Category')); ?></label>
                                <select name="category_id" class="form-control select2">
                                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->title); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="col-md-2">
                                <br>
                                <button type="button" data-dismiss="modal" data-toggle="modal"
                                  data-target="#myModal9" title="AddCategory"
                                  class="btn btn-md btn-primary">+</button>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-6">
                                <label for="exampleInputTit1e"><?php echo e(__('SubCategory')); ?>:<sup
                                    class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="title" id="exampleInputTitle"
                                  placeholder="Enter Your subcategory" value="">
                              </div>

                              <div class="col-md-6">
                                <label for="exampleInputTit1e"><?php echo e(__('Slug')); ?>:<sup
                                    class="redstar">*</sup></label>
                                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug"
                                  id="exampleInputTitle" placeholder="Enter slug" value="">
                              </div>

                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:<sup
                                    class="redstar"></sup></label>
                              <div class="input-group">
                                  <input type="text" class="form-control iconvalue" name="icon"
                                    value="Choose icon">
                                  <span class="input-group-append">
                                    <button type="button" class="btnicon btn btn-outline-secondary"
                                      role="iconpicker"></button>
                                  </span>
                                </div>
                              </div>
                              <br>
                              <div class="col-md-6">
                                <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                                    class="redstar text-danger">*</sup></label><br>
                                <input id="status_toggle" type="checkbox" class="custom_toggle" name="status"
                                  checked />
                                <input type="hidden" name="free" value="0" for="status" id="status">

                              </div>
                            </div>
                            

                            <div class="form-group">
                              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                <?php echo e(__('Reset')); ?></button>
                              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                <?php echo e(__('Create')); ?></button>
                            </div>

                            <div class="clear-both"></div>


                        </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>


            
          </div>
        </div>
      </div>
    </div>
    <!-- End col -->
  </div>
  <!-- End row -->
</div>
<?php echo $__env->make('admin.category.subcategory.cat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  
    $(document).on("change",".subcategory",function() { 

      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'subcategories/status',
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
     
    })
  })
</script>
<script>
  $("#checkboxAll").on('click', function () {
    $('input.check').not(this).prop('checked', this.checked);
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magicwel\resources\views/admin/category/subcategory/index.blade.php ENDPATH**/ ?>