<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('laravel-sitemap::sitemapIndex/' . $tag->getType(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</sitemapindex>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\vendor\spatie\laravel-sitemap\resources\views\sitemapIndex\index.blade.php ENDPATH**/ ?>