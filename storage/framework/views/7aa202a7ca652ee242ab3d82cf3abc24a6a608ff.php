
<?php $__env->startSection('title','Import Institute'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
   <?php echo e(__('Institute')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Institute')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('button'); ?>

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="<?php echo e(url('files/institute.csv')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
        class="feather icon-arrow-down mr-2"></i><?php echo e(__('Download Example csv File')); ?></a> </div>
</div>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="contentbar">

<div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle"><?php echo e(__('Import')); ?> <?php echo e(__('Question')); ?></h5>
        </div>
        <div class="card-body">
			<form action="<?php echo e(route('institute.csvfileupload')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

		  
		  <div class="row">
			  <div class="form-group col-md-6">
			   <label for="file"><?php echo e(__('Select csv File :')); ?></label>
				<input required="" type="file" name="file" class="form-control">
				<?php if($errors->has('file')): ?>
				  <span class="invalid-feedback text-danger" role="alert">
					  <strong><?php echo e($errors->first('file')); ?></strong>
				  </span>
			   <?php endif; ?>
			  <br>
			   <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                Submit</button>
			  </div>

			  
		  </div>

		  </form>
		</div>
		<div class="row">
		
			<div class="col-lg-12">
				<div class="card m-b-30">
					<div class="card-header">
						<h5 class="box-title"><?php echo e(__('Import Institute')); ?></h5>
					</div>
					<div class="card-body">
					
						<div class="table-responsive">
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
								<tr>
                                    <th><?php echo e(__('Column No')); ?></th>
                                    <th><?php echo e(__('Column Name')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                        </tr>
					</thead>
	
					<tbody>
						<tr>
							<td><?php echo e(__('1')); ?></td>
							<td><b><?php echo e(__('Image')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Name of Image')); ?></td>
	
							
						</tr>
	
						<tr>
							<td><?php echo e(__('2')); ?></td>
							<td><b><?php echo e(__('Address')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Address')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('3')); ?></td>
							<td><b><?php echo e(__('Email')); ?></b><?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Email')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('4')); ?></td>
							<td><b><?php echo e(__('Mobile')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Mobile')); ?></td>
						</tr>
	
						<tr>
							<td><?php echo e(__('5')); ?></td>
							<td><b><?php echo e(__('Skills')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Skills')); ?></td>
						</tr>
	        			<tr>
							<td><?php echo e(__('6')); ?></td>
							<td><b><?php echo e(__('About')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('About')); ?></td>
						</tr>
                        <tr>
							<td><?php echo e(__('7')); ?></td>
							<td><b><?php echo e(__('Status')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Status')); ?></td>
						</tr>
                        <tr>
							<td><?php echo e(__('8')); ?></td>
							<td><b><?php echo e(__('Verified')); ?></b><?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Verified')); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__('9')); ?></td>
							<td><b><?php echo e(__('Title')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Title')); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__10')); ?></td>
							<td><b><?php echo e(__UserID')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__UserID')); ?></td>
						</tr>
						<tr>
							<td><?php echo e(__11')); ?></td>
							<td><b><?php echo e(__('Affilated')); ?></b> <?php echo e(__('Required')); ?></td>
							<td><?php echo e(__('Affilated')); ?></td>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/exportica.in/magic.exportica.in/resources/views/admin/Institute/import.blade.php ENDPATH**/ ?>