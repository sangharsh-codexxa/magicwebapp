
<?php $__env->startSection('title',"Show Report"); ?>
<?php $__env->startSection('content'); ?>
 <section class="main-wrapper finish-main-block">
   <div class="container-xl">
    <br/>
  <?php if($auth): ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="">
          <div class="question-block">
           

          


          <div id="printableArea">

           <h3 class="text-center main-block-heading"><?php echo e(__('score card')); ?> </h3>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered result-table">
                <thead>
                  <tr>
                    <th><?php echo e(__('Total Question')); ?></th>
                    <th><?php echo e(__('Correct Questions')); ?></th>
                    <th><?php echo e(__('Per Question Mark')); ?></th>
                    <th><?php echo e(__('Total Marks')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo e($count_questions); ?></td>
                    <td>
                      <?php
                        $mark = 0;
                        $ca=0;
                        $correct = collect();
                      ?>
                      <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        
                          <?php
                            $mark++;
                            $ca++;
                          ?>
                       
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php if($answer->txt_approved == '1'): ?>
                      <?php echo e($ca); ?>

                      <?php else: ?>
                      <?php echo e(__('Pending')); ?>

                      <?php endif; ?>
                    </td>
                    <td><?php echo e($topics->per_q_mark); ?></td>
                      <?php
                          $correct = $mark*$topics->per_q_mark;
                      ?>
                    <td>
                       <?php if($answer->txt_approved == '1'): ?>
                        <?php echo e($correct); ?>

                        <?php else: ?>
                        <?php echo e(__('Pending')); ?>

                        <?php endif; ?>
                      </td>
                  </tr>
                </tbody>
              </table>
            </div>
           
            <br/>
            <h2 class="text-center"><?php echo e(__('ThankYou')); ?></h2>
          </div>

          

            <div class="finish-btn text-center">
              
              <input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print" />

              <?php if($topics->quiz_again == '1'): ?>
              <a href="<?php echo e(route('sub.tryagain',$topics->id)); ?>" class="btn btn-primary"><?php echo e(__('TryAgain')); ?> </a>
              <?php endif; ?>
              <a href="<?php echo e(route('course.content',['id' => $topics->course_id, 'slug' => $topics->courses->slug ])); ?>" class="btn btn-secondary"><?php echo e(__('Back')); ?> </a>

            </div>

          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</section>
<br/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\front\quiz\sub_finish.blade.php ENDPATH**/ ?>