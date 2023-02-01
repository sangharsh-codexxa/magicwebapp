
<?php $__env->startSection('title', "$batch->title"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white"><?php echo e($batch['title']); ?></h1>
                    <ul>
                        <ul>
                            <li><a href="#" title="about"><?php echo e(__('Created')); ?>:
                                    <?php echo e($batch->user['fname']); ?> </a></li>
                            <li><a href="#" title="about"><?php echo e(__('Last Updated')); ?>:
                                    <?php echo e(date('jS F Y', strtotime($batch['updated_at']))); ?></a></li>
                                </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4">
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                        <div class="video-device">
                            <?php if($batch['preview_image'] !== null && $batch['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/batch/' . $batch['preview_image'])); ?>"
                                    class="bg_img img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($batch->title)->toBase64()); ?>" class="bg_img img-fluid"
                                    alt="Background">
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                            <div class="about-home-btn btm-20">
                                <?php if(Auth::check()): ?>
                                    <form id="demo-form2" method="post" action="<?php echo e(route('batchcart', $batch->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                                
                                        <div class="box-footer">
                                         <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></button>
                                        </div>
                                    </form>
                                <?php else: ?>

                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></a>
                                <?php endif; ?>
                            </div>
                                
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</section>
<!-- course header end -->
<!-- course detail start -->
<section id="about-product" class="about-product-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="requirements">
                    <h3><?php echo e(__('Detail')); ?></h3>
                    <ul>
                        <li class="comment more">

                            <?php echo $batch->detail; ?>


                        </li>

                    </ul>
                </div>
                <div class="course-content-block btm-30">
                    <h3><?php echo e(__('Courses In batch')); ?></h3>
                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                <?php $__currentLoopData = $batch->allowed_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batchs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    $course = App\Course::where('id', $batchs)->first();
                                    ?>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo<?php echo e($course->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo<?php echo e($course->id); ?>" aria-expanded="false"
                                                    aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            <a href="<?php echo e(route('user.course.show', ['id' => $course->id, 'slug' => $course->slug])); ?>"><?php echo e($course->title); ?></a>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>

                                        <div id="collapseTwo<?php echo e($course->id); ?>"
                                            class="collapse <?php echo e($loop->first ? 'show' : ''); ?>"
                                            aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="class-icon">
                                                                <?php echo e($course->short_detail); ?>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <?php if(isset($batch->allowed_bundles)): ?>

                    <h3><?php echo e(__('Bundles In batch')); ?></h3>
                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                <?php $__currentLoopData = $batch->allowed_bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    $course = App\BundleCourse::where('id', $bundles)->first();
                                    ?>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo<?php echo e($course->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo<?php echo e($course->id); ?>" aria-expanded="false"
                                                    aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            <a href="<?php echo e(route('user.course.show', ['id' => $course->id, 'slug' => $course->slug])); ?>"><?php echo e($course->title); ?></a>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>

                                        <div id="collapseTwo<?php echo e($course->id); ?>"
                                            class="collapse <?php echo e($loop->first ? 'show' : ''); ?>"
                                            aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="class-icon">
                                                                <?php echo e($course->short_detail); ?>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\batch_detail.blade.php ENDPATH**/ ?>