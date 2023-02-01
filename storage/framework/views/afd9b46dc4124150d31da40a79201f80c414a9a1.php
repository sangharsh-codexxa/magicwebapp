
<?php $__env->startSection('title', 'Zoom Setting'); ?>
<?php $__env->startSection('maincontent'); ?>


<?php $__env->startComponent('components.breadcumb',['fourthactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Zoom Setting')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Meetings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Zoom Live Mettings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu3'); ?>
<?php echo e(__('Zoom Settings')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
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
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Zoom Settings')); ?></h5>
        </div>
        <div class="card-body">

          <form action="<?php echo e(route('updateToken')); ?>" method="POST">
            <?php echo csrf_field(); ?>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label><?php echo e(__('ZoomEmail')); ?>:</label>
                  <div class="input-group mb-3">
                    <input id="password-field" value="<?php echo e(Auth::user()->zoom_email); ?>" type="password"  name="zoom_email" class="form-control" placeholder="user@example.com">
                    <div class="input-group-prepend text-center">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></i></span>
                    </div>
                  </div>
              </div>

            
                   
                 
                <div class="form-group">
                  <label><?php echo e(__('ZoomJWTToken')); ?>:</label>
                  <textarea name="jwt_token" class="form-control" rows="5" cols="30" placeholder="Enter your JWT Token here"><?php echo e(Auth::user()->jwt_token); ?></textarea>
                </div>
            </div>

            <div class="col-md-6">
              <h4 style="color: black"><i class="fa fa-question-circle"></i> How to get JWT Token and Email : </h4>
              <hr>
             <div class="panel panel-default">
              <div class="panel-body">
              <ul>
                <li>First Sign up or Sign in here : <a href="https://marketplace.zoom.us/" target="_blank">Zoom Market Place Portal</a></li>
                 <li>Click on Top right side menu and click on build app : <a href="https://marketplace.zoom.us/develop/create" target="_blank">Create app</a></li>
                 <li>Choose JWT App and Continue...</li>
                 <li>After filling details click on credtional tab and bottom you will see <b>JWT Token</b> change token expiry accroding to your setting.</li>
                 <li>Paste your zoom email account id and JWT token here and create,edit meetings here.</li>
              </ul>
            </div>
            </div>
            </div>
            </div>
            
            <div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
							<?php echo e(__("Update")); ?></button>
						</div>

          </form>
                
                    
    
                  
              
              

              
           
        </div>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\zoom\setting.blade.php ENDPATH**/ ?>