<?php $__env->startComponent('mail::message'); ?>

{body}

{#attachment_details}

<?php $__env->startComponent('mail::panel'); ?>

{#each . } {/each}
{attachment_name} ({attachment_size} {attachment_type})

<?php echo $__env->renderComponent(); ?>

{/attachment_details}

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\laragon\www\magic\magic.exportica.in\vendor\qoraiche\laravel-mail-editor\resources\views\skeletons\markdown\postmark\comment-notification.blade.php ENDPATH**/ ?>