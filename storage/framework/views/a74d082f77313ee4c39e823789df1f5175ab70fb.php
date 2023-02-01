
<?php $__env->startSection('title','Edit Flash-deal | '); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Edit Flash-deals')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Flash-deals')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <a href=" <?php echo e(route('flash-sales.index')); ?> " class="btn btn-primary-rgba mr-2">
            <i class="feather icon-arrow-left mr-2"></i> <?php echo e(__("Back")); ?>

        </a>
    </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
    <div class="row">
        <div class="col-md-12">

            <?php if($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="color:red;">&times;</span></button></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <div class="card m-b-30">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo e(__("Edit flash deal")); ?>

                    </h3>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('flash-sales.update',$deal->id)); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo method_field("PUT"); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label for=""><?php echo e(__("Title:")); ?> <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" class="required" name="title"
                                placeholder="Halloween Sale" value="<?php echo e($deal->title); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><?php echo e(__("Start date:")); ?> <span class="text-danger">*</span> </label>
                            <input required value="<?php echo e(date('Y-m-d h:i a',strtotime($deal->start_date))); ?>" type="text"
                                class="timepickerwithdate form-control" class="required" name="start_date" />
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><?php echo e(__("End date:")); ?> <span class="text-danger">*</span> </label>
                            <input required value="<?php echo e(date('Y-m-d h:i a',strtotime($deal->end_date))); ?>" type="text"
                                class="timepickerwithdate form-control" class="required" name="end_date" />
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for=""><?php echo e(__("Background image:")); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
                                        </div>
                                        <div class="custom-file">

                                            <input type="file" name="background_image" class="custom-file-input"
                                                id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose background
                                                image')); ?> (2000x2000)</label>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <img title="Current banner" width="200px"
                                    src="<?php echo e(url('/images/flashdeals/'.$deal->background_image)); ?>"
                                    alt="<?php echo e($deal->background_image); ?>" class="img-fluid rounded">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for=""><?php echo e(__("Detail:")); ?></label>
                            <textarea name="detail" id="detail" cols="30" rows="10"><?php echo $deal->detail; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('Status')); ?> :</label>
                            <br>
                            <label class="switch">
                                <input id="status" type="checkbox" name="status"
                                    <?php echo e($deal->status == 1 ? "checked" : ""); ?>>
                                <span class="knob"></span>
                            </label>
                        </div>

                        <h4><?php echo e(__('Update Courses')); ?></h4>

                        <table class="courselist table table-bordered table-hover">
                            <thead>
                                <th><?php echo e(__('Course')); ?></th>
                                <th><?php echo e(__('Discount')); ?></th>
                                <th><?php echo e(__('Discount type')); ?></th>
                                <th>#</th>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $deal->saleitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php if(isset( $item->courses->title)): ?>

                                        <input type="text" class="course form-control" placeholder="Search course"
                                            name="course[]" required
                                            value="<?php echo e($item->courses->title); ?>" />
                                            <?php endif; ?>

                                        <input type="hidden" value="<?php echo e($item->course_id); ?>"
                                            class="form-control product_type" name="type[]">
                                        <input
                                            value="<?php echo e($item->course_id); ?>"
                                            type="hidden" class="form-control course_ids" name="course_id[]" />
                                    </td>
                                    <td>
                                        <div class="input-group">

                                            <input value="<?php echo e($item->discount); ?>" type="number" min="1"
                                                class="form-control" placeholder="50" required name="discount[]">
                                            <span class="input-group-text">
                                                %
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="discount_type[]" class="mt-3 form-control" id="discount_type">
                                                <option value=""><?php echo e(__('Select discount type')); ?> </option>
                                                <option <?php echo e($item->discount_type == 'fixed' ? "selected" : ""); ?>

                                                    value="fixed"><?php echo e(__('Fixed')); ?></option>
                                                <option <?php echo e($item->discount_type == 'upto' ? "selected" : ""); ?>

                                                    value="upto"><?php echo e(__('Upto')); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="addnew btn-primary-rgba btn-sm">
                                            <i class="feather icon-plus"></i>
                                        </button>
                                        <button type="button" class="removeBtn btn-danger-rgba btn-sm">
                                            <i class="feather icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td>
                                        <input type="text" class="course form-control" placeholder="Search course"
                                            required name="course[]">
                                        <input type="hidden" class="form-control course_type" name="type[]">
                                        <input type="hidden" class="form-control course_ids" name="course_id[]">
                                    </td>
                                    <td>
                                        <div class="input-group">

                                            <input type="number" min="1" class="form-control" placeholder="50" required
                                                name="discount[]">
                                            <span class="input-group-text">
                                                %
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="discount_type[]" class="mt-3 form-control" id="discount_type">
                                                <option value=""><?php echo e(__('Select discount type')); ?></option>
                                                <option value="fixed"><?php echo e(__('Fixed')); ?></option>
                                                <option value="upto"><?php echo e(__('Upto')); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="addnew btn-primary-rgba btn-sm">
                                            <i class="feather icon-plus"></i>
                                        </button>
                                        <button type="button" class="removeBtn btn-danger-rgba btn-sm">
                                            <i class="feather icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info-rgba">
                                <i class="feather icon-save"></i> <?php echo e(__("Update")); ?>

                            </button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    function enableAutoComplete($element) {



        $element.autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: <?php echo json_encode(route('test.fetch'), 15, 512) ?>,
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function (data) {

                        var resp = $.map(data, function (obj) {
                            return {

                                label: obj.label,
                                value: obj.value,
                                id: obj.id,
                            }
                        });

                        response(resp);
                    }
                });
            },
            select: function (event, ui) {

                if (ui.item.value != 'No result found') {
                    this.value = ui.item.value.replace(/\D/g, '');
                    // $(this).closest('td').find('input.product_type').val(ui.item.type);
                    $(this).closest('td').find('input.course_ids').val(ui.item.id);
                } else {
                    $(this).val('');
                    // $(this).closest('td').find('input.product_type').val('');
                    $(this).closest('td').find('input.course_ids').val('');
                    return false;
                }

            },
            minlength: 1,

        });
    }

    $(document).ready(function () {
        $(".course").each(function (index) {
            enableAutoComplete($(this));
        });
    });

    $(".courselist").on('click', 'button.addnew', function () {

        var n = $(this).closest('tr');
        addNewRow(n);


        function addNewRow(n) {

            // e.preventDefault();

            var $tr = n;
            var allTrs = $tr.closest('table').find('tr');
            var lastTr = allTrs[allTrs.length - 1];
            var $clone = $(lastTr).clone();
            $clone.find('td').each(function () {
                var el = $(this).find(':first-child');
                var id = el.attr('id') || null;
                if (id) {

                    var i = id.substr(id.length - 1);
                    var prefix = id.substr(0, (id.length - 1));
                    el.attr('id', prefix + (+i + 1));
                    el.attr('name', prefix + (+i + 1));
                }
            });

            $clone.find('input').val('');

            $tr.closest('table').append($clone);

            $('input.product').last().focus();

            enableAutoComplete($("input.product:last"));
        }


    });

    $('.courselist').on('click', '.removeBtn', function () {

        var d = $(this);
        removeRow(d);

    });

    function removeRow(d) {
        var rowCount = $('.courselist tr').length;
        if (rowCount !== 2) {
            d.closest('tr').remove();
        } else {
            console.log('Atleast one sell is required');
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\flashsale\edit.blade.php ENDPATH**/ ?>