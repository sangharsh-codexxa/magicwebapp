
<?php $__env->startSection('title','All Workshops'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Workshops')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Workshops')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('workshops.delete')): ?>
    <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
    <?php endif; ?>
    <button type="button" class="float-right btn btn-primary-rgba mr-2" data-toggle="modal" data-target="#myModal">
      <i class="feather icon-plus mr-2"></i><?php echo e(__('Add Workshops')); ?></a>
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
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th> <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label>#
                  </th>
                  <th><?php echo e(__('Image')); ?></th>
                  <th><?php echo e(__('Title')); ?></th>

                  <th><?php echo e(__('Start Date Time')); ?></th>
                  <th><?php echo e(__('End Date Time')); ?></th>
                  <th><?php echo e(__('Fee')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody id="sortable">
                <?php $i = 0; ?>
                <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>
                <tr class="sortable" id="id-<?php echo e($cat->id); ?>">
                  <td> <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input' name='checked[]' value="<?php echo e($cat->id); ?>" id='checkbox<?php echo e($cat->id); ?>'>
                    <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>
                    <?php echo $i; ?>
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
                            <form id="bulk_delete_form" method="post" action="<?php echo e(route('categories.bulk_delete')); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('POST'); ?>
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                              <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <?php if($cat['image'] !== NULL && $cat['image'] !== ''): ?>
                    <img src="images/workshop/<?php echo $cat['image'];  ?>" class="img-responsive img-circle">
                    <?php else: ?>
                    <img src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" class="img-responsive img-circle">
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($cat->title); ?></td>
                  <td><?php echo e($cat->start_date . ' ' . $cat->start_time); ?></td>
                  <td><?php echo e($cat->end_date . ' ' . $cat->end_time); ?></td>
                  <td><?php echo e(price_format($cat->fee)); ?></td>
                  <td>
                    <button type="button" class="btn btn-rounded <?php echo e($cat->status == '1' ? 'checked' : '' ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                      <?php if( $cat->status): ?>
                      <?php echo e(__('Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </td>


                  <td>
                    <div class="dropdown">
                      <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.edit')): ?>
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo e($cat->id); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.delete')): ?>
                        <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>">
                          <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                        </a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <!-- <div class="modal fade bd-example-modal-sm" id="edit<?php echo e($cat->id); ?>" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Edit Category')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="demo-form" method="post" action="<?php echo e(url('category/'.$cat->id)); ?>

                                  " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off"
                              enctype="multipart/form-data">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field('PUT')); ?>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputTit1e"><?php echo e(__('Workshop')); ?>:<sup
                                        class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="exampleInputTitle"
                                      value="<?php echo e($cat->title); ?>">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label for="exampleInputTit1e"><?php echo e(__('Icon')); ?>:<sup
                                        class="redstar">*</sup></label>
                                    <div class="input-group">
                                      <input type="text" class="form-control iconvalue" name="icon"
                                        value="<?php echo e($cat->icon); ?>">
                                      <span class="input-group-append">
                                        <button type="button" class="btnicon btn btn-outline-secondary"
                                          role="iconpicker"></button>
                                      </span>
                                    </div>



                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup
                                          class="redstar text-danger">*</sup></label><br>
                                      <input id="status" type="checkbox" class="custom_toggle"
                                        <?php echo e($cat->status == '1' ? 'checked' : ''); ?> name="status" />

                                    </div>
                                   
                                  </div>

                                  <div class="form-group">
                                  <label><?php echo e(__('PreviewImage')); ?>:</label> - <p class="inline info"><?php echo e(__('size')); ?>: 255x200</p>
                                  <br>
                                     <label><?php echo e(__('Image')); ?>:<sup class="redstar">*</sup></label>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Recommendedsize')); ?> (1375 x 409px)</small>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                      </div>
                                    </div>
                                   
                                      <?php if(isset($cat['image'])): ?>
                                      <img src="<?php echo e(url('/images/workshop/'.$cat['image'])); ?>" class="image_size" />
                                      <?php endif; ?> 
                                    </div>
                                </div>

                              </div>
                              <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                  <?php echo e(__('Reset')); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                  <?php echo e(__('Update')); ?></button>

                              </div>
                              <div class="clear-both"></div>
                          </div>
                        </div>

                        </form>
                      </div>
                    </div> -->

                  </td>

          </div>
        </div>
      </div>

      <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-muted"><?php echo e(__('Do you really want to delete this Bundle ? This process cannot be
                undone')); ?>.</p>
            </div>
            <div class="modal-footer">

              <form method="post" action="<?php echo e(url('workshop/'.$cat->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>


                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
              </form>
            </div>
          </div>
        </div>
      </div>


      </td>

      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
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
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModal"><?php echo e(__('Add Workshop')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <form id="demo-form2" method="post" action="<?php echo e(url('workshop/store')); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>


          <div class="row">
            <div class="col-md-12">
              <label for="c_name"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Please Enter Workshop name" type="text" class="form-control" name="title" required="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="c_name"><?php echo e(__('Workshop fee')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Please Enter Workshop fee" type="text" class="form-control" name="fee" required="">
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-md-12">
              <label for="c_name"><?php echo e(__('Description')); ?>:<sup class="redstar">*</sup></label>
              <textarea placeholder=" Please Enter Description" type="text" class="form-control" name="description" required=""></textarea>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-md-4">
              <label for="c_name"><?php echo e(__('Start Date')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Select Date" type="date" class="form-control" name="start_date" required="">
            </div>
            <div class="col-md-4">
              <label for="c_name"><?php echo e(__('Start Time')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Select time" type="time" class="form-control" name="start_time" required="">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label for="c_name"><?php echo e(__('End Date')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Select Date" type="date" class="form-control" name="end_date" required="">
            </div>
            <div class="col-md-4">
              <label for="c_name"><?php echo e(__('End Time')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Select time" type="time" class="form-control" name="end_time" required="">
            </div>
          </div>
          <br>

          <div class="row">

            <div class="col-md-4">
              <label for="exampleInputDetails"><?php echo e(__('Status')); ?>:<sup class="redstar text-danger">*</sup></label><br>
              <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked />
            </div>

            <div class="col-md-8">
              <label for="c_name"><?php echo e(__('Venue')); ?>:<sup class="redstar">*</sup></label>
              <input placeholder=" Please Enter Venue" type="text" class="form-control" name="venue" required="">
            </div>

          </div>
          <br>


          <div class="form-group">
            <label><?php echo e(__('PreviewImage')); ?>:</label> - <p class="inline info"><?php echo e(__('size')); ?>: 255x200</p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
              </div>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
              </div>
            </div>


          </div>


          <div class="form-group">
            <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
              <?php echo e(__('Create')); ?></button>
          </div>
          <div class="clear-both"></div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(function() {
    $("#sortable").sortable();
    $("#sortable").disableSelection();
  });

  $("#sortable").sortable({
    update: function(e, u) {
      var data = $(this).sortable('serialize');

      $.ajax({
        url: "<?php echo e(route('category_reposition')); ?>",
        type: 'get',
        data: data,
        dataType: 'json',
        success: function(result) {
          console.log(data);
        }
      });

    }

  });
</script>
<script>
  $("#checkboxAll").on('click', function() {
    $('input.check').not(this).prop('checked', this.checked);
  });
</script>

<!-- script to change featured-status start -->
<script>
  $(document).on("change", ".status1", function() {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: 'featured-status',
      data: {
        'featured': $(this).is(':checked') ? 1 : 0,
        'id': $(this).data('id')
      },
      success: function(data) {
        console.log(id)
      }
    });

  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  $(document).on("change", ".status2", function() {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: 'cat-status',
      data: {
        'status': $(this).is(':checked') ? 1 : 0,
        'id': $(this).data('id')
      },
      success: function(data) {
        var warning = new PNotify({
          title: 'success',
          text: 'Status Update Successfully',
          type: 'success',
          desktop: {
            desktop: true,
            icon: 'feather icon-thumbs-down'
          }
        });
        warning.get().click(function() {
          warning.remove();
        });
      }
    });
  });
</script>
<!-- script to change status end -->
<!-- ============================================ -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\workshop\index.blade.php ENDPATH**/ ?>