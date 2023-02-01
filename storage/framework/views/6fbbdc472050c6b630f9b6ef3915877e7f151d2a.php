<?php
    $all_methods = ['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'];
    ($all_methods == $methods) && ($methods = ['any']);
?>
<?php if(\count($methods) > 1): ?>
         * @methods('<?php echo \implode("', ", $methods); ?>')
         * @uri('<?php echo $url; ?>')
<?php else: ?>
         * <?php echo '@'.strtolower(\implode('', $methods)); ?>('<?php echo $url; ?>')
<?php endif; ?>
<?php if($routeName): ?>
         * @name('<?php echo $routeName; ?>')
<?php endif; ?>
<?php if($file): ?>
         * @at(<?php echo $file; ?>:<?php echo $line; ?>)
<?php endif; ?>
         * @middlewares('<?php echo implode("', '", $middlewares); ?>')
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\vendor\imanghafoori\laravel-microscope\templates\actions_comment.blade.php ENDPATH**/ ?>