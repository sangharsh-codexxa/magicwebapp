
<?php $__env->startSection('title','All Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Course')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Course')); ?>

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<div class="contentbar">
  <!-- Start row -->

  <!--=========master check box fro bulk delete start ==============================================-->
  <!--=========master check box fro bulk delete start ==============================================-->
<div class="row" style="margin-bottom: 40px">
      <div class="col-lg-4">
        <form class="navbar-form" role="search">
          <div class="input-group ">
            <form method="get" action="">
              <input value="<?php echo e(app('request')->input('title') ?? ''); ?>" type="text" name="searchTerm" cllass="form-control float-left text-center" placeholder="<?php echo e(__('Search Courses')); ?>">
              <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
            </form>
            <?php if(app('request')->input('searchTerm') != ''): ?>
            <a role="button" title="Back" href="<?php echo e(url('course')); ?>" name="clear" value="search" id="clear_id"
                class="btn btn-warning-rgba btn-xs">
                <?php echo e(__('Clear Search')); ?>

            </a>
            <?php endif; ?>
         
          </div>
        </form>
      </div>

     


      <div class="col-md-8 text-right mb-2">
        
          <a href="<?php echo e(url('course/create')); ?>" class="btn btn-primary-rgba mr-2"><i
              class="feather icon-plus mr-2"></i><?php echo e(__('Add Course')); ?></a>
      
          <?php if(Auth::User()->role == "admin" ): ?>
          <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i
              class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
              <button type="button" class="btn btn-success-rgba mr-2">
                <div class="select-all-checkbox">
        
                  <div>
                    <input id="checkboxAll" type="checkbox" class="filled-in width-15 height-15 t-3 position-relative"
                      name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label> <?php echo e(__('Select All')); ?>

                  </div>
                  
          
                </div>
          
              </button>
          <?php endif; ?>
          
        
          <li class="list-inline-item">
            <div class="settingbar">
              <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-warning-rgba">
                <i class="feather icon-filter mr-2"></i><?php echo e(__('Filter')); ?>

              </a>
            </div>
          </li>
          <form action="" method="get" class="filterForm">
            <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
              <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                <h4><?php echo e(__('Filtered')); ?></h4>
                <a href="javascript:void(0)" id="infobar-settings-close" class="btn btn-primary close">
                  <img src="admin_assets/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                </a>
              </div>
              <div class="infobar-settings-sidebar-body">
                <div class="custom-mode-setting">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Price')); ?></h6>
                    </div>
                   
                      <div class="col-4 text-right">
                        <div class="form-group">
                          <div class="update-password1">
                            <input type="checkbox" id="myCheck1" name="type" class="custom_toggle" onclick="myFunction()" checked>
                          </div>
                        </div>
                      </div>
                      <div style="display: none" id="update-password1">
                          <div class="form-group text-right col-md-12">
                            <select required="" name="type" id="myCheck1" class="form-control select2">
                              <option value="paid"><?php echo e(__('Paid')); ?></option>
                          <option value="free"><?php echo e(__('Free')); ?></option>
                        </select>
                      </div>
                    </div>

      
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Status')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="status" class="custom_toggle" checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Featured')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="featured" class="custom_toggle" checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('A-Z')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="asc" class="custom_toggle"  checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Z-A')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="desc" class="custom_toggle"  checked/></div>
                  </div>
      
                </div>
                <div class="infobar-settings-sidebar-body">
                  <div class="custom-mode-setting">
                    <div class="row align-items-center pb-3">
                      <div class="col-8">
                        <h6 class="mb-0 filter"><?php echo e(__('Category')); ?></h6>
                      </div>
                      
                        <div class="col-4 text-right">
                          <div class="form-group">
                            <div class="update-password">
                              <input type="checkbox" id="myCheck" name="category_id" class="custom_toggle" onclick="myFunction()" checked>
                            </div>
                          </div>
                        </div>
                        <div style="display: none" id="update-password">
                            <div class="form-group text-right col-md-12">
                              <select autofocus="" class="form-control select2" name="category_id">
                                <option value=""><?php echo e(__('Select Category')); ?></option>
                                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
            
                        </div>
                      </div>
      
        
                    </div>
        
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12 text-center">
                <button type="reset" class="btn btn-danger reset-btn"><i class="fa fa-ban"></i> <?php echo e(__('Reset Filter')); ?></button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Apply Filter')); ?></button>
              </div>
          </form>
      </div>
  </div>

  <div class="col-lg-12">
    <div class="partial-course-main-block">
      <div class="row">
        <div class="col-lg-3">
          <div class="card partial-course-block">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                    <h4><?php echo e($active); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Active Course')); ?></p>
                </div> 
                <div class="col-6 text-right">
                  <i class="text-info feather icon-book-open icondashboard"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card partial-course-block">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                    <h4><?php echo e($deactive); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Pending Course')); ?></p>
                </div> 
                <div class="col-6 text-right">
                  <i class="text-danger feather icon-link icondashboard"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card partial-course-block">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                    <h4><?php echo e($free); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Free Course')); ?></p>
                </div> 
                <div class="col-6 text-right">
                  <i class="text-success feather icon-file-text icondashboard"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card partial-course-block-one">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                    <h4><?php echo e($paid); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Paid Course')); ?></p>
                </div> 
                <div class="col-6 text-right">
                  <i class="text-warning feather icon-dollar-sign icondashboard"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 mt-3 text-center">
    <?php if(request()->get('searchTerm')): ?>
        <h5 class=""><?php echo e(__("Showing")); ?> <?php echo e(filter_var($course->count())); ?> <?php echo e(__("of")); ?> <?php echo e(filter_var($course->total())); ?> <?php echo e(__("results for ")); ?> "<span class="text-primary"><?php echo e(Request::get('searchTerm')); ?></span>"</h5>
        <div class="clearfix"></div>
      <?php endif; ?>
  </div>
  
      <?php $__empty_1 = true; $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        
        <div class="col-lg-4 mb-4">
          <input type='checkbox' form='bulk_delete_form'
            class='form-card-input check filled-in material-checkbox-input position-absolute width-25 height-25 l-30 t-13'
            name='checked[]' value="<?php echo e($cat->id); ?>" id='checkbox<?php echo e($cat->id); ?>'>
          <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>
          <div class="card partial-course-img">
            <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '' && @file_get_contents('images/course/'.$cat['preview_image'])): ?>
            <img class="card-img-top" src="<?php echo e(url('images/course/'.$cat['preview_image'])); ?>" alt="User Avatar">
            <div class="overlay-bg"></div>
            <?php else: ?>
            <img class="card-img-top" src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" alt="User Avatar">
            <div class="overlay-bg"></div>
            <?php endif; ?>
            <div class="card-img-block">
              <h4 class="mt-3 card-title" style="color:white;"><?php echo e($cat->title); ?></h4>
              <p class="card-sub-title" style="color:white;"><?php if(isset($cat->user)): ?> <?php echo e($cat->user['fname']); ?> <?php endif; ?></p>
            </div>
            <div class="card-user-img">
              <?php if($image = @file_get_contents('../public/images/user_img/'.$cat->user->user_img)): ?>

                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('images/user_img/'.$cat->user->user_img)); ?>" alt="profilephoto" class="img-fluid" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>">

              <?php else: ?>

                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(Avatar::create($cat->user->fname)->toBase64()); ?>" alt="profilephoto" class="img-fluid w-h-100" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>"  >

             
              <?php endif; ?>
             
            </div>
            <div class="card-body">
              <ul class="partial-course-status">
                <li style="list-style-type: none;" class="mt-4">
                  <a href="#" style="color:black"><?php echo e(__('Type')); ?> 
                    <span class="button-align">
                      <?php if($cat->type == '1'): ?>
                        paid
                        <?php else: ?>
                        Free
                      <?php endif; ?>
                    </span>
                  </a>
                </li>
                <?php if(Auth::user()->role == 'admin'): ?>
                <li style="list-style-type: none;" class="mt-3"> 
                  <a href="#" style="color:black"><?php echo e(__('Features')); ?><span class="button-align">
                 <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status1" name="featured" <?php echo e($cat->featured == 1 ? 'checked' : ''); ?> />
                  </span>
                  </a>
                  
                </li>
                <?php else: ?>
                <li style="list-style-type: none;" class="mt-3"> 
                  <a href="#" style="color:black"><?php echo e(__('Features')); ?>

                    <span class="button-align">
                 <?php if($cat->featured ==1): ?>
                          <?php echo e(__('Yes')); ?>

                          <?php else: ?>
                          <?php echo e(__('No')); ?>

                          <?php endif; ?>
                  </span>
                  </a>
                  
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->role == 'admin'): ?>
                <li style="list-style-type: none;" class="mt-3">
                  <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                    <span class="button-align">
                      <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status2" name="status" <?php echo e($cat->status == 1 ? 'checked' : ''); ?> />
                    </span>
                  </a>
            
                </li>
                <?php else: ?>
                <li style="list-style-type: none;" class="mt-3">
                  <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                    <span class="button-align">
                      <?php if($cat->status ==1): ?>
                            <?php echo e(__('Active')); ?>

                          <?php else: ?>
                            <?php echo e(__('Deactive')); ?>

                          <?php endif; ?>
                    </span>
                  </a>
            
                </li>
                <?php endif; ?>
                <li style="list-style-type: none;" class="mt-4">
                  <a href="#" style="color:black"><?php echo e(__('Date/Time')); ?>

                    <span class="button-align">
                      <?php echo e(__('17-06-2022/12:00 PM')); ?>

                    </span>
                  </a>
                </li>
              </ul>

            </div>
            <div class="card-footer">
              <div class="row mt-3 mb-3">
                <div class="col-1"></div>
                <div class="col-2">
                  <a href="#">

                    <i title="Edit" class="feather icon-edit"></i></a>
                </div>
                <div class="col-2">
                  <a data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>">
                    <i title="Delete" class="text-primary feather icon-trash"></i></a>

                  <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" tabindex="-1" role="dialog"
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
                          <form method="post" action="<?php echo e(url('course/'.$cat->id)); ?>" class="pull-right">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field("DELETE")); ?>

                            <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-2">
                    <!--href="<?php echo e(route('user.course.show',['id' => $cat->id, 'slug' => $cat->slug ])); ?>"-->
                  <a href="#" target="_blank"
                    title="Show">

                    <i class="feather icon-eye"></i></a>
                </div>

             

                <!--==================bulk delete start========================================-->

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
                        <p><?php echo e(__('Do you really want to delete selected item ? This process
                          cannot be undone')); ?>.</p>
                      </div>
                      <div class="modal-footer">
                        <form id="bulk_delete_form" method="post" action="<?php echo e(route('cource.bulk.delete')); ?>">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('POST'); ?>
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                          <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> 

                <!--=================== bulk delete end =======================================--->
                <div class="modal fade" id="exampleStandardModal<?php echo e($cat->user->id); ?>" tabindex="-1"
                  role="dialog" aria-labelledby="exampleStandardModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleStandardModalLabel">
                                  <?php echo e($cat->user->fname); ?></h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="col-lg-12">
                                  <div class="card m-b-30">
                                      <div class="card-body py-5">
                                          <div class="row">
                                              <div class="user-modal">
                                                  <?php if($image =
                                                  @file_get_contents('../public/images/user_img/'.$cat->user->user_img)): ?>
                                                  <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                      src="<?php echo e(url('images/user_img/'.$cat->user->user_img)); ?>"
                                                      alt="profilephoto"
                                                      class="img-responsive img-circle">
                                                  <?php else: ?>
                                                  <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                      src="<?php echo e(Avatar::create($cat->user->fname)->toBase64()); ?>"
                                                      alt="profilephoto"
                                                      class="img-responsive img-circle">
                                                  <?php endif; ?>
                                              </div>
                                              <div class="col-lg-12">
                                                  <h4 class="text-center">
                                                      <?php echo e($cat->user->fname); ?><?php echo e($cat->user->lname); ?>

                                                  </h4>
                                                  <div class="button-list mt-4 mb-3">
                                                      <button type="button"
                                                          class="btn btn-primary-rgba"><i
                                                              class="feather icon-email mr-2"></i><?php echo e($cat->user->email); ?></button>
                                                      <button type="button"
                                                          class="btn btn-success-rgba"><i
                                                              class="feather icon-phone mr-2"></i><?php echo e($cat->user->mobile); ?></button>
                                                  </div>
                                                  <div class="table-responsive">
                                                      <table
                                                          class="table table-borderless mb-0 user-table">
                                                          <tbody>
                                                            <?php if(isset($cat->user->dob )): ?>

                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      <?php echo e(__('Date Of Birth :')); ?></th>
                                                                  <td class="p-1">
                                                                      <?php echo e($cat->user->dob); ?></td>
                                                              </tr>
                                                              <?php endif; ?>
                                                              <?php if(isset($cat->user->address )): ?>

                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      Address :</th>
                                                                  <td class="p-1">
                                                                      <?php echo e($cat->user->address); ?></td>
                                                              </tr>
                                                              <?php endif; ?>

                                                              <?php if(isset($cat->user->gender )): ?>

                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      <?php echo e(__('Gender :')); ?></th>
                                                                  <td class="p-1">
                                                                      <?php echo e($cat->user->gender); ?></td>
                                                              </tr>
                                                              <?php endif; ?>

                                                              <?php if(isset($cat->user->email )): ?>

                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      <?php echo e(__('Email ID :')); ?></th>
                                                                  <td class="p-1">
                                                                      <?php echo e($cat->user->email); ?></td>
                                                              </tr>
                                                              <?php endif; ?>

                                                              <?php if(isset($cat->user->role )): ?>

                                                              <tr>
                                                                <th scope="row" class="p-1">
                                                                Role :</th>
                                                                <td class="p-1">
                                                                    <?php echo e($cat->user->role); ?></td>
                                                            </tr>
                                                            <?php endif; ?>

                                                         

                                                            <tr>
                                                              <th scope="row" class="p-1">
                                                              Country-State-City</th>
                                                              <td class="p-1">
                                                                  <?php echo e(optional($cat->user->country)->name); ?>-<?php echo e(optional($cat->user->state)->name); ?>-<?php echo e(optional($cat->user->city)->name); ?></td>
                                                          </tr>
                                                      

                                                          <?php if(isset($cat->user->youtube_url )): ?>

                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                             Youtube Url</th>
                                                              <td class="p-1">
                                                                  <a href="<?php echo e($cat->user->youtube_url); ?>"><?php echo e(str_limit($cat->user->youtube_url, '30')); ?></a></td>
                                                          </tr>
                                                          <?php endif; ?>

                                                          <?php if(isset($cat->user->fb_url )): ?>

                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Facebook Url</th>
                                                              <td class="p-1">
                                                                  <a href="<?php echo e($cat->user->fb_url); ?>"><?php echo e(str_limit($cat->user->fb_url, '30')); ?></a></td>
                                                          </tr>
                                                          <?php endif; ?>

                                                          <?php if(isset($cat->user->twitter_url )): ?>

                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Twitter URL</th>
                                                              <td class="p-1">
                                                                  <a href="<?php echo e($cat->user->twitter_url); ?>"><?php echo e(str_limit($cat->user->twitter_url, '30')); ?></a></td>
                                                          </tr>
                                                          <?php endif; ?>

                                                          <?php if(isset($cat->user->linkedin_url )): ?>

                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Linkedin URL</th>
                                                              <td class="p-1">
                                                                  <a href="<?php echo e($cat->user->linkedin_url); ?>"><?php echo e(str_limit($cat->user->linkedin_url, '30')); ?></a></td>
                                                              </td>
                                                          </tr>
                                                          <?php endif; ?>


                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

                <?php if(Module::has('Homework') && Module::find('Homework')->isEnabled()): ?>
                <div class="col-2">
                  <?php echo $__env->make('homework::admin.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endif; ?>

                <div class="col-2 duplicate">


                  <a href="#" title="Duplicate">
                    <!--<form action="<?php echo e(route('course.duplicate',$cat->id)); ?>" method="POST">-->
                    <!--  <?php echo e(csrf_field()); ?>-->
                    <!--  <button type="Submit" class="btn mr-3">-->
                    <!--    <i class="text-primary feather icon-copy"></i>-->
                    <!--  </button>-->
                    <!--</form>-->

                  </a>


                </div>
                <div class="col-1"></div>
              </div>
            </div>



          </div>
        </div>
        <br>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <!--<h3 class="col-md-12 mt-5 text-center">-->
        <!--  <i class="fa fa-frown-o text-warning"></i> <?php echo e(__("No Course Found !")); ?>-->
        <!--</h3>-->
        <?php endif; ?>
        <div class="card partial-course-img">
                        <img class="card-img-top" src="https://eclass.mediacity.co.in/demo/public/images/course/157976172453.jpg" alt="User Avatar">
            <div class="overlay-bg"></div>
                        <div class="card-img-block">
              <h4 class="mt-3 card-title" style="color:white;">Music Production with Mixing &amp; Mastering</h4>
              <p class="card-sub-title" style="color:white;"> Instructor </p>
            </div>
            <div class="card-user-img">
              
                <img src="https://eclass.mediacity.co.in/demo/public/images/user_img/159116551043.jpg" alt="profilephoto" class="img-fluid" data-toggle="modal" data-target="#exampleStandardModal2">

                           
            </div>
            <div class="card-body">
              <ul class="partial-course-status">
                <li style="list-style-type: none;" class="mt-4">
                  <a href="#" style="color:black">Type 
                    <span class="button-align">
                                              paid
                                            </span>
                  </a>
                </li>
                                <li style="list-style-type: none;" class="mt-3"> 
                  <a href="#" style="color:black">Features<span class="button-align">
                 <input data-id="21" type="checkbox" class="custom_toggle status1" name="featured" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="box-shadow: rgb(249, 97, 109) 0px 0px 0px 0px inset; border-color: rgb(249, 97, 109); background-color: rgb(249, 97, 109); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; background-color: rgb(255, 228, 230); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                  </span>
                  </a>
                  
                </li>
                
                                <li style="list-style-type: none;" class="mt-3">
                  <a href="#" style="color:black">Status
                    <span class="button-align">
                      <input data-id="21" type="checkbox" class="custom_toggle status2" name="status" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="box-shadow: rgb(249, 97, 109) 0px 0px 0px 0px inset; border-color: rgb(249, 97, 109); background-color: rgb(249, 97, 109); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; background-color: rgb(255, 228, 230); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                    </span>
                  </a>
            
                </li>
                                <li style="list-style-type: none;" class="mt-4">
                  <a href="#" style="color:black">Date/Time
                    <span class="button-align">
                      17-06-2022/12:00 PM
                    </span>
                  </a>
                </li>
              </ul>

            </div>
            <div class="card-footer">
              <div class="row mt-3 mb-3">
                <div class="col-1"></div>
                <div class="col-2">
                  <a href="#">

                    <i title="Edit" class="feather icon-edit"></i></a>
                </div>
                <div class="col-2">
                  <a>
                    <i title="Delete" class="text-primary feather icon-trash"></i></a>

                  <div class="modal fade bd-example-modal-sm" id="delete21" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h4>Are You Sure ?</h4>
                          <p>Do you really want to delete ? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                          <form method="post" action="https://eclass.mediacity.co.in/demo/public/course/21" class="pull-right">
                            <input type="hidden" name="_token" value="YkMZruxMKclFEfr2AYKdLAwRwCdiZSU6jWZaiAvL">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-2">
                  <a href="#" target="_blank" title="Show">

                    <i class="feather icon-eye"></i></a>
                </div>

             

                <!--==================bulk delete start========================================-->

                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h4 class="modal-heading">Are You Sure ?</h4>
                        <p>Do you really want to delete selected item ? This process
                          cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        <form id="bulk_delete_form" method="post" action="https://eclass.mediacity.co.in/demo/public/cource-bulk-delete">
                          <input type="hidden" name="_token" value="YkMZruxMKclFEfr2AYKdLAwRwCdiZSU6jWZaiAvL">                          <input type="hidden" name="_method" value="POST">                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!--=================== bulk delete end =======================================--->
                <div class="modal fade" id="exampleStandardModal2" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleStandardModalLabel">
                                  Instructor</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="col-lg-12">
                                  <div class="card m-b-30">
                                      <div class="card-body py-5">
                                          <div class="row">
                                              <div class="user-modal">
                                                                                                    <img src="https://eclass.mediacity.co.in/demo/public/images/user_img/159116551043.jpg" alt="profilephoto" class="img-responsive img-circle">
                                                                                                </div>
                                              <div class="col-lg-12">
                                                  <h4 class="text-center">
                                                      InstructorExample
                                                  </h4>
                                                  <div class="button-list mt-4 mb-3">
                                                      <button type="button" class="btn btn-primary-rgba"><i class="feather icon-email mr-2"></i>instructor@mediacity.co.in</button>
                                                      <button type="button" class="btn btn-success-rgba"><i class="feather icon-phone mr-2"></i>9123456789</button>
                                                  </div>
                                                  <div class="table-responsive">
                                                      <table class="table table-borderless mb-0 user-table">
                                                          <tbody>
                                                            
                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      Date Of Birth :</th>
                                                                  <td class="p-1">
                                                                      2020-04-23</td>
                                                              </tr>
                                                                                                                            
                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      Address :</th>
                                                                  <td class="p-1">
                                                                      Comapny 12345 South Main Street Anywhere</td>
                                                              </tr>
                                                              
                                                              
                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      Gender :</th>
                                                                  <td class="p-1">
                                                                      Male</td>
                                                              </tr>
                                                              
                                                              
                                                              <tr>
                                                                  <th scope="row" class="p-1">
                                                                      Email ID :</th>
                                                                  <td class="p-1">
                                                                      instructor@mediacity.co.in</td>
                                                              </tr>
                                                              
                                                              
                                                              <tr>
                                                                <th scope="row" class="p-1">
                                                                Role :</th>
                                                                <td class="p-1">
                                                                    instructor</td>
                                                            </tr>
                                                            
                                                         

                                                            <tr>
                                                              <th scope="row" class="p-1">
                                                              Country-State-City</th>
                                                              <td class="p-1">
                                                                  UNITED STATES-Alabama-</td>
                                                          </tr>
                                                      

                                                          
                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                             Youtube Url</th>
                                                              <td class="p-1">
                                                                  <a href="https://youtube.com">http://youtube.com</a></td>
                                                          </tr>
                                                          
                                                          
                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Facebook Url</th>
                                                              <td class="p-1">
                                                                  <a href="https://facebook.com">http://facebook.com</a></td>
                                                          </tr>
                                                          
                                                          
                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Twitter URL</th>
                                                              <td class="p-1">
                                                                  <a href="https://twitter.com">http://twitter.com</a></td>
                                                          </tr>
                                                          
                                                          
                                                          <tr>
                                                              <th scope="row" class="p-1">
                                                                  Linkedin URL</th>
                                                              <td class="p-1">
                                                                  <a href="http://linkedeln.com">http://linkedeln.com</a></td>
                                                              
                                                          </tr>
                                                          

                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

                                <div class="col-2">
                  <!-- This will append in course cards for admin-->
<!-- Homework icon -->
<a href="#"> <i title="homework" class="feather icon-book"></i></a>
<!-- Homework icon end -->
                </div>
                
                <div class="col-2 duplicate">


                  <a href="#" title="Duplicate">
                    <form action="#" method="POST">
                      <input type="hidden" name="_token" value="YkMZruxMKclFEfr2AYKdLAwRwCdiZSU6jWZaiAvL">
                      <button type="Submit" class="btn mr-3">
                        <i class="text-primary feather icon-copy"></i>
                      </button>
                    </form>

                  </a>


                </div>
                <div class="col-1"></div>
              </div>
            </div>



          </div>

      <br>


      <div class="form-group col-md-6 mt-5">
        <div class="col-xs-12">

          <div class="pull-right">
            <?php echo $course->render(); ?>

          </div>
        </div>
      </div>


    

    <br>
    <br>
    <br>



  </div>
  <!-- End row -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
  $(function () {
    $('.status1').change(function () {
      var featured = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-featured-status',
        data: {
          'featured': featured,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  $(function () {
    $('.status2').change(function () {
      var status = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-status',
        data: {
          'status': status,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck').change(function(){
          if($('#myCheck').is(':checked')){
            $('#update-password').show('fast');
          }else{
            $('#update-password').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck1').change(function(){
          if($('#myCheck1').is(':checked')){
            $('#update-password1').show('fast');
          }else{
            $('#update-password1').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  $(document).ready(function () {
    $(".reset-btn").click(function () {
      var uri = window.location.toString();

      if (uri.indexOf("?") > 0) {

        var clean_uri = uri.substring(0, uri.indexOf("?"));

        window.history.replaceState({}, document.title, clean_uri);

      }

      location.reload();
    });
  });
</script>
<!-- script to change status end -->

<script>
    $('#search').on('change', function () {
        var v = $(this).val();
        if (v == 'search') {
            $('#clear_id').show();
            $('#clear').attr('required', '');
        } else {
            $('#clear_id').hide();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/magic.bizz-manager.com/public_html/resources/views/admin/course/partial/index.blade.php ENDPATH**/ ?>