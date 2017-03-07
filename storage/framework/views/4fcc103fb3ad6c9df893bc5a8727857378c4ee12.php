<?php $__env->startComponent('mail::message'); ?>
# Olá <?php echo e($user->name); ?>,
Bem vindo ao nosso sistema de eventos.

<?php $__env->startComponent('mail::button', ['url' => $url,'color'=>'blue']); ?>
Acessar sistema
<?php echo $__env->renderComponent(); ?>

Obrigado,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>