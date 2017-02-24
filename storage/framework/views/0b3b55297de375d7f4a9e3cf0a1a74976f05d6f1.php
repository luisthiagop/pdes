<?php $__env->startComponent('mail::message'); ?>
# Evento deletado ou excluido.

<?php echo e($user->name); ?> o evento que você estava participando foi cancelado ou deletado, confira o sistema.
<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
ir para o sistema
<?php echo $__env->renderComponent(); ?>

Obrigado,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
