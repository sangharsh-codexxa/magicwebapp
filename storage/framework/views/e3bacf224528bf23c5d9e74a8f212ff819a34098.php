<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Navigationbar -->

        <div class="navigationbar">
            
            <div class="vertical-menu-detail">

                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel"
                        aria-labelledby="v-pills-dashboard">
                        <ul class="vertical-menu">
                            <div class="logobar">
                                <a href="<?php echo e(url('/')); ?>" class="logo logo-large">
                                    <img style="object-fit:scale-down;" src="<?php echo e(url('images/logo/'.$gsetting->logo)); ?>"
                                        class="img-fluid" alt="logo">
                                </a>
                            </div>
                             <li class="<?php echo e(Nav::isRoute('admin.index')); ?>">
                                <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">
                                    <i class="feather icon-pie-chart text-secondary"></i>
                                    <span><?php echo e(__('Dashboard')); ?></span>
                                </a>
                            </li>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['marketing-dashboard.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('market.index')); ?>">
                                <a class="nav-link" href="<?php echo e(route('market.index')); ?>">
                                    <i class="feather icon-pie-chart text-secondary"></i>
                                    <span><?php echo e(__('Marketing Dashboard')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <!-- dashboard end -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.view','Alluser.view','Allinstructor.view'])): ?>
                            <li class="header"><?php echo e(__('Users')); ?></li>
                            <!-- user start  -->
                            <!-- user start  -->
                            <li
                                class="<?php echo e(Nav::isRoute('user.index')); ?> <?php echo e(Nav::isRoute('user.add')); ?> <?php echo e(Nav::isRoute('user.edit')); ?><?php echo e(Nav::isRoute('alluser.index')); ?> <?php echo e(Nav::isRoute('alluser.add')); ?> <?php echo e(Nav::isRoute('alluser.edit')); ?><?php echo e(Nav::isRoute('allinstructor.index')); ?> <?php echo e(Nav::isRoute('allinstructor.add')); ?> <?php echo e(Nav::isRoute('allinstructor.edit')); ?><?php echo e(Nav::isResource('roles')); ?>">
                                <a href="javaScript:void();">
                                    <i class="feather icon-users text-secondary"></i><span><?php echo e(__('Users')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('user')); ?>"
                                            href="<?php echo e(route('user.index')); ?>"><?php echo e(__('All Users')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Alluser.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('allusers')); ?>"
                                            href="<?php echo e(route('allusers.index')); ?>"><?php echo e(__('All Students')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Allinstructor.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('allinstructor')); ?>"
                                            href="<?php echo e(route('allinstructor.index')); ?>"><?php echo e(__('All Instructors')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('alladmin')); ?>"
                                            href="<?php echo e(route('alladmin.index')); ?>"><?php echo e(__('All Admins')); ?></a>
                                    </li>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('alladmin')); ?>"
                                            href="<?php echo e(route('user.verify')); ?>"><?php echo e(__('Verify User')); ?></a>
                                    </li>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('roles')); ?>"
                                            href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Roles And Permission')); ?></a>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            
                            <li
                                class="<?php echo e(Nav::isResource('plan/subscribe/settings')); ?> <?php echo e(Nav::isResource('subscription/plan')); ?>  <?php echo e(Nav::isRoute('all.instructor')); ?> <?php echo e(Nav::isResource('requestinstructor')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-user text-secondary"></i><span><?php echo e(__('Instructors')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    
                                    <li class="<?php echo e(Nav::isRoute('all.instructor')); ?>"><a
                                            href="<?php echo e(route('all.instructor')); ?>"><?php echo e(__('All')); ?>

                                            <?php echo e(__('InstructorRequest')); ?></a></li>
                                            
                                    
                                    <li class="<?php echo e(Nav::isResource('requestinstructor')); ?>"><a
                                            href="<?php echo e(url('requestinstructor')); ?>"><?php echo e(__('Pending')); ?>

                                            <?php echo e(__('Request')); ?></a></li>
                                            
                                            
                                    <li class="<?php echo e(Nav::isResource('plan/subscribe/settings')); ?>"><a
                                            href="<?php echo e(url('plan/subscribe/settings')); ?>"><?php echo e(__('Instructor')); ?>

                                            <?php echo e(__('Subscription')); ?></a></li>
                                            
                                    <?php if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1): ?>
                                    <li class="<?php echo e(Nav::isResource('subscription/plan')); ?>"><a
                                            href="<?php echo e(url('subscription/plan')); ?>"><?php echo e(__('InstructorPlan')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <!-- MultipleInstructor start  -->
                                    <li
                                        class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?> <?php echo e(Nav::isRoute('involve.request.index')); ?> <?php echo e(Nav::isRoute('involve.request')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('MultipleInstructor')); ?></span>
                                        </a>
                                        <ul class="vertical-submenu">

                                            <li class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?>"><a
                                                    href="<?php echo e(route('allrequestinvolve')); ?>"><?php echo e(__('RequesttoInvolve')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('involve.request.index')); ?>"><a
                                                    href="<?php echo e(route('involve.request.index')); ?>"><?php echo e(__('InvolvementRequests')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('involve.request')); ?>"><a
                                                    href="<?php echo e(route('involve.request')); ?>"><?php echo e(__('InvolvedInCourse')); ?></a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!-- MultipleInstructor end  -->
                                    <!-- InstructorPayout start  -->
                                    <li
                                        class="<?php echo e(Nav::isRoute('instructor.settings')); ?> <?php echo e(Nav::isRoute('admin.instructor')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('InstructorPayout')); ?></span>
                                        </a>
                                        <ul class="vertical-submenu">

                                            <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?>"><a
                                                    href="<?php echo e(route('instructor.settings')); ?>"><?php echo e(__('PayoutSettings')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('admin.instructor')); ?>"><a
                                                    href="<?php echo e(route('admin.instructor')); ?>"><?php echo e(__('PendingPayout')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a
                                                    href="<?php echo e(route('admin.completed')); ?>"><?php echo e(__('CompletedPayout')); ?></a>
                                            </li>


                                        </ul>
                                    </li>
                                    <!-- InstructorPayout end  -->
                                </ul>
                            </li>
                            
                            <!-- user end -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['categories.view','courses.view','bundle-courses.view','course-languages.view','course-reviews.view','assignment.view','refund-policy.view','batch.view','quiz-review.view','private-course.view','reported-course.view','reported-question.view'])): ?>

                            <li class="header"><?php echo e(__('Education')); ?></li>
                            <!-- ====================Course start======================== -->
                            <li
                                class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('bundle')); ?> <?php echo e(Nav::isResource('courselang')); ?> <?php echo e(Nav::isResource('coursereview')); ?> <?php echo e(Nav::isRoute('assignment.view')); ?> <?php echo e(Nav::isResource('refundpolicy')); ?> <?php echo e(Nav::isResource('batch')); ?> <?php echo e(Nav::isRoute('quiz.review')); ?> <?php echo e(Nav::isResource('private-course')); ?> <?php echo e(Nav::isResource('admin/report/view')); ?> <?php echo e(Nav::isResource('user/question/report')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-book text-secondary"></i><span><?php echo e(__('Course')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <!-- Category start  -->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['categories.view','subcategories.view','childcategories.views'])): ?>
                                    <li
                                        class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('Category')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['categories.view'])): ?>
                                            <li class="<?php echo e(Nav::isResource('category')); ?>"><a
                                                    href="<?php echo e(url('category')); ?>"><?php echo e(__('Category')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['subcategories.view'])): ?>
                                            <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a
                                                    href="<?php echo e(url('subcategory')); ?>"><?php echo e(__('SubCategory')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['childcategories.view'])): ?>
                                            <li class="<?php echo e(Nav::isResource('childcategory')); ?>"><a
                                                    href="<?php echo e(url('childcategory')); ?>"><?php echo e(__('ChildCategory')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <?php endif; ?>


                                    <!-- Category end  -->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['courses.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('course')); ?>"><a
                                            href="<?php echo e(url('course')); ?>"><span><?php echo e(__('Courses')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['bundle-courses.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('bundle')); ?>"><a
                                            href="<?php echo e(url('bundle')); ?>"><span><?php echo e(__('BundleCourse')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['course-languages.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a
                                            href="<?php echo e(url('courselang')); ?>"><span><?php echo e(__('CourseLanguage')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['course-reviews.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('coursereview')); ?>"><a
                                            href="<?php echo e(url('coursereview')); ?>"><span><?php echo e(__('CourseReview')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['assignment.view'])): ?>
                                    <?php if($gsetting->assignment_enable == 1): ?>
                                    <li class="<?php echo e(Nav::isRoute('assignment.view')); ?>"><a
                                            href="<?php echo e(route('assignment.view')); ?>"><span><?php echo e(__('Assignment')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['refund-policy.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('refundpolicy')); ?>"><a
                                            href="<?php echo e(url('refundpolicy')); ?>"><span><?php echo e(__('RefundPolicy')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['batch.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('batch')); ?>"><a
                                            href="<?php echo e(url('batch')); ?>"><span><?php echo e(__('Batch')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['quiz-review.view'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('quiz.review')); ?>"><a
                                            href="<?php echo e(route('quiz.review')); ?>"><span><?php echo e(__('QuizReview')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['private-course.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('private-course')); ?>"><a
                                            href="<?php echo e(url('private-course')); ?>"><span><?php echo e(__('PrivateCourse')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['reported-course.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('admin/report/view')); ?>">
                                        <a href="<?php echo e(url('admin/report/view')); ?>"><?php echo e(__('Reported')); ?>

                                            <?php echo e(__('Course')); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['reported-question.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('user/question/report')); ?>">
                                        <a href="<?php echo e(url('user/question/report')); ?>"><?php echo e(__('Reported')); ?>

                                            <?php echo e(__('Question')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <!--=================== Course end====================================  -->
                            <!-- ====================Meetings start======================== -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['meetings.zoom-meetings.view','meetings.big-blue.view','meetings.google-meet.view','meetings.jitsi-meet.view','meetings.google-classroom.view','meetings.meeting-recordings.view'])): ?>
                            <li
                                class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?> <?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?> <?php echo e(Nav::isRoute('googlemeet.setting')); ?> <?php echo e(Nav::isRoute('googlemeet.index')); ?> <?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?> <?php echo e(Nav::isRoute('jitsi.dashboard')); ?> <?php echo e(Nav::isRoute('jitsi.create')); ?> <?php echo e(Nav::isResource('meeting-recordings')); ?>">
                                <a href="javaScript:void();">
                                    <i class="feather icon-clock text-secondary"></i>
                                    <span><?php echo e(__('Meetings')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <!-- ZoomLiveMeetings start  -->
                                    <?php if(isset($zoom_enable) && $zoom_enable == 1): ?>
                                    <li
                                        class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('Zoom Meetings')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">
                                            <li class="<?php echo e(Nav::isRoute('zoom.setting')); ?>"><a
                                                    href="<?php echo e(route('zoom.setting')); ?>"><?php echo e(__('Settings')); ?></a>
                                            </li>
                                            <li
                                                class="<?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('meeting.create')); ?>">
                                                <a href="<?php echo e(route('zoom.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                                            </li>

                                            <li class="<?php echo e(Nav::isRoute('meeting.show')); ?>"><a
                                                    href="<?php echo e(route('meeting.show')); ?>"><?php echo e(__('AllMeetings')); ?></a>
                                            </li>

                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <!-- ZoomLiveMeetings end  -->
                                    <!-- BigBlueMeetings start  -->
                                    <?php if(isset($gsetting) && $gsetting->bbl_enable == 1): ?>
                                    <li
                                        class="<?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('Big Blue')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">

                                            <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?>"><a
                                                    href="<?php echo e(route('bbl.setting')); ?>"><?php echo e(__('Settings')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('bbl.all.meeting')); ?>"><a
                                                    href="<?php echo e(route('bbl.all.meeting')); ?>"><?php echo e(__('ListMeetings')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('download.meeting')); ?>"><a
                                                    href="<?php echo e(route('download.meeting')); ?>"><?php echo e(__('Recorded')); ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <!-- BigBlueMeetings end  -->

                                    <!-- Google Meet Meeting start  -->
                                    <?php if(isset($gsetting) && $gsetting->googlemeet_enable == 1): ?>
                                    <li
                                        class="<?php echo e(Nav::isRoute('googlemeet.setting')); ?> <?php echo e(Nav::isRoute('googlemeet.index')); ?> <?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('Google Meet')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">

                                            <li class="<?php echo e(Nav::isRoute('googlemeet.setting')); ?>"><a
                                                    href="<?php echo e(route('googlemeet.setting')); ?>"><?php echo e(__('Settings')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('googlemeet.index')); ?>"><a
                                                    href="<?php echo e(route('googlemeet.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                                            </li>
                                            <li class="<?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?>"><a
                                                    href="<?php echo e(route('googlemeet.allgooglemeeting')); ?>"><?php echo e(__('AllMeetings')); ?></a>
                                            </li>

                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <!-- Google Meet Meeting end  -->

                                    <!-- Jitsi Meeting start -->
                                    <?php if(isset($gsetting) && $gsetting->jitsimeet_enable == 1): ?>
                                    <li
                                        class="<?php echo e(Nav::isRoute('jitsi.dashboard')); ?> <?php echo e(Nav::isRoute('jitsi.create')); ?>">
                                        <a href="javaScript:void();">
                                            <i class=""></i> <span><?php echo e(__('Jitsi Meeting')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">
                                            <li class="<?php echo e(Nav::isRoute('jitsi.dashboard')); ?>"><a
                                                    href="<?php echo e(route('jitsi.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                        </ul>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Module::find('Googleclassroom') && Module::find('googleclassroom')->isEnabled()): ?>
                                    <?php echo $__env->make('googleclassroom::layouts.admin_sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <!-- Jitsi Meeting end -->
                                    <li class="<?php echo e(Nav::isResource('meeting-recordings')); ?>"><a
                                            href="<?php echo e(url('meeting-recordings')); ?>"><span><?php echo e(__('MeetingRecordings')); ?></span></a>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['institute.view'])): ?>
                            <li><a href="<?php echo e(url('institute')); ?>"><i
                                        class="feather icon-grid text-secondary"></i><span><?php echo e(__('Institute')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificate.manage')): ?>
                            <?php if(Module::has('Certificate') && Module::find('Certificate')->isEnabled()): ?>
                            <?php echo $__env->make('certificate::admin.sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            <li class="<?php echo e(Nav::isRoute('certificate.index')); ?>"><a
                                    href="<?php echo e(route('certificate.index')); ?>">
                                    <i
                                    class="feather icon-help-circle text-secondary"></i><span><?php echo e(__('Certificate Verify')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <!--===================meeting end====================================  -->
                            <!-- ====================instructor start======================== -->

                            <!--===================instructor end====================================  -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['coupons.view'])): ?>

                            <li class="header"><?php echo e(__('Marketing')); ?></li>
                            <li class="<?php echo e(Nav::isResource('coupon')); ?>"><a href="<?php echo e(url('coupon')); ?>"><i
                                        class="feather icon-award text-secondary"></i><span><?php echo e(__('Coupon')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['followers.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('follower.view')); ?>"><a href="<?php echo e(route('follower.view')); ?>"><i
                                        class="feather icon-help-circle text-secondary"></i><span><?php echo e(__('Followers')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['affiliate.manage',' wallet-setting.manage','wallet-transactions.manage'])): ?>
                            <li
                                class="<?php echo e(Nav::isRoute('save.affiliates')); ?> <?php echo e(Nav::isRoute('wallet.settings')); ?> <?php echo e(Nav::isRoute('wallet.transactions')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-dollar-sign text-secondary"></i><span><?php echo e(__('Affiliate&Wallet')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['affiliate.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('save.affiliates')); ?>">
                                        <a href="<?php echo e(route('save.affiliates')); ?>"><?php echo e(__('Affiliate')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['wallet-setting.manage','wallet-transactions.manage'])): ?>

                                    <li class="<?php echo e(Nav::isRoute('wallet.settings')); ?> <?php echo e(Nav::isRoute('wallet.transactions')); ?>">
                                        <a href="javaScript:void();">

                                            <span><?php echo e(__('Wallet')); ?></span>
                                    <?php endif; ?>  
                                        </a>
                                        <ul class="vertical-submenu">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['wallet-setting.manage'])): ?>
                                            <li class="<?php echo e(Nav::isRoute('wallet.settings')); ?>"><a
                                                    href="<?php echo e(route('wallet.settings')); ?>"><?php echo e(__('Wallet')); ?>

                                                    <?php echo e(__('Setting')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['wallet-transactions.manage'])): ?>
                                            <li class="<?php echo e(Nav::isRoute('wallet.transactions')); ?>"><a
                                                    href="<?php echo e(route('wallet.transactions')); ?>"><?php echo e(__('Wallet')); ?>

                                                    <?php echo e(__('Transactions')); ?></a>
                                            </li>
                                            <?php endif; ?>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- PushNotification -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['push-notification.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('onesignal.settings')); ?>"><a
                                    href="<?php echo e(route('onesignal.settings')); ?>"><i
                                        class="feather icon-navigation text-secondary"></i><span><?php echo e(__('PushNotification')); ?></span></a>
                            </li>
                            <?php endif; ?>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['flash-deals.view'])): ?>
                            <li class="<?php echo e(Nav::isResource('admin/flash-sales')); ?>"><a
                                    href="<?php echo e(url('admin/flash-sales')); ?>"><i
                                        class="feather icon-clock text-secondary"></i>
                                    <span><?php echo e(__('Flash Deals')); ?></span></a>
                            </li>
                            <?php endif; ?>



                            <!-- attandance -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['attendance.manage'])): ?>
                            <?php if(isset($gsetting) && $gsetting->attandance_enable == 1): ?>
                            <li class="<?php echo e(Nav::isResource('attandance')); ?>"><a href="<?php echo e(url('attandance')); ?>"><i
                                        class="feather icon-user text-secondary"></i><span><?php echo e(__('Attandance')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>

                            <!-- coupon -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['orders.manage'])): ?>

                            <li class="header"><?php echo e(__('Financial')); ?></li>

                            <!-- order -->
                            <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(url('order')); ?>"><i
                                        class="feather icon-shopping-cart text-secondary"></i><span><?php echo e(__('Order')); ?></span></a>
                            </li>
                            <?php endif; ?>

                            <!-- order -->

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['blogs.view'])): ?>

                            <li class="header"><?php echo e(__('Content')); ?></li>

                            <li class="<?php echo e(Nav::isResource('blog')); ?>">
                                <a href="<?php echo e(url('blog')); ?>"><i class="feather icon-message-square"></i>
                                    <span><?php echo e(__('Blogs')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                           
                            <!-- pages start -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['pages.view'])): ?>
                            <li class="<?php echo e(Nav::isResource('page')); ?>"><a
                                    href="<?php echo e(url('page')); ?>"><i class="feather icon-file-text"></i><span><?php echo e(__('Pages')); ?></span></a> 
                            </li>
                            <?php endif; ?>
                            <!-- pages end -->
                            <!-- report start  -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['report.progress-report.manage','report.quiz-report.manage','report.revenue-admin-report.manage','report.revenue-instructor-report.manage'])): ?>
                            <li
                                class="<?php echo e(Nav::isResource('user/course/report')); ?> <?php echo e(Nav::isResource('user/question/report')); ?><?php echo e(url('show/progress/report')); ?> <?php echo e(Nav::isResource('show/quiz/report')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-file-text text-secondary"></i><span><?php echo e(__('Report')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">


                                    <li class="<?php echo e(Nav::isResource('show/quiz/report')); ?>">
                                        <a href="<?php echo e(url('show/quiz/report')); ?>"><?php echo e(__('Quiz')); ?> <?php echo e(__('Report')); ?> </a>
                                    </li>
                                    <li class="<?php echo e(Nav::isResource('show/progress/report')); ?>">
                                        <a href="<?php echo e(url('show/progress/report')); ?>"><?php echo e(__('Progress')); ?>

                                            <?php echo e(__('Report')); ?></a>
                                    </li>

                                    <!-- revenue report start  -->
                                    <li
                                        class="<?php echo e(Nav::isRoute('admin.revenue.report')); ?> <?php echo e(Nav::isRoute('instructor.revenue.report')); ?><?php echo e(Nav::isResource('device-logs')); ?>">
                                        <a href="javaScript:void();"><span><?php echo e(__('Revenue')); ?>

                                                <?php echo e(__('Report')); ?></span><i
                                                class="feather icon-chevron-right"></i>
                                        </a>
                                        <ul class="vertical-submenu">

                                            <li class="<?php echo e(Nav::isRoute('admin.revenue.report')); ?>">
                                                <a
                                                    href="<?php echo e(route('admin.revenue.report')); ?>"><?php echo e(__('AdminRevenue')); ?></a>
                                            </li>

                                            <li class="<?php echo e(Nav::isRoute('instructor.revenue.report')); ?>">
                                                <a
                                                    href="<?php echo e(route('instructor.revenue.report')); ?>"><?php echo e(__('InstructorRevenue')); ?></a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li class="<?php echo e(Nav::isResource('admin/report/view')); ?>">
                                        <a href="<?php echo e(route('order.report')); ?>">
                                            <?php echo e(__('Financial reports')); ?> </a>
                                    </li>

                                    <li class="<?php echo e(Nav::isResource('device-logs')); ?>">
                                        <a href="<?php echo e(url('device-logs')); ?>"><?php echo e(__('Device History')); ?> </a>
                                    </li>
                                    <li class="<?php echo e(Nav::isResource('report/certificate')); ?>">
                                        <a href="<?php echo e(url('report/certificate')); ?>"><?php echo e(__('Certificate Report')); ?> </a>
                                    </li>
                                    <li class="<?php echo e(Nav::isResource('attand/report')); ?>">
                                        <a href="<?php echo e(url('attand/report')); ?>"><?php echo e(__('Attandance Report')); ?> </a>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- report end -->
                            <!-- forum -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forum-discussion.manage')): ?>
                            <?php if(Module::find('forum') && Module::find('forum')->isEnabled()): ?>
                            <?php echo $__env->make('forum::layouts.admin_sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['about.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('about.page')); ?>">
                                <a href="<?php echo e(route('about.page')); ?>"><i
                                        class="feather icon-external-link text-secondary"></i><?php echo e(__('About')); ?></a>
                            </li>
                            <?php endif; ?>
                            <!-- faq start  -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['faq.faq-student.view','faq.faq-instructor.view'])): ?>
                            <li class="<?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('faqinstructor')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-help-circle text-secondary"></i><span><?php echo e(__('Faq')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">

                                    <li class="<?php echo e(Nav::isResource('faq')); ?>">
                                        <a href="<?php echo e(url('faq')); ?>"><?php echo e(__('FaqStudent')); ?></a>
                                    </li>

                                    <li class="<?php echo e(Nav::isResource('faqinstructor')); ?>">
                                        <a href="<?php echo e(url('faqinstructor')); ?>"><?php echo e(__('FaqInstructor')); ?></a>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['career.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('careers.page')); ?>">
                                <a href="<?php echo e(route('careers.page')); ?>"><i
                                        class="feather icon-sidebar text-secondary"></i><?php echo e(__('Career')); ?></a>
                            </li>
                            <?php endif; ?>
                            <!-- faq end -->
                            <!-- location start -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['locations.country.view','locations.state.view','locations.city.view'])): ?>
                            <li
                                class="<?php echo e(Nav::isResource('admin/country')); ?> <?php echo e(Nav::isResource('admin/state')); ?> <?php echo e(Nav::isResource('admin/city')); ?>">
                                <a href="javaScript:void();">
                                    <i class="fa fa-map-marker text-secondary"></i><span><?php echo e(__('Locations')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['locations.country.view'])): ?>

                                    <li class="<?php echo e(Nav::isResource('admin/country')); ?>"><a
                                            href="<?php echo e(url('admin/country')); ?>"><?php echo e(__('Country')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['locations.state.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('admin/state')); ?>"><a
                                            href="<?php echo e(url('admin/state')); ?>"><?php echo e(__('State')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['locations.city.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('admin/city')); ?>"><a
                                            href="<?php echo e(url('admin/city')); ?>"><?php echo e(__('City')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- contact us start -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us.manage')): ?>
                            <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>"><i
                                        class="feather icon-phone-call text-secondary"></i><span><?php echo e(__('ContactUs')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job.manage')): ?>
                            <?php if(Module::has('Resume') && Module::find('Resume')->isEnabled()): ?>
                            <?php echo $__env->make('resume::front.job.admin.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- contact us end -->
                            <!-- location end -->
                            <li class="header"><?php echo e(__('Setting')); ?></li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['get-api-key.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('get.api.key')); ?>">
                                <a href="<?php echo e(route('get.api.key')); ?>"><i
                                class="feather icon-share text-secondary"></i><span><?php echo e(__('GetAPIKeys')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['currency.view'])): ?>
                            <li class="<?php echo e(Nav::isRoute('currency.index')); ?>"><a href="<?php echo e(route('currency.index')); ?>"><i
                                        class="feather icon-dollar-sign text-secondary"></i><span><?php echo e(__('Currency')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['themes.manage'])): ?>
                             
                            <li class="<?php echo e(Nav::isRoute('themesettings.index')); ?>">
                                <a href="<?php echo e(route('themesettings.index')); ?>">
                                    <i class="feather icon-airplay text-secondary"></i>
                                    <span><?php echo e(__('Themes')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                         
                           
                          
                          
                            <!-- front setting start  -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['front-settings.testimonial.view','front-settings.advertisement.view','front-settings.sliders.view','front-settings.fact-slider.view','category-sliders.manage','get-started.manage','front-settings.trusted-sliders.view','widget.manage','front-settings.seo-directory.view','coming-soon.manage','terms-condition.manage','privacy-policy.manage','invoice-design.manage','login-signup.manage','video-setting.manage','breadcum-setting.manage','front-settings.fact-slider.view','join-an-instructor.manage '])): ?>
                            <li
                                class="<?php echo e(Nav::isResource('testimonial')); ?> <?php echo e(Nav::isResource('advertisement')); ?> <?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isResource('facts')); ?> <?php echo e(Nav::isRoute('category.slider')); ?> <?php echo e(Nav::isResource('getstarted')); ?> <?php echo e(Nav::isResource('trusted')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isRoute('terms')); ?> <?php echo e(Nav::isResource('directory')); ?> <?php echo e(Nav::isRoute('videosetting')); ?> <?php echo e(Nav::isRoute('breadcum')); ?> <?php echo e(Nav::isRoute('fact')); ?> <?php echo e(Nav::isRoute('joininstructor')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-monitor text-secondary"></i><span><?php echo e(__('FrontSetting')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.testimonial.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('testimonial')); ?>"><a
                                            href="<?php echo e(url('testimonial')); ?>"><span><?php echo e(__('Testimonial')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="<?php echo e(Nav::isResource('admin/menu')); ?>">
                                        <a href="<?php echo e(url('admin/menu')); ?>">
                                            <span><?php echo e(__('Menu Customiosation')); ?></span>
                                        </a>
                                    </li>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.advertisement.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('advertisement')); ?>"><a
                                            href="<?php echo e(url('advertisement')); ?>"><span><?php echo e(__('Advertisement')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.sliders.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('slider')); ?>"><a
                                            href="<?php echo e(url('slider')); ?>"><span><?php echo e(__('Slider')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.fact-slider.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('facts')); ?>"><a
                                            href="<?php echo e(url('facts')); ?>"><span><?php echo e(__('Fact Slider')); ?></span></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['category-sliders.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('category.slider')); ?>"><a
                                            href="<?php echo e(route('category.slider')); ?>"><span><?php echo e(__('CategorySlider')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['get-started.manage'])): ?>

                                    <li class="<?php echo e(Nav::isResource('getstarted')); ?>"><a
                                            href="<?php echo e(url('getstarted')); ?>"><?php echo e(__('GetStarted')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.trusted-sliders.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('trusted')); ?>"><a
                                            href="<?php echo e(url('trusted')); ?>"><span><?php echo e(__('TrustedSlider')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['widget.manage'])): ?>
                                    
                                    <li class="<?php echo e(Nav::isRoute('widget.setting')); ?>"><a
                                            href="<?php echo e(route('widget.setting')); ?>"><?php echo e(__('Widget')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.seo-directory.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('directory')); ?>"><a
                                            href="<?php echo e(url('directory')); ?>"><span><?php echo e(__('Seo')); ?>

                                                <?php echo e(__('Directory')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['coming-soon.manage'])): ?>

                                    <li class="<?php echo e(Nav::isRoute('comingsoon.page')); ?>">
                                        <a
                                            href="<?php echo e(route('comingsoon.page')); ?>"><?php echo e(__('ComingSoon')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['terms-condition.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('termscondition')); ?>">
                                        <a href="<?php echo e(route('termscondition')); ?>"><?php echo e(__('Terms&Condition')); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['privacy-policy.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('policy')); ?>">
                                        <a href="<?php echo e(route('policy')); ?>"><?php echo e(__('PrivacyPolicy')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['invoice-design.manage'])): ?>
                                   

                                    <li class="<?php echo e(Nav::isRoute('invoice/settings')); ?>">
                                        <a href="<?php echo e(url('invoice/settings')); ?>"><?php echo e(__('Invoice Design')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['login-signup.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('login')); ?>">
                                        <a href="<?php echo e(url('settings/login')); ?>"><?php echo e(__('Login/Signup')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['homepage-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('homepage.setting')); ?>">
                                        <a href="<?php echo e(route('homepage.setting')); ?>"><span><?php echo e(__('Homepage Setting')); ?></span></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['video-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('videosetting')); ?>">
                                        <a href="<?php echo e(route('videosetting')); ?>"><?php echo e(__('Videosetting')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['breadcum-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('breadcum')); ?>">
                                        <a href="<?php echo e(url('breadcum/setting')); ?>"><?php echo e(__('Breadcumsetting')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['front-settings.fact-slider.view'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('fact')); ?>">
                                        <a href="<?php echo e(url('fact')); ?>"><?php echo e(__('Factsetting')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['join-an-instructor.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('joininstructor')); ?>">
                                        <a href="<?php echo e(url('join/setting')); ?>"><?php echo e(__('Join an Instructor')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                            <?php endif; ?>

                            <!-- front setting end -->
                            <!-- site setting start  -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['settings.manage','pwa.manage','adsense-setting.manage','twilio-setting.manage','site-map-setting.manage','site-settings.language.view','email-design.manage'])): ?>
                            <li
                                class="<?php echo e(Nav::isRoute('gen.set')); ?> <?php echo e(Nav::isRoute('careers.page')); ?>  <?php echo e(Nav::isRoute('termscondition')); ?> <?php echo e(Nav::isRoute('policy')); ?>  <?php echo e(Nav::isRoute('show.pwa')); ?> <?php echo e(Nav::isRoute('adsense')); ?> <?php echo e(Nav::isRoute('ipblock.view')); ?>   <?php echo e(Nav::isRoute('twilio.settings')); ?> <?php echo e(Nav::isRoute('show.sitemap')); ?> <?php echo e(Nav::isRoute('show.lang')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-settings text-secondary"></i><span><?php echo e(__('SiteSetting')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['settings.manage'])): ?>
                                     <li class="<?php echo e(Nav::isRoute('gen.set')); ?>">
                                        <a href="<?php echo e(route('gen.set')); ?>"><?php echo e(__('Setting')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="<?php echo e(Nav::isRoute('admincustomisation')); ?>">
                                        <a href="<?php echo e(url('admincustomisation')); ?>"><span><span><?php echo e(__('Admin Color Setting')); ?></span></a>
                                    </li>
                                    <li class="<?php echo e(Nav::isRoute('dropdown')); ?>">
                                        <a href="<?php echo e(url('dropdown')); ?>"><span><span><?php echo e(__('Dropdown')); ?></span></a>
                                    </li>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['pwa.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('show.pwa')); ?>">
                                        <a href="<?php echo e(route('show.pwa')); ?>"><?php echo e(__('PWA')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['adsense-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('adsense')); ?>">
                                        <a href="<?php echo e(url('/admin/adsensesetting')); ?>"><?php echo e(__('Adsense')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="<?php echo e(Nav::isRoute('mailchimp')); ?>">
                                        <a href="<?php echo e(url('mailchimp/setting')); ?>"><span><?php echo e(__('Mail Chimp Setting')); ?></span></a>
                                    </li>
                                    <?php if(isset($gsetting) && $gsetting->ipblock_enable == 1): ?>
                                    <li class="<?php echo e(Nav::isRoute('ipblock.view')); ?>">
                                        <a
                                            href="<?php echo e(url('admin/ipblock')); ?>"><?php echo e(__('IPBlockSettings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['twilio-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('twilio.settings')); ?>">
                                        <a href="<?php echo e(route('twilio.settings')); ?>"><?php echo e(__('Twilio')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['site-map-setting.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('show.sitemap')); ?>">
                                        <a href="<?php echo e(route('show.sitemap')); ?>"><?php echo e(__('SiteMap')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['site-settings.language.view'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('show.lang')); ?>">
                                        <a href="<?php echo e(route('show.lang')); ?>"><?php echo e(__('Language')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['email-design.manage'])): ?>
                                    
                                    <li class="<?php echo e(Nav::isRoute('maileclipse/mailables')); ?>">
                                        <a href="<?php echo e(url('maileclipse/mailables')); ?>"><?php echo e(__('Email Design')); ?><?php echo e(__('')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    


                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- site setting end -->
                            <!-- payment setting start -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payment-setting-credentials.manage','payment-setting-MPESA-setting.manage','payment-setting-bank-details.manage','payment-setting.manual-payment.view'])): ?>
                            <li
                                class=" <?php echo e(Nav::isRoute('api.setApiView')); ?><?php echo e(Nav::isRoute('bank.transfer')); ?><?php echo e(Nav::isResource('manualpayment')); ?> ">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-dollar-sign text-secondary"></i><span><?php echo e(__('Payment Setting')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['payment-setting-credentials.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('api.setApiView')); ?>">
                                        <a href="<?php echo e(route('api.setApiView')); ?>"><?php echo e(__('Credentials')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>
                                    <?php echo $__env->make('mpesa::admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['payment-setting-bank-details.manage'])): ?>

                                    <li class="<?php echo e(Nav::isRoute('bank.transfer')); ?>">
                                        <a href="<?php echo e(route('bank.transfer')); ?>"><?php echo e(__('BankDetails')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['payment-setting.manual-payment.view'])): ?>
                                    <li class="<?php echo e(Nav::isResource('manualpayment')); ?>">
                                        <a href="<?php echo e(url('manualpayment')); ?>"><?php echo e(__('Manual Payment')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- payment setting start end -->
                            <!-- player setting start -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['player-settings.manage','player-settings.advertise.view'])): ?>
                            <li
                                class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('ad.setting')); ?>">
                                <a href="javaScript:void();">
                                    <i
                                        class="feather icon-play-circle text-secondary"></i><span><?php echo e(__('PlayerSettings')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['player-settings.manage'])): ?>


                                    <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a
                                            href="<?php echo e(route('player.set')); ?>"><?php echo e(__('PlayerCustomization')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <li class="<?php echo e(Nav::isRoute('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>"
                                            title="Create ad"><?php echo e(__('Advertise')); ?></a></li>
                                    <?php $ads = App\Ads::all(); ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['player-settings.advertise.view'])): ?>
                                    <?php if($ads->count()>0): ?>
                                    <li class="<?php echo e(Nav::isRoute('ad.setting')); ?>"><a href="<?php echo e(url('admin/ads/setting')); ?>"
                                            title="Ad Settings"><?php echo e(__('AdvertiseSettings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- player setting start end -->
                            <?php if(isset($gsetting) && $gsetting->activity_enable == '1'): ?>
                            <li class="<?php echo e(Nav::isRoute('activity.index')); ?>"><a href="<?php echo e(route('activity.index')); ?>">
                                    <i
                                        class="feather icon-help-circle text-secondary"></i><span><?php echo e(__('ActivityLog')); ?></span>
                                </a></li>

                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['addon.view'])): ?>

                            <li class="header"><?php echo e(__('Support')); ?></li>
                            <!-- help & support start  -->
                            <li class="<?php echo e(Nav::isResource('admin-addon')); ?>">
                                <a href="<?php echo e(url('admin/addon')); ?>"> <i
                                        class="feather icon-move  text-secondary"></i><span><?php echo e(__('Addon')); ?></span>
                                    <?php echo e(__('Manager')); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['update-process.manage'])): ?>
                            <li class="<?php echo e(Nav::isRoute('update.process')); ?>">
                                <a href="<?php echo e(route('update.process')); ?>"><i class="feather icon-share text-secondary"></i><span><?php echo e(__('UpdateProcess')); ?></span></a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['help-support-import-demo.manage','help-support-database-backup.manage','help-support-remove-public.manage','help-support-clear-cache.manage'])): ?>
                            <li
                                class="<?php echo e(Nav::isRoute('import.view')); ?> <?php echo e(Nav::isRoute('database.backup')); ?> ">
                                <a href="javaScript:void();">
                                    <i class="feather icon-help-circle text-secondary"></i><span><?php echo e(__('Help&Support')); ?></span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['help-support-import-demo.manage'])): ?>

                                    <li class="<?php echo e(Nav::isRoute('import.view')); ?>">
                                        <a href="<?php echo e(route('import.view')); ?>"><?php echo e(__('ImportDemo')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['help-support-database-backup.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('database.backup')); ?>">
                                        <a
                                            href="<?php echo e(route('database.backup')); ?>"><?php echo e(__('DatabaseBackup')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['help-support-remove-public.manage'])): ?>
                                   

                                    <li class="<?php echo e(Nav::isRoute('remove.public')); ?>">
                                        <a
                                            href="<?php echo e(route('remove.public')); ?>"><?php echo e(__('RemovePublic')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['help-support-clear-cache.manage'])): ?>
                                    <li class="<?php echo e(Nav::isRoute('clear-cache')); ?>">
                                        <a href="<?php echo e(url('clear-cache')); ?>"><?php echo e(__('ClearCache')); ?></a>
                                    </li>
                                    <?php endif; ?>


                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- help & support end -->



                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\layouts\sidebar.blade.php ENDPATH**/ ?>