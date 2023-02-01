
<?php $__env->startSection('title', 'Institute Profile'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- about-home start -->
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<!-- <section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading"><?php echo e(__('Institute Profile')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php endif; ?>
<!-- about-home end -->
<section id="institute" class="institute-main-block">
    <div class="instructor-img">
        <img src="<?php echo e(asset('images\default\insti_back.png')); ?>" alt="" class="back_img ">
    </div>
     <div class="overlay-bg"></div>
 </section>
<section id="blog" class="blog-main-block">
   
    <div class="container-xl">
       
        <div class="card institute-profile-block">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="institute-profile">
                            <img src="<?php echo e(asset('files/institute/'.$data->image)); ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="institute-profile-dtl">
                            <h5 class="card-title"><?php echo e($data->title); ?>

                            <?php if($data->verified): ?>
                                <img src="<?php echo e(url('admin_assets\assets\images\verified.png')); ?>" alt="">
                                <?php endif; ?>
                            </h5>
                            <?php
                                $year = Carbon\Carbon::parse($data->created_at)->year;
                                $course_count = App\Course::where('institude_id',$data->id)->count();
                                $enroll_count = App\Order::where('course_id', $course->id)->count();
                                $live_1 = App\Meeting::where('course_id','=',$course->id)->count();
                                $live_2 = App\Googlemeet::where('course_id','=',$course->id)->count();
                                $live_3 = App\JitsiMeeting::where('course_id','=',$course->id)->count();
                                $live_4 = App\BBL::where('course_id','=',$course->id)->count();

                                $live_class = $live_1 + $live_2 + $live_3 + $live_4;
                            ?>

                            <div class="about-reward-badges text-left">
                                <img src="<?php echo e(url('images/badges/1.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Member Since <?php echo e($year); ?>">
                                <?php if($course_count >= 5): ?>
                                <img src="<?php echo e(url('images/badges/2.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Has <?php echo e($course_count); ?> courses">
                                <?php endif; ?>
                                <img src="<?php echo e(url('images/badges/3.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="rating from 4 to 5">
                                <img src="<?php echo e(url('images/badges/4.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($enroll_count); ?> users has enrolled">
                                <img src="<?php echo e(url('images/badges/5.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Live classes <?php echo e($live_class); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="institute-profile-block-one text-center">
                    <div class="row">
                        <div class="col-md-4 col-6"> 
                            <?php
                                $inst_count = App\Course::where('institude_id',$data->id)->count();
                            ?>
                            
                                <div class="institute-profile-icon border-color text-center">
                                    <i class="fa fa-users course-icon"  aria-hidden="true"></i>
                                </div>
                                <p class="mt-2"><?php echo e($inst_count); ?></p>
                               

                                <p><?php echo e(__('Courses')); ?></p>
                            
                        </div>
                        <div class="col-md-4 col-6 border2">
                            <?php
                                $instii= App\Course::where('institude_id',$data->id)->get();
                                $count = 0;
                                $count1 = 0;
                            ?>
                            
                                
                            <?php $__currentLoopData = $instii; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                $instii_count = App\Order::where('course_id',$value->id)->count();
                                $count  = $count + $instii_count;
                                
                            ?>
                            
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                            

                          
                            <div class="institute-profile-icon border1-color text-center">
                                <i class="fa fa-graduation-cap  course1-icon" aria-hidden="true"></i>
                               
                            </div>
                            <p class="mt-2"><?php echo e($count); ?></p>
                            
                            <p><?php echo e(__('Students')); ?></p>
                        </div>

                       
                            
                        <div class="col-md-4 col-6 border3 ">
                           
                            <div class="institute-profile-icon border2-color text-center">
                                <i class="fa fa-video-camera  course2-icon" aria-hidden="true"></i>
                                
                               
                            </div>
                            
                            <p class="mt-2"><?php echo e($live_class); ?></p>
                            <p><?php echo e(__('Meetings')); ?></p>

                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
  
</section>

<section id="blog" class="blog--block mb-4 institute-profile-des">
   
    <div class="container-xl">
        <div class="card mt-3">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h5><?php echo e(__('About')); ?></h5>
                        <p ><?php echo e($data->detail); ?></p>
                    </div>
                    <div class="col-md-3 col-6">
                        <h5><?php echo e(__('Skill')); ?></h5>
                        <p ><?php echo e($data->skill); ?></p>
                    </div>
                    <?php if(isset($data->email)): ?>
                     <div class="col-md-3 col-6">
                        <h5><?php echo e(__('Email')); ?></h5>
                        <p ><?php echo e($data->email ?? ''); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($data->mobile)): ?>
                    <div class="col-md-3 col-6">
                        <h5><?php echo e(__('Mobile')); ?></h5>
                        <p ><?php echo e($data->mobile ?? ''); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
              
                
            </div>
        </div>
        </div>
  
</section>


<!-- blog end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\institute\view.blade.php ENDPATH**/ ?>