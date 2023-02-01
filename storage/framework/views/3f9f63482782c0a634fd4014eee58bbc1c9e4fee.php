<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
          <img src="<?php echo e(asset('images/user_img/'.Auth::User()->user_img)); ?>" class="img-circle" alt="">

          <?php else: ?>
          <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="">

          <?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::User()->fname); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(__('Online')); ?></a>
        </div>
      </div>


      <?php if(Auth::User()->role == "admin"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><?php echo e(__('Navigation')); ?></li>
        
          <li class="<?php echo e(Nav::isRoute('admin.index')); ?>"><a href="<?php echo e(route('admin.index')); ?>"><i class="flaticon-web-browser" aria-hidden="true"></i><span><?php echo e(__('Dashboard')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('user.index')); ?> <?php echo e(Nav::isRoute('user.add')); ?> <?php echo e(Nav::isRoute('user.edit')); ?>"><a href="<?php echo e(route('user.index')); ?>"><i class="flaticon-user" aria-hidden="true"></i><span><?php echo e(__('Users')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?> <?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?> <?php echo e(Nav::isRoute('googlemeet.setting')); ?> <?php echo e(Nav::isRoute('googlemeet.index')); ?> <?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?> <?php echo e(Nav::isRoute('jitsi.dashboard')); ?> <?php echo e(Nav::isRoute('jitsi.create')); ?> <?php echo e(Nav::isResource('meeting-recordings')); ?> treeview">
            <a href="#">
              <i class="flaticon-live-1" aria-hidden="true"></i> <span><?php echo e(__('Meetings')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(isset($zoom_enable) && $zoom_enable == 1): ?>
                  <li class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?> treeview">
                    <a href="#">
                     <i class="fa fa-gg" aria-hidden="true"></i> <span><?php echo e(__('ZoomLiveMeetings')); ?></span>
                      <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?php echo e(Nav::isRoute('zoom.setting')); ?>"><a href="<?php echo e(route('zoom.setting')); ?>"><i class="flaticon-settings-1"></i><?php echo e(__('ZoomSettings')); ?></a></li>
                      <li class="<?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('meeting.create')); ?>"><a href="<?php echo e(route('zoom.index')); ?>"><i class="fa fa-file-text-o"></i><?php echo e(__('ZoomDashboard')); ?></a></li>
                      <li class="<?php echo e(Nav::isRoute('meeting.show')); ?>"><a href="<?php echo e(route('meeting.show')); ?>"><i class="flaticon-online-education"></i><?php echo e(__('AllMeetings')); ?></a></li>
                    </ul>
                  </li>
              <?php endif; ?>

              <?php if(isset($gsetting) && $gsetting->bbl_enable == 1): ?>
                  <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?> treeview">
                    <a href="#">
                     <i class="flaticon-honesty" aria-hidden="true"></i> <span><?php echo e(__('BigBlueMeetings')); ?></span>
                      <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?>"><a href="<?php echo e(route('bbl.setting')); ?>"><i class="flaticon-settings"></i><?php echo e(__('BigBlueButtonSettings')); ?></a></li>
                      <li class="<?php echo e(Nav::isRoute('bbl.all.meeting')); ?>"><a href="<?php echo e(route('bbl.all.meeting')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('ListMeetings')); ?></a></li>


                      <li class="<?php echo e(Nav::isRoute('download.meeting')); ?>"><a href="<?php echo e(route('download.meeting')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('MeetingRecordings')); ?></a></li>


                    </ul>
                  </li>
              <?php endif; ?>
                   <!-- ======= googlemmet start =============== -->
              <?php if(isset($gsetting) && $gsetting->googlemeet_enable == 1): ?>  
                <li class="<?php echo e(Nav::isRoute('googlemeet.setting')); ?> <?php echo e(Nav::isRoute('googlemeet.index')); ?> <?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?> treeview">
                  <a href="#">
                   <i class="fa fa-gg-circle" aria-hidden="true"></i> <span><?php echo e(__('Google Meet Meeting')); ?></span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo e(Nav::isRoute('googlemeet.setting')); ?>"><a href="<?php echo e(route('googlemeet.setting')); ?>"><i class="flaticon-settings-1"></i><?php echo e(__('Google Meet Settings')); ?></a></li>
                    <li class="<?php echo e(Nav::isRoute('googlemeet.index')); ?>"><a href="<?php echo e(route('googlemeet.index')); ?>"><i class="fa fa-file-text-o"></i><?php echo e(__('Google Meet Dashboard')); ?></a></li>
                    <li class="<?php echo e(Nav::isRoute('googlemeet.allgooglemeeting')); ?>"><a href="<?php echo e(route('googlemeet.allgooglemeeting')); ?>"><i class="flaticon-online-education"></i><?php echo e(__('AllMeetings')); ?></a></li>
                  </ul>
                </li>
              <?php endif; ?>
              <!-- ======= googlemeet end ================= -->

              <!-- ======= jitsi meeting start =============== -->
              <?php if(isset($gsetting) && $gsetting->jitsimeet_enable == 1): ?>
                <li class="<?php echo e(Nav::isRoute('jitsi.dashboard')); ?> <?php echo e(Nav::isRoute('jitsi.create')); ?> treeview">
                    <a href="#">
                     <i class="fa fa-sheqel" aria-hidden="true"></i> <span><?php echo e(__('Jitsi Meeting')); ?></span>
                      <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?php echo e(Nav::isRoute('jitsi.dashboard')); ?>"><a href="<?php echo e(route('jitsi.dashboard')); ?>"><i class="flaticon-settings-1"></i><?php echo e(__('Dashboard')); ?></a></li>
                      
                    </ul>
                  </li>
              <?php endif; ?>
              <!-- ======= jitsi meeting end ================= -->


              <li class="<?php echo e(Nav::isResource('meeting-recordings')); ?>"><a href="<?php echo e(url('meeting-recordings')); ?>"><i class="fa fa-bullseye" aria-hidden="true"></i><span><?php echo e(__('MeetingRecordings')); ?></span></a></li>

            </ul>
          </li>

        

       

          <li class="<?php echo e(Nav::isResource('admin/country')); ?> <?php echo e(Nav::isResource('admin/state')); ?> <?php echo e(Nav::isResource('admin/city')); ?> treeview">
            <a href="#">
              <i class="flaticon-location" aria-hidden="true"></i> <span><?php echo e(__('Location')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('admin/country')); ?>"><a href="<?php echo e(url('admin/country')); ?>"><i class="flaticon-flag"></i><?php echo e(__('Country')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/state')); ?>"><a href="<?php echo e(url('admin/state')); ?>"><i class="flaticon-placeholder"></i><?php echo e(__('State')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/city')); ?>"><a href="<?php echo e(url('admin/city')); ?>"><i class="flaticon-home"></i><?php echo e(__('City')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('currency')); ?>"><a href="<?php echo e(url('currency')); ?>"> <i class="flaticon-wallet"></i><span><?php echo e(__('Currency')); ?></span></a></li>
         

          <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('bundle')); ?> <?php echo e(Nav::isResource('courselang')); ?> <?php echo e(Nav::isResource('coursereview')); ?> <?php echo e(Nav::isRoute('assignment.view')); ?> <?php echo e(Nav::isResource('refundpolicy')); ?> <?php echo e(Nav::isResource('batch')); ?> <?php echo e(Nav::isRoute('quiz.review')); ?> <?php echo e(Nav::isResource('private-course')); ?> treeview">
            <a href="#">
                <i class="flaticon-browser-1"></i><?php echo e(__('Course')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> treeview">
                  <a href="#"><i class="flaticon-interface" aria-hidden="true"></i><?php echo e(__('Category')); ?><i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="<?php echo e(Nav::isResource('category')); ?>"><a href="<?php echo e(url('category')); ?>"><i class="flaticon-rec"></i><?php echo e(__('Category')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a href="<?php echo e(url('subcategory')); ?>"><i class="flaticon-rec"></i><?php echo e(__('SubCategory')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('childcategory')); ?>"><a href="<?php echo e(url('childcategory')); ?>"><i class="flaticon-rec"></i><?php echo e(__('ChildCategory')); ?></a></li>
                  </ul>

                  <li class="<?php echo e(Nav::isResource('course')); ?>"><a href="<?php echo e(url('course')); ?>"><i class="flaticon-document" aria-hidden="true"></i><span><?php echo e(__('Courses')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('bundle')); ?>"><a href="<?php echo e(url('bundle')); ?>"><i class="fa fa-server" aria-hidden="true"></i><span><?php echo e(__('BundleCourse')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a href="<?php echo e(url('courselang')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('CourseLanguage')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('coursereview')); ?>"><a href="<?php echo e(url('coursereview')); ?>"><i class="flaticon-rate" aria-hidden="true"></i><span><?php echo e(__('CourseReview')); ?></span></a></li>
                  
                  <?php if($gsetting->assignment_enable == 1): ?>
                  <li class="<?php echo e(Nav::isRoute('assignment.view')); ?>"><a href="<?php echo e(route('assignment.view')); ?>"><i class="flaticon-computer" aria-hidden="true"></i><span><?php echo e(__('Assignment')); ?></span></a></li>
                  <?php endif; ?>

                  <li class="<?php echo e(Nav::isResource('refundpolicy')); ?>"><a href="<?php echo e(url('refundpolicy')); ?>"><i class="flaticon-rate" aria-hidden="true"></i><span><?php echo e(__('RefundPolicy')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('batch')); ?>"><a href="<?php echo e(url('batch')); ?>"><i class="flaticon-interface" aria-hidden="true"></i><span><?php echo e(__('Batch')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isRoute('quiz.review')); ?>"><a href="<?php echo e(route('quiz.review')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('QuizReview')); ?></span></a></li>


                  <li class="<?php echo e(Nav::isResource('private-course')); ?>"><a href="<?php echo e(url('private-course')); ?>"><i class="fa fa-bullseye" aria-hidden="true"></i><span><?php echo e(__('PrivateCourse')); ?></span></a></li>



              </li>
            </ul>
          </li>

          <?php if(isset($gsetting) && $gsetting->attandance_enable == 1): ?>

          <li class="<?php echo e(Nav::isResource('attandance')); ?>"><a href="<?php echo e(url('attandance')); ?>"><i class="fa fa-user" aria-hidden="true"></i><span><?php echo e(__('Attandance')); ?></span></a></li>

          <?php endif; ?>

          <li class="<?php echo e(Nav::isRoute('onesignal.settings')); ?>"><a href="<?php echo e(route('onesignal.settings')); ?>"><i class="fa fa-location-arrow" aria-hidden="true"></i><span><?php echo e(__('PushNotification')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('coupon')); ?>"><a href="<?php echo e(url('coupon')); ?>"><i class="flaticon-coupon" aria-hidden="true"></i><span><?php echo e(__('Coupon')); ?></span></a></li>

          

          

          <li class="<?php echo e(Nav::isResource('plan/subscribe/settings')); ?> <?php echo e(Nav::isResource('subscription/plan')); ?> <?php echo e(Nav::isResource('orders/subscription')); ?> <?php echo e(Nav::isRoute('all.instructor')); ?> <?php echo e(Nav::isResource('requestinstructor')); ?> treeview">
           <a href="#">
             <i class="flaticon-teacher" aria-hidden="true"></i> <span><?php echo e(__('Instructors')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              

              <li class="<?php echo e(Nav::isRoute('all.instructor')); ?>"><a href="<?php echo e(route('all.instructor')); ?>"><i class="flaticon-customer"></i><?php echo e(__('All')); ?> <?php echo e(__('InstructorRequest')); ?></a></li>

              <li class="<?php echo e(Nav::isResource('requestinstructor')); ?>"><a href="<?php echo e(url('requestinstructor')); ?>"><i class="flaticon-graduation"></i><?php echo e(__('Pending')); ?> <?php echo e(__('InstructorRequest')); ?></a></li>


              <li class="<?php echo e(Nav::isResource('plan/subscribe/settings')); ?>"><a href="<?php echo e(url('plan/subscribe/settings')); ?>"><i class="fa fa-gears"></i><?php echo e(__('InstructorPlan')); ?> <?php echo e(__('Setting')); ?></a></li>
       

              <?php if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1): ?>
              <li class="<?php echo e(Nav::isResource('subscription/plan')); ?>"><a href="<?php echo e(url('subscription/plan')); ?>"><i class="fa fa-user-secret"></i><?php echo e(__('InstructorPlan')); ?></a></li>

              <li class="<?php echo e(Nav::isResource('orders/subscription')); ?>"><a href="<?php echo e(url('orders/subscription')); ?>"><i class="flaticon-graduation"></i><?php echo e(__('SubscribedInstructors')); ?></a></li>

              <?php endif; ?>


              <li class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?> <?php echo e(Nav::isRoute('involve.request.index')); ?> <?php echo e(Nav::isRoute('involve.request')); ?> treeview">
                <a href="#">
                  <i class="flaticon-test" aria-hidden="true"></i> <span><?php echo e(__('MultipleInstructor')); ?></span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?>"><a href="<?php echo e(route('allrequestinvolve')); ?>"> <i class="flaticon-pending"></i><?php echo e(__('RequestToInvolve')); ?></a></li>
                  <li class="<?php echo e(Nav::isRoute('involve.request.index')); ?>"><a href="<?php echo e(route('involve.request.index')); ?>"><i class="flaticon-question" aria-hidden="true"></i><?php echo e(__('InvolvementRequests')); ?></a></li>
                   <li class="<?php echo e(Nav::isRoute('involve.request')); ?>"><a href="<?php echo e(route('involve.request')); ?>"><i class="flaticon-web-browser" aria-hidden="true"></i><?php echo e(__('InvolvedInCourse')); ?></a></li>
                </ul>
              </li>


              <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?> <?php echo e(Nav::isRoute('admin.instructor')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?> treeview">
               <a href="#">
                 <i class="flaticon-payment" aria-hidden="true"></i> <span><?php echo e(__('InstructorPayout')); ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?>"><a href="<?php echo e(route('instructor.settings')); ?>"><i class="flaticon-settings-3"></i><?php echo e(__('PayoutSettings')); ?></a></li>
                  <li class="<?php echo e(Nav::isRoute('admin.instructor')); ?>"><a href="<?php echo e(route('admin.instructor')); ?>"><i class="flaticon-pending"></i><?php echo e(__('PendingPayout')); ?></a></li>

                  <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a href="<?php echo e(route('admin.completed')); ?>"><i class="flaticon-file"></i><?php echo e(__('CompletedPayout')); ?></a></li>
                
                </ul>
              </li>


            </ul>
          </li>

          
          

          <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(url('order')); ?>"><i class="flaticon-shopping-cart" aria-hidden="true"></i><span><?php echo e(__('Order')); ?></span></a></li>
    
          <li class="<?php echo e(Nav::isResource('page')); ?>"><a href="<?php echo e(url('page')); ?>"><i class="flaticon-computer" aria-hidden="true"></i><span><?php echo e(__('Pages')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('faqinstructor')); ?>  treeview">
           <a href="#">
             <i class="flaticon-faq" aria-hidden="true"></i> <span><?php echo e(__('Faq')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('faq')); ?>"><a href="<?php echo e(url('faq')); ?>"><i class="flaticon-chat"></i><?php echo e(__('FaqStudent')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('faqinstructor')); ?>"><a href="<?php echo e(url('faqinstructor')); ?>"><i class="flaticon-question"></i><?php echo e(__('FaqInstructor')); ?></a></li>
            </ul>
          </li>
          

          <li class="<?php echo e(Nav::isResource('user/course/report')); ?> <?php echo e(Nav::isResource('user/question/report')); ?> treeview">
           <a href="#">
             <i class="flaticon-flag" aria-hidden="true"></i> <span><?php echo e(__('Report')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('admin/report/view')); ?>"><a href="<?php echo e(url('admin/report/view')); ?>"><i class="flaticon-error"></i><span><?php echo e(__('.Reported')); ?> Course</span></a></li>
              <li class="<?php echo e(Nav::isResource('user/question/report')); ?>"><a href="<?php echo e(url('user/question/report')); ?>"><i class="flaticon-question-mark"></i><span><?php echo e(__('Reported')); ?> Question</span></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isResource('facts')); ?> <?php echo e(Nav::isRoute('category.slider')); ?> <?php echo e(Nav::isResource('getstarted')); ?> <?php echo e(Nav::isResource('trusted')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isRoute('terms')); ?> <?php echo e(Nav::isResource('testimonial')); ?> <?php echo e(Nav::isResource('advertisement')); ?> <?php echo e(Nav::isResource('directory')); ?> treeview">
           <a href="#">
             <i class="flaticon-optimization" aria-hidden="true"></i> <span><?php echo e(__('FrontSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('slider')); ?>"><a href="<?php echo e(url('slider')); ?>"><i class="flaticon-slider-tool"></i><span><?php echo e(__('Slider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('facts')); ?>"><a href="<?php echo e(url('facts')); ?>"><i class="flaticon-project-management"></i><span><?php echo e(__('FactsSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('category.slider')); ?>"><a href="<?php echo e(route('category.slider')); ?>"><i class="flaticon-interface"></i><span><?php echo e(__('CategorySlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('getstarted')); ?>"><a href="<?php echo e(url('getstarted')); ?>"><i class="flaticon-shuttle"></i><?php echo e(__('GetStarted')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('trusted')); ?>"><a href="<?php echo e(url('trusted')); ?>"><i class="flaticon-sliders"></i><span><?php echo e(__('TrustedSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('widget.setting')); ?>"><a href="<?php echo e(route('widget.setting')); ?>"><i class="flaticon-real-state"></i><?php echo e(__('WidgetSetting')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('testimonial')); ?>"><a href="<?php echo e(url('testimonial')); ?>"><i class="flaticon-customer-1"></i><?php echo e(__('Testimonial')); ?></a></li>

              <li class="<?php echo e(Nav::isResource('advertisement')); ?>"><a href="<?php echo e(url('advertisement')); ?>"><i class="fa fa-object-group" aria-hidden="true"></i><?php echo e(__('Advertisement')); ?></a></li>

              <li class="<?php echo e(Nav::isResource('directory')); ?>"><a href="<?php echo e(url('directory')); ?>"><i class="flaticon-digital-marketing" aria-hidden="true"></i><span><?php echo e(__('Seo')); ?> <?php echo e(__('Directory')); ?></span></a></li>

              
            </ul>
          </li>
          
          <li class="<?php echo e(Nav::isRoute('gen.set')); ?> <?php echo e(Nav::isRoute('api.setApiView')); ?> <?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isRoute('about.page')); ?> <?php echo e(Nav::isRoute('careers.page')); ?> <?php echo e(Nav::isRoute('comingsoon.page')); ?> <?php echo e(Nav::isRoute('termscondition')); ?> <?php echo e(Nav::isRoute('policy')); ?> <?php echo e(Nav::isRoute('bank.transfer')); ?> <?php echo e(Nav::isRoute('show.pwa')); ?> <?php echo e(Nav::isRoute('adsense')); ?> <?php echo e(Nav::isRoute('ipblock.view')); ?> <?php echo e(Nav::isRoute('whatsapp.button')); ?> <?php echo e(Nav::isRoute('coloroption.view')); ?> <?php echo e(Nav::isResource('manualpayment')); ?> <?php echo e(Nav::isRoute('twilio.settings')); ?> <?php echo e(Nav::isRoute('show.sitemap')); ?> <?php echo e(Nav::isRoute('get.api.key')); ?> <?php echo e(Nav::isRoute('show.lang')); ?>  treeview">
           <a href="#">
             <i class="flaticon-tools" aria-hidden="true"></i> <span><?php echo e(__('SiteSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('gen.set')); ?>"><a href="<?php echo e(route('gen.set')); ?>"><i class="flaticon-admin"></i><span><?php echo e(__('Setting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('api.setApiView')); ?>"><a href="<?php echo e(route('api.setApiView')); ?>"><i class="flaticon-report"></i><?php echo e(__('APISetting')); ?></a></li>

              <?php if(Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>
                  <?php echo $__env->make('mpesa::admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <?php endif; ?>
              
              <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="flaticon-real-state"></i><?php echo e(__('Blog')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('about.page')); ?>"><a href="<?php echo e(route('about.page')); ?>"><i class="flaticon-book"></i><?php echo e(__('About')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('careers.page')); ?>"><a href="<?php echo e(route('careers.page')); ?>"><i class="flaticon-mobile-marketing"></i><?php echo e(__('Career')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('comingsoon.page')); ?>"><a href="<?php echo e(route('comingsoon.page')); ?>"><i class="flaticon-fast-time"></i><?php echo e(__('ComingSoon')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('termscondition')); ?>"><a href="<?php echo e(route('termscondition')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('Terms&Condition')); ?> </a></li>
              <li class="<?php echo e(Nav::isRoute('policy')); ?>"><a href="<?php echo e(route('policy')); ?>"><i class="flaticon-smartphone"></i> <?php echo e(__('PrivacyPolicy')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('bank.transfer')); ?>"><a href="<?php echo e(route('bank.transfer')); ?>"><i class="flaticon-bank"></i> <?php echo e(__('BankDetails')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('show.pwa')); ?>"><a href="<?php echo e(route('show.pwa')); ?>"><i class="flaticon-mobile-marketing" aria-hidden="true"></i><span> <?php echo e(__('PWASetting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('adsense')); ?>"><a href="<?php echo e(url('/admin/adsensesetting')); ?>" title="Adsense Setting"><span><i class="flaticon-settings-3"></i> <?php echo e(__('AdsenseSetting')); ?></span></a></li>
              
              <?php if(isset($gsetting) && $gsetting->ipblock_enable == 1): ?>
              <li class="<?php echo e(Nav::isRoute('ipblock.view')); ?>"><a href="<?php echo e(url('admin/ipblock')); ?>" title="IPBlock Setting"><span><i class="flaticon-error"></i> <?php echo e(__('IPBlockSettings')); ?></span></a></li>
              <?php endif; ?>


              <li class="<?php echo e(Nav::isRoute('whatsapp.button')); ?>"><a href="<?php echo e(route('whatsapp.button')); ?>" title="Whatsapp Button Setting"><span><i class="fa fa-comment-o" aria-hidden="true"></i>&emsp; <?php echo e(__('WhatsappButtonSetting')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('coloroption.view')); ?>"><a href="<?php echo e(url('admin/coloroption')); ?>" title="Color Options"><span><i class="fa fa-cube" aria-hidden="true"></i>&emsp;<?php echo e(__('ColorSettings')); ?></span></a></li>

              <li class="<?php echo e(Nav::isResource('manualpayment')); ?>"><a href="<?php echo e(url('manualpayment')); ?>" title="Manual Payment Gateway"><span><i class="fa fa-file" aria-hidden="true"></i>&emsp;<?php echo e(__('ManualPaymentGateway')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('twilio.settings')); ?>"><a href="<?php echo e(route('twilio.settings')); ?>" title="Twilio Settings"><span><i class="fa fa-comment-o" aria-hidden="true"></i>&emsp; <?php echo e(__('TwilioSettings')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('show.sitemap')); ?>"><a href="<?php echo e(route('show.sitemap')); ?>"><i class="flaticon-location" aria-hidden="true"></i><span><?php echo e(__('SiteMap')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('get.api.key')); ?>"><a href="<?php echo e(route('get.api.key')); ?>"><i class="flaticon-test" aria-hidden="true"></i><span><?php echo e(__('GetAPIKeys')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('show.lang')); ?>"><a href="<?php echo e(route('show.lang')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('Language')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('maileclipse/mailables')); ?>"><a href="<?php echo e(url('maileclipse/mailables')); ?>"><i class="fa fa-clone" aria-hidden="true"></i><span><?php echo e(__('EmailSettings')); ?><?php echo e(__('')); ?></span></a></li>
             

            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('ad.setting')); ?> treeview">
           <a href="#">
             <i class="flaticon-video" aria-hidden="true"></i> <span><?php echo e(__('PlayerSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a href="<?php echo e(route('player.set')); ?>"><i class="flaticon-digital-marketing"></i> <?php echo e(__('PlayerCustomization')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>" title="Create ad"><i class="flaticon-video-advertising"></i><?php echo e(__('Advertise')); ?></a></li>
              <?php $ads = App\Ads::all(); ?>
              <?php if($ads->count()>0): ?>
              <li class="<?php echo e(Nav::isRoute('ad.setting')); ?>"><a href="<?php echo e(url('admin/ads/setting')); ?>" title="Ad Settings"><i class="flaticon-project-management"></i><?php echo e(__('AdvertiseSettings')); ?></a></li>
              <?php endif; ?>

            </ul>
          </li>


          <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>"><i class="flaticon-phone-book" aria-hidden="true"></i><span><?php echo e(__('ContactUs')); ?></span></a></li>

          

          <?php if(isset($gsetting) && $gsetting->activity_enable == '1'): ?>
            
          <li class="<?php echo e(Nav::isRoute('activity.index')); ?>"><a href="<?php echo e(route('activity.index')); ?>"><i class="fa fa-clone" aria-hidden="true"></i><span><?php echo e(__('ActivityLog')); ?></span></a></li>

          <?php endif; ?>

          <?php if(Module::has('Wallet') && Module::find('Wallet')->isEnabled()): ?>
              <?php echo $__env->make('wallet::admin.sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php endif; ?>

          <?php if(Module::has('Certificate') && Module::find('Certificate')->isEnabled()): ?>
              <?php echo $__env->make('certificate::admin.sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php endif; ?>


          <li class="<?php echo e(Nav::isRoute('admin.revenue.report')); ?> <?php echo e(Nav::isRoute('instructor.revenue.report')); ?> treeview">
           <a href="#">
             <i class="flaticon-project-management" aria-hidden="true"></i> <span><?php echo e(__('Revenue')); ?> <?php echo e(__('Report')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('admin.revenue.report')); ?>"><a href="<?php echo e(route('admin.revenue.report')); ?>"><i class="fa fa-crosshairs"></i> <?php echo e(__('AdminRevenue')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('instructor.revenue.report')); ?>"><a href="<?php echo e(route('instructor.revenue.report')); ?>"><i class="fa fa-ioxhost"></i> <?php echo e(__('InstructorRevenue')); ?></a></li>


            </ul>
          </li>


          <li class="<?php echo e(Nav::isRoute('import.view')); ?> <?php echo e(Nav::isRoute('database.backup')); ?> <?php echo e(Nav::isRoute('update.process')); ?> <?php echo e(Nav::isRoute('quick.update')); ?> treeview">
           <a href="#">
             <i class="flaticon-faq" aria-hidden="true"></i> <span><?php echo e(__('Help&Support')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('import.view')); ?>"><a href="<?php echo e(route('import.view')); ?>"><i class="fa fa-crosshairs"></i> <?php echo e(__('ImportDemo')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('database.backup')); ?>"><a href="<?php echo e(route('database.backup')); ?>"><i class="fa fa-ioxhost"></i> <?php echo e(__('DatabaseBackup')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('update.process')); ?>"><a href="<?php echo e(route('update.process')); ?>"><i class="fa fa-bullseye" aria-hidden="true"></i><span><?php echo e(__('UpdateProcess')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('quick.update')); ?>"><a href="<?php echo e(route('quick.update')); ?>"><i class="fa fa-spinner" aria-hidden="true"></i><span><?php echo e(__('QuickUpdate')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('remove.public')); ?>"><a href="<?php echo e(route('remove.public')); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><span><?php echo e(__('RemovePublic')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('clear-cache')); ?>"><a href="<?php echo e(url('clear-cache')); ?>"><i class="fa fa-clone" aria-hidden="true"></i><span><?php echo e(__('ClearCache')); ?></span></a></li>

              <li class="<?php echo e(Nav::isResource('admin/addon')); ?>"><a href="<?php echo e(url('admin/addon')); ?>"><i class="flaticon-real-state" aria-hidden="true"></i><span><?php echo e(__('Addon')); ?> <?php echo e(__('Manager')); ?></span></a></li>

            </ul>
          </li>
          

        </ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\admin\layoutsold\sidebar.blade.php ENDPATH**/ ?>