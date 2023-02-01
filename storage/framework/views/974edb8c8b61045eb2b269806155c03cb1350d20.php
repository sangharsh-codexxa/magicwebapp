<nav class="header">

    <h1 class="text-lg px-6"><?php echo e(config('app.name')); ?></h1>

    <ul class="flex-grow justify-end pr-2">
        <li>
           
        </li>
        <li>
            <a href="<?php echo e(route('languages.translations.index', config('app.locale'))); ?>" class="<?php echo e(set_active('*/translations')); ?>">
                <?php echo $__env->make('translation::icons.translate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(__('translation::translation.translations')); ?>

            </a>
        </li>
    </ul>

</nav><?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\vendor\translation\nav.blade.php ENDPATH**/ ?>