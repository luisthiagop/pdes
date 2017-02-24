<?php $__env->startComponent('mail::message'); ?>
# Olá <?php echo e($user->name); ?>,
bem vindo ao nosso sistema de eventos.

<?php $__env->startComponent('mail::button', ['url' => 'http://google.com','color'=>'blue']); ?>

<?php echo $__env->renderComponent(); ?>

Obrigado,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
